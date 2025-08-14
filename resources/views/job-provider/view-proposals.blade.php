<!DOCTYPE html>
<html lang="en">
@include('job-provider.partials.head')

<body class="bg-light">
    @include('job-provider.partials.navbar')

    <style>
        .card-custom {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
            width: 100%;
        }

        .card-custom:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .profile-section {
            display: flex;
            align-items: center;
        }

        .profile-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 1rem;
        }

        .star-rating {
            color: #ffb300;
            font-size: 0.9rem;
            margin-bottom: 0.2rem;
        }

        .badge-custom {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
        }

        .btn-custom {
            padding: 0.3rem 0.7rem;
            font-size: 0.85rem;
            margin-right: 0.5rem;
        }

        .card-text {
            font-size: 0.9rem;
            color: #555;
            line-height: 1.4;
        }

        h5.card-title {
            font-size: 1.1rem;
            margin-bottom: 0.3rem;
            font-weight: 600;
        }

        h4 {
            font-size: 1.2rem;
            margin-bottom: 0.3rem;
        }

        .text-muted {
            font-size: 0.8rem;
        }

        .btn-primary,
        .btn-success {
            border: none;
        }

        .status-icons {
            font-size: 0.9rem;
            color: #28a745;
        }

        .top-preferred {
            background-color: #ffcc00;
            color: #333;
            padding: 0.1rem 0.4rem;
            border-radius: 3px;
            font-size: 0.7rem;
            margin-left: 0.5rem;
        }
    </style>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="profile-section">
                            <img src="https://t4.ftcdn.net/jpg/02/29/75/83/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg"
                                alt="Profile" class="profile-image">
                            <div>
                                <h5 class="card-title">Gaurav Garg <span
                                        class="badge bg-success badge-custom">@gauravgarcs</span> <span
                                        class="top-preferred">Top 1% Preferred</span></h5>
                                <p class="text-muted mb-1">India</p>
                                <div class="star-rating">
                                    ★★★★★ <span class="text-muted">4.9 (470) 98%</span>
                                </div>
                                <p class="card-text">Hi there, I hope you are doing well. I am Gaurav, I have 9+
                                    years of exp. in the domain called WordPress. You require a robust
                                    WordPress-based application to streamline core school administrative processes.
                                    The system should manage student information efficiently, track grades, generate
                                    progress reports, and produce customizable report cards...</p>
                            </div>
                        </div>
                        <div>
                            <h4>₹1,200.00 INR per hour</h4>
                            <p class="text-muted">Replies within a few hours</p>
                            <div class="d-flex align-items-center mt-2">
                                <button class="btn btn-success btn-custom">Chat</button>
                                <a href="/acceptJobOffer/{{$data['id']}}" class="btn btn-primary btn-custom">Award</a>
                                <div class="status-icons ms-2">
                                    <i class="fas fa-check-circle"></i> <i class="fas fa-check-circle"></i> <i
                                        class="fas fa-check-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('job-provider.partials.js')
</body>

</html>
