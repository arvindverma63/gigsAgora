<!DOCTYPE html>
<html lang="en">

@include('website.partials.head')

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('website/assets/img/logo-2.png') }}" style="height: 80px;" alt="">
            </a>

            @include('website.partials.navbar')
        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <img src="{{ asset('website/assets/img/Banner_Contrast_Logo.png') }}" alt="" class="hero-bg mt-4">

            <div class="container">
                <div class="row gy-4 justify-content-between">
                    <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
                        {{-- <img src="{{ asset('website/assets/img/hero-img.png') }}" class="img-fluid animated"
                            alt=""> --}}
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-in">

                    </div>
                </div>
            </div>

            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28" preserveAspectRatio="none">
                <defs>
                    <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                    </path>
                </defs>
                <g class="wave1">
                    <use xlink:href="#wave-path" x="50" y="3"></use>
                </g>
                <g class="wave2">
                    <use xlink:href="#wave-path" x="50" y="0"></use>
                </g>
                <g class="wave3">
                    <use xlink:href="#wave-path" x="50" y="9"></use>
                </g>
            </svg>
        </section>
        <!-- /Hero Section -->


        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-xl-center gy-5">
                     <img src="{{ asset('website/assets/img/bg-main.png') }}" alt="" class="hero-bg mt-4">

                </div>
            </div>

        </section><!-- /About Section -->

        <style>
            .map-container {
                position: relative;
                width: 100%;
                height: 500px;
                background: #f8f9fa;
                border: 1px solid #dee2e6;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            #map {
                width: 100%;
                height: 100%;
                border-radius: 8px;
            }

            .zoom-buttons {
                position: absolute;
                top: 10px;
                left: 10px;
                display: flex;
                flex-direction: column;
                gap: 5px;
            }

            .zoom-buttons button {
                width: 40px;
                height: 40px;
                font-size: 18px;
                font-weight: bold;
                border: none;
                background-color: #007bff;
                color: #fff;
                border-radius: 4px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                cursor: pointer;
            }

            .zoom-buttons button:hover {
                background-color: #0056b3;
            }
        </style>
        <div class="container my-4">
            <h3 class="text-center mb-3">Real-Time Map</h3>
            <div class="map-container">
                <!-- Map will go here -->
                <div id="map"></div>
                <!-- Zoom Buttons -->
                <div class="zoom-buttons">
                    <button id="zoom-in">+</button>
                    <button id="zoom-out">-</button>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <section id="features" class="features section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="features-item">
                            <i class="bi bi-eye" style="color: #ffbb2c;"></i>
                            <h3><a href="" class="stretched-link">Lorem Ipsum</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="features-item">
                            <i class="bi bi-infinity" style="color: #5578ff;"></i>
                            <h3><a href="" class="stretched-link">Dolor Sitema</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="features-item">
                            <i class="bi bi-mortarboard" style="color: #e80368;"></i>
                            <h3><a href="" class="stretched-link">Sed perspiciatis</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="features-item">
                            <i class="bi bi-nut" style="color: #e361ff;"></i>
                            <h3><a href="" class="stretched-link">Magni Dolores</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="features-item">
                            <i class="bi bi-shuffle" style="color: #47aeff;"></i>
                            <h3><a href="" class="stretched-link">Nemo Enim</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
                        <div class="features-item">
                            <i class="bi bi-star" style="color: #ffa76e;"></i>
                            <h3><a href="" class="stretched-link">Eiusmod Tempor</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
                        <div class="features-item">
                            <i class="bi bi-x-diamond" style="color: #11dbcf;"></i>
                            <h3><a href="" class="stretched-link">Midela Teren</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
                        <div class="features-item">
                            <i class="bi bi-camera-video" style="color: #4233ff;"></i>
                            <h3><a href="" class="stretched-link">Pira Neve</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="900">
                        <div class="features-item">
                            <i class="bi bi-command" style="color: #b2904f;"></i>
                            <h3><a href="" class="stretched-link">Dirada Pack</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1000">
                        <div class="features-item">
                            <i class="bi bi-dribbble" style="color: #b20969;"></i>
                            <h3><a href="" class="stretched-link">Moton Ideal</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1100">
                        <div class="features-item">
                            <i class="bi bi-activity" style="color: #ff5828;"></i>
                            <h3><a href="" class="stretched-link">Verdo Park</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1200">
                        <div class="features-item">
                            <i class="bi bi-brightness-high" style="color: #29cc61;"></i>
                            <h3><a href="" class="stretched-link">Flavor Nivelanda</a></h3>
                        </div>
                    </div><!-- End Feature Item -->

                </div>

            </div>

        </section><!-- /Features Section -->


        <!-- Pricing Section -->
        <section id="pricing" class="pricing section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Pricing</h2>
                <div><span>Check Our</span> <span class="description-title">Pricing</span></div>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pricing-item">
                            <h3>Free Plan</h3>
                            <p class="description">Ullam mollitia quasi nobis soluta in voluptatum et sint palora dex
                                strater</p>
                            <h4><sup>$</sup>0<span> / month</span></h4>
                            <a href="#" class="cta-btn">Start a free trial</a>
                            <p class="text-center small">No credit card required</p>
                            <ul>
                                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                                <li class="na"><i class="bi bi-x"></i> <span>Pharetra massa massa ultricies</span>
                                </li>
                                <li class="na"><i class="bi bi-x"></i> <span>Massa ultricies mi quis
                                        hendrerit</span></li>
                                <li class="na"><i class="bi bi-x"></i> <span>Voluptate id voluptas qui sed aperiam
                                        rerum</span></li>
                                <li class="na"><i class="bi bi-x"></i> <span>Iure nihil dolores recusandae odit
                                        voluptatibus</span></li>
                            </ul>
                        </div>
                    </div><!-- End Pricing Item -->

                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="pricing-item featured">
                            <p class="popular">Popular</p>
                            <h3>Business Plan</h3>
                            <p class="description">Ullam mollitia quasi nobis soluta in voluptatum et sint palora dex
                                strater</p>
                            <h4><sup>$</sup>29<span> / month</span></h4>
                            <a href="#" class="cta-btn">Start a free trial</a>
                            <p class="text-center small">No credit card required</p>
                            <ul>
                                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                                <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                                <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
                                <li><i class="bi bi-check"></i> <span>Voluptate id voluptas qui sed aperiam
                                        rerum</span></li>
                                <li class="na"><i class="bi bi-x"></i> <span>Iure nihil dolores recusandae odit
                                        voluptatibus</span></li>
                            </ul>
                        </div>
                    </div><!-- End Pricing Item -->

                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                        <div class="pricing-item">
                            <h3>Developer Plan</h3>
                            <p class="description">Ullam mollitia quasi nobis soluta in voluptatum et sint palora dex
                                strater</p>
                            <h4><sup>$</sup>49<span> / month</span></h4>
                            <a href="#" class="cta-btn">Start a free trial</a>
                            <p class="text-center small">No credit card required</p>
                            <ul>
                                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                                <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                                <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
                                <li><i class="bi bi-check"></i> <span>Voluptate id voluptas qui sed aperiam
                                        rerum</span></li>
                                <li><i class="bi bi-check"></i> <span>Iure nihil dolores recusandae odit
                                        voluptatibus</span></li>
                            </ul>
                        </div>
                    </div><!-- End Pricing Item -->

                </div>

            </div>

        </section><!-- /Pricing Section -->

        <!-- Faq Section -->
        <section id="faq" class="faq section light-background">

            <div class="container-fluid">

                <div class="row gy-4">

                    <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

                        <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
                            <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et
                                dolore magna aliqua. Duis aute irure dolor in reprehenderit
                            </p>
                        </div>

                        <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

                            <div class="faq-item faq-active">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                                <div class="faq-content">
                                    <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus
                                        laoreet non curabitur
                                        gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus
                                        non.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h3>
                                <div class="faq-content">
                                    <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                        interdum velit laoreet
                                        id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec
                                        pretium. Est pellentesque
                                        elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa
                                        tincidunt dui.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                                <div class="faq-content">
                                    <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci.
                                        Faucibus pulvinar
                                        elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum
                                        tellus pellentesque
                                        eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at
                                        elementum eu facilisis
                                        sed odio morbi quis</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                        </div>

                    </div>

                    <div class="col-lg-5 order-1 order-lg-2">
                        <img src="assets/img/faq.jpg" class="img-fluid" alt="" data-aos="zoom-in"
                            data-aos-delay="100">
                    </div>
                </div>

            </div>

        </section><!-- /Faq Section -->


    </main>

    @include('website.partials.footer')
    @include('website.partials.js')
</body>

</html>
