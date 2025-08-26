<!DOCTYPE html>
<html lang="en">
@include('freelancer.partials.head')

<body>
    @include('freelancer.partials.navbar')
    <style>
        /* ===== Job Card Styling to Match Image ===== */
        .job-card {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 16px;
            background: #fff;
            transition: box-shadow 0.2s;
        }

        .job-card:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .job-title {
            font-size: 16px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 6px;
        }

        .badge-featured {
            background: #16a34a;
            color: #fff;
            font-size: 12px;
            margin-right: 6px;
        }

        .badge-urgent {
            background: #ef4444;
            color: #fff;
            font-size: 12px;
        }

        .job-description {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 8px;
        }

        .skill-badge {
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            font-size: 12px;
            font-weight: 500;
            color: #111827;
            margin: 2px;
            border-radius: 6px;
            padding: 4px 8px;
        }

        .rating {
            color: #fbbf24;
            font-size: 14px;
            margin-right: 4px;
        }

        .rating strong {
            color: #111827;
        }

        .verified {
            background: #d1fae5;
            color: #065f46;
            font-size: 12px;
            font-weight: 600;
            border-radius: 6px;
            padding: 2px 6px;
            margin: 0 6px;
        }

        .budget {
            font-size: 18px;
            font-weight: 600;
            color: #16a34a;
            margin-bottom: 2px;
        }

        .budget-type {
            font-size: 13px;
            color: #6b7280;
        }

        .job-meta {
            font-size: 13px;
            color: #6b7280;
            margin-top: 4px;
        }

        .apply-btn {
            font-size: 14px;
            padding: 6px 14px;
            border-radius: 8px;
            margin-top: 10px;
        }
    </style>
    <div class="main" style="padding-top: 60px;">
        <div class="container my-4 job-container mt-4">
            @foreach ($data as $d)
                <div class="job-card">
                    <div class="d-flex justify-content-between flex-wrap">

                        <!-- LEFT -->
                        <div class="flex-grow-1 pe-3" data-bs-toggle="offcanvas"
                            data-bs-target="#jobDetails{{ $d['id'] }}" aria-controls="jobDetails{{ $d['id'] }}">

                            <h6 class="job-title">{{ $d['title'] }}</h6>

                            <!-- Featured & Urgent -->
                            <div class="mb-2">
                                <span class="badge badge-featured">Featured</span>
                                <span class="badge badge-urgent">Urgent</span>
                            </div>

                            <!-- Description -->
                            <p class="job-description">
                                {{ Str::limit($d['description'], 150, '...') }}
                                <a href="#" class="text-decoration-none">More</a>
                            </p>

                            <!-- Skills -->
                            <div class="mb-2">
                                @foreach ($d['skillsRequired'] as $s)
                                    <span class="skill-badge">{{ $s }}</span>
                                @endforeach
                            </div>

                            <!-- Rating, Verified, Remote, Time -->
                            <div class="d-flex align-items-center flex-wrap small text-muted">
                                <span class="rating">
                                    ★ <strong>{{ $d['rating'] ?? '4.8' }}</strong>
                                    ({{ $d['reviews'] ?? '47' }})
                                </span>
                                <span class="verified">Verified</span>
                                <span class="me-3"><i class="fa-solid fa-location-dot"></i> Remote</span>
                                <span>
                                    {{ !empty($d['createdAt']) ? \Carbon\Carbon::parse($d['createdAt'])->diffForHumans() : 'N/A' }}
                                </span>

                            </div>
                        </div>

                        <!-- RIGHT -->
                        <div class="text-md-end mt-3 mt-md-0" style="min-width: 200px;">
                            <p class="budget">${{ $d['amount'] }}</p>
                            <p class="budget-type">Fixed Price</p>
                            <button type="button" class="btn btn-primary apply-btn">
                                <i class="fa-regular fa-circle-check me-1"></i> Apply
                            </button>
                        </div>
                    </div>
                </div>

                @include('freelancer.components.job-offcanvas', ['offcanvasId' => 'jobDetails' . $d['id']])
            @endforeach

        </div>
    </div>


</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".fav-icon").forEach(function(icon) {
            icon.addEventListener("click", function(e) {
                e.stopPropagation();

                let jobId = this.dataset.jobid;
                if (!jobId) {
                    console.error("⚠️ Job ID missing on fav icon");
                    return;
                }

                let isFav = this.dataset.fav === "true";
                let add = !isFav;

                fetch(`/favorite/${jobId}/${add}`, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector(
                                'meta[name="csrf-token"]').content,
                            "Accept": "application/json"
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (add) {
                            this.classList.remove("fa-regular", "text-muted");
                            this.classList.add("fa-solid", "text-danger");
                            this.dataset.fav = "true";
                        } else {
                            this.classList.remove("fa-solid", "text-danger");
                            this.classList.add("fa-regular", "text-muted");
                            this.dataset.fav = "false";
                        }
                    })
                    .catch(err => console.error("Error:", err));
            });
        });
    });
</script>

@include('freelancer.partials.js')

</html>
