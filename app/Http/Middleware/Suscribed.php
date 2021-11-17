<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request; use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

class Suscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       
        $user = $request->user();
        if ($user->negocio->trial) {
            $user->status='Prueba';
            Auth::login($user);
            return $next($request);
        }

        if ($user->negocio->status=='inactivo' && $user->hasRole('admin')==false) {
           return redirect()->route('plans.index');
        }
        $user->status='Activo';
        Auth::login($user);

        return $next($request);
    }
}
