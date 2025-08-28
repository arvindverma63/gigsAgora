let currentStep = 1;
const totalSteps = 5;
const steps = document.querySelectorAll('#stepNav .step-circle');
const formSections = document.querySelectorAll('#formContainer .form-section');
const backBtn = document.getElementById('backBtn');
const nextBtn = document.getElementById('nextBtn');

// Function to update UI when step changes
function updateStep(step) {
    currentStep = step;

    // Highlight active step circle
    steps.forEach((s, index) => {
        s.classList.toggle('active', index + 1 === currentStep);
    });

    // Show correct form section
    formSections.forEach((section, index) => {
        const isActive = index + 1 === currentStep;
        section.classList.toggle('active', isActive);

        // Enable required only for visible fields
        section.querySelectorAll('input, textarea, select').forEach(input => {
            if (isActive) {
                if (input.dataset.originalRequired === "true") {
                    input.setAttribute('required', 'required');
                }
            } else {
                if (input.hasAttribute('required')) {
                    input.dataset.originalRequired = "true"; // mark it
                }
                input.removeAttribute('required');
            }
        });
    });

    // Progress bar update
    const progress = ((currentStep - 1) / (totalSteps - 1)) * 100;
    document.querySelector('.progress-bar').style.width = `${progress}%`;
    document.querySelector('.progress-bar').setAttribute('aria-valuenow', progress);

    // Back button disable on step 1
    backBtn.disabled = currentStep === 1;

    // Change Next → Finish
    if (currentStep === totalSteps) {
        nextBtn.textContent = 'Finish';
        nextBtn.setAttribute('type', 'submit');
    } else {
        nextBtn.textContent = 'Next';
        nextBtn.setAttribute('type', 'button');
    }
}


// Step circle click
steps.forEach(step => {
    step.addEventListener('click', (e) => {
        e.preventDefault();
        const stepNum = parseInt(step.getAttribute('data-step'));
        if (stepNum <= currentStep + 1) { // only allow next or previous
            updateStep(stepNum);
        }
    });
});

// Next button
nextBtn.addEventListener('click', (e) => {
    if (currentStep < totalSteps) {
        e.preventDefault(); // stop form submission before last step
        updateStep(currentStep + 1);
    }
    // if last step → type=submit handles form submission automatically
});

// Back button
backBtn.addEventListener('click', (e) => {
    e.preventDefault();
    if (currentStep > 1) {
        updateStep(currentStep - 1);
    }
});

// Initialize first step
updateStep(1);



const skillsInput = document.getElementById("skills");
const skillsContainer = document.getElementById("skillsContainer");

skillsInput.addEventListener("keydown", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();
        const skill = skillsInput.value.trim();

        if (skill !== "") {
            // Create skill pill
            const pill = document.createElement("span");
            pill.className = "badge bg-light text-dark me-2 mb-2 d-inline-flex align-items-center";
            pill.innerHTML = `${skill} <button type="button" class="btn-close btn-sm ms-2" aria-label="Remove"></button>`;

            // Create hidden input for form submission
            const hiddenInput = document.createElement("input");
            hiddenInput.type = "hidden";
            hiddenInput.name = "skillsRequired[]";   // <-- now it's skillsRequired[]
            hiddenInput.value = skill;

            // Attach hidden input to pill
            pill.appendChild(hiddenInput);

            // Add remove event
            pill.querySelector("button").addEventListener("click", function () {
                pill.remove(); // removes pill + hidden input
            });

            // Append pill
            skillsContainer.appendChild(pill);

            // Clear input
            skillsInput.value = "";
        }
    }
});



const budgetInput = document.getElementById("budget");
const durationSelect = document.getElementById("duration");
const jobTypeRadios = document.querySelectorAll("input[name='jobType']");

const summaryBudget = document.getElementById("summaryBudget");
const summaryType = document.getElementById("summaryType");
const summaryDuration = document.getElementById("summaryDuration");
const budgetHelp = document.getElementById("budgetHelp");


function updateSummary() {
    // Get the selected radio button
    const selected = document.querySelector("input[name='jobType']:checked");

    // Default values if no radio button is selected
    const type = selected ? selected.value : "Fixed Price"; // Fallback to Fixed Price
    const budget = budgetInput.value || 0;
    const duration = durationSelect.options[durationSelect.selectedIndex]?.text || "1-4 Weeks"; // Use text for display

    // Update summary
    summaryBudget.textContent = type === "Hourly Rate" ? `$${budget}/hr` : `$${budget}`;
    summaryType.textContent = type;
    summaryDuration.textContent = duration;
    budgetHelp.textContent = type === "Hourly Rate" ? "Hourly rate" : "Total project budget";

    // Highlight the selected card
    document.querySelectorAll(".job-card").forEach(label => {
        label.classList.remove("selected");
    });

    if (selected) {
        const selectedLabel = selected.closest("label.job-card");
        if (selectedLabel) {
            selectedLabel.classList.add("selected");
        }
    } else {
        // Fallback: Highlight the default (Fixed Price) card if no selection
        const defaultLabel = document.querySelector("#fixed-price");
        if (defaultLabel) {
            defaultLabel.classList.add("selected");
        }
    }
}

// Event listeners
budgetInput.addEventListener("input", updateSummary);
durationSelect.addEventListener("change", updateSummary);
jobTypeRadios.forEach(radio => radio.addEventListener("change", updateSummary));

// Initialize on page load
document.addEventListener("DOMContentLoaded", updateSummary);

const boostOptions = document.querySelectorAll(".boost-option");
const summaryList = document.getElementById("summaryList");
const summaryTotal = document.getElementById("summaryTotal");

function updateSummaryTotal() {
    let total = 0;
    summaryList.innerHTML = "";

    boostOptions.forEach(option => {
        if (option.checked) {
            const price = parseFloat(option.value); // ✅ use parseFloat
            const label = option.getAttribute("data-label");

            total += price;

            const item = document.createElement("div");
            item.textContent = `${label} - $${price}`;
            summaryList.appendChild(item);
        }
    });

    summaryTotal.textContent = `$${total}`;
}

boostOptions.forEach(option => {
    option.addEventListener("change", updateSummaryTotal);
});



//toast

document.addEventListener("DOMContentLoaded", function () {
    const toastElList = [].slice.call(document.querySelectorAll('.toast'))
    toastElList.map(function (toastEl) {
        const toast = new bootstrap.Toast(toastEl, { delay: 5000 }) // 5s auto-hide
        toast.show()
    })
});
