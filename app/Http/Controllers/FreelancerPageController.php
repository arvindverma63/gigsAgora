<?php

namespace App\Http\Controllers;

use App\Services\Jobs;
use Illuminate\Http\Request;

class FreelancerPageController extends Controller
{
    public function dashboard(Jobs $jobs){
        return view('freelancer.dashboard',['data'=>$jobs->getAllJobs()]);
    }
    public function jobView(Jobs $jobs,$id){
        $data = $jobs->getJobById($id);
        return view('freelancer.job-view',['data'=>$data]);
    }
}
