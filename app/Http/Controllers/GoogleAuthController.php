<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class GoogleAuthController extends Controller
{
    public function login(Request $request)
    {
        $token = $request->input('token');

        // Verify the ID token with Google
        $googleResponse = Http::get('https://oauth2.googleapis.com/tokeninfo', [
            'id_token' => $token,
        ]);

        if (!$googleResponse->successful()) {
            return response()->json(['error' => 'Invalid ID token'], 401);
        }

        $baseUrl = env('API_BASE_URL');
        $googleUser = $googleResponse->json();
        if ($googleUser) {
            $response = Http::post($baseUrl . "api/Authenticate/externallogin", [
                'idtoken' => $token,
                'provider' => 'google',
                'userRole' => 0,
            ]);

            if ($response->successful()) {
                Session::put('auth_data', [
                    'token' => $response['token'],
                    'expiration' => $response['expiration'],
                    'username' => $response['username'],
                    'userid' => $response['userid'],
                    'role' => $response['role'],
                    'fullname' => $response['fullname'],
                    'email' => $response['email'],
                    'emailConfirmed' => $response['emailConfirmed'],
                    'phone' => $response['phone'],
                    'phoneConfirmed' => $response['phoneConfirmed'],
                    'twoFactorEnabled' => $response['twoFactorEnabled']
                ]);
            }

            if ($response) {
                return response()->json([
                    'data' => $response->json(),
                    'userData' => $googleResponse->json()
                ], 200);
            }
        }
    }
}
