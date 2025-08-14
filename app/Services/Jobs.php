<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class Jobs
{
    protected $authData;
    protected $baseUrl;

    public function __construct()
    {
        $this->authData = Session::get('auth_data');
        $this->baseUrl = env('API_BASE_URL');
    }

    public function getAllJobs()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->authData['token'],
        ])->get($this->baseUrl . 'api/Freelancer/FindJobOffers');

        return $response->json();
    }
    public function getJobById($id){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->authData['token'],
        ])->get($this->baseUrl.'api/Freelancer/GetJobOffer?jobId='.$id);
        return $response->json();
    }

    public function myJobOffers(){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->authData['token'],
        ])->get($this->baseUrl.'api/JobProvider/GetAllJobOffers');
        return $response->json();
    }
}
