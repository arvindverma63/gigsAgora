<!DOCTYPE html>
<html lang="en">
@include('job-provider.partials.head')

<link rel="stylesheet" href="{{ asset('dashboard-css/job-post.css') }}">

<body class="bg-light">
    @include('job-provider.partials.navbar')

    <div class="container mt-3">
        <h2 class="h4 mb-3 text-center" style="color: #004b7d;"><i class="fas fa-briefcase me-2"></i>Create Job Post</h2>

        <!-- Session Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>Please fix the following errors:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Progress Bar -->
        <div class="progress mb-3">
            <div class="progress-bar bg-primary" style="width: 20%; background-color: #004b7d !important;"></div>
        </div>

        <form id="jobPostForm" action="{{ route('job-provider.create-job-offer') }}" method="POST" novalidate>
            @csrf
            <!-- Step 1: Basic Info -->
            <div class="wizard-step active" data-step="1">
                <div class="card p-3">
                    <h5 class="h6 mb-2 text-center" style="color: #004b7d; font-weight: 600;"><i
                            class="fas fa-info-circle me-2"></i>Basic Info</h5>
                    <div class="mb-2">
                        <label class="form-label">Title</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Description</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="3" name="description" required></textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Amount</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            <input type="number" class="form-control @error('amount') is-invalid @enderror"
                                name="amount" required min="0">
                            @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Offer Date</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            <input type="datetime-local" class="form-control @error('offerDate') is-invalid @enderror"
                                name="offerDate" required>
                            @error('offerDate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2: Requirements -->
            <div class="wizard-step" data-step="2">
                <div class="card p-3">
                    <h5 class="h6 mb-2 text-center" style="color: #004b7d; font-weight: 600;"><i
                            class="fas fa-list-ul me-2"></i>Requirements</h5>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Experience Level</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                <select class="form-select @error('experienceLevel') is-invalid @enderror"
                                    name="experienceLevel" required>
                                    <option value="0">Beginner</option>
                                    <option value="1">Intermediate</option>
                                    <option value="2">Expert</option>
                                </select>
                                @error('experienceLevel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Job Type</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                <select class="form-select @error('jobType') is-invalid @enderror" name="jobType"
                                    required>
                                    <option value="0">Fixed Price</option>
                                    <option value="1">Hourly</option>
                                </select>
                                @error('jobType')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Job Offer Duration (days)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                <input type="number"
                                    class="form-control @error('jobOfferDuration') is-invalid @enderror"
                                    name="jobOfferDuration" required min="1">
                                @error('jobOfferDuration')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Minimum Success Score</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-star"></i></span>
                                <input type="number"
                                    class="form-control @error('minimumSuccessScore') is-invalid @enderror"
                                    name="minimumSuccessScore" required min="0">
                                @error('minimumSuccessScore')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Minimum Earning Score</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                                <input type="number"
                                    class="form-control @error('minimumEarningScore') is-invalid @enderror"
                                    name="minimumEarningScore" required min="0">
                                @error('minimumEarningScore')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Talent Type</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                <input type="text"
                                    class="form-control @error('requiredTalentType') is-invalid @enderror"
                                    name="requiredTalentType">
                                @error('requiredTalentType')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Languages</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-language"></i></span>
                                <input type="text" class="form-control @error('languages') is-invalid @enderror"
                                    name="languages">
                                @error('languages')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Countries</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                <input type="text" class="form-control @error('countries') is-invalid @enderror"
                                    name="countries">
                                @error('countries')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Skills Required</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-tools"></i></span>
                            <input type="text" class="form-control" id="skillsInput"
                                placeholder="Type a skill and press Enter">
                            @error('skillsRequired.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div id="skillsList" class="mt-2"></div>
                        <!-- Hidden inputs to store skills array -->
                        <div id="skillsHiddenInputs"></div>
                    </div>
                </div>
            </div>

            <!-- Step 3: Milestones -->
            <div class="wizard-step" data-step="3">
                <div class="card p-3">
                    <h5 class="h6 mb-2 text-center" style="color: #004b7d; font-weight: 600;"><i
                            class="fas fa-tasks me-2"></i>Milestones</h5>
                    <div id="milestoneList">
                        <div class="border p-2 mb-2 milestone-item rounded">
                            <div class="mb-2">
                                <label class="form-label">Milestone Title</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                    <input type="text"
                                        class="form-control @error('milestone_title.*') is-invalid @enderror"
                                        name="milestone_title[]">
                                    @error('milestone_title.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Description</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                    <textarea class="form-control @error('milestone_description.*') is-invalid @enderror" rows="2"
                                        name="milestone_description[]"></textarea>
                                    @error('milestone_description.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label class="form-label">Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        <input type="number"
                                            class="form-control @error('milestone_amount.*') is-invalid @enderror"
                                            name="milestone_amount[]" min="0">
                                        @error('milestone_amount.*')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label">Due On</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        <input type="date"
                                            class="form-control @error('milestone_dueOn.*') is-invalid @enderror"
                                            name="milestone_dueOn[]">
                                        @error('milestone_dueOn.*')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-sm w-100" id="addMilestone"><i
                            class="fas fa-plus me-1"></i>Add Milestone</button>
                </div>
            </div>

            <!-- Step 4: Settings -->
            <div class="wizard-step" data-step="4">
                <div class="card p-3">
                    <h5 class="h6 mb-2 text-center" style="color: #004b7d; font-weight: 600;"><i
                            class="fas fa-cog me-2"></i>Settings</h5>
                    <div class="form-check mb-2">
                        <input class="form-check-input @error('isSponsored') is-invalid @enderror" type="checkbox"
                            name="isSponsored" id="isSponsored">
                        <label class="form-check-label" for="isSponsored"><i
                                class="fas fa-bullhorn me-1"></i>Sponsored</label>
                        @error('isSponsored')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input @error('isHighlighted') is-invalid @enderror" type="checkbox"
                            name="isHighlighted" id="isHighlighted">
                        <label class="form-check-label" for="isHighlighted"><i
                                class="fas fa-highlighter me-1"></i>Highlighted</label>
                        @error('isHighlighted')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input @error('isFeatured') is-invalid @enderror" type="checkbox"
                            name="isFeatured" id="isFeatured">
                        <label class="form-check-label" for="isFeatured"><i
                                class="fas fa-star me-1"></i>Featured</label>
                        @error('isFeatured')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Step 5: Review -->
            <div class="wizard-step" data-step="5">
                <div class="card p-3">
                    <h5 class="h6 mb-2 text-center" style="color: #004b7d; font-weight: 600;"><i
                            class="fas fa-eye me-2"></i>Review Details</h5>
                    <div class="review-section">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Basic Info</h6>
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="editStep(1)"><i
                                    class="fas fa-edit me-1"></i>Edit</button>
                        </div>
                        <div class="review-item"><strong>Title:</strong> <span id="review-title"></span></div>
                        <div class="review-item"><strong>Description:</strong> <span id="review-description"></span>
                        </div>
                        <div class="review-item"><strong>Amount:</strong> <span id="review-amount"></span></div>
                        <div class="review-item"><strong>Offer Date:</strong> <span id="review-offerDate"></span>
                        </div>
                    </div>
                    <div class="review-section">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Requirements</h6>
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="editStep(2)"><i
                                    class="fas fa-edit me-1"></i>Edit</button>
                        </div>
                        <div class="review-item"><strong>Experience Level:</strong> <span
                                id="review-experienceLevel"></span></div>
                        <div class="review-item"><strong>Job Type:</strong> <span id="review-jobType"></span></div>
                        <div class="review-item"><strong>Job Offer Duration:</strong> <span
                                id="review-jobOfferDuration"></span></div>
                        <div class="review-item"><strong>Minimum Success Score:</strong> <span
                                id="review-minimumSuccessScore"></span></div>
                        <div class="review-item"><strong>Minimum Earning Score:</strong> <span
                                id="review-minimumEarningScore"></span></div>
                        <div class="review-item"><strong>Talent Type:</strong> <span
                                id="review-requiredTalentType"></span></div>
                        <div class="review-item"><strong>Languages:</strong> <span id="review-languages"></span></div>
                        <div class="review-item"><strong>Countries:</strong> <span id="review-countries"></span></div>
                        <div class="review-item"><strong>Skills Required:</strong> <span
                                id="review-skillsRequired"></span></div>
                    </div>
                    <div class="review-section">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Milestones</h6>
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="editStep(3)"><i
                                    class="fas fa-edit me-1"></i>Edit</button>
                        </div>
                        <div id="review-milestones"></div>
                    </div>
                    <div class="review-section">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Settings</h6>
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="editStep(4)"><i
                                    class="fas fa-edit me-1"></i>Edit</button>
                        </div>
                        <div class="review-item"><strong>Sponsored:</strong> <span id="review-isSponsored"></span>
                        </div>
                        <div class="review-item"><strong>Highlighted:</strong> <span id="review-isHighlighted"></span>
                        </div>
                        <div class="review-item"><strong>Featured:</strong> <span id="review-isFeatured"></span></div>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="mt-3 d-flex justify-content-between">
                <button type="button" class="btn btn-secondary btn-sm" id="prevBtn"><i
                        class="fas fa-arrow-left me-1"></i>Previous</button>
                <button type="button" class="btn btn-primary btn-sm" id="nextBtn">Next<i
                        class="fas fa-arrow-right ms-1"></i></button>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/job-post.js') }}"></script>
    @include('job-provider.partials.js')
</body>

</html>
