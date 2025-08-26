<?php

namespace App\Http\Controllers;

use App\Services\Jobs;
use App\Services\Proposals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FreelancerPageController extends Controller
{
    public function dashboard(Jobs $jobs){
        Log::info('response data: ',['data '=>$jobs]);
        return view('freelancer.dashboard',['data'=>$jobs->getAllJobs()]);
    }
    public function jobView(Jobs $jobs,$id){
        $data = $jobs->getJobById($id);
        return view('freelancer.job-view',['data'=>$data]);
    }
    public function allJobProposals(Proposals $proposals){
        return view('freelancer.view-all-proposals',['proposals'=>$proposals->getAllJobProposals()]);
    }
}
