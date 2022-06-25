<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {                        //Si ya está autenticado
            if(Auth::user()->id_rol == 1){          //Si es Docente
                return redirect('/panel-docente');
            }else{                                  //Si es alummno
                return redirect('/panel-alumno');
            }
        }                                           //Si no está autenticado
        return view('General.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials()->only('email','password');
        
        if (!Auth::validate($credentials)) {//Si las credenciales no son correctas
            return redirect()->to('login')->withErrors('Matrícula y/o contraseña incorrecta.');   
        }
        
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return $this->authenticated($request, $user);
    }

    public function authenticated(Request $request, $user){
        if(Auth::user()->id_rol == 1){//Docente
            return redirect('/panel-docente');
        }
        return redirect('/panel-alumno');
    }
}
