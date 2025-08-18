<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upwork Professional</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .selected {
            background-color: #1D4ED8;
        }

        .selected i,
        .selected p {
            color: white;
        }

        .card:hover {
            background-color: #EFF6FF;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-2xl w-full">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">GigsArora</h1>
            <h2 class="text-lg text-gray-600">Join as a Job Seeker or Freelancer</h2>
        </div>
        <form id="roleForm" class="flex justify-center space-x-4">
            <!-- Job Seeker -->
            <label
                class="card border border-gray-300 rounded-lg p-4 w-64 bg-gray-50 hover:bg-gray-100 transition duration-200 cursor-pointer flex items-center">
                <input type="radio" name="role" value="2" class="hidden" onclick="selectRole(this)">
                <div class="flex flex-col items-center w-full">
                    <i class="fas fa-user-tie text-gray-700 w-6 h-6 mb-2"></i>
                    <p class="text-gray-900 font-medium text-sm text-center">I'm a Job Seeker, Hiring for a Project</p>
                </div>
            </label>
            <!-- Freelancer -->
            <label
                class="card border border-gray-300 rounded-lg p-4 w-64 bg-gray-50 hover:bg-gray-100 transition duration-200 cursor-pointer flex items-center">
                <input type="radio" name="role" value="1" class="hidden" onclick="selectRole(this)">
                <div class="flex flex-col items-center w-full">
                    <i class="fas fa-briefcase text-gray-700 w-6 h-6 mb-2"></i>
                    <p class="text-gray-900 font-medium text-sm text-center">I'm a Freelancer, Looking for Work</p>
                </div>
            </label>
        </form>
        <div class="text-center mt-6">
            <button id="createAccountBtn"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg transition duration-200 font-medium text-base opacity-50 cursor-not-allowed"
                disabled>
                Create Account
            </button>
            <p class="mt-4 text-blue-600"><a href="#" class="hover:underline font-medium text-sm">Already have an
                    account? Log In</a></p>
        </div>
    </div>

    <script>
        let selectedRole = null;

        function selectRole(input) {
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => card.classList.remove('selected'));

            input.parentElement.classList.add('selected');
            selectedRole = input.value;

            // Enable button
            const btn = document.getElementById('createAccountBtn');
            btn.disabled = false;
            btn.classList.remove('opacity-50', 'cursor-not-allowed');
        }

        document.getElementById('createAccountBtn').addEventListener('click', function() {
            if (selectedRole) {
                // Redirect to /register/{id}
                window.location.href = `/register/${selectedRole}`;
            }
        });
    </script>
</body>

</html>
