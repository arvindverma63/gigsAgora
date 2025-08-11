<!DOCTYPE html>
<html lang="en">
@include('freelancer.partials.head')

<body>
    @include('freelancer.partials.navbar')

    <div class="main" style="padding-top: 60px;">
        <div class="container my-4 job-container mt-4">
            @foreach ($data as $d)
                <div class="card p-3 shadow-sm">
                    <div class="row">
                        <!-- Left Column: Title & Description -->
                        <div class="col-md-9">
                            <h6 class="fw-bold text-primary mb-1">
                                {{$d['title']}}
                            </h6>
                            <p class="mb-1 text-primary small">Budget $250 – 750 USD</p>
                            <p class="text-muted small mb-2">
                                Software Developer Needed to Hardcode Local Software for Secure Offline Use (No Internet
                                Callback) Project Summary: We’re seeking a highly skilled and ethical software developer
                                to
                                modify an existing desktop application that currently performs an automatic internet
                                callback on
                                launch. When the software doesn't receive a response from the callback... <a
                                    href="#" class="text-decoration-none">more</a>
                            </p>

                            <!-- Tags -->
                            <div class="mb-2">
                                <span class="badge bg-light text-primary border me-1">C Programming</span>
                                <span class="badge bg-light text-primary border me-1">.NET</span>
                                <span class="badge bg-light text-primary border me-1">C# Programming</span>
                                <span class="badge bg-light text-primary border me-1">Software Architecture</span>
                                <span class="badge bg-light text-primary border me-1">Software Testing</span>
                                <span class="badge bg-light-success text-primary border me-1">Web Development</span>
                            </div>

                            <!-- Rating and Time -->
                            <div class="d-flex align-items-center flex-wrap small text-muted">
                                <span class="text-pink me-2">
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-pink"></i>
                                    <i class="fa-solid fa-star text-pink"></i>
                                    <i class="fa-solid fa-star text-pink"></i>
                                    <i class="fa-solid fa-star text-pink"></i>
                                </span>
                                <span class="me-3" style="font-size: 14px;"><strong>1.0</strong></span>
                                <span class="me-3 text-danger" style="font-size: 14px;"><i
                                        class="fa-solid fa-comment-dots"></i> 11</span>
                                <span style="font-size: 14px;">1 hour ago</span>
                                <span class="badge level">Intermediate</span>
                                <span class="badge sponsered">Sponsored</span>
                            </div>
                        </div>

                        <!-- Right Column: Bids & Budget -->
                        <div class="col-md-3 text-md-end text-start mt-3 mt-md-0">
                            <p class="mb-1 text-muted small">68 Applied</p>
                            <p class="mb-0 fw-bold text-dark">
                                <span class="fs-5 text-success">${{$d['amount']}}</span> INR<br>
                                <span class="small text-muted">average bid</span>
                            </p>
                            <div class="mt-2">
                                <i class="fa-regular fa-heart text-muted"></i>
                            </div>
                            <button type="button" class="btn btn-primary mt-4"><i class="fa-regular fa-circle-check"
                                    style="font-size: 22px; vertical-align: middle;"></i> Apply</button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


</body>
@include('freelancer.partials.js')

</html>
