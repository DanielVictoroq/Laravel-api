<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function novo()
    {
        $usuario = [
            "nome" => $this->input->post('nome'),
            "sobrenome" => $this->input->post('sobrenome'),
            "id_tipo" => $this->input->post('tipo'),
            "dataNascimento" => $this->input->post('date'),
            "telefone" => $this->input->post('fone'),
            "nome_usuario" => $this->input->post('nome_usuario')
        ];
        
        $credentials = $request->only('nome_usuario', 'password');
        
        if(Auth::guard('admin')->attempt($credentials) || Auth::attempt($credentials, $remember)) {
            return false;
        }
        
        $data = $this->register->create($credentials);
    
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
            return User::create([
                'nome_usuario' => $data->nome_usuario,
                'email' => $data->email,
                'password' => Hash::make($data->password),
                ]
            );
        }
        else{
            return false;
        }
    }
}