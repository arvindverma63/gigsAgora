let currentStep = 1;
const totalSteps = 5;
const steps = document.querySelectorAll('#stepNav .step-circle');
const formSections = document.querySelectorAll('#formContainer .form-section');
const backBtn = document.getElementById('backBtn');
const nextBtn = document.getElementById('nextBtn');

function updateStep(step) {
    currentStep = step;
    steps.forEach((s, index) => {
        const circle = s;
        if (index + 1 === currentStep) {
            circle.classList.add('active');
        } else {
            circle.classList.remove('active');
        }
    });
    formSections.forEach((section, index) => {
        if (index + 1 === currentStep) {
            section.classList.add('active');
        } else {
            section.classList.remove('active');
        }
    });
    const progress = ((currentStep - 1) / (totalSteps - 1)) * 100;
    document.querySelector('.progress-bar').style.width = `${progress}%`;
    document.querySelector('.progress-bar').setAttribute('aria-valuenow', progress);

    backBtn.disabled = currentStep === 1;
    nextBtn.textContent = currentStep === totalSteps ? 'Finish' : 'Next';
}

steps.forEach(step => {
    step.addEventListener('click', (e) => {
        e.preventDefault();
        const stepNum = parseInt(step.getAttribute('data-step'));
        if (stepNum <= currentStep + 1) { // Allow moving to next or previous steps
            updateStep(stepNum);
        }
    });
});

nextBtn.addEventListener('click', () => {
    if (currentStep < totalSteps) {
        updateStep(currentStep + 1);
    } else {
        alert('Job posting completed!');
    }
});

backBtn.addEventListener('click', () => {
    if (currentStep > 1) {
        updateStep(currentStep - 1);
    }
});

// Initialize
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

            // Add remove event
            pill.querySelector("button").addEventListener("click", function () {
                pill.remove();
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
    let type = document.querySelector("input[name='jobType']:checked").value;
    let budget = budgetInput.value || 0;
    let duration = durationSelect.value;

    summaryBudget.textContent = type === "Hourly Rate" ? budget + "/hr" : budget;
    summaryType.textContent = type;
    summaryDuration.textContent = duration;

    budgetHelp.textContent = type === "Hourly Rate" ? "Hourly rate" : "Total project budget";
}

// Event listeners
budgetInput.addEventListener("input", updateSummary);
durationSelect.addEventListener("change", updateSummary);
jobTypeRadios.forEach(r => r.addEventListener("change", updateSummary));

// Initialize
updateSummary();
