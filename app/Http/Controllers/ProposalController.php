<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ProposalController extends Controller
{
    public function create(Request $request)
    {
        $authData = Session::get('auth_data');
        if (!$authData || !$authData['userid']) {
            return redirect()->route('auth.form')->withErrors(['message' => 'Please login to create a job offer']);
        }
        $baseUrl = env('API_BASE_URL');
        // Validate request data
        $validated = $request->validate([
            'jobOfferId' => 'required|integer',
            'jobProposalPayType' => 'required|integer',
            'amount' => 'required|numeric',
            'milestones' => 'required|array',
            'milestones.*.title' => 'required|string',
            'milestones.*.description' => 'required|string',
            'milestones.*.amount' => 'required|numeric',
            'portfolios' => 'required|array',
            'jobOfferDuration' => 'required|integer',
            'coverLetter' => 'required|string',
            'isSponsored' => 'required|boolean',
            'isHighlighted' => 'required|boolean',
            'isFeatured' => 'required|boolean',
            'isSealed' => 'required|boolean',
        ]);

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $authData['token'],
            ])->post("{$baseUrl}api/Freelancer/CreateJobProposal", $validated);

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'data' => $response->json()
                ], 200);
            }

            return response()->json([
                'success' => false,
                'error' => $response->json(),
                'status' => $response->status()
            ], $response->status());

        } catch (\Exception $e) {
            Log::error('CreateJobProposal API error', [
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while creating the job proposal.'
            ], 500);
        }
    }
}
