<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!$request->user() || !$request->user()->roles->contains('name', $role)) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
