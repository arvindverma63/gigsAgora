<!DOCTYPE html>
<html lang="en">
@include('freelancer.partials.head')
<link rel="stylesheet" href="{{ asset('step-form/proposal-form.css') }}?v={{ time() }}">

<body>
    @include('freelancer.partials.navbar')

    <div class="container my-4" style="padding-top:90px; max-width: 1100px;">
        <style>
            body {
                background: #f7f9fb;
            }

            .profile-header {
                background: #fff;
                border-radius: .5rem;
                padding: 2rem 2.5rem;
                border: 1px solid #e9ecef;
                margin-bottom: 2rem;
                position: relative;
            }

            .profile-avatar {
                width: 80px;
                height: 80px;
                border-radius: 50%;
                object-fit: cover;
                border: 2px solid #e9ecef;
            }

            .profile-badges .badge {
                font-weight: 500;
                margin-right: .5rem;
            }

            .profile-contact a,
            .profile-contact {
                color: #4c5773;
            }

            .profile-section {
                border: 1px solid #e0e5ec;
                background: #fff;
                border-radius: .5rem;
                padding: 1.25rem 1.5rem;
                margin-bottom: 1.2rem;
            }

            .card-achievement {
                border: 1px solid #e0e5ec;
                background: #f7fafd;
                padding: 1rem;
                border-radius: 0.5rem;
                margin-bottom: 1rem;
            }

            .nav-tabs .nav-link {
                color: #3d4c67;
            }

            .nav-tabs .nav-link.active {
                color: #2456bd;
                background: #eaf2ff;
                border-color: #eaf2ff #eaf2ff #fff;
            }

            @media (max-width: 991px) {
                .profile-header {
                    flex-direction: column;
                    align-items: flex-start !important;
                    text-align: left;
                    padding: 1.5rem;
                }

                .profile-header>* {
                    margin-bottom: 1rem;
                }
            }

            @media (max-width: 599px) {
                .profile-header {
                    padding: 1rem;
                }

                .profile-section {
                    padding: 1rem;
                }
            }
        </style>
        @include('freelancer.components.profile-header')


        <div class="tab-content" id="profileTabContent">
            <!-- Overview Tab -->
            <div class="tab-pane fade show active" id="overview" role="tabpanel">

                <div class="row g-4">
                    <div class="col-md-6">
                        <!-- Skills & Expertise -->
                        <div class="profile-section mb-3">
                            <div class="mb-2 fw-semibold"><i class="bi bi-stars me-2 text-primary"></i>Skills &
                                Expertise</div>
                            <span class="badge bg-primary text-white me-1 mb-1">UI/UX Design</span>
                            <span class="badge bg-primary text-white me-1 mb-1">Figma</span>
                            <span class="badge bg-primary text-white me-1 mb-1">Adobe Creative Suite</span>
                            <span class="badge bg-success text-white me-1 mb-1">Prototyping</span>
                            <span class="badge bg-success text-white me-1 mb-1">Intermediate</span>
                        </div>
                        <!-- Contact Information -->
                        <div class="profile-section mb-3">
                            <div class="mb-2 fw-semibold"><i class="bi bi-envelope-at me-2 text-secondary"></i>Contact
                                Information</div>
                            <div class="mb-1 text-break"><i class="bi bi-geo-alt me-2"></i>123 Creative Street, New
                                York, United States 10001</div>
                            <div class="mb-1"><i class="bi bi-telephone me-2"></i>+1 (555) 123-4567</div>
                            <div class="mb-1"><i class="bi bi-envelope me-2"></i><a
                                    href="mailto:sarahjohnson@email.com"
                                    class="text-decoration-none">sarahjohnson@email.com</a></div>
                            <div class="mb-1"><i class="bi bi-globe me-2"></i><a href="https://sarahdesigns.com"
                                    class="text-decoration-none">https://sarahdesigns.com</a></div>
                            <div class="mb-0 text-muted">Languages: English, Spanish, French</div>
                        </div>
                        <!-- Badges & Achievements -->
                        <div class="profile-section mb-3">
                            <div class="mb-2 fw-semibold"><i class="bi bi-award me-2 text-warning"></i>Badges &
                                Achievements</div>
                            <div class="card-achievement">
                                <div class="fw-semibold text-primary"><i class="bi bi-award-fill me-1"></i>Top Rated
                                    Freelancer</div>
                                <div class="small text-muted">Achieved top rating based on client satisfaction and
                                    project completion.</div>
                                <div class="small text-muted"><i class="bi bi-calendar-event me-1"></i>Awarded on June
                                    1, 2023</div>
                            </div>
                            <div class="card-achievement mb-0">
                                <div class="fw-semibold text-primary"><i class="bi bi-award-fill me-1"></i>Design
                                    Excellence</div>
                                <div class="small text-muted">Recognized for outstanding design quality and innovation.
                                </div>
                                <div class="small text-muted"><i class="bi bi-calendar-event me-1"></i>Awarded on
                                    September 15, 2023</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Social Media -->
                        <div class="profile-section mb-3">
                            <div class="mb-2 fw-semibold"><i class="bi bi-share me-2 text-info"></i>Social Media</div>
                            <div class="mb-2"><i class="bi bi-linkedin text-primary me-2"></i>LinkedIn &mdash; <span
                                    class="text-muted">@sarahjohnson_design</span><br><span
                                    class="small text-muted">2,500 followers</span></div>
                            <div class="mb-2"><i class="bi bi-dribbble text-danger me-2"></i>Dribbble &mdash; <span
                                    class="text-muted">@sarah_designs</span><br><span class="small text-muted">1,200
                                    followers</span></div>
                        </div>
                        <!-- Education -->
                        <div class="profile-section mb-3">
                            <div class="mb-2 fw-semibold"><i class="bi bi-mortarboard me-2 text-success"></i>Education
                            </div>
                            <div class="fw-semibold">Bachelor of Fine Arts</div>
                            <div class="text-muted">New York University</div>
                            <div class="mb-2">Graphic Design</div>
                            <div class="small text-muted"><i class="bi bi-calendar-event me-1"></i>September 2016 -
                                May 2020</div>
                            <div class="small text-muted">Focused on digital design, typography, and user experience
                                principles.</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other Tabs -->
            <div class="tab-pane fade" id="work" role="tabpanel"> @include('freelancer.components.profile-tab.work-expereince')</div>
            <div class="tab-pane fade" id="portfolio" role="tabpanel">@include('freelancer.components.profile-tab.portfolio')</div>
            <div class="tab-pane fade" id="services" role="tabpanel">@include('freelancer.components.profile-tab.services')</div>
        </div>
    </div>
    <script src="{{ asset('js/submit-proposal.js') }}?v={{ time() }}"></script>
</body>
@include('freelancer.partials.js')

</html>
