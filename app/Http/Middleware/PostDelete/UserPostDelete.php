<?php

namespace App\Http\Middleware\PostDelete;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserPostDelete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->name == $request->post->user->name or auth()->user()->name == 'admin') {
            return $next($request);
        }
        else {
            abort(403);
        }
    }
}
