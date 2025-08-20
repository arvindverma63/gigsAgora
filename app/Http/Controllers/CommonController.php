<?php

namespace App\Http\Controllers;

use App\Services\Common;
use Illuminate\Http\JsonResponse;

class CommonController extends Controller
{
    public function addFav(Common $common, $jobId, $add): JsonResponse
    {
        $jobId = (int) $jobId;                               // cast to int
        $add   = filter_var($add, FILTER_VALIDATE_BOOLEAN);  // "true"/"false"/"1"/"0" -> bool

        $response = $common->addRemoveFav($jobId, $add);

        return response()->json($response);
    }
}
