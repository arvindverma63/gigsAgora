<?php

use App\Http\Controllers\FreelancerControllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\FreelancerPageController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\JobProviderController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\WebsitePageController;

Route::get('/auth', [AuthController::class, 'showAuthForm'])->name('auth.form');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/change-password', [AuthController::class, 'changePassword'])->name('auth.change-password');
Route::post('/auth/phone', [AuthController::class, 'phoneAuth'])->name('auth.phone');
Route::post('/auth/phone/verify', [AuthController::class, 'verifyPhone'])->name('auth.phone.verify');
Route::post('/auth/phone/resend-otp', [AuthController::class, 'resendOtp'])->name('auth.phone.resend-otp');
Route::get('/auth/confirm-email', [AuthController::class, 'confirmEmail'])->name('auth.confirm-email');
Route::get('/freelancer/profile', [FreelancerController::class, 'showProfile'])->name('freelancer.profile');
Route::post('/freelancer/create-job-proposal', [FreelancerController::class, 'createJobProposal'])->name('freelancer.create-job-proposal');
Route::get('/freelancer/job-proposals', [FreelancerController::class, 'getJobProposals'])->name('freelancer.job-proposals');
Route::get('/freelancer/job-proposal/{id}', [FreelancerController::class, 'getJobProposal'])->name('freelancer.job-proposal');
Route::post('/freelancer/withdraw-job-proposal/{id}', [FreelancerController::class, 'withdrawJobProposal'])->name('freelancer.withdraw-job-proposal');

Route::get('/job-provider/dashboard', [JobProviderController::class, 'showDashboard'])->name('job-provider.dashboard');
Route::post('/job-provider/create-job-offer', [JobProviderController::class, 'createJobOffer'])->name('job-provider.create-job-offer');
Route::get('/job-provider/job-proposals', [JobProviderController::class, 'getJobProposals'])->name('job-provider.job-proposals');
Route::post('/job-provider/accept-job-proposal/{id}', [JobProviderController::class, 'acceptJobProposal'])->name('job-provider.accept-job-proposal');

Route::post('/google-login', action: [GoogleAuthController::class, 'login']);
Route::get('/registerType',[AuthController::class,'registerType']);
Route::controller(WebsitePageController::class)->group(function () {
    Route::get('/', 'index')->name('website.index');
    Route::get('/contact', 'contact')->name('website.contact');
    Route::get('/about', 'about')->name('website.about');
    Route::get('/get-a-quote', 'quotes')->name('website.quotes');
    Route::get('/pricing', 'pricing')->name('website.pricing');
    Route::get('/service-details', 'serviceDetails')->name('website.service.details');
    Route::get('/services', 'services')->name('website.services');
    Route::get('/starter-page', 'starter')->name('website.starter');
});

Route::get('/dashboard',[FreelancerPageController::class,'dashboard'])->name('freelancer.dashboard');
Route::get('/job-post',[JobPostController::class,'index']);
Route::get('/job-view/{id}',[FreelancerPageController::class,'jobView'])->name('job.view');
Route::post('/create-proposal',[ProposalController::class,'create'])->name('create.proposal');


Route::get('/view-proposals/{id}',[JobProviderController::class,'viewProposals'])->name('view.proposals');
Route::get('/job-provider/my-jobs',[JobProviderController::class,'myJobs'])->name('myjobs');
Route::get('/acceptJobOffer/{id}',[JobProviderController::class,'acceptJob']);
Route::get('/register/{id}',[AuthController::class,'registerPage']);
Route::get('/auth/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/favorite/{jobId}/{add}', [CommonController::class, 'addFav'])
    ->whereNumber('jobId')
    ->where('add', '^(true|false|1|0)$');
Route::get('/AllJobProposals',[FreelancerPageController::class,'allJobProposals'])->name('all.proposals');


Route::post('/update/skills',[ProfileController::class,'updateSkills']);
Route::get('/skills/suggestions/{request}',[ProfileController::class,'skillSuggestions']);
Route::post('/update/profile',[ProfileController::class,'updateProfile']);
