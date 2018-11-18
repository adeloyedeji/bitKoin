<?php

namespace App\Http\Middleware;

use Closure;

class EnsureAdmin
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
        if($request->user()->role_id == 2)
        {
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}
