<!DOCTYPE html>
<html lang="en">
@include('freelancer.partials.head')
<link rel="stylesheet" href="{{ asset('step-form/proposal-form.css') }}?v={{ time() }}">

<body>
    @include('freelancer.partials.navbar')

    <div class="container my-4" style="padding-top:90px; max-width: 800px;">
        <div class="card shadow-sm border-0">
            <div class="card-body p-3">

                <!-- Header -->
                <h5 class="fw-bold mb-1">Submit Job Proposal</h5>
                <small class="text-muted">Complete your proposal to apply</small>

                <!-- Stepper -->
                <div class="d-flex justify-content-between my-3 small">
                    <div class="step active" data-step="1">
                        <div class="circle">1</div>
                        <div class="step-text">Cover Letter</div>
                    </div>
                    <div class="step inactive" data-step="2">
                        <div class="circle">2</div>
                        <div class="step-text">Budget</div>
                    </div>
                    <div class="step inactive" data-step="3">
                        <div class="circle">3</div>
                        <div class="step-text">Options</div>
                    </div>
                </div>

                <!-- Progress bar -->
                <div class="progress mb-3" style="height:6px;">
                    <div id="progressBar" class="progress-bar bg-success" role="progressbar" style="width:33%;"></div>
                </div>

                <!-- Step 1 -->
                <div class="form-step active" id="step-1">
                    <h6 class="fw-semibold mb-2">Cover Letter</h6>
                    <textarea id="coverLetter" rows="6" class="form-control mb-2" placeholder="Write your cover letter..."></textarea>
                    <small class="text-muted">Min. 50 characters</small>

                    <!-- Tips -->
                    <div class="p-2 bg-light border rounded small mt-2">
                        <strong>Tips:</strong>
                        <ul class="ps-3 mb-0">
                            <li>Address client’s needs</li>
                            <li>Highlight skills</li>
                            <li>Show enthusiasm</li>
                        </ul>
                    </div>

                    <div class="d-flex justify-content-end mt-2">
                        <button type="button" class="btn btn-success btn-sm next-btn">Next →</button>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="form-step" id="step-2">
                    <h6 class="fw-semibold mb-2">Budget & Milestones</h6>
                    <input type="number" id="budget" class="form-control mb-2" placeholder="Your Budget ($)">
                    <textarea id="milestones" rows="3" class="form-control mb-2" placeholder="Project milestones"></textarea>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-light btn-sm border prev-btn">← Back</button>
                        <button type="button" class="btn btn-success btn-sm next-btn">Next →</button>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="form-step" id="step-3">
                    <h6 class="fw-semibold mb-2">Options</h6>
                    <div class="form-check mb-1">
                        <input type="checkbox" class="form-check-input" id="nda">
                        <label for="nda" class="form-check-label small">Request NDA</label>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="fastDelivery">
                        <label for="fastDelivery" class="form-check-label small">Fast Delivery</label>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-light btn-sm border prev-btn">← Back</button>
                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/submit-proposal.js') }}?v={{ time() }}"></script>
</body>
@include('freelancer.partials.js')

</html>
