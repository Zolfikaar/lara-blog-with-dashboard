<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()) {

            if(Auth::user()->role_as == '1')  {

                return $next($request);

            } else {

                return redirect()->route('home')->with('error', 'You are not authorized to access this page.');
            }

        } else {

            return redirect('/login')->with('error', 'Please login to access this page.');
        }
    }
}
