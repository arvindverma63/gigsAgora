<?php

namespace App\Services;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class Profile
{
    public function getProfile()
    {
        $authData = Session::get("auth_data");
        $baseUrl = env('API_BASE_URL');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $authData['token'],
        ])->get($baseUrl . 'api/Freelancer/Profile');

        return $response->json();
    }

    public function updateProfile(Request $request)
    {
        $authData = Session::get("auth_data");
        $baseUrl = env('API_BASE_URL');

        // Validate request
        $validated = $request->validate([
            'fullName' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'profileImageUrl' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'postalCode' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'phoneNumber' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'websiteUrl' => 'nullable|url|max:255',
            'hourlyRate' => 'nullable|numeric|min:0',
            'experienceLevel' => 'nullable|integer|min:0',
            'availabilityStatus' => 'nullable|integer|min:0',
            'languages' => 'nullable|string',
            'isActive' => 'nullable|boolean',
        ]);

        // Call API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $authData['token'], // adjust if token structure different
            'Accept' => 'application/json',
        ])->post($baseUrl . 'api/Freelancer/UpdateProfile', $validated);

        return $response->json();
    }

    public function updateSkills(Request $request)
    {
        $authData = Session::get("auth_data");
        $baseUrl = env('API_BASE_URL');

        // Call API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $authData['token'], // adjust if token structure different
            'Accept' => 'application/json',
        ])->post($baseUrl . 'api/Freelancer/UpdateSkills', $request[]);

        return $response->json();
    }

    public function skillSuggestions($request)
    {
        $authData = Session::get("auth_data");
        $baseUrl = env('API_BASE_URL');

        // Call API with query param
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $authData['token'],
            'Accept' => '*/*',
        ])->get($baseUrl . '/api/Common/GetSkills?keyword='.$request);

        Log::info('response suggestions', [
            'suggestions_api_url' => $baseUrl.'api/Common/GetSkills?keyword='.$request,
            'keyword' => $request,
            'response' => $response->json()
        ]);

        return $response->json();
    }

}
