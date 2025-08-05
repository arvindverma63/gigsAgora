<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FreelancerPageController extends Controller
{
    public function dashboard(){
        return view('freelancer.dashboard');
    }
}
