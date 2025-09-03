<?php

namespace App\Services;

use Illuminate\Http\Request; // ✅ correct import
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
        ])->put($baseUrl . 'api/Freelancer/UpdateProfile', $validated);

        return $response;
    }

    public function updateSkills(Request $request)
    {
        // log payload
        Log::info('request update skill payload : ', $request->all());

        $authData = Session::get("auth_data");
        $baseUrl = env('API_BASE_URL');


        $payload = $request->all();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $authData['token'],
            'Accept' => 'application/json',
        ])->put($baseUrl . 'api/Freelancer/UpdateSkills', $payload);

        return $response->json();
    }


    public function skillSuggestions(string $keyword)
    {
        $authData = Session::get("auth_data");
        $baseUrl = env('API_BASE_URL');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $authData['token'],
            'Accept' => '*/*',
        ])->get($baseUrl . 'api/Common/GetSkills?keyword=' . $keyword);


        Log::info('response : ', ['response ' => $baseUrl . '/api/Common/GetSkills?keyword=' . $keyword]);
        return $response->json();
    }

}
