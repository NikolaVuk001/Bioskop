<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {

        $roles = is_array($role)
        ? $role
        : explode('|', $role);
        
        
        if (!in_array($request->user()->role,$roles)) {
            if($request->user()->role == 'admin' || $request->user()->role == 'moderator') {
                return redirect('/admin/dashboard');
            }
            else {
                return redirect('/');
            }
        
        }
        return $next($request);
    }
}
