<style>
    .portfolio-card {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
        background-color: #fff;
        height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .portfolio-title {
        color: #0F1419;
        /* Neutral dark gray for heading */
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
    }

    .portfolio-subtitle {
        color: #536471;
        /* Grayish tone for subtitles */
        font-size: 1rem;
        margin-bottom: 0.25rem;
    }

    .text-muted {
        color: #536471 !important;
        /* Matching muted text color */
    }

    .portfolio-text {
        color: #0F1419;
        /* Dark gray for body text */
        font-size: 0.875rem;
        flex-grow: 1;
    }

    .tool-badge {
        background-color: #f0f0f0;
        /* Neutral gray background for tags */
        color: #0F1419;
        /* Dark gray for tag text */
        border-radius: 12px;
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
        margin-right: 0.5rem;
    }

    .date-text {
        color: #536471;
        /* Grayish tone for dates */
        font-size: 0.75rem;
    }

    .row>.col {
        padding: 0.5rem;
    }
</style>
<div class="mt-4">
    <h5 class="portfolio-title">Portfolio</h5>
    <p class="text-muted mb-4">Showcase your best work</p>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="portfolio-card">
                <h6 class="portfolio-subtitle">E-commerce Mobile App Design</h6>
                <p class="portfolio-text">Complete UI/UX design for a modern e-commerce application. Included user
                    research...</p>
                <div class="mt-2">
                    <span class="tool-badge">Figma</span>
                    <span class="tool-badge">Adobe XD</span>
                    <span class="text-muted">+2</span>
                </div>
                <p class="date-text mt-2">December 2023</p>
            </div>
        </div>
        <div class="col">
            <div class="portfolio-card">
                <h6 class="portfolio-subtitle">SaaS Dashboard Interface</h6>
                <p class="portfolio-text">Redesigned the main dashboard for a B2B SaaS platform, focused on improving
                    data visualization...</p>
                <div class="mt-2">
                    <span class="tool-badge">Figma</span>
                    <span class="tool-badge">React</span>
                    <span class="text-muted">+2</span>
                </div>
                <p class="date-text mt-2">October 2023</p>
            </div>
        </div>
        <div class="col">
            <div class="portfolio-card">
                <h6 class="portfolio-subtitle">Brand Identity & Logo Design</h6>
                <p class="portfolio-text">Complete brand identity design for a startup including logo, color palette,
                    typography, and bra...</p>
                <div class="mt-2">
                    <span class="tool-badge">Adobe Illustrator</span>
                    <span class="tool-badge">Adobe Photoshop</span>
                    <span class="text-muted">+1</span>
                </div>
                <p class="date-text mt-2">September 2023</p>
            </div>
        </div>
        <div class="col">
            <div class="portfolio-card">
                <h6 class="portfolio-subtitle">Brand Identity & Logo Design</h6>
                <p class="portfolio-text">Complete brand identity design for a startup including logo, color palette,
                    typography, and bra...</p>
                <div class="mt-2">
                    <span class="tool-badge">Adobe Illustrator</span>
                    <span class="tool-badge">Adobe Photoshop</span>
                    <span class="text-muted">+1</span>
                </div>
                <p class="date-text mt-2">September 2023</p>
            </div>
        </div>
    </div>
</div>
