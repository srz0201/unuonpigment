<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            if (auth()->user()->hasRole(['super_admin', 'admin'])) {
                return $next($request);
            } else {

                abort('403');
            }
        } else {
            session(['url.intended' => url()->full()]);

            return redirect(route('login'));
        }
    }
}
