<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    body {
        margin: 0;
        background: #f8f9fa;
        font-family: 'Poppins', sans-serif;
    }

    .navbar {
        background: linear-gradient(to right, #1d9bf0, #007bff);
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }

    .navbar-brand img {
        height: 30px;
        margin-right: 8px;
    }

    .dropdown-menu {
        min-width: 220px;
        border: none;
        border-radius: 10px;
        overflow: hidden;
        padding: 0;
    }

    .dropdown-header {
        background: linear-gradient(to right, #ff9800, #9c27b0);
        color: white;
        padding: 1rem;
        text-align: center;
    }

    .dropdown-header .avatar {
        background-color: #0d6efd;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        font-size: 24px;
        line-height: 60px;
        margin: auto;
        color: white;
    }

    .dropdown-item {
        padding: 10px 16px;
        font-size: 14px;
        transition: background-color 0.2s;
    }

    .dropdown-item:hover {
        background-color: #f1f1f1;
    }

    .dropdown-divider {
        margin: 0;
    }

    .nav-icon {
        color: white;
        margin-right: 18px;
        font-size: 20px;
        cursor: pointer;
    }

    .nav-icon:hover {
        opacity: 0.85;
    }

    .btn-avatar {
        background: transparent;
        border: none;
        padding: 0;
    }

    .btn-avatar .avatar-icon {
        background-color: #0d6efd;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        color: white;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark px-3">
    <a class="navbar-brand d-flex align-items-center" href="#">
        {{-- <img src="https://www.docker.com/wp-content/uploads/2022/03/Moby-logo.png" alt="Docker Logo"> --}}
        <b>GigsAgora</b>
    </a>
    <div class="ms-auto d-flex align-items-center">

        <!-- Help Icon -->
        <i class="bi bi-question-circle nav-icon" title="Help"></i>

        <!-- Notification Icon -->
        <i class="bi bi-bell nav-icon" title="Notifications"></i>

        <!-- Theme Toggle Icon -->
        <i class="bi bi-brightness-high nav-icon" title="Toggle Theme"></i>

        <!-- Dropdown Avatar -->
        <div class="dropdown">
            <button class="btn btn-avatar" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="avatar-icon">A</div>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButton">
                <div class="dropdown-header">
                    <div class="avatar">A</div>
                    <div class="mt-2">arvind63</div>
                </div>
                <li><a class="dropdown-item" href="#">What's new</a></li>
                <li><a class="dropdown-item" href="#">My profile</a></li>
                <li><a class="dropdown-item" href="#">Account settings</a></li>
                <li><a class="dropdown-item" href="#">Billing</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item text-danger" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>
</nav>
@include('freelancer.partials.sidenav')
