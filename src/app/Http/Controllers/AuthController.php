<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Firebase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $auth;

    public function __construct()
    {
        $this->middleware('guest');
        $this->auth = (new Firebase)->authentication;
    }

    public function login(Request $request)
    {
        try {
            $loggedUser = $this->auth->signInWithEmailAndPassword($request->email, $request->password);

            $loginUid = $loggedUser->firebaseUserId();
            Session::put('uid', $loginUid);

            $user = new User($loggedUser->data());
            Auth::login($user);

            // Auth::login($user, true);
            // ล็อกอินผู้ใช้และตั้งค่าตัวเลือก "remember me" ผู้ใช้จะถูกจดจำในระบบแม้หลังจากเซสชันปัจจุบันหมดอายุ

            return redirect()->intended('admin/product');
        } catch (\Kreait\Firebase\Auth\SignIn\FailedToSignIn) {
            return back()->with('error', 'Can not login, incorrect email or password');
        } 
    }
    public function logout()
    {
        Session::forget('uid');
        Session::forget('url.intended');

        Auth::logout();

        Cache::flush();

        return redirect()->route('login')->with('status', 'You have been logged out successfully.');
    }
}
