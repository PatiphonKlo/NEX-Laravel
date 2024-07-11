<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Firebase\Auth\FirebaseToken;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class firebase
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
        // Log the current session data
        // error_log('Session data before modification: ' . json_encode(Session::all()));

        // Log the intended URL
        // error_log('Intended URL: ' . $request->url());

        Session::put('url.intended', $request->url());

        // Log session data after modification
        // error_log('Session data after modification: ' . json_encode(Session::all()));

        if (!Session::has('uid') && !Auth::check()) {
            error_log('User not authenticated. Redirecting to login.');
            return redirect()->route('login');
        }

        return $next($request);
    }
}
