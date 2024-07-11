<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
    {
        try {
            if (!Session::has('auth_failed')) {
                Session::put('auth_failed', false);
            }

            if (!Session::has('uid')) {
                Session::put('uid', null);
            }

            if (!Session::has('role')) {
                Session::put('role', 'guest');
            }

            if (!Session::has('isAuthenticated')) {
                Session::put('isAuthenticated', false);
            }

            $showModal = Session::get('auth_failed', false);
            $authenticated = Session::has('uid');
            $role = Session::get('role', 'guest');
            $isAuthenticated = Session::get('isAuthenticated', false);

            return view('pages/user/home', compact('showModal', 'authenticated', 'role', 'isAuthenticated'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
