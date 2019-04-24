<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Usuario;
use App\User;
use App\Admin;
use Session;

class LoginController extends Controller
{
    private $register;
    
    
    public function __construct()
    {
        $this->register = new RegisterController();
    }
    
    public function index(){
        return view('auth.login');
    }
    
    public function authenticate(Request $request)
    {
        $remember = $request->only('remember');
        $credentials = $request->only('nome_usuario', 'password');
        
        if(Auth::guard('admin')->attempt($credentials)){
            $this->inserirSessao('admin');
            return redirect()->route('home');
        }
        else if (Auth::attempt($credentials, $remember)) {
            $this->inserirSessao('user');
            return redirect('/');
        }
        
        return redirect()->intended('home');
    }
    
    public function inserirSessao($opcao){

        if($opcao == 'admin'){
            Session::put('admin', true);
            $data =  json_decode(Admin::with('usuario')->get());
            Session::put('dados_login',  $data[0]->usuario[0]);
        }
        else {
            $data = json_decode(User::with('usuario')->get());
            Session::put('dados_login', $data[0]->usuario[0]);
            Session::put('admin', false);
        }
    }

    
    public function logout(){
        Auth::logout();
        Auth::guard('admin')->logout();
        Session::flush();
        return redirect('/');
    }
}
