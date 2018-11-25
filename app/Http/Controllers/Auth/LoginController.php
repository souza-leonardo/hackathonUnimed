<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $usuario = User::where('name', $request->username)->first();
        if($usuario){
            if($usuario->password == md5($request->password)){
                \Auth::login($usuario, $request->has('remember'));
                return redirect()->intended('home');
            }else{
                return redirect()->back()->withInput()->withErrors(['password' => 'Senha Inválida']);
            }
        }else{
            return redirect()->back()->withInput()->withErrors(['username' => 'E-mail Inválido']);
        }
    }
}
