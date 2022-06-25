<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkAlumno
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            //id_rol = 1 Docente
            //id_rol = 2 Alumno
            if (Auth::user()->id_rol == 2){
                return $next($request);
            }else{
                return redirect('/no-autorizado')->with('message', 'Acceso denegado, no eres un alumno.');
            }
        }else{
            return redirect('/login')->with('message', 'Inicia sesión para acceder a esta página.');
        }
        return $next($request);
    }
}
