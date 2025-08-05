<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelancer Dashboard - Upwork Inspired</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .tab-active {
            background-color: #22C55E;
            color: white;
            font-weight: 600;
            border-radius: 6px;
        }

        .tab-inactive {
            color: #4B5563;
            font-weight: 500;
        }

        .tab-inactive:hover {
            background-color: #F3F4F6;
            transition: background-color 0.2s ease;
        }

        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        input:focus,
        select:focus,
        textarea:focus {
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2);
            border-color: #22C55E;
            transition: all 0.2s ease;
        }

        button {
            transition: all 0.2s ease;
        }

        .upwork-green {
            background-color: #22C55E;
        }

        .upwork-green:hover {
            background-color: #16A34A;
        }

        .sidebar {
            transition: transform 0.3s ease;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar-open {
                transform: translateX(0);
            }
        }

        .profile-header {
            background: linear-gradient(to right, #22C55E, #16A34A);
        }

        .table-row:hover {
            background-color: #F9FAFB;
            transition: background-color 0.2s ease;
        }

        .card {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-available {
            background-color: #DCFCE7;
            color: #15803D;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">
    <div class="flex">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar fixed inset-y-0 left-0 w-64 bg-white shadow-xl p-6 md:static md:w-1/5">
            <div class="flex items-center mb-8">
                <img src="https://www.upwork.com/static/assets/UpworkLogo/1.0.0/logo.svg" alt="Upwork Logo"
                    class="h-8">
            </div>
            <nav class="space-y-3">
                <a href="?tab=profile"
                    class="tab-button flex items-center w-full py-2.5 px-4 text-left {{ request('tab', 'profile') == 'profile' ? 'tab-active' : 'tab-inactive' }} rounded-lg"><i
                        class="fas fa-user mr-3"></i> Profile</a>
                <a href="?tab=create-proposal"
                    class="tab-button flex items-center w-full py-2.5 px-4 text-left {{ request('tab') == 'create-proposal' ? 'tab-active' : 'tab-inactive' }} rounded-lg"><i
                        class="fas fa-file-alt mr-3"></i> Create Proposal</a>
                <a href="?tab=job-proposals"
                    class="tab-button flex items-center w-full py-2.5 px-4 text-left {{ request('tab') == 'job-proposals' ? 'tab-active' : 'tab-inactive' }} rounded-lg"><i
                        class="fas fa-briefcase mr-3"></i> My Proposals</a>
                <a href="?tab=job-proposal-details"
                    class="tab-button flex items-center w-full py-2.5 px-4 text-left {{ request('tab') == 'job-proposal-details' ? 'tab-active' : 'tab-inactive' }} rounded-lg"><i
                        class="fas fa-info-circle mr-3"></i> Proposal Details</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 md:ml-6">
            <button id="toggle-sidebar" class="md:hidden mb-6 p-2 bg-gray-100 rounded-lg hover:bg-gray-200"><i
                    class="fas fa-bars text-gray-600"></i></button>
            <div class="max-w-5xl mx-auto">
                <!-- Profile Header -->
                @if (request('tab', 'profile') == 'profile' && !empty($profile))
                    <div class="profile-header rounded-xl p-8 mb-8 text-white">
                        <div class="flex items-center space-x-6">
                            <div class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-3xl text-gray-600"></i>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold">{{ $profile['fullName'] ?: $profile['username'] }}</h1>
                                <div class="flex items-center space-x-3 mt-2">
                                    <p class="text-sm font-medium">{{ $profile['experienceLevel'] }}</p>
                                    <span class="text-sm">•</span>
                                    <p class="text-sm font-medium">${{ $profile['hourlyRate'] }}/hr</p>
                                    <span class="text-sm">•</span>
                                    <span class="status-badge status-available"><i
                                            class="fas fa-circle mr-1 text-xs"></i>
                                        {{ $profile['availabilityStatus'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="bg-white rounded-xl shadow-lg p-8 card">
                    <!-- Success/Error Messages -->
                    @if (session('success'))
                        <div class="mb-6 fade-in">
                            <div class="p-4 bg-green-50 text-green-800 rounded-lg flex items-center">
                                <i class="fas fa-check-circle w-5 h-5 mr-2"></i>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="mb-6 fade-in">
                            <div class="p-4 bg-red-50 text-red-800 rounded-lg flex items-center">
                                <i class="fas fa-exclamation-circle w-5 h-5 mr-2"></i>
                                <ul class="list-disc pl-5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <!-- Profile Tab -->
                    @if (request('tab', 'profile') == 'profile')
                        <h2 class="text-2xl font-bold mb-6 text-gray-900"><i class="fas fa-user mr-2"></i> Profile
                            Details</h2>
                        @if (!empty($profile))
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-gray-50 p-5 rounded-lg shadow-sm">
                                    <p class="mb-3"><strong><i class="fas fa-id-badge mr-2"></i> ID:</strong>
                                        {{ $profile['id'] }}</p>
                                    <p class="mb-3"><strong><i class="fas fa-user mr-2"></i> User ID:</strong>
                                        {{ $profile['userId'] }}</p>
                                    <p class="mb-3"><strong><i class="fas fa-at mr-2"></i> Username:</strong>
                                        {{ $profile['username'] }}</p>
                                    <p class="mb-3"><strong><i class="fas fa-signature mr-2"></i> Full Name:</strong>
                                        {{ $profile['fullName'] ?: 'Not provided' }}</p>
                                    <p class="mb-3"><strong><i class="fas fa-info-circle mr-2"></i> Bio:</strong>
                                        {{ $profile['bio'] ?: 'Not provided' }}</p>
                                </div>
                                <div class="bg-gray-50 p-5 rounded-lg shadow-sm">
                                    <p class="mb-3"><strong><i class="fas fa-envelope mr-2"></i> Email:</strong>
                                        {{ $profile['email'] ?: 'Not provided' }}</p>
                                    <p class="mb-3"><strong><i class="fas fa-phone mr-2"></i> Phone:</strong>
                                        {{ $profile['phoneNumber'] ?: 'Not provided' }}</p>
                                    <p class="mb-3"><strong><i class="fas fa-dollar-sign mr-2"></i> Hourly
                                            Rate:</strong> ${{ $profile['hourlyRate'] }}</p>
                                    <p class="mb-3"><strong><i class="fas fa-star mr-2"></i> Experience
                                            Level:</strong> {{ $profile['experienceLevel'] }}</p>
                                    <p class="mb-3"><strong><i class="fas fa-calendar-check mr-2"></i>
                                            Availability:</strong> {{ $profile['availabilityStatus'] }}</p>
                                </div>
                                <div class="col-span-2 bg-gray-50 p-5 rounded-lg shadow-sm">
                                    <p class="mb-3"><strong><i class="fas fa-toggle-on mr-2"></i> Active:</strong>
                                        {{ $profile['isActive'] ? 'Yes' : 'No' }}</p>
                                    <p class="mb-3"><strong><i class="fas fa-clock mr-2"></i> Created At:</strong>
                                        {{ $profile['createdAt'] }}</p>
                                    <p class="mb-3"><strong><i class="fas fa-clock mr-2"></i> Updated At:</strong>
                                        {{ $profile['updatedAt'] }}</p>
                                </div>
                            </div>
                        @else
                            <p class="text-center text-gray-600"><i class="fas fa-exclamation-circle mr-2"></i> No
                                profile data available. Please log in and fetch your profile.</p>
                        @endif
                    @endif

                    <!-- Create Proposal Tab -->
                    @if (request('tab') == 'create-proposal')
                        <h2 class="text-2xl font-bold mb-6 text-gray-900"><i class="fas fa-file-alt mr-2"></i> Create
                            Job Proposal</h2>
                        <form action="{{ route('freelancer.create-job-proposal') }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label for="jobOfferId" class="block text-sm font-medium text-gray-900"><i
                                        class="fas fa-briefcase mr-2"></i> Job Offer ID</label>
                                <input type="number" name="jobOfferId" id="jobOfferId"
                                    class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                    required>
                            </div>
                            <div>
                                <label for="jobProposalPayType" class="block text-sm font-medium text-gray-900"><i
                                        class="fas fa-money-check-alt mr-2"></i> Pay Type</label>
                                <select name="jobProposalPayType" id="jobProposalPayType"
                                    class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                    required>
                                    <option value="0">Fixed</option>
                                    <option value="1">Hourly</option>
                                </select>
                            </div>
                            <div>
                                <label for="amount" class="block text-sm font-medium text-gray-900"><i
                                        class="fas fa-dollar-sign mr-2"></i> Amount</label>
                                <input type="number" name="amount" id="amount" step="0.01"
                                    class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                    required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-900"><i
                                        class="fas fa-list mr-2"></i> Milestones</label>
                                <div id="milestones" class="space-y-4">
                                    <div class="flex space-x-3">
                                        <input type="text" name="milestones[0][title]" placeholder="Title"
                                            class="mt-1 block w-1/3 px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                        <input type="text" name="milestones[0][description]"
                                            placeholder="Description"
                                            class="mt-1 block w-1/3 px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                        <input type="number" name="milestones[0][amount]" placeholder="Amount"
                                            step="0.01"
                                            class="mt-1 block w-1/3 px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-900"><i
                                        class="fas fa-folder-open mr-2"></i> Portfolios</label>
                                <div id="portfolios" class="space-y-4">
                                    <div>
                                        <input type="hidden" name="portfolios[0][id]" value="0">
                                        <input type="hidden" name="portfolios[0][jobProposalId]" value="0">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="jobOfferDuration" class="block text-sm font-medium text-gray-900"><i
                                        class="fas fa-calendar mr-2"></i> Duration (days)</label>
                                <input type="number" name="jobOfferDuration" id="jobOfferDuration"
                                    class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                    required>
                            </div>
                            <div>
                                <label for="coverLetter" class="block text-sm font-medium text-gray-900"><i
                                        class="fas fa-file-alt mr-2"></i> Cover Letter</label>
                                <textarea name="coverLetter" id="coverLetter"
                                    class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                    rows="5" required></textarea>
                            </div>
                            <div class="flex space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="isSponsored" value="1"
                                        class="form-checkbox text-green-500 h-5 w-5">
                                    <span class="ml-2 text-sm text-gray-900">Sponsored</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="isHighlighted" value="1"
                                        class="form-checkbox text-green-500 h-5 w-5">
                                    <span class="ml-2 text-sm text-gray-900">Highlighted</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="isFeatured" value="1"
                                        class="form-checkbox text-green-500 h-5 w-5">
                                    <span class="ml-2 text-sm text-gray-900">Featured</span>
                                </label>
                            </div>
                            <button type="submit"
                                class="w-full upwork-green text-white py-3 px-4 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"><i
                                    class="fas fa-paper-plane mr-2"></i> Submit Proposal</button>
                        </form>
                    @endif

                    <!-- My Proposals Tab -->
                    @if (request('tab') == 'job-proposals')
                        <h2 class="text-2xl font-bold mb-6 text-gray-900"><i class="fas fa-briefcase mr-2"></i> My Job
                            Proposals</h2>
                        @if (!empty($jobProposals) && count($jobProposals) > 0)
                            <div class="overflow-x-auto">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr class="bg-gray-100">
                                            <th class="p-4 border-b border-gray-200"><i
                                                    class="fas fa-id-badge mr-2"></i> ID</th>
                                            <th class="p-4 border-b border-gray-200"><i
                                                    class="fas fa-briefcase mr-2"></i> Job Offer ID</th>
                                            <th class="p-4 border-b border-gray-200"><i
                                                    class="fas fa-dollar-sign mr-2"></i> Amount</th>
                                            <th class="p-4 border-b border-gray-200"><i
                                                    class="fas fa-info-circle mr-2"></i> Status</th>
                                            <th class="p-4 border-b border-gray-200"><i class="fas fa-cog mr-2"></i>
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobProposals as $proposal)
                                            <tr class="table-row border-b border-gray-200">
                                                <td class="p-4">{{ $proposal['id'] }}</td>
                                                <td class="p-4">{{ $proposal['jobOfferId'] }}</td>
                                                <td class="p-4">${{ $proposal['amount'] }}</td>
                                                <td class="p-4">
                                                    <span
                                                        class="status-badge {{ $proposal['status'] == 'Accepted' ? 'status-available' : 'bg-gray-100 text-gray-600' }}">{{ $proposal['status'] ?? 'Pending' }}</span>
                                                </td>
                                                <td class="p-4">
                                                    <form
                                                        action="{{ route('freelancer.withdraw-job-proposal', $proposal['id']) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to withdraw this proposal?');">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit"
                                                            class="bg-red-500 text-white px-3 py-1.5 rounded-lg hover:bg-red-600"><i
                                                                class="fas fa-trash-alt mr-2"></i> Withdraw</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-center text-gray-600"><i class="fas fa-exclamation-circle mr-2"></i> No job
                                proposals found.</p>
                        @endif
                    @endif

                    <!-- Proposal Details Tab -->
                    @if (request('tab') == 'job-proposal-details')
                        <h2 class="text-2xl font-bold mb-6 text-gray-900"><i class="fas fa-info-circle mr-2"></i> Job
                            Proposal Details</h2>
                        @if (!empty($jobProposal))
                            <div class="bg-gray-50 p-5 rounded-lg shadow-sm space-y-3">
                                <p class="text-sm"><strong><i class="fas fa-id-badge mr-2"></i> ID:</strong>
                                    {{ $jobProposal['id'] }}</p>
                                <p class="text-sm"><strong><i class="fas fa-briefcase mr-2"></i> Job Offer
                                        ID:</strong> {{ $jobProposal['jobOfferId'] }}</p>
                                <p class="text-sm"><strong><i class="fas fa-dollar-sign mr-2"></i> Amount:</strong>
                                    ${{ $jobProposal['amount'] }}</p>
                                <p class="text-sm"><strong><i class="fas fa-money-check-alt mr-2"></i> Pay
                                        Type:</strong>
                                    {{ $jobProposal['jobProposalPayType'] == 0 ? 'Fixed' : 'Hourly' }}</p>
                                <p class="text-sm"><strong><i class="fas fa-calendar mr-2"></i> Duration:</strong>
                                    {{ $jobProposal['jobOfferDuration'] }} days</p>
                                <p class="text-sm"><strong><i class="fas fa-file-alt mr-2"></i> Cover Letter:</strong>
                                    {{ $jobProposal['coverLetter'] }}</p>
                                <p class="text-sm"><strong><i class="fas fa-star mr-2"></i> Sponsored:</strong>
                                    {{ $jobProposal['isSponsored'] ? 'Yes' : 'No' }}</p>
                                <p class="text-sm"><strong><i class="fas fa-highlighter mr-2"></i>
                                        Highlighted:</strong> {{ $jobProposal['isHighlighted'] ? 'Yes' : 'No' }}</p>
                                <p class="text-sm"><strong><i class="fas fa-award mr-2"></i> Featured:</strong>
                                    {{ $jobProposal['isFeatured'] ? 'Yes' : 'No' }}</p>
                                <h3 class="text-lg font-medium mt-5"><i class="fas fa-list mr-2"></i> Milestones</h3>
                                @if (!empty($jobProposal['milestones']))
                                    <ul class="list-disc pl-5 text-sm">
                                        @foreach ($jobProposal['milestones'] as $milestone)
                                            <li>{{ $milestone['title'] }} - ${{ $milestone['amount'] }}
                                                ({{ $milestone['description'] }})
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-sm">No milestones defined.</p>
                                @endif
                            </div>
                        @else
                            <p class="text-center text-gray-600"><i class="fas fa-exclamation-circle mr-2"></i> No
                                proposal details available. Please select a proposal to view.</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        // Minimal JS for sidebar toggle (UX only, no tab switching)
        const toggleSidebar = document.getElementById('toggle-sidebar');
        const sidebar = document.getElementById('sidebar');
        if (toggleSidebar && sidebar) {
            toggleSidebar.addEventListener('click', () => {
                sidebar.classList.toggle('sidebar-open');
            });
        }
    </script>
</body>

</html>
