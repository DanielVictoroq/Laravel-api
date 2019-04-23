<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdminRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    
    use RegistersUsers;
    
    /**
    * Where to redirect users after registration.
    *
    * @var string
    */
    protected $redirectTo = '/home';
    
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function validator($data)
    {
        return Validator::make($data, 
        [
            'nome_usuario' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );
    }
    
    public function create($data)
    {

        return Admin::create([
            'nome_usuario' => $data->nome_usuario,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            ]
        );
    }
}
