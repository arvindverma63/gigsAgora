<!DOCTYPE html>
<html lang="en">
@include('job-provider.partials.head')

<link rel="stylesheet" href="{{ asset('dashboard-css/job-post.css') }}">
<link rel="stylesheet" href="{{ asset('step-form/form.css') }}">

<body class="bg-light">
    @include('job-provider.partials.navbar')

    <div class="main" style="padding-top: 60px;">
        <div class="container mt-3">
            <!-- Toast Container -->
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 1100">
                @if (session('success'))
                    <div class="toast align-items-center text-bg-success border-0 show" role="alert"
                        aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="toast align-items-center text-bg-danger border-0 show" role="alert"
                        aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="toast align-items-center text-bg-danger border-0 show" role="alert"
                        aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="fas fa-exclamation-circle me-2"></i>Please fix the following errors:
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endif
            </div>

            <div class="container mt-5">
                <div class="text-center mb-4">
                    <h2 style="color: #00913a; font-weight: bold;">Create Job Posting</h2>
                    <p class="text-muted">Share your opportunity with talented professionals</p>
                </div>

                <div class="step-container" id="stepNav">
                    <!-- Step navigation remains unchanged -->
                    <div class="step">
                        <div class="step-circle active" data-step="1">1</div>
                        <div class="step-title">Job Title</div>
                        <div class="step-subtitle">Basic job information</div>
                    </div>
                    <div class="step">
                        <div class="step-circle" data-step="2">2</div>
                        <div class="step-title">Skills</div>
                        <div class="step-subtitle">Required skills and experience</div>
                    </div>
                    <div class="step">
                        <div class="step-circle" data-step="3">3</div>
                        <div class="step-title">Job Type & Budget</div>
                        <div class="step-subtitle">Employment details</div>
                    </div>
                    <div class="step">
                        <div class="step-circle" data-step="4">4</div>
                        <div class="step-title">Location & Language</div>
                        <div class="step-subtitle">Geographic preferences</div>
                    </div>
                    <div class="step">
                        <div class="step-circle" data-step="5">5</div>
                        <div class="step-title">Post Options</div>
                        <div class="step-subtitle">Visibility and features</div>
                    </div>
                </div>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="20"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <form action="{{ route('job-provider.create-job-offer') }}" method="POST">
                    @csrf

                    <div class="card" id="formContainer">
                        <!-- Step 1: Job Title -->
                        <div class="form-section active" id="step1">
                            <h5 class="card-title">Basic job information</h5>
                            <div class="mb-3">
                                <label for="jobTitle" class="form-label">Job Title *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="jobTitle" name="title" value="{{ old('title', 'Senior Laravel') }}" required>
                                <small class="text-muted">Be specific and use keywords that candidates would search
                                    for</small>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jobDescription" class="form-label">Job Description *</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="jobDescription" rows="5"
                                    name="description" required>{{ old('description') }}</textarea>
                                <small class="text-muted">Include key responsibilities, requirements, and what makes
                                    this opportunity exciting</small>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Step 2: Skills -->
                        <div class="form-section p-4 mb-4" id="step2">
                            <h5 class="mb-3">Required skills and experience</h5>
                            <div class="mb-3">
                                <label for="skills" class="form-label">Required Skills *</label>
                                <input type="text" class="form-control @error('skills') is-invalid @enderror"
                                    id="skills" name="skills" value="{{ old('skills') }}"
                                    placeholder="Add a skill (e.g. React, TypeScript, Node.js)" required>
                                <div id="skillsContainer" class="mt-3"></div>
                                @error('skills')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="experience" class="form-label">Experience Level *</label>
                                    <select id="experience"
                                        class="form-select @error('experienceLevel') is-invalid @enderror"
                                        name="experienceLevel">
                                        <option value="0" {{ old('experienceLevel', 0) == 0 ? 'selected' : '' }}>
                                            Beginner (1-2 years)</option>
                                        <option value="1" {{ old('experienceLevel', 0) == 1 ? 'selected' : '' }}>
                                            Intermediate (3-5 years)</option>
                                        <option value="2" {{ old('experienceLevel', 0) == 2 ? 'selected' : '' }}>
                                            Expert (5+ years)</option>
                                    </select>
                                    @error('experienceLevel')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="talentType" class="form-label">Talent Type</label>
                                    <select id="talentType"
                                        class="form-select @error('requiredTalentType') is-invalid @enderror"
                                        name="requiredTalentType">
                                        <option value="0"
                                            {{ old('requiredTalentType', 1) == 0 ? 'selected' : '' }}>Individual
                                        </option>
                                        <option value="1"
                                            {{ old('requiredTalentType', 1) == 1 ? 'selected' : '' }}>Agency</option>
                                    </select>
                                    @error('requiredTalentType')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="successScore" class="form-label">Minimum Success Score</label>
                                    <select id="successScore"
                                        class="form-select @error('minimumSuccessScore') is-invalid @enderror"
                                        name="minimumSuccessScore">
                                        <option value="50"
                                            {{ old('minimumSuccessScore', 50) == 50 ? 'selected' : '' }}>Minimum 50%
                                        </option>
                                        <option value="60"
                                            {{ old('minimumSuccessScore', 50) == 60 ? 'selected' : '' }}>Minimum 60%
                                        </option>
                                        <option value="70"
                                            {{ old('minimumSuccessScore', 50) == 70 ? 'selected' : '' }}>Minimum 70%
                                        </option>
                                        <option value="80"
                                            {{ old('minimumSuccessScore', 50) == 80 ? 'selected' : '' }}>Minimum 80%
                                        </option>
                                    </select>
                                    @error('minimumSuccessScore')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="earningScore" class="form-label">Minimum Earning Score</label>
                                    <select id="earningScore"
                                        class="form-select @error('minimumEarningScore') is-invalid @enderror"
                                        name="minimumEarningScore">
                                        <option value="10000"
                                            {{ old('minimumEarningScore', 80000) == 10000 ? 'selected' : '' }}>Minimum
                                            $10K</option>
                                        <option value="20000"
                                            {{ old('minimumEarningScore', 80000) == 20000 ? 'selected' : '' }}>Minimum
                                            $20K</option>
                                        <option value="50000"
                                            {{ old('minimumEarningScore', 80000) == 50000 ? 'selected' : '' }}>Minimum
                                            $50K</option>
                                        <option value="80000"
                                            {{ old('minimumEarningScore', 80000) == 80000 ? 'selected' : '' }}>Minimum
                                            $80K</option>
                                    </select>
                                    @error('minimumEarningScore')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Job Type & Budget -->
                        <div class="form-section p-4 mb-4" id="step3">
                            <h5 class="card-title mb-3">Employment details</h5>
                            <div class="mb-3">
                                <label class="form-label d-block">Job Type *</label>
                                <div class="d-flex gap-3">
                                    <label id="fixed-price"
                                        class="job-card flex-fill border rounded p-3 d-flex align-items-center">
                                        <input type="radio" name="jobType" value="Fixed Price"
                                            class="form-check-input me-2"
                                            {{ old('jobType', 'Fixed Price') == 'Fixed Price' ? 'checked' : '' }}>
                                        <div>
                                            <div class="fw-bold"><i class="fa-solid fa-dollar-sign"></i> Fixed Price
                                            </div>
                                            <small class="text-muted">One-time payment for the entire project</small>
                                        </div>
                                    </label>
                                    <label id="hourly-rate"
                                        class="job-card flex-fill border rounded p-3 d-flex align-items-center">
                                        <input type="radio" name="jobType" value="Hourly Rate"
                                            class="form-check-input me-2"
                                            {{ old('jobType', 'Fixed Price') == 'Hourly Rate' ? 'checked' : '' }}>
                                        <div>
                                            <div class="fw-bold">⏱ Hourly Rate</div>
                                            <small class="text-muted">Pay per hour of work completed</small>
                                        </div>
                                    </label>
                                </div>
                                @error('jobType')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="budget" class="form-label">Budget *</label>
                                    <input type="number" class="form-control @error('amount') is-invalid @enderror"
                                        name="amount" id="budget" value="{{ old('amount', 0) }}"
                                        placeholder="Enter budget" required>
                                    <small class="text-muted" id="budgetHelp">Total project budget</small>
                                    @error('amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="duration" class="form-label">Project Duration *</label>
                                    <select id="duration"
                                        class="form-select @error('jobOfferDuration') is-invalid @enderror"
                                        name="jobOfferDuration">
                                        <option value="0"
                                            {{ old('jobOfferDuration', 1) == 0 ? 'selected' : '' }}>Within a Week
                                        </option>
                                        <option value="1"
                                            {{ old('jobOfferDuration', 1) == 1 ? 'selected' : '' }}>1-4 Weeks</option>
                                        <option value="3"
                                            {{ old('jobOfferDuration', 1) == 3 ? 'selected' : '' }}>1-3 Months</option>
                                        <option value="4"
                                            {{ old('jobOfferDuration', 1) == 4 ? 'selected' : '' }}>More than 3 Months
                                        </option>
                                    </select>
                                    @error('jobOfferDuration')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="border rounded p-3 bg-light mt-3">
                                <h6 class="fw-bold"><i class="fa-solid fa-dollar-sign"></i> Budget Summary</h6>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <strong>Budget</strong>
                                        <div id="summaryBudget">{{ old('amount', 0) }}</div>
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Payment Type</strong>
                                        <div id="summaryType">{{ old('jobType', 'Fixed Price') }}</div>
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Duration</strong>
                                        <div id="summaryDuration">
                                            {{ old('jobOfferDuration', 1) == 0 ? 'Within a Week' : (old('jobOfferDuration', 1) == 1 ? '1-4 Weeks' : (old('jobOfferDuration', 1) == 3 ? '1-3 Months' : 'More than 3 Months')) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 4: Location & Language -->
                        <div class="form-section p-4 mb-4" id="step4">
                            <h5 class="card-title mb-3">Geographic preferences</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="border rounded p-3 h-100">
                                        <h6 class="fw-bold mb-1"><i class="fa-solid fa-location-crosshairs"></i>
                                            Location Preferences</h6>
                                        <small class="text-muted d-block mb-3">Specify preferred countries or
                                            regions</small>
                                        <label for="location" class="form-label fw-semibold">Preferred
                                            Countries</label>
                                        <input type="text"
                                            class="form-control @error('countries') is-invalid @enderror"
                                            id="location" name="countries" value="{{ old('countries') }}"
                                            placeholder="e.g. United States, Canada, United Kingdom">
                                        <small class="text-muted">Leave empty for worldwide, or specify countries
                                            separated by commas</small>
                                        @error('countries')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="border rounded p-3 h-100">
                                        <h6 class="fw-bold mb-1"><i class="fa-solid fa-language"></i> Language
                                            Requirements</h6>
                                        <small class="text-muted d-block mb-3">Communication language
                                            preferences</small>
                                        <label for="languages" class="form-label fw-semibold">Required
                                            Languages</label>
                                        <input type="text"
                                            class="form-control @error('languages') is-invalid @enderror"
                                            id="languages" name="languages" value="{{ old('languages') }}"
                                            placeholder="e.g. English, Spanish, French">
                                        <small class="text-muted">Specify languages separated by commas</small>
                                        @error('languages')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 5: Post Options -->
                        <div class="form-section p-4 mb-4" id="step5">
                            <h5 class="card-title text-center fw-bold">Boost Your Job Posting</h5>
                            <p class="text-muted text-center mb-4">Optional features to increase visibility and attract
                                top talent</p>
                            <div class="border rounded p-3 mb-3 d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-1"><i class="fa-solid fa-crown"></i> Sponsored Posting</h6>
                                    <small class="text-muted d-block mb-2">Increase visibility with premium placement
                                        in search results</small>
                                    <span class="badge bg-light text-dark me-1">Top search results</span>
                                    <span class="badge bg-light text-dark me-1">Homepage featured</span>
                                    <span class="badge bg-light text-dark">5x more views</span>
                                </div>
                                <div class="text-end">
                                    <span class="fw-bold d-block mb-2">$49</span>
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="sponsored_posting" value="false">
                                        <input class="form-check-input boost-option" type="checkbox"
                                            name="sponsored_posting" value="true" id="sponsoredPosting"
                                            {{ old('sponsored_posting', false) ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div class="border rounded p-3 mb-3 d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-1"><i class="fa-solid fa-bolt"></i> Highlighted Posting</h6>
                                    <small class="text-muted d-block mb-2">Make your job stand out with a highlighted
                                        background</small>
                                    <span class="badge bg-light text-dark me-1">Colored background</span>
                                    <span class="badge bg-light text-dark me-1">Eye-catching design</span>
                                    <span class="badge bg-light text-dark">2x more clicks</span>
                                </div>
                                <div class="text-end">
                                    <span class="fw-bold d-block mb-2">$29</span>
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="highlighted_posting" value="false">
                                        <input class="form-check-input boost-option" type="checkbox"
                                            name="highlighted_posting" value="true" id="highlightedPosting"
                                            {{ old('highlighted_posting', false) ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div class="border rounded p-3 mb-3 d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-1"><i class="fa-solid fa-star"></i> Featured Posting</h6>
                                    <small class="text-muted d-block mb-2">Get featured in our weekly newsletter and
                                        social media</small>
                                    <span class="badge bg-light text-dark me-1">Newsletter inclusion</span>
                                    <span class="badge bg-light text-dark me-1">Social media boost</span>
                                    <span class="badge bg-light text-dark">Extended reach</span>
                                </div>
                                <div class="text-end">
                                    <span class="fw-bold d-block mb-2">$19</span>
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="featured_posting" value="false">
                                        <input class="form-check-input boost-option" type="checkbox"
                                            name="featured_posting" value="true" id="featuredPosting"
                                            {{ old('featured_posting', false) ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div class="border rounded p-3 bg-light mt-4">
                                <h6 class="fw-bold mb-3"><i class="fa-solid fa-dollar-sign"></i> Promotion Summary
                                </h6>
                                <div id="summaryList"></div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold">Total:</span>
                                    <span id="summaryTotal" class="fw-bold text-primary">$0</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button class="btn btn-outline-secondary" id="backBtn">Back</button>
                        <button class="btn btn-primary" id="nextBtn">Next</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/job-post.js') }}?v={{ time() }}"></script>
    @include('job-provider.partials.js')
</body>

</html>
