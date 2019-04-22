<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Usuario;
use App\User;

class UsuarioController extends Controller
{
    public function novo(Request $request)
    {
        $usuario = [
            "nome" => $request->input('nome'),
            "sobrenome" => $request->input('sobrenome'),
            "id_tipo" => $request->input('tipo'),
            "data_nascimento" => $request->input('date'),
            "telefone" => $request->input('fone'),
            "nome_usuario" => $request->input('nome_usuario'),
            "login" => $request->input('nome_usuario'),
            "email" => $request->input('email'),
            "password" => $request->input('password'),
        ];
        
        $credentials = $request->only('nome_usuario', 'password');
        
        if(Auth::guard('admin')->attempt($credentials) || Auth::attempt($credentials)) {
            return false;
        }
        
        $data = $this->create($usuario);
        dd($data);
        if (Auth::attempt($credentials)) {
            \Session::put('admin', false);
            return redirect()->intended('home');
        }
        else{
            return view('pages.home');
        }
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
        $retorno = $this->validator($data);
        
        if($retorno){

            User::create([
                'nome_usuario' => $data['nome_usuario'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                ]
            );
            Usuario::store([
                'nome_usuario' => $data['nome_usuario'],
                'nome' => $data['nome'],
                'sobrenome' => $data['sobrenome'],
                'id_tipo' => $data['id_tipo'],
                'data_nascimento' => $data['data_nascimento'],
                'telefone' => $data['telefone'],
                'login' => $data['login'],
                ]
            );
            
        }
        else{
            return false;
        }
    }
}