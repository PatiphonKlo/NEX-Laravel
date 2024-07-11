<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class PdfAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $key = $request->route('key');
        if (Session::has('pdf_access') && Session::get('pdf_access') === $key) {
            return $next($request);
        } else {
            return redirect('pdf-access/' . $key)->withErrors(['error' => 'Invalid key or token']);
        }
    }
}
