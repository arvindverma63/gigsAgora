<?php

namespace App\Http\Controllers\FreelancerControllers;

use App\Http\Controllers\Controller;
use App\Services\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateSkills(Request $request,Profile $profile){
        return response()->json(['skill'=>$profile->updateSkills($request[])]);
    }
    public function skillSuggestions($request,Profile $profile){
        return response()->json(['skills'=>$profile->skillSuggestions($request)]);
    }
}
