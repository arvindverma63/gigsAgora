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
                <div class="form-step bg-white p-4 rounded shadow-sm" id="step-2">
                    <h5 class="fw-semibold mb-3">Budget & Milestones</h5>
                    <p class="text-muted">Choose how you'd like to be paid and set your budget for this project.</p>

                    <!-- Payment Type -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Payment Type <span class="text-danger">*</span></label>
                        <div class="list-group">
                            <label class="list-group-item d-flex align-items-center">
                                <input class="form-check-input me-2" type="radio" name="paymentType" value="fixed"
                                    checked>
                                <div>
                                    <div class="fw-semibold">Fixed Price</div>
                                    <small class="text-muted">Set a total project price</small>
                                </div>
                            </label>
                            <label class="list-group-item d-flex align-items-center">
                                <input class="form-check-input me-2" type="radio" name="paymentType"
                                    value="milestones">
                                <div>
                                    <div class="fw-semibold">By Milestones</div>
                                    <small class="text-muted">Break down payment into milestones</small>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Budget Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Total Project Budget</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" id="budget" class="form-control" placeholder="0.00">
                        </div>
                        <small class="text-muted">This is the total amount you'll receive for completing the entire
                            project.</small>
                    </div>

                    <!-- Duration -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Project Duration <span
                                class="text-danger">*</span></label>
                        <select id="duration" class="form-select">
                            <option selected>Within a week</option>
                            <option>1-2 weeks</option>
                            <option>Less than a month</option>
                            <option>1-3 months</option>
                            <option>More than 3 months</option>
                        </select>
                        <small class="text-muted">How long do you estimate this project will take to
                            complete?</small>
                    </div>

                    <!-- Milestones Section -->
                    <div id="milestoneContainer" class="border rounded p-3 d-none">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="fw-semibold">Project Milestones</h6>
                            <div>
                                <span class="me-3">Total Budget: <strong id="totalBudget">$0.00</strong></span>
                                <span class="me-3">Allocated: <strong id="allocated">$0.00</strong></span>
                                <span>Remaining: <strong id="remaining" class="text-success">$0.00</strong></span>
                            </div>
                        </div>

                        <div class="row g-2 mb-2">
                            <div class="col-md-3">
                                <input type="text" id="msTitle" class="form-control" placeholder="Milestone Title">
                            </div>
                            <div class="col-md-5">
                                <input type="text" id="msDesc" class="form-control"
                                    placeholder="Milestone Description">
                            </div>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" id="msAmount" class="form-control" placeholder="0.00">
                                </div>
                            </div>
                            <div class="col-md-2 d-grid">
                                <button type="button" id="addMilestone" class="btn btn-success">+</button>
                            </div>
                        </div>

                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="milestoneList">
                                <tr class="text-center text-muted" id="noMilestones">
                                    <td colspan="4">No Milestones Added</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-light btn-sm border prev-btn">← Back</button>
                        <button type="button" class="btn btn-success btn-sm next-btn">Next →</button>
                    </div>
                </div>

                <script>
                    const paymentTypeRadios = document.querySelectorAll('input[name="paymentType"]');
                    const milestoneContainer = document.getElementById('milestoneContainer');
                    const budgetInput = document.getElementById('budget');
                    const totalBudgetDisplay = document.getElementById('totalBudget');
                    const allocatedDisplay = document.getElementById('allocated');
                    const remainingDisplay = document.getElementById('remaining');
                    const milestoneList = document.getElementById('milestoneList');
                    const noMilestones = document.getElementById('noMilestones');
                    let allocated = 0;

                    // Toggle Milestone Section
                    paymentTypeRadios.forEach(radio => {
                        radio.addEventListener('change', () => {
                            if (radio.value === 'milestones' && radio.checked) {
                                milestoneContainer.classList.remove('d-none');
                            } else {
                                milestoneContainer.classList.add('d-none');
                            }
                        });
                    });

                    // Update total budget
                    budgetInput.addEventListener('input', () => {
                        totalBudgetDisplay.textContent = `$${Number(budgetInput.value || 0).toFixed(2)}`;
                        updateRemaining();
                    });

                    // Add milestone
                    document.getElementById('addMilestone').addEventListener('click', () => {
                        const title = document.getElementById('msTitle').value;
                        const desc = document.getElementById('msDesc').value;
                        const amount = parseFloat(document.getElementById('msAmount').value);

                        if (!title || !amount) {
                            alert('Milestone title and amount are required');
                            return;
                        }

                        if (noMilestones) noMilestones.remove();

                        allocated += amount;
                        allocatedDisplay.textContent = `$${allocated.toFixed(2)}`;
                        updateRemaining();

                        const row = document.createElement('tr');
                        row.innerHTML = `
      <td>${title}</td>
      <td>${desc || '-'}</td>
      <td>$${amount.toFixed(2)}</td>
      <td><button class="btn btn-sm btn-danger remove">×</button></td>
    `;
                        milestoneList.appendChild(row);

                        // Clear inputs
                        document.getElementById('msTitle').value = '';
                        document.getElementById('msDesc').value = '';
                        document.getElementById('msAmount').value = '';

                        // Remove event
                        row.querySelector('.remove').addEventListener('click', () => {
                            allocated -= amount;
                            allocatedDisplay.textContent = `$${allocated.toFixed(2)}`;
                            updateRemaining();
                            row.remove();

                            if (!milestoneList.children.length) {
                                milestoneList.innerHTML =
                                    `<tr class="text-center text-muted" id="noMilestones"><td colspan="4">No Milestones Added</td></tr>`;
                            }
                        });
                    });

                    function updateRemaining() {
                        const total = parseFloat(budgetInput.value || 0);
                        const remaining = total - allocated;
                        remainingDisplay.textContent = `$${remaining.toFixed(2)}`;
                        remainingDisplay.classList.toggle('text-danger', remaining < 0);
                        remainingDisplay.classList.toggle('text-success', remaining >= 0);
                    }
                </script>

                <!-- Step 3 -->
                <div class="form-step bg-white p-4 rounded shadow-sm" id="step-3">
                    <h5 class="fw-semibold mb-3">Proposal Options</h5>
                    <p class="text-muted">Enhance your proposal with these optional features to increase your chances
                        of being hired.</p>

                    <!-- Options List -->
                    <div class="list-group mb-3">

                        <!-- Sponsored Proposal -->
                        <label class="list-group-item d-flex justify-content-between align-items-center option-card">
                            <div class="d-flex align-items-start">
                                <span class="me-3 fs-5 text-warning"><i class="fa-solid fa-trophy"></i></span>
                                <div>
                                    <div class="fw-semibold">Sponsored Proposal
                                        <span class="badge bg-success ms-1">Premium</span>
                                        <span class="badge bg-light text-dark border ms-1">$5.00</span>
                                    </div>
                                    <small class="text-muted">Boost your proposal visibility to stand out from other
                                        applicants</small>
                                </div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input option-toggle" type="checkbox" data-label="Sponsored"
                                    data-price="5">
                            </div>
                        </label>

                        <!-- Highlight Proposal -->
                        <label class="list-group-item d-flex justify-content-between align-items-center option-card">
                            <div class="d-flex align-items-start">
                                <span class="me-3 fs-5 text-danger"><i class="fa-solid fa-star"></i></span>
                                <div>
                                    <div class="fw-semibold">Highlight Proposal
                                        <span class="badge bg-warning text-dark ms-1">Popular</span>
                                        <span class="badge bg-light text-dark border ms-1">$3.00</span>
                                    </div>
                                    <small class="text-muted">Make your proposal stand out with special
                                        highlighting</small>
                                </div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input option-toggle" type="checkbox" data-label="Highlight"
                                    data-price="3">
                            </div>
                        </label>

                        <!-- Featured Proposal -->
                        <label class="list-group-item d-flex justify-content-between align-items-center option-card">
                            <div class="d-flex align-items-start">
                                <span class="me-3 fs-5 text-primary"><i class="fa-solid fa-location-pin"></i></span>
                                <div>
                                    <div class="fw-semibold">Featured Proposal
                                        <span class="badge bg-info text-dark ms-1">Featured</span>
                                        <span class="badge bg-light text-dark border ms-1">$8.00</span>
                                    </div>
                                    <small class="text-muted">Get your proposal featured at the top of the client’s
                                        list</small>
                                </div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input option-toggle" type="checkbox" data-label="Featured"
                                    data-price="8">
                            </div>
                        </label>

                        <!-- Sealed Proposal -->
                        <label class="list-group-item d-flex justify-content-between align-items-center option-card">
                            <div class="d-flex align-items-start">
                                <span class="me-3 fs-5 text-success"><i class="fa-solid fa-location-pin"></i></span>
                                <div>
                                    <div class="fw-semibold">Sealed Proposal
                                        <span class="badge bg-secondary ms-1">Private</span>
                                        <span class="badge bg-light text-dark border ms-1">$4.00</span>
                                    </div>
                                    <small class="text-muted">Keep your proposal details private until the client views
                                        it</small>
                                </div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input option-toggle" type="checkbox" data-label="Sealed"
                                    data-price="4">
                            </div>
                        </label>

                    </div>

                    <!-- Additional Costs -->
                    <div class="border-top pt-3 mb-3 d-flex justify-content-between">
                        <div>
                            <h6 class="fw-semibold mb-0">Additional Costs</h6>
                            <small class="text-muted">These charges will be applied when you submit your
                                proposal</small>
                        </div>
                        <div class="fs-5 fw-bold text-success" id="totalCost">$0.00</div>
                    </div>

                    <!-- Why use -->
                    <div class="p-3 rounded bg-light border-start border-4 border-success mb-3">
                        <h6 class="fw-semibold text-success">Why use these features?</h6>
                        <ul class="small text-muted mb-0">
                            <li>Increase visibility among competing proposals</li>
                            <li>Show professionalism and commitment to quality</li>
                            <li>Get noticed faster by potential clients</li>
                            <li>Higher chances of being shortlisted for interviews</li>
                        </ul>
                    </div>

                    <!-- Summary -->
                    <div class="border rounded p-3 mb-3">
                        <small class="text-muted">Your proposal will be:</small>
                        <div id="selectedOptions" class="fw-semibold mt-1">Standard</div>
                    </div>

                    <!-- Navigation -->
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-light btn-sm border prev-btn">← Back</button>
                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                    </div>
                </div>

                <script>
                    const toggles = document.querySelectorAll('.option-toggle');
                    const totalCost = document.getElementById('totalCost');
                    const selectedOptions = document.getElementById('selectedOptions');
                    let cost = 0;
                    let chosen = [];

                    toggles.forEach(toggle => {
                        toggle.addEventListener('change', () => {
                            const price = parseFloat(toggle.dataset.price);
                            const label = toggle.dataset.label;

                            if (toggle.checked) {
                                cost += price;
                                chosen.push(label);
                            } else {
                                cost -= price;
                                chosen = chosen.filter(item => item !== label);
                            }

                            totalCost.textContent = `$${cost.toFixed(2)}`;
                            selectedOptions.textContent = chosen.length ? chosen.join(", ") : "Standard";
                        });
                    });
                </script>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/submit-proposal.js') }}?v={{ time() }}"></script>
</body>
@include('freelancer.partials.js')

</html>
