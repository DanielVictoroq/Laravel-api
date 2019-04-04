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
        $this->register = new RegisterController();
    }
    
    public function index(){
        return view('auth.login');
    }
    
    public function registerGet(){
        
        return view('auth.register',['user'=> 'register']);

    }
    
    public function forgotGet(){
        return view('auth.passwords.reset');
    }
    
    public function authenticate(Request $request)
    {
        $remember = $request->only('remember');
        $credentials = $request->only('name', 'password');
        
        if(Auth::guard('admin')->attempt($credentials)){
            \Session::put('admin', true);
            return redirect()->route('home');
        }
        else if (Auth::attempt($credentials, $remember)) {
            \Session::put('admin', false);
            return redirect('/');
        }
        
        return redirect()->intended('home');
    }
    
    public function register(Request $request){
        
        $data = $this->register->create($request);
        
        $credentials = $request->only('name', 'password');
        
        if (Auth::attempt($credentials)) {
            \Session::put('admin', false);
            return redirect()->intended('home');
        }
        else{
            return view('home');
        }
    }
    
    public function forgot(){
        
        return redirect('home');
    }
    
    public function logout(){
        Auth::logout();
        Auth::guard('admin')->logout();
        \Session::flush();
        return redirect('/');
    }
}
