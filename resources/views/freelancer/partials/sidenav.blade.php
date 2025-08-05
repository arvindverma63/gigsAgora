<style>
    body {
        margin: 0;
        background-color: #f8f9fa;
        font-size: 14px;
    }

    .sidebar {
        width: 220px;
        height: 100vh;
        background-color: #fff;
        padding: 0.75rem 0.75rem 0 0.75rem;
        border-right: 1px solid #dee2e6;
    }

    .avatar {
        width: 36px;
        height: 36px;
        background-color: #0d6efd;
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

    .sidebar .nav-link {
        border-radius: 0.375rem;
        padding: 0.3rem 0.5rem;
        font-size: 13px;
        font-weight: 600;
        /* <-- Bold */
    }

    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
        background-color: #e7f1ff;
        color: #0d6efd;
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
            <div class="fw-bold" style="font-size: 13px;">ARVIND Verma</div>
            <small class="text-muted" style="font-size: 11px;">Freelancer</small>
        </div>
        <i class="bi bi-chevron-down" style="font-size: 12px;"></i>
    </div>

    <!-- Menu -->
    <ul class="nav flex-column">

        <li class="nav-item">
            <a class="nav-link active d-flex align-items-center" href="#">
                <i class="bi bi-house-door me-2"></i> Home
            </a>
        </li>

        <!-- Collapsible Hub -->
        <li class="nav-item">
            <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                href="#hubMenu">
                <span><i class="bi bi-stack me-2"></i> Hub</span>
                <i class="bi bi-chevron-down small"></i>
            </a>
            <div class="collapse" id="hubMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item"><a class="nav-link" href="#">Repositories</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Organizations</a></li>
                </ul>
            </div>
        </li>

        <!-- Collapsible Build Cloud -->
        <li class="nav-item">
            <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                href="#buildCloud">
                <span><i class="bi bi-cloud-upload me-2"></i> Build Cloud</span>
                <i class="bi bi-chevron-down small"></i>
            </a>
            <div class="collapse" id="buildCloud">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item"><a class="nav-link" href="#">Pipelines</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Runners</a></li>
                </ul>
            </div>
        </li>

        <!-- External links -->
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="#" target="_blank">
                <i class="bi bi-graph-up-arrow me-2"></i> Scout
                <i class="bi bi-box-arrow-up-right ms-auto external-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="#" target="_blank">
                <i class="bi bi-box-seam me-2"></i> Testcontainers
                <i class="bi bi-box-arrow-up-right ms-auto external-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="#" target="_blank">
                <i class="bi bi-display me-2"></i> Docker Desktop
                <i class="bi bi-box-arrow-up-right ms-auto external-icon"></i>
            </a>
        </li>

        <div class="section-divider"></div>

        <!-- Collapsible Settings -->
        <li class="nav-item">
            <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                href="#settingsMenu">
                <span><i class="bi bi-gear me-2"></i> Settings</span>
                <i class="bi bi-chevron-down small"></i>
            </a>
            <div class="collapse" id="settingsMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item"><a class="nav-link" href="#">Preferences</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Integrations</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="#" target="_blank">
                <i class="bi bi-credit-card me-2"></i> Billing
                <i class="bi bi-box-arrow-up-right ms-auto external-icon"></i>
            </a>
        </li>
    </ul>
</div>
