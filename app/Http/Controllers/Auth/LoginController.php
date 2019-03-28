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
    
    public function authenticate(Request $request)
    {
        $credentials = $request->only('name', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
    }
    public function register(Request $request){
        
        $data = $this->register->create($request);

        $credentials = $request->only('name', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        else{
            return 'error';
        }
    }
}
