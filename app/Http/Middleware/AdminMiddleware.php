<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
// use App\Models\User

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next){
    if (auth()->check() && auth()->user()->isAdmin()) {
        return $next($request);
    }

    return redirect()->route('login'); // Adjust this route based on your login route
    }
}
