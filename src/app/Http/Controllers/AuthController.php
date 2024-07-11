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
    protected $firestore;

    public function __construct()
    {
        $this->middleware('guest');
        $this->auth = (new Firebase)->authentication;
        $this->firestore = (new Firebase)->firestoreDb;
    }

    public function login(Request $request)
    {
        try {
            $loggedUser = $this->auth->signInWithEmailAndPassword($request->email, $request->password);
            $loginUid = $loggedUser->firebaseUserId();

            $userDocument = $this->firestore->collection(config('firebase.collection.user'))->document($loginUid)->snapshot();
            if ($userDocument->exists() && isset($userDocument['role'])) {
                $userRole = $userDocument['role']; 
                Session::put('role', $userRole);
            } else {
                Session::put('role', 'guest');
            }
            Session::put('uid', $loginUid);

            $user = new User($loggedUser->data());
            Auth::login($user);

            return redirect()->intended('admin/product');
        } catch (\Kreait\Firebase\Auth\SignIn\FailedToSignIn) {
            return back()->with('error', 'Can not login, incorrect email or password');
        } 
    }
    public function logout()
    {
        Session::forget('uid');
        Session::forget('role');
        Session::forget('url.intended');
        Auth::logout();
        Cache::flush();
        return redirect('/');
    }
}
