<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
    {
        // if (!Session::has('auth_failed')) {
        //     Session::put('auth_failed', false);
        // }

        // if (!Session::has('uid')) {
        //     Session::put('uid', null);
        // }

        // if (!Session::has('role')) {
        //     Session::put('role', 'guest');
        // }

        // $showModal = Session::get('auth_failed', false);
        // $authenticated = Session::has('uid');
        // $role = Session::get('role', 'guest');

        // return view('pages/user/home', compact('showModal', 'authenticated', 'role'));
        return view('pages/user/home');
    }
}
