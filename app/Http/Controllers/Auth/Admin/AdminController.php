<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Admin;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\Admin\AdminRegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $register;
    private $registeruser;
    private $login;
    
    public function __construct()
    {
        $this->register = new AdminRegisterController();
        $this->registeruser = new RegisterController();
        $this->login = new LoginController();
    }
    public function indexLogin(){
        return view('auth.register',['user'=> 'adminRegister']);
    }
    
    public function register(Request $request){
        
        $data = $this->register->create($request);
        
        
    }
    public function registerGet(Request $request){
        
        return view('auth.register',['user'=> 'registerUser']);
        
    }
    public function registerUser(Request $request){
        
        $data = $this->registeruser->create($request);
   
        if($data->exists){
            return json_encode(true);
        }
        else{
            return json_encode(false);
        }
        
    }
    public function retornoUsuarios(){
        $retorno = User::all();
        return response()->json($retorno);
    }
}