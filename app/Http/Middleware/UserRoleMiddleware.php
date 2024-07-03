<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();
        
        if ($role == 'Member-Bioskop') return $next($request);
        
        if ($role == 'Super-Admin') return $next($request);
        
        $bioskopName = $request->route('nama_bioskop');

        if ($bioskopName && $user->role === "Admin-".$bioskopName) 
        {
            return $next($request);
        }
        
        return redirect()->back();
    }
}
