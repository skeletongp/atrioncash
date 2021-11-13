<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
            request()->request->add(['trial' => 'Período de prueba']);
            return $next($request);
        }

        if ($user->negocio->status=='inactivo' && $user->hasRole('admin')==false) {
           return redirect()->route('plans.index');
        }

        return $next($request);
    }
}
