 const steps = document.querySelectorAll(".step");
  const formSteps = document.querySelectorAll(".form-step");
  const progressBar = document.getElementById("progressBar");
  const nextBtns = document.querySelectorAll(".next-btn");
  const prevBtns = document.querySelectorAll(".prev-btn");

  let currentStep = 1;

  function updateSteps() {
    steps.forEach((step, index) => {
      step.classList.remove("active", "completed", "inactive");
      if (index + 1 < currentStep) step.classList.add("completed");
      else if (index + 1 === currentStep) step.classList.add("active");
      else step.classList.add("inactive");
    });

    formSteps.forEach((form, index) => {
      form.classList.remove("active");
      if (index + 1 === currentStep) form.classList.add("active");
    });

    progressBar.style.width = (currentStep / steps.length) * 100 + "%";
  }

  nextBtns.forEach(btn => {
    btn.addEventListener("click", () => {
      if (currentStep < steps.length) {
        currentStep++;
        updateSteps();
      }
    });
  });

  prevBtns.forEach(btn => {
    btn.addEventListener("click", () => {
      if (currentStep > 1) {
        currentStep--;
        updateSteps();
      }
    });
  });

  steps.forEach(step => {
    step.addEventListener("click", () => {
      currentStep = parseInt(step.getAttribute("data-step"));
      updateSteps();
    });
  });
