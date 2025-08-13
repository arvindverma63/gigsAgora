<!DOCTYPE html>
<html lang="en">
@include('freelancer.partials.head')

<body>
    @include('freelancer.partials.navbar')

    <style>
        .card-custom {
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            transition: box-shadow 0.3s, transform 0.2s;
            background: #ffffff;
        }

        .card-custom:hover {
            box-shadow: 0 8px 16px rgba(0, 75, 125, 0.15);
            transform: translateY(-3px);
        }

        .badge-custom {
            background-color: #f8f9fa;
            color: #004b7d !important;
            border: 1px solid #004b7d !important;
            border-radius: 18px;
            padding: 6px 18px;
            font-size: 0.9rem;
            transition: background-color 0.3s;
        }

        .badge-custom:hover {
            background-color: #e9ecef;
        }

        .skill-badge {
            background-color: #e9ecef;
            color: #333;
            border: none;
            border-radius: 18px;
            padding: 7px 18px;
            margin-right: 10px;
            margin-bottom: 10px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .skill-badge:hover {
            background-color: #dee2e6;
            transform: scale(1.05);
        }

        .text-muted-custom {
            color: #6c757d !important;
        }

        .icon-custom {
            color: #004b7d !important;
            margin-right: 10px;
            transition: color 0.3s;
        }

        .icon-custom:hover {
            color: #003a61 !important;
        }

        .btn-custom {
            background-color: #004b7d !important;
            color: #fff !important;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-custom:hover {
            background-color: #003a61 !important;
            transform: scale(1.05);
        }

        .btn-custom:active {
            transform: scale(0.98);
        }

        .bid-section {
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 25px;
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .bid-option {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 12px;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .bid-option:hover {
            background-color: #e9ecef;
            box-shadow: 0 2px 4px rgba(0, 75, 125, 0.1);
        }

        .upgrade-btn {
            background-color: #f4a261 !important;
            color: #fff !important;
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .upgrade-btn:hover {
            background-color: #e76f51 !important;
            transform: scale(1.05);
        }

        .upgrade-btn:active {
            transform: scale(0.98);
        }

        .tab-content {
            padding-top: 20px;
        }

        .proposal-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            transition: box-shadow 0.3s;
        }

        .proposal-card:hover {
            box-shadow: 0 4px 8px rgba(0, 75, 125, 0.1);
        }

        .job-card:hover {
            background: white;
        }
    </style>
    <div class="container my-5" style="padding-top: 60px;">
        <div class="card job-card card-custom p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0 text-dark">
                    AI-Powered Object Detection App - 12/08/2025 02:36 EDT
                    <span class="badge badge-custom">Open</span>
                </h4>
                <div class="text-end">
                    <span class="text-muted-custom">Bids</span> <strong>1</strong> |
                    <span class="text-muted-custom">Average bid</span> <strong>₹1,000 INR</strong>
                </div>
            </div>
            <ul class="nav nav-tabs mb-4 border-bottom" id="myTab">
                <li class="nav-item">
                    <a class="nav-link active" id="details-tab" data-bs-toggle="tab" href="#details"
                        style="color: #004b7d !important;">Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="proposals-tab" data-bs-toggle="tab" href="#proposals"
                        style="color: #004b7d !important;">Proposals</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <!-- Details Tab -->
                <div class="tab-pane fade show active" id="details">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-5">
                                <h5 class="fw-bold" style="color: #004b7d !important;">Project Details</h5>
                                <p class="text-muted-custom mb-3">₹750.00 - 1,250.00 INR per hour</p>
                                <p class="text-muted-custom mb-2"><strong>Bidding Ends in</strong> 6 days, 23 hours</p>
                                <p class="text-dark">I'm seeking an experienced AI developer to create a computer vision
                                    application focused on object detection.</p>
                                <h6 class="mt-4 fw-bold" style="color: #004b7d !important;">Key Requirements:</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-3 d-flex align-items-start"><i class="fas fa-check icon-custom"></i>
                                        Develop a robust object detection model</li>
                                    <li class="mb-3 d-flex align-items-start"><i class="fas fa-check icon-custom"></i>
                                        Utilize frameworks like TensorFlow or PyTorch</li>
                                    <li class="mb-3 d-flex align-items-start"><i class="fas fa-check icon-custom"></i>
                                        High-quality dataset preparation and model training</li>
                                    <li class="mb-3 d-flex align-items-start"><i class="fas fa-check icon-custom"></i>
                                        Implementation of real-time detection capabilities</li>
                                    <li class="mb-3 d-flex align-items-start"><i class="fas fa-check icon-custom"></i>
                                        Thorough testing and validation of the application</li>
                                </ul>
                                <h6 class="mt-4 fw-bold" style="color: #004b7d !important;">Expertise in:</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-3 d-flex align-items-start"><i class="fas fa-check icon-custom"></i>
                                        Computer vision and deep learning</li>
                                    <li class="mb-3 d-flex align-items-start"><i class="fas fa-check icon-custom"></i>
                                        Strong background in AI and machine learning</li>
                                    <li class="mb-3 d-flex align-items-start"><i class="fas fa-check icon-custom"></i>
                                        Proficiency in Python and relevant libraries</li>
                                    <li class="mb-3 d-flex align-items-start"><i class="fas fa-check icon-custom"></i>
                                        Experience with model deployment and optimization</li>
                                    <li class="mb-3 d-flex align-items-start"><i class="fas fa-check icon-custom"></i>
                                        Ability to deliver within budget and timeline</li>
                                </ul>
                                <h6 class="mt-4 fw-bold" style="color: #004b7d !important;">Skills Required</h6>
                                <div class="d-flex flex-wrap mb-4">
                                    <span class="badge skill-badge">Java</span>
                                    <span class="badge skill-badge">Python</span>
                                    <span class="badge skill-badge">Mobile App Development</span>
                                    <span class="badge skill-badge">Software Architecture</span>
                                    <span class="badge skill-badge">Computer Vision</span>
                                    <span class="badge skill-badge">Deep Learning</span>
                                    <span class="badge skill-badge">Model Deployment</span>
                                    <span class="badge skill-badge">AI Development</span>
                                </div>
                                <p class="mt-3 text-muted-custom">Project ID: 3962734</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-4 bg-light border-0">
                                <h5 class="fw-bold mb-4" style="color: #004b7d !important;">About the Client</h5>
                                <p class="mb-3"><i class="fas fa-map-marker-alt icon-custom"></i> Aligarh, India</p>
                                <p class="mb-3"><i class="fas fa-star icon-custom"></i> 0.0 <span
                                        class="text-muted-custom">(0 reviews)</span></p>
                                <p class="mb-3"><i class="fas fa-user icon-custom"></i> Member since Aug 12, 2025</p>
                                <h6 class="mt-4 fw-bold" style="color: #004b7d !important;">Client Engagement</h6>
                                <p class="mb-3"><i class="fas fa-level-up-alt icon-custom"></i> Upgrade your
                                    membership to see client engagement</p>
                                <h6 class="mt-4 fw-bold" style="color: #004b7d !important;">Client Verification</h6>
                                <ul class="list-unstyled text-muted-custom">
                                    <li class="mb-2"><i class="fas fa-check-circle icon-custom"></i> Identity verified
                                    </li>
                                    <li class="mb-2"><i class="fas fa-money-check-alt icon-custom"></i> Payment
                                        verified</li>
                                    <li class="mb-2"><i class="fas fa-hand-holding-usd icon-custom"></i> Deposit made
                                    </li>
                                    <li class="mb-2"><i class="fas fa-envelope icon-custom"></i> Email verified</li>
                                    <li class="mb-2"><i class="fas fa-phone icon-custom"></i> Phone verified</li>
                                </ul>
                                <button class="btn btn-custom w-100 mt-4"
                                    onmouseenter="this.style.backgroundColor='#003a61'"
                                    onmouseleave="this.style.backgroundColor='#004b7d'"
                                    onmousedown="this.style.transform='scale(0.98)'"
                                    onmouseup="this.style.transform='scale(1)'">
                                    Report Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Proposals Tab -->
                <div class="tab-pane fade" id="proposals">
                    <div class="row">
                        <div class="col-12">
                            <div class="proposal-card">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1 text-dark">Proposal by John Doe</h6>
                                        <p class="text-muted-custom mb-1">Bid: ₹1,000 INR / hour</p>
                                        <p class="text-muted-custom mb-0">Submitted: 12/08/2025 01:05 PM IST</p>
                                    </div>
                                    <button class="btn btn-custom btn-sm">View Details</button>
                                </div>
                                <p class="mt-2 text-dark">I am an experienced AI developer with expertise in computer
                                    vision and deep learning. I propose to use TensorFlow for this project and ensure
                                    real-time detection capabilities.</p>
                            </div>
                            <div class="proposal-card">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1 text-dark">Proposal by Jane Smith</h6>
                                        <p class="text-muted-custom mb-1">Bid: ₹1,200 INR / hour</p>
                                        <p class="text-muted-custom mb-0">Submitted: 12/08/2025 12:45 PM IST</p>
                                    </div>
                                    <button class="btn btn-custom btn-sm">View Details</button>
                                </div>
                                <p class="mt-2 text-dark">With a strong background in PyTorch and model deployment, I
                                    can deliver a high-quality object detection app within the timeline.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bid-section mt-4"
            style="border: 1px solid #e0e0e0; border-radius: 12px; padding: 20px; background: #fff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">
            <h4 class="mb-3" style="color: #004b7d; font-size: 1.5rem; font-weight: 600; letter-spacing: 0.3px;">
                Submit Your Proposal</h4>
            <p class="text-muted mb-3" style="font-size: 0.9rem; line-height: 1.4; max-width: 500px;">Fill out the
                details below to submit your bid.</p>
            <form action="{{ route('create.proposal') }}" method="POST" id="proposalForm"
                onsubmit="return validateForm()">
                @csrf
                <div class="row g-3 align-items-start">
                    <div class="col-md-12">
                        <div class="mb-4 p-3 bg-light rounded"
                            style="border: 1px solid #e0e0e0; background: #f9fbfd;">
                            <label class="form-label mb-2"
                                style="color: #004b7d; font-weight: 500; font-size: 1rem;">Payment Method</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="jobProposalPayType"
                                    id="payByMilestone" value="0" checked required onchange="togglePayType()">
                                <label class="form-check-label" for="payByMilestone"
                                    style="color: #004b7d; font-size: 0.95rem; font-weight: 500;">By Milestone</label>
                                <small class="text-muted ms-3" style="font-size: 0.85rem;">Paid per milestone upon
                                    approval.</small>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jobProposalPayType"
                                    id="payByProject" value="1" required onchange="togglePayType()">
                                <label class="form-check-label" for="payByProject"
                                    style="color: #004b7d; font-size: 0.95rem; font-weight: 500;">By Project</label>
                                <small class="text-muted ms-3" style="font-size: 0.85rem;">Full payment at
                                    completion.</small>
                            </div>
                            <label class="form-label mb-2 mt-3"
                                style="color: #004b7d; font-weight: 500; font-size: 1rem;">Total Amount <span
                                    class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"
                                    style="background: #f0f4f8; border-color: #e0e0e0; font-weight: 500; font-size: 0.9rem;">₹</span>
                                <input type="number" class="form-control" name="amount" value="1000.00"
                                    min="0" step="0.01" required
                                    style="border-color: #e0e0e0; font-size: 0.95rem; padding: 8px;">
                                <span class="input-group-text"
                                    style="background: #f0f4f8; border-color: #e0e0e0; font-weight: 500; font-size: 0.9rem;">INR</span>
                            </div>
                            <div id="milestoneSection" style="transition: all 0.2s ease;">
                                <label class="form-label mb-2"
                                    style="color: #004b7d; font-weight: 500; font-size: 1rem;">Milestone Details <span
                                        class="text-danger">*</span></label>
                                <div id="milestoneContainer">
                                    <div class="milestone-row border p-3 mb-3 rounded"
                                        style="border-color: #e0e0e0; background: #f9fbfd;">
                                        <div class="row align-items-center">
                                            <div class="col-md-6">
                                                <label class="form-label mb-1"
                                                    style="color: #004b7d; font-weight: 500; font-size: 0.95rem;">Description
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control milestone-title"
                                                    name="milestones[0][title]" placeholder="Milestone Description"
                                                    required
                                                    style="border-color: #e0e0e0; font-size: 0.95rem; padding: 8px;">
                                                <textarea class="form-control mt-2 milestone-description" name="milestones[0][description]"
                                                    placeholder="Additional Details" rows="2" required
                                                    style="border-color: #e0e0e0; resize: vertical; font-size: 0.95rem; padding: 8px;"></textarea>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label mb-1"
                                                    style="color: #004b7d; font-weight: 500; font-size: 0.95rem;">Due
                                                    Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control milestone-date"
                                                    name="milestones[0][due_date]" required
                                                    style="border-color: #e0e0e0; font-size: 0.95rem; padding: 8px;"
                                                    value="2025-08-19">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label mb-1"
                                                    style="color: #004b7d; font-weight: 500; font-size: 0.95rem;">Amount
                                                    <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"
                                                        style="background: #f0f4f8; border-color: #e0e0e0; font-weight: 500; font-size: 0.9rem;">₹</span>
                                                    <input type="number" class="form-control milestone-amount"
                                                        name="milestones[0][amount]" placeholder="Amount"
                                                        min="0" step="0.01" required
                                                        style="border-color: #e0e0e0; font-size: 0.95rem; padding: 8px;">
                                                </div>
                                                <button type="button"
                                                    class="btn btn-outline-danger btn-sm mt-2 remove-milestone"
                                                    style="border-color: #dc3545; color: #dc3545; font-size: 0.9rem; padding: 4px 10px;">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-primary mt-2" onclick="addMilestone()"
                                    style="border-color: #004b7d; color: #004b7d; font-size: 0.95rem; padding: 6px 12px; border-radius: 6px;">Add
                                    Milestone</button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" style="color: #004b7d; font-weight: 500; font-size: 1rem;">Job
                                Offer ID <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="jobOfferId" value="" required
                                style="border-color: #e0e0e0; font-size: 0.95rem; padding: 8px;">
                        </div>
                        <div class="mb-4">
                            <label class="form-label"
                                style="color: #004b7d; font-weight: 500; font-size: 1rem;">Duration (Days) <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="jobOfferDuration" value="7"
                                min="1" required
                                style="border-color: #e0e0e0; font-size: 0.95rem; padding: 8px;">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" style="color: #004b7d; font-weight: 500; font-size: 1rem;">Cover
                                Letter <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="coverLetter" rows="4" placeholder="Detail your experience and approach."
                                required style="border-color: #e0e0e0; resize: vertical; font-size: 0.95rem; padding: 8px; line-height: 1.4;"></textarea>
                        </div>
                        <div class="mb-4 p-3 bg-light rounded"
                            style="border: 1px solid #e0e0e0; background: #f9fbfd;">
                            <h6 class="fw-bold mb-3"
                                style="color: #004b7d; font-size: 1.1rem; letter-spacing: 0.3px;">Upgrades</h6>
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" name="isSponsored" id="isSponsored"
                                    value="1" checked required style="margin-top: 0.3rem;">
                                <label class="form-check-label" for="isSponsored"
                                    style="font-size: 0.95rem; font-weight: 500;">Sponsored ($4.90) - Boost to
                                    #1.</label>
                            </div>
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" name="isHighlighted"
                                    id="isHighlighted" value="1" checked required style="margin-top: 0.3rem;">
                                <label class="form-check-label" for="isHighlighted"
                                    style="font-size: 0.95rem; font-weight: 500;">Highlighted ($4.49) - +21%
                                    chance.</label>
                            </div>
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" name="isFeatured" id="isFeatured"
                                    value="1" checked required style="margin-top: 0.3rem;">
                                <label class="form-check-label" for="isFeatured"
                                    style="font-size: 0.95rem; font-weight: 500;">Featured - Enhance
                                    visibility.</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="isSealed" id="isSealed"
                                    value="1" checked required style="margin-top: 0.3rem;">
                                <label class="form-check-label" for="isSealed"
                                    style="font-size: 0.95rem; font-weight: 500;">Sealed ($10.10) - Hide bid.</label>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label"
                                style="color: #004b7d; font-weight: 500; font-size: 1rem;">Portfolios <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="portfolios[]"
                                placeholder="Enter portfolio URL" required
                                style="border-color: #e0e0e0; font-size: 0.95rem; padding: 8px;">
                            <button type="button" class="btn btn-outline-primary mt-2" onclick="addPortfolio()"
                                style="border-color: #004b7d; color: #004b7d; font-size: 0.95rem; padding: 6px 12px; border-radius: 6px;">Add
                                Portfolio</button>
                            <div id="portfolioContainer"></div>
                        </div>
                        <button type="submit" class="btn btn-custom w-100 mb-4"
                            style="font-size: 1.1rem; padding: 10px 0; font-weight: 500; border-radius: 6px; background-color: #004b7d; color: #fff;"
                            onmouseenter="this.style.backgroundColor='#003a61'"
                            onmouseleave="this.style.backgroundColor='#004b7d'"
                            onmousedown="this.style.transform='scale(0.98)'"
                            onmouseup="this.style.transform='scale(1)'">
                            Submit Proposal
                        </button>
                    </div>
                </div>
        </div>
        </form>
        <div class="mt-4">
            <div class="card p-3 bg-light"
                style="border: 1px solid #e0e0e0; border-radius: 12px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">
                <h6 class="fw-bold mb-3" style="color: #004b7d; font-size: 1.1rem; letter-spacing: 0.3px;">Win Tips
                </h6>
                <p class="text-muted mb-2" style="font-size: 0.9rem; line-height: 1.4;">Craft a strong proposal!</p>
                <ul class="text-muted" style="font-size: 0.85rem; padding-left: 15px; line-height: 1.5;">
                    <li class="mb-2">Engaging, error-free text</li>
                    <li class="mb-2">Project-specific content</li>
                    <li class="mb-2">Showcase skills & plan</li>
                    <li class="mb-2">Ask questions</li>
                </ul>
                <p class="text-muted mb-2" style="font-size: 0.85rem; line-height: 1.4;">Avoid spam—penalties apply.
                </p>
                <button class="btn btn-outline-primary w-100"
                    style="border-color: #004b7d; color: #004b7d; font-size: 1rem; padding: 8px 0; font-weight: 500; border-radius: 6px;"
                    onmouseenter="this.style.backgroundColor='#e6f0fa'; this.style.color='#003a61'"
                    onmouseleave="this.style.backgroundColor='transparent'; this.style.color='#004b7d'">More
                    Tips</button>
            </div>
            <div class="text-center mt-3">
                <span class="text-muted" style="font-size: 0.9rem; font-weight: 500;">6 bids left</span>
            </div>
        </div>
    </div>

    <script>
        function togglePayType() {
            const milestoneSection = document.getElementById('milestoneSection');
            const payByMilestone = document.getElementById('payByMilestone');
            const milestoneInputs = milestoneSection.querySelectorAll('input[required], textarea[required]');
            milestoneSection.style.display = payByMilestone.checked ? 'block' : 'none';
            milestoneInputs.forEach(input => {
                input.required = payByMilestone.checked;
            });
        }

        function validateForm() {
            const payByMilestone = document.getElementById('payByMilestone').checked;
            if (!payByMilestone) {
                const milestoneSection = document.getElementById('milestoneSection');
                milestoneSection.querySelectorAll('input, textarea').forEach(input => {
                    input.removeAttribute('required');
                });
            }
            return true; // Let browser handle default validation
        }

        function addMilestone() {
            const milestoneContainer = document.getElementById('milestoneContainer');
            const milestones = milestoneContainer.getElementsByClassName('milestone-row').length;
            const milestoneRow = document.createElement('div');
            milestoneRow.className = 'milestone-row border p-3 mb-3 rounded';
            milestoneRow.style.borderColor = '#e0e0e0';
            milestoneRow.style.background = '#f9fbfd';
            milestoneRow.innerHTML = `
            <div class="row align-items-center">
                <div class="col-md-6">
                    <label class="form-label mb-1" style="color: #004b7d; font-weight: 500; font-size: 0.95rem;">Description <span class="text-danger">*</span></label>
                    <input type="text" class="form-control milestone-title" name="milestones[${milestones}][title]" placeholder="Milestone Description" required style="border-color: #e0e0e0; font-size: 0.95rem; padding: 8px;">
                    <textarea class="form-control mt-2 milestone-description" name="milestones[${milestones}][description]" placeholder="Additional Details" rows="2" required style="border-color: #e0e0e0; resize: vertical; font-size: 0.95rem; padding: 8px;"></textarea>
                </div>
                <div class="col-md-3">
                    <label class="form-label mb-1" style="color: #004b7d; font-weight: 500; font-size: 0.95rem;">Due Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control milestone-date" name="milestones[${milestones}][due_date]" required style="border-color: #e0e0e0; font-size: 0.95rem; padding: 8px;" value="2025-08-19">
                </div>
                <div class="col-md-3">
                    <label class="form-label mb-1" style="color: #004b7d; font-weight: 500; font-size: 0.95rem;">Amount <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text" style="background: #f0f4f8; border-color: #e0e0e0; font-weight: 500; font-size: 0.9rem;">₹</span>
                        <input type="number" class="form-control milestone-amount" name="milestones[${milestones}][amount]" placeholder="Amount" min="0" step="0.01" required style="border-color: #e0e0e0; font-size: 0.95rem; padding: 8px;">
                    </div>
                    <button type="button" class="btn btn-outline-danger btn-sm mt-2 remove-milestone" style="border-color: #dc3545; color: #dc3545; font-size: 0.9rem; padding: 4px 10px;">Remove</button>
                </div>
            </div>
        `;
            milestoneContainer.appendChild(milestoneRow);
            milestoneRow.querySelector('.remove-milestone').addEventListener('click', () => milestoneRow.remove());
            togglePayType(); // Reapply required attributes based on current selection
        }

        function addPortfolio() {
            const portfolioContainer = document.getElementById('portfolioContainer');
            const index = portfolioContainer.getElementsByClassName('portfolio-item').length;

            const portfolioRow = document.createElement('div');
            portfolioRow.className = 'portfolio-item mb-2';
            portfolioRow.innerHTML = `
        <div class="input-group">
            <input type="hidden" name="portfolios[${index}][id]" value="0">
            <input type="hidden" name="portfolios[${index}][jobProposalId]" value="0">
            <input type="hidden" name="portfolios[${index}][freelancerId]" value="0">
            <input type="text" class="form-control" name="portfolios[${index}][url]" placeholder="Enter portfolio URL" required style="border-color: #e0e0e0; font-size: 0.95rem; padding: 8px;">
            <button type="button" class="btn btn-outline-danger btn-sm remove-portfolio" style="border-color: #dc3545; color: #dc3545; font-size: 0.9rem; padding: 4px 10px;">Remove</button>
        </div>
    `;

            portfolioContainer.appendChild(portfolioRow);

            // Remove button
            portfolioRow.querySelector('.remove-portfolio').addEventListener('click', () => portfolioRow.remove());
        }


        // Initial setup
        togglePayType();
    </script>
    </div>

</body>
@include('freelancer.partials.js')

</html>
