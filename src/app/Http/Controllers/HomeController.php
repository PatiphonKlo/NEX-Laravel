<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
    {
        $authenticated = Session::has('uid') ?? null;
        $role = Session::get('role', 'guest') ?? 'guest';

        return view('pages/user/home', compact('authenticated', 'role'));
    }
}
