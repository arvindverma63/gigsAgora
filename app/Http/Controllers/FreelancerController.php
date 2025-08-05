<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class FreelancerController extends Controller
{
    protected $apiBaseUrl = 'https://gigsagora-api.runasp.net/api/Freelancer';

    public function showProfile()
    {
        $authData = Session::get('auth_data');
        if (!$authData || !$authData['userid']) {
            Log::error('Unauthorized access to profile', ['userId' => $authData['userid'] ?? 'N/A', 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
            return redirect()->route('auth.form')->withErrors(['message' => 'Please login to view your profile']);
        }

        Log::info('Fetching profile', ['userId' => $authData['userid'], 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        $response = Http::withToken($authData['token'])->get("{$this->apiBaseUrl}/Profile", [
            'userId' => $authData['userid']
        ]);

        if ($response->ok()) {
            $profile = $response->json();
            Log::info('Profile fetched successfully', ['userId' => $authData['userid'], 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        } else {
            $profile = [];
            Log::error('Failed to fetch profile', ['userId' => $authData['userid'], 'status' => $response->status(), 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        }

        Session::put('freelancer_profile', $profile);
        return view('freelancer.profile', compact('profile'));
    }

    public function createJobProposal(Request $request)
    {
        $authData = Session::get('auth_data');
        if (!$authData || !$authData['userid']) {
            Log::error('Unauthorized access to create job proposal', ['userId' => $authData['userid'] ?? 'N/A', 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
            return redirect()->route('auth.form')->withErrors(['message' => 'Please login to create a job proposal']);
        }

        Log::info('Validating job proposal creation', ['userId' => $authData['userid'], 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        $request->validate([
            'jobOfferId' => 'required|integer',
            'jobProposalPayType' => 'required|integer',
            'amount' => 'required|numeric',
            'milestones' => 'array',
            'milestones.*.title' => 'required_with:milestones|string',
            'milestones.*.description' => 'required_with:milestones|string',
            'milestones.*.amount' => 'required_with:milestones|numeric',
            'portfolios' => 'array',
            'jobOfferDuration' => 'required|integer',
            'coverLetter' => 'required|string',
            'isSponsored' => 'boolean',
            'isHighlighted' => 'boolean',
            'isFeatured' => 'boolean'
        ]);

        $data = $request->all();
        $data['milestones'] = array_map(function ($milestone) {
            return array_filter($milestone, function ($value) {
                return $value !== null && $value !== '';
            });
        }, $data['milestones'] ?? []);
        $data['portfolios'] = array_map(function ($portfolio) use ($authData) {
            return array_filter(['id' => 0, 'jobProposalId' => 0, 'freelancerId' => $authData['userid']]);
        }, $data['portfolios'] ?? []);

        Log::info('Creating job proposal', ['userId' => $authData['userid'], 'data' => $data, 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        $response = Http::withToken($authData['token'])->post("{$this->apiBaseUrl}/CreateJobProposal", $data);

        if ($response->ok()) {
            Log::info('Job proposal created successfully', ['userId' => $authData['userid'], 'response' => $response->json(), 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
            return redirect()->route('freelancer.profile')->with('success', 'Job proposal created successfully');
        }

        Log::error('Failed to create job proposal', ['userId' => $authData['userid'], 'status' => $response->status(), 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        return back()->withErrors(['message' => 'Failed to create job proposal'])->withInput();
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

        return view('freelancer.profile', ['jobProposals' => $jobProposals, 'tab' => 'job-proposals']);
    }

    public function getJobProposal($id)
    {
        $authData = Session::get('auth_data');
        if (!$authData || !$authData['userid']) {
            Log::error('Unauthorized access to job proposal details', ['userId' => $authData['userid'] ?? 'N/A', 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
            return redirect()->route('auth.form')->withErrors(['message' => 'Please login to view job proposal']);
        }

        Log::info('Fetching job proposal details', ['userId' => $authData['userid'], 'proposalId' => $id, 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        $response = Http::withToken($authData['token'])->get("{$this->apiBaseUrl}/GetJobProposal", [
            'id' => $id,
            'userId' => $authData['userid']
        ]);

        if ($response->ok()) {
            $jobProposal = $response->json();
            Log::info('Job proposal details fetched successfully', ['userId' => $authData['userid'], 'proposalId' => $id, 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        } else {
            $jobProposal = [];
            Log::error('Failed to fetch job proposal details', ['userId' => $authData['userid'], 'proposalId' => $id, 'status' => $response->status(), 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        }

        return view('freelancer.profile', ['jobProposal' => $jobProposal, 'tab' => 'job-proposal-details']);
    }

    public function withdrawJobProposal($id)
    {
        $authData = Session::get('auth_data');
        if (!$authData || !$authData['userid']) {
            Log::error('Unauthorized access to withdraw job proposal', ['userId' => $authData['userid'] ?? 'N/A', 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
            return redirect()->route('auth.form')->withErrors(['message' => 'Please login to withdraw job proposal']);
        }

        Log::info('Withdrawing job proposal', ['userId' => $authData['userid'], 'proposalId' => $id, 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        $response = Http::withToken($authData['token'])->post("{$this->apiBaseUrl}/WithdrawJobProposal", [
            'id' => $id,
            'userId' => $authData['userid']
        ]);

        if ($response->ok()) {
            Log::info('Job proposal withdrawn successfully', ['userId' => $authData['userid'], 'proposalId' => $id, 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
            return redirect()->route('freelancer.job-proposals')->with('success', 'Job proposal withdrawn successfully');
        }

        Log::error('Failed to withdraw job proposal', ['userId' => $authData['userid'], 'proposalId' => $id, 'status' => $response->status(), 'timestamp' => now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s')]);
        return redirect()->route('freelancer.job-proposals')->withErrors(['message' => 'Failed to withdraw job proposal']);
    }
}
