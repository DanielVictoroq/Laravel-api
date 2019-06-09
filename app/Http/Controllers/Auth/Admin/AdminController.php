<?php

namespace App\Http\Controllers\Auth\Admin;

use App\User;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Auth\Admin\AdminRegisterController;

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
    public function index(){
        return view('pages.home',['data'=> 'adminRegister']);
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
        $retorno = Admin::all();
        return response()->json($retorno);
    }
}