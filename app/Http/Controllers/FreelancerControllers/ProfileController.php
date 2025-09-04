<?php

namespace App\Http\Controllers\FreelancerControllers;

use App\Http\Controllers\Controller;
use App\Services\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateSkills(Request $request, Profile $profile)
    {
        return response()->json(['skill' => $profile->updateSkills($request)]);
    }

    public function skillSuggestions($request, Profile $profile)
    {
        return response()->json(['skills' => $profile->skillSuggestions($request)]);
    }
    public function updateProfile(Request $request, Profile $profile)
    {
        $response = $profile->updateProfile($request);
        if ($response) {
            return redirect()->back()->with(['success' => $response]);
        } else {
            return redirect()->back()->with(['error' => $response]);
        }
    }

    public function updateImage(Request $request, Profile $profile)
    {
        $response = $profile->updateImage($request);
        if ($response) {
            return redirect()->back()->with(['success' => 'updated Successfully']);
        } else {
            return redirect()->back()->with(['error' => $response]);
        }
    }
}
