<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class IsBanned
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
        $status = User::where( 'email', $request->email )
            ->pluck('status')
            ->first();

        if ( $status == 100) {
            return redirect()->route('login.index')->with('message_login', 'Su usuario fue suspendido');
        }

        return $next($request);
    }
}
