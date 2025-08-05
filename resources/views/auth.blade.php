<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication - Upwork Inspired</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .upwork-blue {
            background-color: #1D4ED8;
        }

        .upwork-blue:hover {
            background-color: #1E40AF;
        }

        input:focus {
            box-shadow: 0 0 0 3px rgba(29, 78, 216, 0.2);
            transition: all 0.2s ease;
        }

        button {
            transition: all 0.2s ease;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans">
    <div class="w-full max-w-lg bg-white rounded-xl shadow-lg p-8">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Log in to YourApp</h2>
        </div>

        <!-- Login Form -->
        <form action="/auth/login" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="username" class="block text-sm font-medium text-gray-900">Username or Email</label>
                <input type="text" name="username" id="username"
                    class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-gray-900 focus:outline-none"
                    required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                <input type="password" name="password" id="password"
                    class="mt-1 mb-8 block w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
                <button type="submit"
                    class="w-full upwork-blue text-white py-3 px-4 rounded-lg hover:bg-blue-700 focus:outline-none">Continue</button>
        </form>
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">or</p>
            <div id="g_id_onload"
                data-client_id="705511941354-0ocfpf3uv26mg2rnvpal2c957c4krr51.apps.googleusercontent.com"
                data-callback="handleCredentialResponse" data-auto_prompt="false">
            </div>
            <div class="g_id_signin" data-type="standard" data-size="large" data-theme="outline"
                data-text="sign_in_with" data-shape="rectangular" data-logo_alignment="left" class="mt-4"></div>
            <button type="button"
                class="w-full bg-gray-100 text-gray-800 py-3 px-4 rounded-lg hover:bg-gray-200 mt-4 flex items-center justify-center">
                <i class="fab fa-apple w-5 h-5 mr-2"></i> Continue with Apple
            </button>
        </div>
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-500">Don't have a YourApp account?</p>
            <a href="/registerType" class="text-blue-600 hover:underline mt-2 block">Sign Up</a>
        </div>
    </div>

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
                        alert(data.message || "Login successful!");
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
