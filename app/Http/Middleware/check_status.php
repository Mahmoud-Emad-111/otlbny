<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class check_status
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth('sanctum')->user()->status=='pending'){
            return response()->json([
                'message'=>'You cannot complete the process because your account is inactive',
            ]);
        }
        return $next($request);
    }
}
