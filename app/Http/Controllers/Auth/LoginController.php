<?php

namespace Almacen\Http\Controllers\Auth;

use Almacen\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Redirect;
use Alert;
use Input;
use DB;
use Almacen\User;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',['only' => 'showLoginForm']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login()
    {
        $credentials = $this->validate(request(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        $email=Input::get('email');
        $password=Input::get('password');

        // $user = User::where([['email','=',$email],['password','=', $password]])->first();

        $user = DB::table('users')->where('email', $email)->first();


        if(Auth::attempt($credentials))
        {
           // $user = User::where('email', '=', $email)->where('password', '=', $password)->get();

            if($user->puesto == "Delegado_administrativo")
            {
                return Redirect::to('delegado/inicio')->with($credentials);
            }

            if($user->puesto == "Administrador")
            {
                return Redirect::to('admin/inicio')->with($credentials);
            }

            if($user->puesto == "Delegado_obra")
            {
                return Redirect::to('campamento/listaPedido')->with($credentials);
            }
            if ($user->puesto == "Auxiliar_administrativo") 
            {
                return Redirect::to('auxiliar/inicio')->with($credentials);
            }

        }

        return back()
        	->withErrors(['email' => trans('auth.failed')])
        	->withInput(request(['email']));
    }

    public function logout()
    {
        Auth::logout();

        return Redirect::to('/');
    }

}