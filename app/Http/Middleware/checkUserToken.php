<?php

namespace App\Http\Middleware;

use App\note;
use Closure;
use Illuminate\Http\Request;

class checkUserToken
{
    /**
     * Handle an incoming request.
     *you
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = \App\User::where('api_token', $request->get('api_token'))->first();
        if(!$user)
            return response()->json(['error'=>'you must be logged in']);


        $request->user = $user;
        return $next($request);

    }
}
