<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class Common
{
    protected $authData;
    protected $baseUrl;

    public function __construct()
    {
        $this->authData = Session::get('auth_data');
        $this->baseUrl = env('API_BASE_URL');
    }

    public function addRemoveFav($jobId, $add = true)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->authData['token'],
        ])->post($this->baseUrl . '/api/Common/AddRemoveFavoriteJob', [
            'jobId' => $jobId,
            'add'   => $add,
        ]);

        return $response->json();
    }
}
