<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $showModal = Session::get('auth_failed', false);
            $authenticated = Session::has('uid');
            $role = Session::get('role', 'guest');
            return view('pages/user/home', compact('showModal', 'authenticated', 'role'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
