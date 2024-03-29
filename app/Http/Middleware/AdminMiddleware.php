<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        // if ($request->user()->role == User::ROLE_ADMIN) {
        //     return $next($request);
        // }

        // abort(401, 'You are not authorized to access this page.');
        $user = $request->user();

        if ($user && $user->role == User::ROLE_ADMIN) {
            return $next($request);
        }

        abort(401, 'You are not authorized to access this page.');
    }
}
