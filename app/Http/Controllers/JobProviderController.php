<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class JobProviderController extends Controller
{
    protected $apiBaseUrl = 'https://gigsagora-api.runasp.net/api/JobProvider';

    public function showDashboard()
    {
        $authData = Session::get('auth_data');
        if (!$authData || !$authData['userid']) {
            Log::error('Unauthorized access to dashboard', ['userId' => $authData['userid'] ?? 'N/A', 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
            return redirect()->route('auth.form')->withErrors(['message' => 'Please login to view your dashboard']);
        }

        Log::info('Fetching job offers', ['userId' => $authData['userid'], 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        $response = Http::withToken($authData['token'])->get("{$this->apiBaseUrl}/GetJobOffers", [
            'userId' => $authData['userid']
        ]);

        if ($response->ok()) {
            $jobOffers = $response->json();
            Log::info('Job offers fetched successfully', ['userId' => $authData['userid'], 'count' => count($jobOffers), 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        } else {
            $jobOffers = [];
            Log::error('Failed to fetch job offers', ['userId' => $authData['userid'], 'status' => $response->status(), 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        }

        return view('job-provider.dashboard', compact('jobOffers'));
    }

    public function createJobOffer(Request $request)
    {
        $authData = Session::get('auth_data');
        if (!$authData || !$authData['userid']) {
            Log::error('Unauthorized access to create job offer', ['userId' => $authData['userid'] ?? 'N/A', 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
            return redirect()->route('auth.form')->withErrors(['message' => 'Please login to create a job offer']);
        }

        Log::info('Validating job offer creation', ['userId' => $authData['userid'], 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'milestones' => 'array',
            'milestones.*.title' => 'required_with:milestones|string',
            'milestones.*.description' => 'required_with:milestones|string',
            'milestones.*.amount' => 'required_with:milestones|numeric',
            'experienceLevel' => 'required|integer',
            'jobType' => 'required|integer',
            'duration' => 'required|integer'
        ]);

        $data = $request->all();
        $data['userId'] = $authData['userid'];

        Log::info('Creating job offer', ['userId' => $authData['userid'], 'data' => $data, 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        $response = Http::withToken($authData['token'])->post("{$this->apiBaseUrl}/CreateJobOffer", $data);

        if ($response->ok()) {
            Log::info('Job offer created successfully', ['userId' => $authData['userid'], 'response' => $response->json(), 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
            return redirect()->route('job-provider.dashboard')->with('success', 'Job offer created successfully');
        }

        Log::error('Failed to create job offer', ['userId' => $authData['userid'], 'status' => $response->status(), 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        return back()->withErrors(['message' => 'Failed to create job offer'])->withInput();
    }

    public function getJobProposals()
    {
        $authData = Session::get('auth_data');
        if (!$authData || !$authData['userid']) {
            Log::error('Unauthorized access to job proposals', ['userId' => $authData['userid'] ?? 'N/A', 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
            return redirect()->route('auth.form')->withErrors(['message' => 'Please login to view job proposals']);
        }

        Log::info('Fetching job proposals', ['userId' => $authData['userid'], 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        $response = Http::withToken($authData['token'])->get("{$this->apiBaseUrl}/GetJobProposals", [
            'userId' => $authData['userid']
        ]);

        if ($response->ok()) {
            $jobProposals = $response->json();
            Log::info('Job proposals fetched successfully', ['userId' => $authData['userid'], 'count' => count($jobProposals), 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        } else {
            $jobProposals = [];
            Log::error('Failed to fetch job proposals', ['userId' => $authData['userid'], 'status' => $response->status(), 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        }

        return view('job-provider.dashboard', ['jobProposals' => $jobProposals, 'tab' => 'job-proposals']);
    }

    public function acceptJobProposal($id)
    {
        $authData = Session::get('auth_data');
        if (!$authData || !$authData['userid']) {
            Log::error('Unauthorized access to accept job proposal', ['userId' => $authData['userid'] ?? 'N/A', 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
            return redirect()->route('auth.form')->withErrors(['message' => 'Please login to accept a job proposal']);
        }

        Log::info('Accepting job proposal', ['userId' => $authData['userid'], 'proposalId' => $id, 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        $response = Http::withToken($authData['token'])->post("{$this->apiBaseUrl}/AcceptJobProposal", [
            'id' => $id,
            'userId' => $authData['userid']
        ]);

        if ($response->ok()) {
            Log::info('Job proposal accepted successfully', ['userId' => $authData['userid'], 'proposalId' => $id, 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
            return redirect()->route('job-provider.job-proposals')->with('success', 'Job proposal accepted successfully');
        }

        Log::error('Failed to accept job proposal', ['userId' => $authData['userid'], 'proposalId' => $id, 'status' => $response->status(), 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        return redirect()->route('job-provider.job-proposals')->withErrors(['message' => 'Failed to accept job proposal']);
    }
}
