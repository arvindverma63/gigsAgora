<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Provider Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-2xl bg-white rounded-lg shadow-md p-6">
        <!-- Tabs -->
        <div class="flex border-b mb-6">
            <a href="?tab=job-offers" class="flex-1 py-2 px-4 text-center font-medium text-gray-700 {{ request('tab', 'job-offers') == 'job-offers' ? 'border-b-2 border-blue-500' : '' }}">Job Offers</a>
            <a href="?tab=create-offer" class="flex-1 py-2 px-4 text-center font-medium text-gray-700 {{ request('tab') == 'create-offer' ? 'border-b-2 border-blue-500' : '' }}">Create Job Offer</a>
            <a href="?tab=job-proposals" class="flex-1 py-2 px-4 text-center font-medium text-gray-700 {{ request('tab') == 'job-proposals' ? 'border-b-2 border-blue-500' : '' }}">Job Proposals</a>
        </div>

        <!-- Success/Error Messages -->
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-md">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Job Offers Tab -->
        @if (request('tab', 'job-offers') == 'job-offers')
            <h2 class="text-2xl font-bold mb-4">My Job Offers</h2>
            @if (!empty($jobOffers) && count($jobOffers) > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="p-2 border">Title</th>
                                <th class="p-2 border">Amount</th>
                                <th class="p-2 border">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobOffers as $offer)
                                <tr class="hover:bg-gray-100">
                                    <td class="p-2 border">{{ $offer['title'] }}</td>
                                    <td class="p-2 border">${{ $offer['amount'] }}</td>
                                    <td class="p-2 border">{{ $offer['createdAt'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center">No job offers found.</p>
            @endif
        @endif

        <!-- Create Job Offer Tab -->
        @if (request('tab') == 'create-offer')
            <h2 class="text-2xl font-bold mb-4">Create New Job Offer</h2>
            <form action="{{ route('job-provider.create-job-offer') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>{{ old('description') }}</textarea>
                </div>
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                    <input type="number" name="amount" id="amount" step="0.01" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Milestones</label>
                    <div id="milestones" class="space-y-4">
                        <div class="flex space-x-2">
                            <input type="text" name="milestones[0][title]" placeholder="Title" class="mt-1 block w-1/3 px-3 py-2 border border-gray-300 rounded-md">
                            <input type="text" name="milestones[0][description]" placeholder="Description" class="mt-1 block w-1/3 px-3 py-2 border border-gray-300 rounded-md">
                            <input type="number" name="milestones[0][amount]" placeholder="Amount" step="0.01" class="mt-1 block w-1/3 px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
                <div>
                    <label for="experienceLevel" class="block text-sm font-medium text-gray-700">Experience Level</label>
                    <select name="experienceLevel" id="experienceLevel" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="0">Entry</option>
                        <option value="1">Intermediate</option>
                        <option value="2">Expert</option>
                    </select>
                </div>
                <div>
                    <label for="jobType" class="block text-sm font-medium text-gray-700">Job Type</label>
                    <select name="jobType" id="jobType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="0">Fixed</option>
                        <option value="1">Hourly</option>
                    </select>
                </div>
                <div>
                    <label for="duration" class="block text-sm font-medium text-gray-700">Duration (days)</label>
                    <input type="number" name="duration" id="duration" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Create Job Offer</button>
            </form>
        @endif

        <!-- Job Proposals Tab -->
        @if (request('tab') == 'job-proposals')
            <h2 class="text-2xl font-bold mb-4">Job Proposals</h2>
            @if (!empty($jobProposals) && count($jobProposals) > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="p-2 border">ID</th>
                                <th class="p-2 border">Job Offer ID</th>
                                <th class="p-2 border">Freelancer</th>
                                <th class="p-2 border">Amount</th>
                                <th class="p-2 border">Status</th>
                                <th class="p-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobProposals as $proposal)
                                <tr class="hover:bg-gray-100">
                                    <td class="p-2 border">{{ $proposal['id'] }}</td>
                                    <td class="p-2 border">{{ $proposal['jobOfferId'] }}</td>
                                    <td class="p-2 border">{{ $proposal['freelancerUsername'] ?? 'Unknown' }}</td>
                                    <td class="p-2 border">${{ $proposal['amount'] }}</td>
                                    <td class="p-2 border">{{ $proposal['status'] ?? 'Pending' }}</td>
                                    <td class="p-2 border">
                                        <form action="{{ route('job-provider.accept-job-proposal', $proposal['id']) }}" method="POST" onsubmit="return confirm('Are you sure you want to accept this proposal?');">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded-md hover:bg-green-600">Accept</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center">No job proposals found.</p>
            @endif
        @endif
    </div>
</body>
</html>
