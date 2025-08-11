let currentStep = 1;
const steps = document.querySelectorAll('.wizard-step');
const totalSteps = steps.length;
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const form = document.getElementById('jobPostForm');
const progressBar = document.querySelector('.progress-bar');
const skillsInput = document.getElementById('skillsInput');
const skillsList = document.getElementById('skillsList');
const skillsHiddenInputs = document.getElementById('skillsHiddenInputs');
let skillsArray = [];

// Milestone template
const milestoneTemplate = `
    <div class="border p-2 mb-2 milestone-item rounded">
        <div class="mb-2">
            <label class="form-label">Milestone Title</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-heading"></i></span>
                <input type="text" class="form-control" name="milestone_title[]">
            </div>
        </div>
        <div class="mb-2">
            <label class="form-label">Description</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                <textarea class="form-control" rows="2" name="milestone_description[]"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-2">
                <label class="form-label">Amount</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    <input type="number" class="form-control" name="milestone_amount[]" min="0">
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label">Due On</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    <input type="date" class="form-control" name="milestone_dueOn[]">
                </div>
            </div>
        </div>
    </div>
`;

// Load from sessionStorage
document.addEventListener('DOMContentLoaded', () => {
    const savedData = sessionStorage.getItem('jobPostData');
    if (savedData) {
        const formData = JSON.parse(savedData);
        Object.keys(formData).forEach(name => {
            if (name === 'skillsRequired[]') {
                skillsArray = formData[name] || [];
                updateSkillsDisplay();
            } else if (name === 'milestone_title[]' && formData[name] && formData[name].length > 0) {
                const milestoneList = document.getElementById('milestoneList');
                milestoneList.innerHTML = ''; // Clear existing milestones
                formData[name].forEach((title, index) => {
                    const milestone = document.createElement('div');
                    milestone.innerHTML = milestoneTemplate;
                    const milestoneEl = milestone.firstElementChild;
                    milestoneEl.querySelector('input[name="milestone_title[]"]').value = title || '';
                    milestoneEl.querySelector('textarea[name="milestone_description[]"]').value = formData['milestone_description[]'][index] || '';
                    milestoneEl.querySelector('input[name="milestone_amount[]"]').value = formData['milestone_amount[]'][index] || '';
                    milestoneEl.querySelector('input[name="milestone_dueOn[]"]').value = formData['milestone_dueOn[]'][index] || '';
                    milestoneList.appendChild(milestoneEl);
                });
            } else {
                const field = document.querySelector(`[name="${name}"]`);
                if (field) {
                    if (field.type === 'checkbox') {
                        field.checked = formData[name];
                    } else {
                        field.value = formData[name] || '';
                    }
                }
            }
        });
    }
    showStep(currentStep); // Initialize the first step
});

function showStep(step) {
    steps.forEach(s => s.classList.remove('active'));
    steps[step - 1].classList.add('active');
    prevBtn.style.display = step === 1 ? 'none' : 'inline-block';
    nextBtn.innerHTML = step === totalSteps ? 'Submit<i class="fas fa-check ms-1"></i>' : 'Next<i class="fas fa-arrow-right ms-1"></i>';
    progressBar.style.width = `${(step / totalSteps) * 100}%`;
    if (step === totalSteps) {
        updateReview();
    }
}

function saveToSession() {
    const formData = {};
    document.querySelectorAll('#jobPostForm input:not([type="checkbox"]), #jobPostForm textarea, #jobPostForm select').forEach(el => {
        if (el.name.endsWith('[]')) {
            if (!formData[el.name]) formData[el.name] = [];
            formData[el.name].push(el.value);
        } else {
            formData[el.name] = el.value;
        }
    });
    document.querySelectorAll('#jobPostForm input[type="checkbox"]').forEach(el => {
        formData[el.name] = el.checked;
    });
    formData['skillsRequired[]'] = skillsArray;
    sessionStorage.setItem('jobPostData', JSON.stringify(formData));
}

function validateStep(step) {
    const currentStepFields = steps[step - 1].querySelectorAll('input[required], select[required], textarea[required]');
    let isValid = true;
    currentStepFields.forEach(field => {
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            isValid = false;
        } else {
            field.classList.remove('is-invalid');
        }
    });
    if (step === 2 && skillsArray.length === 0) {
        skillsInput.classList.add('is-invalid');
        isValid = false;
    } else if (step === 2) {
        skillsInput.classList.remove('is-invalid');
    }
    return isValid;
}

function updateSkillsDisplay() {
    skillsList.innerHTML = '';
    skillsHiddenInputs.innerHTML = '';
    skillsArray.forEach((skill, index) => {
        // Create pill button
        const skillBadge = document.createElement('span');
        skillBadge.className = 'badge bg-primary me-1 mb-1';
        skillBadge.style.backgroundColor = '#004b7d';
        skillBadge.innerHTML = `${skill} <i class="fas fa-times ms-1" style="cursor: pointer;"></i>`;
        skillBadge.querySelector('i').addEventListener('click', () => {
            skillsArray.splice(index, 1);
            updateSkillsDisplay();
            saveToSession();
        });
        skillsList.appendChild(skillBadge);

        // Create hidden input for form submission
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'skillsRequired[]';
        hiddenInput.value = skill;
        skillsHiddenInputs.appendChild(hiddenInput);
    });
}

function updateReview() {
    const formData = JSON.parse(sessionStorage.getItem('jobPostData') || '{}');

    // Basic Info
    document.getElementById('review-title').textContent = formData.title || 'Not provided';
    document.getElementById('review-description').textContent = formData.description || 'Not provided';
    document.getElementById('review-amount').textContent = formData.amount || 'Not provided';
    document.getElementById('review-offerDate').textContent = formData.offerDate || 'Not provided';

    // Requirements
    const experienceLevels = {0: 'Beginner', 1: 'Intermediate', 2: 'Expert'};
    const jobTypes = {0: 'Fixed Price', 1: 'Hourly'};
    document.getElementById('review-experienceLevel').textContent = experienceLevels[formData.experienceLevel] || 'Not provided';
    document.getElementById('review-jobType').textContent = jobTypes[formData.jobType] || 'Not provided';
    document.getElementById('review-jobOfferDuration').textContent = formData.jobOfferDuration || 'Not provided';
    document.getElementById('review-minimumSuccessScore').textContent = formData.minimumSuccessScore || 'Not provided';
    document.getElementById('review-minimumEarningScore').textContent = formData.minimumEarningScore || 'Not provided';
    document.getElementById('review-requiredTalentType').textContent = formData.requiredTalentType || 'Not provided';
    document.getElementById('review-languages').textContent = formData.languages || 'Not provided';
    document.getElementById('review-countries').textContent = formData.countries || 'Not provided';
    document.getElementById('review-skillsRequired').textContent = formData['skillsRequired[]']?.join(', ') || 'Not provided';

    // Milestones
    const milestoneList = document.getElementById('review-milestones');
    milestoneList.innerHTML = '';
    if (formData['milestone_title[]'] && formData['milestone_title[]'].length > 0) {
        formData['milestone_title[]'].forEach((title, index) => {
            const milestoneDiv = document.createElement('div');
            milestoneDiv.className = 'review-item';
            milestoneDiv.innerHTML = `
                <strong>Milestone ${index + 1}:</strong><br>
                Title: ${title || 'Not provided'}<br>
                Description: ${formData['milestone_description[]'][index] || 'Not provided'}<br>
                Amount: ${formData['milestone_amount[]'][index] || 'Not provided'}<br>
                Due On: ${formData['milestone_dueOn[]'][index] || 'Not provided'}
            `;
            milestoneList.appendChild(milestoneDiv);
        });
    } else {
        milestoneList.innerHTML = '<div class="review-item">No milestones provided</div>';
    }

    // Settings
    document.getElementById('review-isSponsored').textContent = formData.isSponsored ? 'Yes' : 'No';
    document.getElementById('review-isHighlighted').textContent = formData.isHighlighted ? 'Yes' : 'No';
    document.getElementById('review-isFeatured').textContent = formData.isFeatured ? 'Yes' : 'No';
}

function editStep(step) {
    saveToSession();
    currentStep = step;
    showStep(currentStep);
}

prevBtn.addEventListener('click', () => {
    saveToSession();
    if (currentStep > 1) currentStep--;
    showStep(currentStep);
});

nextBtn.addEventListener('click', () => {
    if (currentStep < totalSteps && !validateStep(currentStep)) {
        alert('Please fill in all required fields before proceeding.');
        return;
    }
    saveToSession();
    if (currentStep < totalSteps) {
        currentStep++;
        showStep(currentStep);
    } else {
        if (validateStep(currentStep)) {
            sessionStorage.removeItem('jobPostData');
            form.submit();
        } else {
            alert('Please review and fill in all required fields.');
        }
    }
});

document.getElementById('addMilestone').addEventListener('click', function() {
    const milestoneList = document.getElementById('milestoneList');
    const milestone = document.createElement('div');
    milestone.innerHTML = milestoneTemplate;
    const milestoneEl = milestone.firstElementChild;
    milestoneEl.querySelectorAll('input, textarea').forEach(input => {
        input.value = '';
        input.classList.remove('is-invalid');
    });
    milestoneList.appendChild(milestoneEl);
});

// Handle skills input
skillsInput.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        const skill = this.value.trim();
        if (skill && !skillsArray.includes(skill)) {
            skillsArray.push(skill);
            this.value = '';
            updateSkillsDisplay();
            saveToSession();
        }
    }
});
