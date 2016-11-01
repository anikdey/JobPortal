<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RoleMiddleware
{

    public function handle($request, Closure $next)
    {
        if ($request->user()->role == "ADMIN") {
            return $next($request);
        } else {
            Session::flash('message', 'You are not authorised.');
            return redirect('/');
        }
    }
}
