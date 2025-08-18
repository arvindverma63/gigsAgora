<style>
    body {
        margin: 0;
        background-color: #f8f9fa;
        font-size: 14px;
    }

    .sidebar {
        width: 320px;
        height: calc(100vh - 56px);
        background-color: #fff;
        padding: 0.75rem;
        border-left: 1px solid #dee2e6;
        position: fixed;
        right: 0;
        top: 77px;
        overflow-y: auto;
        transition: transform 0.3s ease-in-out;
        z-index: 1050;
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

    .close-sidebar {
        float: right;
        margin: -0.5rem -0.5rem 0 0;
    }

    /* Mobile - Hide sidebar by default */
    @media (max-width: 768px) {
        .sidebar {
            width: 260px;
            height: 100vh;
            top: 0;
            transform: translateX(100%);
        }

        .sidebar.active {
            transform: translateX(0);
        }
    }

    @media (max-width: 480px) {
        .sidebar {
            width: 220px;
            padding: 0.75rem;
        }
    }
</style>
<!-- Toggle Button (mobile only) -->
<button id="rightSidebarToggle" class="btn btn-primary d-md-none mb-2">
    <i class="fas fa-user"></i> Profile
</button>

<!-- Right Sidebar -->
<div class="sidebar d-flex flex-column">
    <!-- Close Button (mobile only) -->
    <button class="btn btn-light btn-sm close-sidebar d-md-none">
        <i class="fas fa-times"></i>
    </button>

    <!-- Profile Section -->
    <div class="d-flex align-items-center mb-2 mt-2">
        <div class="avatar me-2">AV</div>
        <div class="flex-grow-1">
            <div class="fw-bold" style="font-size: 13px; color: #004b7d;">{{Session::get('auth_data')['username']}}</div>
            <small class="text-muted" style="font-size: 11px; color: #004b7d;">Job Provider</small>
        </div>
        <i class="bi bi-chevron-down" style="font-size: 12px;"></i>
    </div>

    <ul class="nav flex-column">
        <!-- Profile Completion -->
        <li class="nav-item mt-2">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="fw-semibold" style="font-size: 13px; color: #004b7d;">Profile Completion</span>
                <a href="#" class="text-primary" style="font-size: 11px;">Complete</a>
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
    </ul>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const rightSidebar = document.querySelector(".sidebar");
        const rightToggleBtn = document.querySelector("#rightSidebarToggle");
        const rightCloseBtn = document.querySelector(".sidebar .close-sidebar");

        rightToggleBtn.addEventListener("click", function() {
            rightSidebar.classList.toggle("active");
        });

        rightCloseBtn.addEventListener("click", function() {
            rightSidebar.classList.remove("active");
        });
    });
</script>
