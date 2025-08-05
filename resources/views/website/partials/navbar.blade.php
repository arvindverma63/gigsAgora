<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="{{ route('website.index') }}" class="logo d-flex align-items-center me-auto">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="{{ asset('website/assets/img/logo.png') }}" alt=""> -->
      <h1 class="sitename">GigsAgora</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ route('website.index') }}">Home</a></li>
        <li><a href="{{ route('website.about') }}">About</a></li>
        <li><a href="{{ route('website.services') }}">Services</a></li>
        <li><a href="{{ route('website.pricing') }}">Pricing</a></li>
        <li><a href="{{ route('website.contact') }}">Contact</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <a class="btn-getstarted" href="/auth">Login</a>

  </div>
</header>
