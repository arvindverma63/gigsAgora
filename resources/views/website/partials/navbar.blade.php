 <style>
    /* Underline hover effect */
    .custom-nav .nav-link {
      position: relative;
      transition: all 0.3s ease;
    }

    .custom-nav .nav-link::after {
      content: '';
      position: absolute;
      width: 0%;
      height: 2px;
      bottom: 0;
      left: 50%;
      background-color: white;
      transition: width 0.3s ease, left 0.3s ease;
    }

    .custom-nav .nav-link:hover::after {
      width: 100%;
      left: 0;
    }

    .navbar {
      background-color: #000;
    }

    .navbar-toggler {
      border-color: white;
    }

    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 255, 255, 1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }
  </style>
<!-- Navbar Links -->
<nav id="navmenu" class="d-none d-lg-flex align-items-center">
    <!-- Navbar Items Centered with Hover Underline -->
    <ul class="nav justify-content-center mb-0 custom-nav">
        <li class="nav-item">
            <a href="#hero" class="nav-link text-white px-3">How it works?</a>
        </li>
        <li class="nav-item">
            <a href="#about" class="nav-link text-white px-3">Explore</a>
        </li>
        <li class="nav-item">
            <a href="#features" class="nav-link text-white px-3">Find freelancers</a>
        </li>
        <li class="nav-item">
            <a href="#team" class="nav-link text-white px-3">Find work</a>
        </li>
        <li class="nav-item">
            <a href="#pricing" class="nav-link text-white px-3">Pricing</a>
        </li>
    </ul>


    <!-- Auth Buttons -->
    <div class="ms-4 d-flex align-items-center">
        <a href="/auth" class="text-success me-3 text-decoration-none fw-semibold">Log in</a>
        <a href="/registerType" class="btn btn-success rounded-pill px-4 py-2 fw-semibold">Sign Up</a>
    </div>
</nav>
