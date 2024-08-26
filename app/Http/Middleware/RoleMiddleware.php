<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$roles): Response{
        if(is_array($roles)){
			foreach($roles as $role){
				if($request->user()->role == $role) {
					return $next($request);
				}
			}
		} 
		if(auth()->check() && $request->user()->role == $roles)
		{		 
			return $next($request);
		}	
		return abort(403);
    }
}
