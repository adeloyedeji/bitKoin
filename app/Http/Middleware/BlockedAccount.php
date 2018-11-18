<?php

namespace App\Http\Middleware;

use Closure;

class BlockedAccount
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
        if($request->user()->status == 3)
        {
            // account has been blocked.
            // do not allow to proceed.
            return redirect()->route('account.blocked');
        }
        return $next($request);
    }
}
