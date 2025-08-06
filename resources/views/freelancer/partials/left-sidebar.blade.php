<style>
    .left-sidebar {
        width: 320px;
        height: calc(100vh - 56px);
        background-color: #fff;
        padding: 1rem 0.75rem;
        border-right: 1px solid #dee2e6;
        position: fixed;
        left: 0;
        top: 77px;
        overflow-y: auto;
    }

    .left-sidebar h6 {
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .form-control-sm,
    .form-check-label {
        font-size: 13px;
        font-weight: 400;
    }

    .form-check-input {
        margin-top: 0.2rem;
    }

    .category-pills .btn {
        font-size: 12px;
        font-weight: 400;
        padding: 0.25rem 0.6rem;
        margin: 0.25rem 0.25rem 0 0;
        border-radius: 20px;
    }

    .form-range {
        height: 1rem;
    }
</style>

<!-- Left Sidebar -->
<div class="left-sidebar">
    <!-- Search -->
    <div class="mb-3">
        <h6><i class="fas fa-magnifying-glass me-1"></i> Search</h6>
        <input type="text" class="form-control form-control-sm" placeholder="Search jobs...">
    </div>

    <!-- Categories as Pills -->
    <div class="mb-3">
        <h6><i class="fas fa-layer-group me-1"></i> Categories</h6>
        <div class="category-pills d-flex flex-wrap">
            <button type="button" class="btn btn-outline-primary btn-sm">Web Development</button>
            <button type="button" class="btn btn-outline-primary btn-sm">Mobile Apps</button>
            <button type="button" class="btn btn-outline-primary btn-sm">UI/UX Design</button>
            <button type="button" class="btn btn-outline-primary btn-sm">Content Writing</button>
            <button type="button" class="btn btn-outline-primary btn-sm">Marketing</button>
            <button type="button" class="btn btn-outline-primary btn-sm">SEO</button>
            <button type="button" class="btn btn-outline-primary btn-sm">Data & AI</button>
        </div>
    </div>

    <!-- Job Type Filters -->
    <div class="mb-3">
        <h6><i class="fas fa-briefcase me-1"></i> Job Type</h6>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="fixed">
            <label class="form-check-label" for="fixed">Fixed Price</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="hourly">
            <label class="form-check-label" for="hourly">Hourly</label>
        </div>
    </div>

    <!-- Experience Filters -->
    <div class="mb-3">
        <h6><i class="fas fa-user-graduate me-1"></i> Experience Level</h6>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="experience" id="entry" checked>
            <label class="form-check-label" for="entry">Entry</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="experience" id="intermediate">
            <label class="form-check-label" for="intermediate">Intermediate</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="experience" id="expert">
            <label class="form-check-label" for="expert">Expert</label>
        </div>
    </div>

    <!-- Budget Slider -->
    <div class="mb-3">
        <h6><i class="fas fa-dollar-sign me-1"></i>Budget Min</h6>
        <input type="number" class="form-control form-control-sm" placeholder="Budget Min">
    </div>
     <!-- Budget Slider -->
    <div class="mb-3">
        <h6><i class="fas fa-dollar-sign me-1"></i>Budget Max</h6>
        <input type="number" class="form-control form-control-sm" placeholder="Budget Max">
    </div>
</div>
