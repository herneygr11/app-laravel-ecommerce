<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class UserStatus
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
        if ( Auth::user()->status == 100) {
            Auth::logout();
            return redirect()->route('login.index')->with('message_login', 'Su usuario fue suspendido');
        }
        
        return $next($request);
    }
}
