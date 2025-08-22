    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>
    <!-- Vendor JS Files -->
    <script src="{{ asset('website/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('website/assets/vendor/php-email-form/validate.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('website/assets/vendor/aos/aos.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('website/assets/vendor/glightbox/js/glightbox.min.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('website/assets/vendor/purecounter/purecounter_vanilla.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('website/assets/vendor/swiper/swiper-bundle.min.js') }}?v={{ time() }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('website/assets/js/main.js') }}?v={{ time() }}"></script>

    <script>
        // Initialize the map
        var map = L.map('map', {
            center: [26.4499, 80.3319], // Center of Kanpur
            zoom: 13,
            zoomControl: true
        });

        // Add tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Kanpur locations with more temp data
        var locations = [{
                lat: 26.4499,
                lng: 80.3319,
                label: "Kanpur Central Railway Station"
            },
            {
                lat: 26.4724,
                lng: 80.3247,
                label: "Allen Forest Zoo"
            },
            {
                lat: 26.4691,
                lng: 80.3432,
                label: "JK Temple"
            },
            {
                lat: 26.4525,
                lng: 80.3130,
                label: "Nana Rao Park"
            },
            {
                lat: 26.4638,
                lng: 80.3170,
                label: "Moti Jheel"
            },
            {
                lat: 26.4449,
                lng: 80.3310,
                label: "Z Square Mall"
            },
            {
                lat: 26.4600,
                lng: 80.3525,
                label: "Phool Bagh"
            },
            {
                lat: 26.4369,
                lng: 80.3495,
                label: "Kanpur Memorial Church"
            },
            {
                lat: 26.5000,
                lng: 80.3000,
                label: "Ganga Barrage"
            },
            {
                lat: 26.4200,
                lng: 80.3500,
                label: "Green Park Stadium"
            }
        ];

        // Add pin markers to the map
        locations.forEach(location => {
            L.marker([location.lat, location.lng]) // default pin icon
                .addTo(map)
                .bindPopup("<b>" + location.label + "</b>");
        });
    </script>
