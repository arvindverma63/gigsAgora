<?php

namespace App\Services;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class Proposals{
    public function getAllProposal($id){
        $authData = Session::get('auth_data');
        $baseUrl = env('API_BASE_URL');
        $response = Http::withHeaders([
            'Authorization'=>'Bearer '.$authData['token'],
        ])->get($baseUrl.'api/JobProvider/ViewJobProposal?jobProposalId='.$id);
        return $response->json();
    }

    public function acceptProposal($id){
        $authData = Session::get('auth_data');
        $baseUrl = env('API_BASE_URL');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$authData['token'],
        ])->get($baseUrl."api/JobProvider/RejectJobProposal?jobProposalId=".$id);

        return $response->json();
    }

    public function getAllJobProposals(){
        $authData = Session::get('auth_data');
        $baseUrl = env('API_BASE_URL');
        $response = Http::withHeaders([
            'Authorization'=>'Bearer '.$authData['token'],
        ])->get($baseUrl."api/Freelancer/GetAllJobProposals");

        return $response->json();
    }

}
