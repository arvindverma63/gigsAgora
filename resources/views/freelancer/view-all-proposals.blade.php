<!DOCTYPE html>
<html lang="en">
@include('freelancer.partials.head')

<body>
@include('freelancer.partials.navbar')

<div class="main container py-5" style="padding-top: 60px;">
    <h3 class="fw-bold mb-4 proposal-title">💼 My Job Proposals</h3>

    <div class="row g-4">
        @foreach ($proposals as $proposal)
            <div class="col-12">
                <div class="card proposal-card shadow-sm border-0 rounded-4">
                    <div class="card-body d-flex flex-column">

                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0">Proposal #{{ $proposal['id'] ?? 'N/A' }}</h5>
                            <span class="badge bg-primary">💲 {{ $proposal['amount'] ?: 'N/A' }}</span>
                        </div>

                        <!-- Cover Letter -->
                        <p class="text-muted mt-2 mb-2">
                            {{ Str::limit($proposal['coverLetter'] ?: 'No cover letter provided.', 120) }}
                        </p>

                        <!-- Duration + Status -->
                        <div class="small mb-2">
                            ⏳ Duration: <strong>{{ $proposal['jobOfferDuration'] ?: 'N/A' }} days</strong><br>
                            Status: <strong>{{ $proposal['status'] ?? 'N/A' }}</strong>
                        </div>

                        <!-- Milestones -->
                        @if(!empty($proposal['milestones']))
                            <div class="small mb-2">
                                📌 <strong>Milestones:</strong>
                                <ul class="ps-3 mb-0">
                                    @foreach ($proposal['milestones'] as $ms)
                                        <li>{{ $ms['title'] ?: 'Untitled' }} - 💲{{ $ms['amount'] ?: '0' }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Flags -->
                        <div class="mb-2">
                            @if($proposal['isFeatured'])<span class="badge bg-warning text-dark">⭐ Featured</span>@endif
                            @if($proposal['isSponsored'])<span class="badge bg-success">🚀 Sponsored</span>@endif
                            @if($proposal['isHighlighted'])<span class="badge bg-info text-dark">✨ Highlighted</span>@endif
                            @if($proposal['isSealed'])<span class="badge bg-dark">🔒 Sealed</span>@endif
                        </div>

                        <!-- Footer Buttons -->
                        <div class="d-flex justify-content-end border-top pt-3 mt-auto">
                            <!-- Freelancer Modal Trigger -->
                            <button class="btn btn-outline-secondary btn-sm me-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#freelancerModal{{ $proposal['id'] }}">
                                View Freelancer
                            </button>
                            <a href="#" class="btn btn-success btn-sm me-2">Accept</a>
                            <a href="#" class="btn btn-danger btn-sm">Reject</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Freelancer Modal -->
            <div class="modal fade" id="freelancerModal{{ $proposal['id'] }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content rounded-4 shadow">
                        <div class="modal-header">
                            <h5 class="modal-title">👤 Freelancer Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <!-- Left -->
                                <div class="col-md-6">
                                    <p><strong>Username:</strong> {{ $proposal['freelancer']['username'] ?: 'N/A' }}</p>
                                    <p><strong>Full Name:</strong> {{ $proposal['freelancer']['fullName'] ?: 'N/A' }}</p>
                                    <p><strong>Email:</strong> {{ $proposal['freelancer']['email'] ?: 'N/A' }}</p>
                                    <p><strong>Phone:</strong> {{ $proposal['freelancer']['phoneNumber'] ?: 'N/A' }}</p>
                                    <p><strong>Website:</strong> {{ $proposal['freelancer']['websiteUrl'] ?: 'N/A' }}</p>
                                </div>
                                <!-- Right -->
                                <div class="col-md-6">
                                    <p><strong>City:</strong> {{ $proposal['freelancer']['city'] ?: 'N/A' }}</p>
                                    <p><strong>Country:</strong> {{ $proposal['freelancer']['country'] ?: 'N/A' }}</p>
                                    <p><strong>Postal Code:</strong> {{ $proposal['freelancer']['postalCode'] ?: 'N/A' }}</p>
                                    <p><strong>Languages:</strong> {{ $proposal['freelancer']['languages'] ?: 'N/A' }}</p>
                                    <p><strong>Hourly Rate:</strong> 💲{{ $proposal['freelancer']['hourlyRate'] ?: 'N/A' }}</p>
                                </div>
                            </div>
                            <hr>
                            <p><strong>Bio:</strong> {{ $proposal['freelancer']['bio'] ?: 'No bio available.' }}</p>
                            <p><strong>Experience Level:</strong> {{ $proposal['freelancer']['experienceLevel'] ?: 'N/A' }}</p>
                            <p><strong>Availability:</strong> {{ $proposal['freelancer']['availabilityStatus'] ?: 'N/A' }}</p>
                            <p><strong>Active:</strong> {{ $proposal['freelancer']['isActive'] ? 'Yes' : 'No' }}</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>

<style>
    .proposal-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .proposal-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
    }
</style>

@include('freelancer.partials.js')
</body>
</html>
