<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\TokenMismatchException;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() == 1) { //check if singed in
            if ( Auth::user()->role == 1) // is an admin
            {
                return $next($request); // pass the admin
            } else {
                abort(403);
            }
        }
        else
        {
            return redirect('login')->with('flash_error', 'Oops! Login is required!');
        }
    }
}
