<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::user()->is_admin) {
            return redirect('/dashboard')->with('message', ['type' => 'error', 'content' => 'Access denied']);
        }

        return $next($request);
    }
}