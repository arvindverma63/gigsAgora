<style>
    .skill-badge {
        padding: 8px 14px;
        border-radius: 20px;
        margin: 4px;
        font-size: 14px;
        display: inline-flex;
        align-items: center;
    }

    .skill-badge .level {
        margin-left: 6px;
        font-size: 12px;
        padding: 2px 6px;
        border-radius: 12px;
    }

    .level-expert {
        background: #0d6efd;
        color: white;
    }

    .level-intermediate {
        background: #198754;
        color: white;
    }

    .level-beginner {
        background: #ffc107;
        color: black;
    }
</style>

<div class="card-body">
    <h5 class="card-title"><i class="bi bi-code-slash"></i> Skills & Expertise</h5>
    <div id="skills-list" class="mb-3">
        <!-- Default Skills -->
        @foreach ($profile['skills'] as $s)
            <span class="skill-badge bg-primary text-white">
                UI/UX Design <span class="level level-expert">Expert</span>
            </span>
        @endforeach


    </div>

    <!-- Add Skill Form -->
    <div class="d-flex">
        <input type="text" id="skill-input" class="form-control me-2" placeholder="Add a skill...">
        <select id="level-select" class="form-select me-2" style="max-width: 150px;">
            <option>Beginner</option>
            <option>Intermediate</option>
            <option>Expert</option>
        </select>
        <button id="add-skill" class="btn btn-primary">+</button>
    </div>
</div>

<script>
    document.getElementById("add-skill").addEventListener("click", function() {
        const skillInput = document.getElementById("skill-input");
        const levelSelect = document.getElementById("level-select");
        const skillValue = skillInput.value.trim();
        const levelValue = levelSelect.value;

        if (!skillValue) return;

        // Define color classes
        let badgeClass = "bg-primary text-white";
        let levelClass = "level-beginner";
        if (levelValue === "Intermediate") {
            badgeClass = "bg-success text-white";
            levelClass = "level-intermediate";
        } else if (levelValue === "Expert") {
            badgeClass = "bg-primary text-white";
            levelClass = "level-expert";
        }


        // Create skill badge
        const span = document.createElement("span");
        span.className = `skill-badge ${badgeClass}`;
        span.innerHTML = `${skillValue} <span class="level ${levelClass}">${levelValue}</span>`;

        document.getElementById("skills-list").appendChild(span);

        // Reset input
        skillInput.value = "";
    });

    document.getElementById("skill-input").addEventListener("keyup", function() {
        fetch('/skills/suggestions/' + this.value)
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch(error => console.error('Error:', error));
    });
</script>
