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
        ])->put($baseUrl . 'api/Freelancer/UpdateProfile', $request->all());

        return $response->json(); // if you want to return to frontend
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
