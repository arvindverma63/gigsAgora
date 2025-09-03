<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobber's Park - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-white flex flex-col min-h-screen">

    <!-- Navbar -->
    <header class="bg-black p-4">
        <div class="container mx-auto flex items-center">
            <h1 class="text-white text-xl font-bold">
                <img src="{{asset('website/assets/img/logo-2.png')}}" style="height: 50px;"/>
            </h1>
        </div>
    </header>

    <!-- Login Section -->
    <main class="flex-grow flex items-center justify-center">
        <div class="w-full max-w-md p-6">

            <!-- Heading -->
            <p class="text-gray-400 uppercase text-sm tracking-wide">Log In</p>
            <h2 class="text-2xl font-bold text-blue-900 mb-6">Enter Your Login Details</h2>

            <!-- Login Form -->
            <form action="/auth/login" method="POST" class="space-y-6">
                @csrf

                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-900 mb-2">
                        Username or Email
                    </label>
                    <div class="flex items-center space-x-3">
                        <span
                            class="flex items-center justify-center bg-green-50 text-green-500 w-10 h-10 rounded-full">
                            <i class="fa-regular fa-envelope"></i>
                        </span>
                        <input type="text" name="username" id="username" required
                            class="flex-1 border border-gray-200 rounded-md px-3 py-2 bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-300">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-900 mb-2">
                        Password
                    </label>
                    <div class="flex items-center space-x-3">
                        <span
                            class="flex items-center justify-center bg-green-50 text-green-500 w-10 h-10 rounded-full">
                            <i class="fa-solid fa-asterisk"></i>
                        </span>
                        <input type="password" name="password" id="password" required
                            class="flex-1 border border-gray-200 rounded-md px-3 py-2 bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-300">
                    </div>
                </div>

                <!-- Login Button -->
                <button type="submit"
                    class="w-full bg-green-400 hover:bg-green-500 text-white py-3 px-4 rounded-full shadow border border-black">
                    Log In
                </button>
            </form>

            <!-- Divider -->
            <div class="text-center my-6">
                <span class="text-blue-900 font-semibold">Or</span>
            </div>

            <!-- Social Logins -->
            <div class="space-y-3">
                <!-- Google Sign-In -->
                <div class="mt-4 flex justify-center">
                    <!-- Google script -->
                    <script src="https://accounts.google.com/gsi/client" async defer></script>

                    <!-- Google Init -->
                    <div id="g_id_onload"
                        data-client_id="705511941354-0ocfpf3uv26mg2rnvpal2c957c4krr51.apps.googleusercontent.com"
                        data-callback="handleCredentialResponse" data-auto_prompt="false">
                    </div>

                    <!-- Custom Google Button -->
                    <button type="button" onclick="google.accounts.id.prompt()"
                        class="w-full flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-full shadow border border-black">
                        <i class="fab fa-google mr-2"></i> Continue with Google
                    </button>
                </div>


                <!-- Facebook -->
                <button type="button"
                    class="w-full flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-full shadow border border-black">
                    <i class="fab fa-facebook-f mr-2"></i> Continue with Facebook
                </button>

                <!-- Apple -->
                <button type="button"
                    class="w-full flex items-center justify-center bg-white text-black py-3 rounded-full shadow border border-black">
                    <i class="fab fa-apple mr-2"></i> Continue with Apple
                </button>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-black text-white py-4 text-center text-sm">
        <p>
            © Copyright <span class="font-bold text-green-500">Jobber's Park</span> All Rights Reserved <br>
            Designed & distributed by
            <a href="#" class="text-green-400 hover:underline">Backend Coders India</a>
        </p>
    </footer>
    <script>
        function handleCredentialResponse(response) {
            const id_token = response.credential;
            fetch('/google-login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        token: id_token
                    })
                })
                .then(async (res) => {
                    const contentType = res.headers.get("content-type");
                    if (contentType && contentType.indexOf("application/json") !== -1) {
                        const data = await res.json();
                        console.log(data);
                        if (data.data.role === "Freelancer") {
                            window.location.href = "/dashboard";
                        }
                        if (data.data.role === "JobProvider") {
                            window.location.href = "/job-provider/dashboard";
                        }
                        if (data.data.status === "Error") {
                            window.location.href = "/registerType";
                        }
                    } else {
                        const text = await res.text();
                        console.error("Non-JSON response:", text);
                        alert("Server error: " + text);
                    }
                })
                .catch(error => {
                    console.error("Fetch failed:", error);
                });
        }
    </script>

</body>

</html>
