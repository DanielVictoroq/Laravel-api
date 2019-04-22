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
            "id_tipo" => 'M',
            "data_nascimento" => $request->input('date'),
            "telefone" => $request->input('fone'),
            "nome_usuario" => $request->input('nome_usuario'),
            "login" => $request->input('nome_usuario'),
            "email" => $request->input('email'),
            "password" => $request->input('password'),
        ];
        
        $credentials = $request->only('nome_usuario', 'password');
        $remember = $request->only('remember');

        $result = User::find($usuario['nome_usuario']);

        if($result) {
            return json_encode(false);
        }

        $data = $this->create($usuario);
        
        return json_encode($data);
    }
    
    public function user(){

        return json_encode(Usuario::all());
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
            
            $usuario = new Usuario();
            $usuario->fill([
                'nome_usuario' => $data['nome_usuario'],
                'nome' => $data['nome'],
                'sobrenome' => $data['sobrenome'],
                'id_tipo' => $data['id_tipo'],
                'data_nascimento' => $data['data_nascimento'],
                'telefone' => $data['telefone'],
                'login' => $data['login'],
                ]);
                $usuario->save();
                return true;
            }
            else{
                return false;
            }
        }
    }