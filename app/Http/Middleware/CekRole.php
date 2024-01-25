<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,String $role): Response
    {
        
        $userRole = Auth::user()->role;
        if ($userRole == $role) {

            return $next($request);
        }

        abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini');
    }

    
}
