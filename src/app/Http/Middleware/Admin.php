<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Firebase\Auth\FirebaseToken;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class Admin
{
    /**  
     * Handle an incoming request.  
     *  
     * @param \Illuminate\Http\Request $request  
     * @param \Closure $next  
     * @return mixed  
     */
    public function handle($request, Closure $next)
    {
        Session::put('url.intended', $request->url());

        if (!Session::has('uid')) {
            Log::info('User not authenticated. Redirecting to login.');
            Session::flash('auth_failed', true);
            return redirect()->route('home');
        }

        $role = Session::get('role');

        if ($role !== 'admin') {
            Log::info('Access denied for user role: ' . $role);
            return redirect()->route('home')->with('error','Access Denied');
        }

        return $next($request);
    }
}
