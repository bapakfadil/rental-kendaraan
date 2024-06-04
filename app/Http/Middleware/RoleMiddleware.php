<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!in_array($request->user()->role, $roles)) {
            // Redirect ke halaman yang diinginkan jika user tidak memiliki akses
            return redirect('/dashboard');
        }
        return $next($request);
    }
}
