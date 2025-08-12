<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Test
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        if (Auth::check()) {
            if (Auth::user()->usertype=='Admin') {
                // dd('PHP department and room no 501');
                return redirect()->route('hr.dashboard');
            }
            elseif (Auth::user()->usertype=='User')
             {
                return redirect()->route('account.dashboard'); 
             }
        }else{
            return redirect('/login');
            // return redirect()->back();
        }
    }
}
