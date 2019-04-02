<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $register;
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->register = new RegisterController();
    }

    public function index(){
        return view('auth.login');
    }
    
    public function registerGet(){
        return view('auth.register');
    }

    public function forgotGet(){
        return view('auth.passwords.reset');
    }

    public function authenticate(Request $request)
    {
        $remember = $request->only('remember');
        $credentials = $request->only('name', 'password');
        
        if (Auth::attempt($credentials, $remember)) {
            return redirect('tabela');
        }
        else{
            return redirect()->intended('home');
        }
    }
    
    public function register(Request $request){
        
        $data = $this->register->create($request);
        
        $credentials = $request->only('name', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }
        else{
            return view('auth.home');
        }
    }
    
    public function forgot(){
        
        return redirect('home');
    }
    
    public function logout(){
        Auth::logout();
        return redirect('home');
    }
}
