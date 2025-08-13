<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class Proposals{
    public function getAllProposal($id){
        $authData = Session::get('auth_data');
        $baseUrl = env('API_BASE_URL');
        $response = Http::withHeaders([
            'Authorization'=>'Bearer '.$authData['token'],
        ])->get($baseUrl.'api/Freelancer/GetJobProposals?jobProposalStatus='.$id);

        return $response->json();
    }
}
