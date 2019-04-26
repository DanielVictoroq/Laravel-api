<?php

namespace App\Http\Controllers\Auth;

use Session;
use App\User;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    private $register;
    private $homeController;
    
    public function __construct()
    {
        $this->register = new RegisterController();
        $this->homeController = new HomeController();
    }
    
    public function index(){
        return view('auth.login');
    }
    
    public function authenticate(Request $request)
    {
        $remember = $request->only('remember');
        $credentials = $request->only('nome_usuario', 'password');
        
        if (Auth::attempt($credentials, $remember)) {
            $this->inserirSessao();
            return redirect('/');
        }
        
        return redirect()->intended('home');
    }
    
    public function inserirSessao(){
        $cred = Auth::user();
        $data = json_decode(Usuario::find($cred->nome_usuario));
        $this->homeController->setarSessao();
    }
    
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
