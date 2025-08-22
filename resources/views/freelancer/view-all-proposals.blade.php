<!DOCTYPE html>
<html lang="en">
@include('freelancer.partials.head')

<body>
    @include('freelancer.partials.navbar')

    <div class="main container py-5" style="padding-top: 60px;">
        <h4 class="fw-bold mb-3" style="margin-top: 60px;">
            Submitted proposals ({{ count($proposals) }})
        </h4>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body">
                <div class="list-group list-group-flush">
                    @foreach ($proposals as $proposal)
                        <div class="list-group-item px-0 d-flex justify-content-between align-items-center">

                            <!-- Left: Date -->
                            <div class="me-3 text-nowrap">
                                <small class="text-muted d-block">
                                    Initiated {{ \Carbon\Carbon::parse($proposal['createdAt'])->format('M d, Y') }}
                                </small>
                                <small class="text-muted">
                                    {{ \Carbon\Carbon::parse($proposal['createdAt'])->diffForHumans() }}
                                </small>
                            </div>

                            <!-- Middle: Job Title -->
                            <div class="flex-grow-1 px-3 text-truncate">
                                <a href="#" class="text-success fw-semibold text-decoration-none">
                                    {{ $proposal['title'] ?? 'Untitled Job' }}
                                </a>
                            </div>

                            <!-- Right: Profile -->
                            <div class="text-end text-nowrap">
                                <small class="text-muted">
                                    {{ $proposal['profile'] ?? 'General Profile' }}
                                </small>
                            </div>
                        </div>

                        @if (!$loop->last)
                            <hr class="my-2">
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <style>
        .list-group-item {
            border: none !important;
            background: transparent !important;
            padding: 0.75rem 0;
        }

        a.text-success {
            font-size: 15px;
        }

        a.text-success:hover {
            text-decoration: underline;
        }

        hr.my-2 {
            margin: 0.25rem 0 !important;
            color: #e9ecef;
        }
    </style>

    @include('freelancer.partials.js')
</body>

</html>
