<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $apiBaseUrl = 'https://gigsagora-api.runasp.net/api/Authenticate';

    public function showAuthForm()
    {
        return view('auth');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required'
        ]);

        $response = Http::post("{$this->apiBaseUrl}/login", [
            'username' => $request->username,
            'password' => $request->password
        ]);

        if ($response->ok()) {
            $data = $response->json();
            Session::put('auth_data', [
                'token' => $data['token'],
                'expiration' => $data['expiration'],
                'username' => $data['username'],
                'userid' => $data['userid'],
                'role' => $data['role'],
                'fullname' => $data['fullname'],
                'email' => $data['email'],
                'emailConfirmed' => $data['emailConfirmed'],
                'phone' => $data['phone'],
                'phoneConfirmed' => $data['phoneConfirmed'],
                'twoFactorEnabled' => $data['twoFactorEnabled']
            ]);

            if($data['role'] == 'Freelancer'){
                return redirect()->route('freelancer.dashboard');
            }
            if($data['role'] == 'JobProvider'){
                return redirect()->route('job-provider.dashboard');
            }

            return redirect()->route('auth.form')->with('success', 'Login successful');
        }

        return back()->withErrors(['username' => 'Login failed'])->withInput();
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'userRole' => 'required|integer|in:1,2' // Assuming 1=Admin, 2=User
        ]);

        $response = Http::post("{$this->apiBaseUrl}/register", [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'userRole' => (int) $request->userRole
        ]);

        if ($response->ok()) {
            return redirect()->route('auth.form')->with('success', 'Registration successful. Please check your email to confirm.');
        }

        return back()->withErrors(['username' => 'Registration failed'])->withInput();
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:6'
        ]);

        $response = Http::post("{$this->apiBaseUrl}/changepassword", [
            'currentPassword' => $request->currentPassword,
            'newPassword' => $request->newPassword
        ]);

        if ($response->ok()) {
            return redirect()->route('auth.form')->with('success', 'Password changed successfully');
        }

        return back()->withErrors(['currentPassword' => 'Password change failed'])->withInput();
    }

    public function phoneAuth(Request $request)
    {
        $request->validate([
            'phoneNumber' => 'required|string'
        ]);

        $endpoint = $request->isLogin ? 'loginbyphone' : 'registerbyphone';
        $response = Http::post("{$this->apiBaseUrl}/{$endpoint}", [
            'phoneNumber' => $request->phoneNumber
        ]);

        if ($response->ok()) {
            Session::put('phoneNumber', $request->phoneNumber);
            Session::put('isPhoneLogin', $request->isLogin);
            return redirect()->route('auth.form')->with('showOtp', true);
        }

        return back()->withErrors(['phoneNumber' => 'Failed to send OTP'])->withInput();
    }

    public function verifyPhone(Request $request)
    {
        $request->validate([
            'otp' => 'required|string'
        ]);

        $response = Http::post("{$this->apiBaseUrl}/verifyphone", [
            'phoneNumber' => Session::get('phoneNumber'),
            'otp' => $request->otp
        ]);

        if ($response->ok()) {
            $message = Session::get('isPhoneLogin') ? 'Phone login successful' : 'Phone registration successful';
            Session::forget(['phoneNumber', 'isPhoneLogin']);
            return redirect()->route('auth.form')->with('success', $message);
        }

        return back()->withErrors(['otp' => 'OTP verification failed'])->withInput();
    }

    public function resendOtp(Request $request)
    {
        $phoneNumber = Session::get('phoneNumber');
        if (!$phoneNumber) {
            return redirect()->route('auth.form')->withErrors(['phoneNumber' => 'No phone number found']);
        }

        $response = Http::post("{$this->apiBaseUrl}/resendotp", [
            'phoneNumber' => $phoneNumber
        ]);

        if ($response->ok()) {
            return redirect()->route('auth.form')->with('success', 'OTP resent successfully')->with('showOtp', true);
        }

        return back()->withErrors(['phoneNumber' => 'Failed to resend OTP']);
    }

    public function confirmEmail(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email'
        ]);

        $response = Http::get("{$this->apiBaseUrl}/confirmemail", [
            'token' => $request->token,
            'email' => $request->email
        ]);

        if ($response->ok()) {
            return redirect()->route('auth.form')->with('success', 'Email confirmed successfully');
        }

        return redirect()->route('auth.form')->withErrors(['email' => 'Email confirmation failed']);
    }

    public function registerType(){
        return view('register-type');
    }
}
