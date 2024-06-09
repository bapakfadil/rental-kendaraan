<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!in_array($request->user()->role, $roles)) {
            return redirect('/dashboard');
        }
        return $next($request);
    }
}
