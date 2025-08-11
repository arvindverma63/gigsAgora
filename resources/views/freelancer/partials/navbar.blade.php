<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<style>
    body {
        margin: 0;
        background: #f8f9fa;
        font-family: 'Poppins', sans-serif;
    }

    .navbar {
        background: linear-gradient(to right, #004b7d, #007bff);
        padding: 0.5rem 1rem;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1050;
        /* Keep it above other elements */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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
        background-color: #004b7d;
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
        background-color: #004b7d;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        color: white;
        font-weight: 400;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark px-3">
    <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="{{ asset('dashboard-css/img/logo/logo-trans.png') }}" style="height: 50px; padding-bottom: 10px;" alt="Docker Logo">
    </a>

    <!-- Navbar toggler for mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
        aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Main Menu -->
    <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
                <a class="nav-link top-nav-link text-white" href="#">Dashboard</a>
            </li>

            <li class="nav-item">
                <a class="nav-link top-nav-link" href="#">Find Jobs</a>
            </li>

            <!-- My Work -->
            <li class="nav-item dropdown">
                <a class="nav-link top-nav-link dropdown-toggle" href="#" id="myWorkDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    My Work
                </a>
                <ul class="dropdown-menu" aria-labelledby="myWorkDropdown">
                    <li><a class="dropdown-item" href="#">Active Jobs</a></li>
                    <li><a class="dropdown-item" href="#">Proposals</a></li>
                    <li><a class="dropdown-item" href="#">Completed Jobs</a></li>
                    <li><a class="dropdown-item" href="#">Saved Jobs</a></li>
                </ul>
            </li>

            <!-- My Gigs -->
            <li class="nav-item dropdown">
                <a class="nav-link top-nav-link dropdown-toggle" href="#" id="myGigsDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    My Gigs
                </a>
                <ul class="dropdown-menu" aria-labelledby="myGigsDropdown">
                    <li class="dropdown-header">Explore</li>
                    <li><a class="dropdown-item" href="#">Add New</a></li>
                    <li><a class="dropdown-item" href="#">Edit</a></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Active Orders</a></li>
                </ul>
            </li>

            <!-- My Team -->
            <li class="nav-item dropdown">
                <a class="nav-link top-nav-link dropdown-toggle" href="#" id="myTeamDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    My Team
                </a>
                <ul class="dropdown-menu" aria-labelledby="myTeamDropdown">
                    <li><a class="dropdown-item" href="#">Explore</a></li>
                    <li><a class="dropdown-item" href="#">Create New Team</a></li>
                    <li><a class="dropdown-item" href="#">Team Notifications</a></li>
                    <li><a class="dropdown-item" href="#">New Invitations</a></li>
                </ul>
            </li>
        </ul>


        <!-- Search bar with dropdown -->
        <form class="d-flex me-3" style="max-width: 350px;">
            <div class="input-group">
                <!-- Search Icon -->
                <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search"></i>
                </span>

                <!-- Search Input -->
                <input type="search" class="form-control border-start-0 border-end-0" placeholder="Search"
                    aria-label="Search">

                <!-- Dropdown -->
                <button class="btn dropdown-toggle" style="background: rgb(255, 255, 255);color: black; border: 1px solid rgba(0, 0, 0, 0.164);" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Jobs
                </button>
                <ul class="dropdown-menu dropdown-menu-end" style="z-index: 10000">
                    <li><a class="dropdown-item" href="#">Jobs</a></li>
                    <li><a class="dropdown-item" href="#">Talent</a></li>
                    <li><a class="dropdown-item" href="#">Projects</a></li>
                </ul>
            </div>
        </form>


        <!-- Icons & Profile -->
        <div class="d-flex align-items-center">
            <i class="bi bi-bell nav-icon" title="Notifications"></i>
            <i class="bi bi-chat-right-dots nav-icon" title="Messages"></i>
            <div class="dropdown">
                <button class="btn btn-avatar" id="dropdownMenuButton" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="avatar-icon">A</div>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow" style="z-index: 10000;" aria-labelledby="dropdownMenuButton">
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
    </div>
</nav>
@include('freelancer.partials.left-sidebar')
@include('freelancer.partials.sidenav')
