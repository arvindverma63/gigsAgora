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

        // Call API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $authData['token'],
            'Accept' => 'application/json',
        ])->put($baseUrl . 'api/Freelancer/UpdateProfile', [
                    "fullName" => $request['fullName'],
                    "bio" => $request['bio'],
                    "address" => $request['address'],
                    "postalCode" => $request['postalCode'],
                    "country" => $request['country'],
                    "city" => $request['city'],
                    "phoneNumber" => $request['phoneNumber'],
                    "email" => $request['email'],
                    "websiteUrl" => $request['websiteUrl'],
                    "hourlyRate" => $request['hourlyRate'] ?? 0,
                    "experienceLevel" => $request['experienceLevel'] ?? 0,
                    "availabilityStatus" => $request['availablilityStatus'] ?? 0,
                    "languages" => $request['languages']
                ]);

        return $response->json(); // if you want to return to frontend
    }


    public function updateSkills(Request $request)
    {
        // log payload
        Log::info('request update skill payload =>', $request->all());

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


        Log::info('response =>', ['response ' => $baseUrl . '/api/Common/GetSkills?keyword=' . $keyword]);
        return $response->json();
    }

    public function updateImage(Request $request)
    {
        $authData = Session::get("auth_data");
        $baseUrl = env('API_BASE_URL');

        // Validate the uploaded file
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Send file to API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $authData['token'],
            'Accept' => 'application/json',
        ])->attach(
                'file',                // field name expected by API
                file_get_contents($request->file('file')->getRealPath()),
                $request->file('file')->getClientOriginalName()
            )->post($baseUrl . 'api/Freelancer/UpdateProfileImage');

        return $response->json();
    }


}
