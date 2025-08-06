<style>
    body {
        margin: 0;
        background-color: #f8f9fa;
        font-size: 14px;
    }

    .sidebar {
        width: 320px;
        height: calc(100vh - 56px);
        /* 100% height minus navbar height */
        background-color: #fff;
        padding: 0.75rem 0.75rem 0 0.75rem;
        border-left: 1px solid #dee2e6;
        position: fixed;
        right: 0;
        top: 77px;
        /* Offset for navbar */
        overflow-y: auto;
    }


    .avatar {
        width: 36px;
        height: 36px;
        background-color: #004b7d;
        border-radius: 50%;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 14px;
    }

    .sidebar a {
        text-decoration: none;
        color: #212529;
    }

    .sidebar .side-label {
        border-radius: 0.375rem;
        padding: 0.3rem 0.5rem;
        font-size: 13px;
        font-weight: 600;
        color: #004b7d;
        /* <-- Bold */
    }

    .sidebar .side-label.active,
    .sidebar .side-label:hover {
        background-color: #e7f1ff;
        color: #004b7d;
    }

    .section-divider {
        border-top: 1px solid #dee2e6;
        margin: 0.5rem 0;
    }

    .external-icon {
        font-size: 0.7rem;
        margin-left: 2px;
    }

    .bi {
        font-size: 16px;
    }
</style>
<div class="sidebar d-flex flex-column">
    <!-- Profile Section -->
    <div class="d-flex align-items-center mb-2">
        <div class="avatar me-2">AV</div>
        <div class="flex-grow-1">
            <div class="fw-bold" style="font-size: 13px; color: #004b7d;">ARVIND Verma</div>
            <small class="text-muted" style="font-size: 11px; color: #004b7d;">Freelancer</small>
        </div>
        <i class="bi bi-chevron-down" style="font-size: 12px;"></i>
    </div>

    <ul class="nav flex-column">


        <!-- Profile Completion -->
        <li class="nav-item mt-2">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="fw-semibold" style="font-size: 13px; color: #004b7d;">Profile Completion</span>
                <a href="#" class="text-primary" style="font-size: 11px;">Complete </a>
            </div>
            <div class="progress" style="height: 6px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 70%;" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </li>

        <li class="nav-item mt-3">
            <a class="side-label d-flex align-items-center" href="#">
                <i class="bi bi-briefcase me-2"></i> Available Job Apply
            </a>
        </li>

        <li class="nav-item">
            <a class="side-label d-flex align-items-center" href="#">
                <i class="bi bi-plus-circle me-2"></i> Add On <span class="ms-1 text-muted"
                    style="font-size: 11px;">(Buy more Job Applies)</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="side-label d-flex align-items-center" href="#">
                <i class="bi bi-award me-2"></i> Badges
            </a>
        </li>

        <li class="nav-item">
            <a class="side-label d-flex align-items-center" href="#">
                <i class="bi bi-star-half me-2"></i> Rating Stars
            </a>
        </li>

        <li class="nav-item">
            <a class="side-label d-flex align-items-center" href="#">
                <i class="bi bi-card-checklist me-2"></i> Membership Plan
            </a>
        </li>

        <div class="section-divider"></div>

        <!-- Settings -->
        <li class="nav-item">
            {{-- <a class="side-label d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                href="#settingsMenu">
                <span><i class="bi bi-gear me-2"></i> Settings</span>
                <i class="bi bi-chevron-down small"></i>
            </a> --}}
            <div class="collapse" id="settingsMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item"><a class="side-label" href="#">Preferences</a></li>
                    <li class="nav-item"><a class="side-label" href="#">Integrations</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="side-label d-flex align-items-center" href="#" target="_blank">

            </a>
        </li>
    </ul>

</div>
