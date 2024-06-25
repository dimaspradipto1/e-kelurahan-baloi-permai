<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Checkrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user() && Auth::user()->roles == 'ADMIN'){
            return $next($request);
        }else if(Auth::user() && Auth::user()-> roles == 'PU'){
            return $next($request);
        }else if(Auth::user() && Auth::user()->roles == 'PSKS'){
            return $next($request);
        }else if(Auth::user() && Auth::user()-> roles == 'PMKS'){
            return $next($request);
        }else if(Auth::user() && Auth::user()->roles == 'WARGA'){
            return $next($request);
        }
        return redirect()->route('login');
    }
}
