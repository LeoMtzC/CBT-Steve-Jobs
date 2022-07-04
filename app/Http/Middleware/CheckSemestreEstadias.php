<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckSemestreEstadias
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
            //Query para obtener el semestre del alumno logeado
            $semestre = DB::table('alumnos')->join('users', function($join){
                $join->on('alumnos.id_usuario','=','users.id')
                ->where('alumnos.id_usuario','=',Auth::user()->id);
            })
            ->first()->semestre;
            if (Auth::user()->id_rol == 2 &&  $semestre == 6){
                    return $next($request);
            }else{
                return redirect('/no-autorizado')->with('message', 'Acceso denegado.');
            }
        }else{
            return redirect('/login')->with('message', 'Inicia sesión para acceder a esta página.');
        }
    }
}
