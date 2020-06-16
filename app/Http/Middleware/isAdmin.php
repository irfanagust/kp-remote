<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isAdmin
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
        if ( Auth::check() && Auth::user()->role_id == 3 )
        {
            return $next($request);
        }
        if ( Auth::check() && Auth::user()->role_id == 1 )
        {
            return redirect()->route('instansi');
        }
        if ( Auth::check() && Auth::user()->role_id == 2 )
        {
            return redirect()->route('pengembang');
        }
    }
}
