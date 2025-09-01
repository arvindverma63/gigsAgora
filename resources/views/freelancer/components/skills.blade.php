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

<style>
    .skill-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        margin: 5px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
    }

    .level {
        font-size: 12px;
        padding: 2px 6px;
        border-radius: 10px;
    }

    .level-beginner {
        background: #6c757d;
        /* Gray */
        color: white;
    }

    .level-intermediate {
        background: #198754;
        /* Green */
        color: white;
    }

    .level-expert {
        background: #0d6efd;
        /* Blue */
        color: white;
    }

    .remove-btn {
        background: transparent;
        border: none;
        color: white;
        font-size: 16px;
        cursor: pointer;
        margin-left: 6px;
    }

    .remove-btn:hover {
        color: #ff4d4d;
    }
</style>

<div class="card-body">
    <h5 class="card-title"><i class="bi bi-code-slash"></i> Skills & Expertise</h5>

    <div id="skills-list" class="mb-3">
        @foreach ($profile['skills'] as $s)
            <span class="skill-badge bg-primary text-white" data-skill-id="{{ $s['skillId'] }}">
                {{ $s['skillName'] ?? 'UI/UX Design' }}
                <span
                    class="level {{ $s['proficiencyLevel'] == 0 ? 'level-beginner' : ($s['proficiencyLevel'] == 1 ? 'level-intermediate' : 'level-expert') }}">
                    {{ $s['proficiencyLevel'] == 0 ? 'Beginner' : ($s['proficiencyLevel'] == 1 ? 'Intermediate' : 'Expert') }}
                </span>
                <button class="remove-btn">&times;</button>
            </span>
        @endforeach
    </div>

    <!-- Add Skill Form -->
    <div class="d-flex position-relative">
        <input type="text" id="skill-input" class="form-control me-2" placeholder="Add a skill...">

        <!-- Suggestions dropdown -->
        <div id="suggestions-box" class="list-group position-absolute w-100 shadow-sm"
            style="z-index:1000; top:100%; display:none; max-height:200px; overflow-y:auto;">
        </div>

        <select id="level-select" class="form-select me-2" style="max-width: 150px;">
            <option value="0">Beginner</option>
            <option value="1">Intermediate</option>
            <option value="2">Expert</option>
        </select>
        <button id="add-skill" class="btn btn-primary">+</button>
    </div>
</div>

<script>
    const skillInput = document.getElementById("skill-input");
    const suggestionsBox = document.getElementById("suggestions-box");
    let selectedSkill = null;

    // Store skills payload
    let skillsPayload = @json(collect($profile['skills'])->map(function ($s) {
            return [
                'skillId' => $s['skillId'] ?? 0,
                'proficiencyLevel' => $s['proficiencyLevel'] ?? 0,
            ];
        }));

    // ✅ Function to send updated payload
    function updateBackend() {
        fetch("/update/skills", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify(skillsPayload)
            })
            .then(res => res.json())
            .then(data => console.log("Skills updated:", data))
            .catch(err => console.error("Error updating skill:", err));
    }

    // ✅ Add skill button
    document.getElementById("add-skill").addEventListener("click", function() {
        const levelSelect = document.getElementById("level-select");
        const levelValue = parseInt(levelSelect.value);

        if (!selectedSkill) {
            alert("Please select a skill from suggestions");
            return;
        }

        // Push to skillsPayload
        skillsPayload.push({
            skillId: selectedSkill.id,
            proficiencyLevel: levelValue
        });

        updateBackend();

        // Create badge
        const span = document.createElement("span");
        span.className = "skill-badge bg-primary text-white";
        span.setAttribute("data-skill-id", selectedSkill.id);

        let levelClass = "level-beginner";
        let levelText = "Beginner";
        if (levelValue === 1) {
            levelClass = "level-intermediate";
            levelText = "Intermediate";
        } else if (levelValue === 2) {
            levelClass = "level-expert";
            levelText = "Expert";
        }

        span.innerHTML = `${selectedSkill.name} <span class="level ${levelClass}">${levelText}</span>
                          <button class="remove-btn">&times;</button>`;

        document.getElementById("skills-list").appendChild(span);

        // Reset
        skillInput.value = "";
        suggestionsBox.style.display = "none";
        selectedSkill = null;
    });

    // ✅ Remove skill
    document.getElementById("skills-list").addEventListener("click", function(e) {
        if (e.target.classList.contains("remove-btn")) {
            const badge = e.target.closest(".skill-badge");
            const skillId = parseInt(badge.getAttribute("data-skill-id"));

            // Remove from payload
            skillsPayload = skillsPayload.filter(s => s.skillId !== skillId);
            updateBackend();

            // Remove badge
            badge.remove();
        }
    });

    // ✅ Fetch suggestions
    skillInput.addEventListener("keyup", function() {
        const query = this.value.trim();
        if (query.length < 2) {
            suggestionsBox.style.display = "none";
            return;
        }

        fetch('/skills/suggestions/' + query)
            .then(response => response.json())
            .then(data => {
                suggestionsBox.innerHTML = "";
                if (data.skills && data.skills.length > 0) {
                    data.skills.forEach(skill => {
                        const item = document.createElement("a");
                        item.href = "#";
                        item.className = "list-group-item list-group-item-action";
                        item.textContent = skill.name;
                        item.addEventListener("click", function(e) {
                            e.preventDefault();
                            skillInput.value = skill.name;
                            selectedSkill = skill;
                            suggestionsBox.style.display = "none";
                        });
                        suggestionsBox.appendChild(item);
                    });
                    suggestionsBox.style.display = "block";
                } else {
                    suggestionsBox.style.display = "none";
                }
            })
            .catch(error => console.error('Error fetching suggestions:', error));
    });

    // Hide suggestions when clicked outside
    document.addEventListener("click", function(e) {
        if (!suggestionsBox.contains(e.target) && e.target !== skillInput) {
            suggestionsBox.style.display = "none";
        }
    });
</script>
