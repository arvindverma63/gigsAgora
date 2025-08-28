<style>
    .service-card {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
        background-color: #fff;
        height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .service-title {
        color: #1DA1F2;
        /* Blue for heading */
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
    }

    .service-subtitle {
        color: #1DA1F2;
        /* Blue for subtitles */
        font-size: 1rem;
        margin-bottom: 0.25rem;
    }

    .text-muted {
        color: #536471 !important;
        /* Grayish tone for muted text */
    }

    .service-text {
        color: #0F1419;
        /* Dark gray for body text */
        font-size: 0.875rem;
        flex-grow: 1;
    }

    .rating-badge {
        background-color: #E7F0F7;
        /* Light blue background for rating */
        color: #1DA1F2;
        /* Blue for rating text */
        border-radius: 12px;
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
        margin-left: 0.5rem;
    }

    .tool-badge {
        background-color: #E7F0F7;
        /* Light blue background for tags */
        color: #1DA1F2;
        /* Blue for tag text */
        border-radius: 12px;
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
        margin-right: 0.5rem;
    }

    .price-text {
        color: #0F1419;
        font-size: 1rem;
        font-weight: bold;
    }

    .order-btn {
        background-color: #1DA1F2;
        /* Blue for Order Now button */
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        width: 100%;
    }

    .order-btn:hover {
        background-color: #1a91d8;
        /* Slightly darker blue on hover */
    }

    .row>.col {
        padding: 0.5rem;
    }
</style>
<div class="mt-4">
    <h5 class="service-title">Services Catalogue</h5>
    <p class="text-muted mb-4">Manage your service offerings</p>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="service-card">
                <div>
                    <h6 class="service-subtitle d-flex align-items-center">
                        Mobile App UI/UX Design
                        <span class="rating-badge">4.9</span>
                    </h6>
                    <p class="service-text">Complete mobile app design with prototypes</p>
                    <div class="mt-2">
                        <span class="tool-badge">mobile</span>
                        <span class="tool-badge">ui-ux</span>
                        <span class="text-muted">+2</span>
                    </div>
                    <p class="text-muted mt-2">⌀ 47 orders</p>
                </div>
                <div>
                    <p class="price-text">⌀ $750</p>
                    <button class="order-btn mt-2">Order Now</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="service-card">
                <div>
                    <h6 class="service-subtitle d-flex align-items-center">
                        Web Dashboard Design
                        <span class="rating-badge">4.8</span>
                    </h6>
                    <p class="service-text">Modern web dashboard with data visualization</p>
                    <div class="mt-2">
                        <span class="tool-badge">web-design</span>
                        <span class="tool-badge">dashboard</span>
                        <span class="text-muted">+2</span>
                    </div>
                    <p class="text-muted mt-2">⌀ 32 orders</p>
                </div>
                <div>
                    <p class="price-text">⌀ $500</p>
                    <button class="order-btn mt-2">Order Now</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="service-card">
                <div>
                    <h6 class="service-subtitle d-flex align-items-center">
                        Logo & Brand Identity
                        <span class="rating-badge">4.9</span>
                    </h6>
                    <p class="service-text">Professional logo and complete brand identity</p>
                    <div class="mt-2">
                        <span class="tool-badge">logo</span>
                        <span class="tool-badge">branding</span>
                        <span class="text-muted">+2</span>
                    </div>
                    <p class="text-muted mt-2">⌀ 68 orders</p>
                </div>
                <div>
                    <p class="price-text">⌀ $350</p>
                    <button class="order-btn mt-2">Order Now</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="service-card">
                <div>
                    <h6 class="service-subtitle d-flex align-items-center">
                        Logo & Brand Identity
                        <span class="rating-badge">4.9</span>
                    </h6>
                    <p class="service-text">Professional logo and complete brand identity</p>
                    <div class="mt-2">
                        <span class="tool-badge">logo</span>
                        <span class="tool-badge">branding</span>
                        <span class="text-muted">+2</span>
                    </div>
                    <p class="text-muted mt-2">⌀ 68 orders</p>
                </div>
                <div>
                    <p class="price-text">⌀ $350</p>
                    <button class="order-btn mt-2">Order Now</button>
                </div>
            </div>
        </div>
    </div>
</div>
