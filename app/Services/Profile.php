<?php

namespace App\Services;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class Profile{
    public function getProfile(){
        $authData = Session::get("auth_data");
        $baseUrl = env('API_BASE_URL');

        $response = Http::withHeaders([
            'Authorization'=>'Bearer '.$authData['token'],
        ])->get($baseUrl.'/api/Freelancer/Profile');

        return $response->json();
    }

    public function updateProfile(Request $request){

    }
}
