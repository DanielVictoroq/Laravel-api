<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Usuario;
use App\User;
use App\Apartamento;

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
            "usuario" => $request->input('nome_usuario'),
            "email" => $request->input('email'),
            "password" => $request->input('password'),
            "n_apt" => $request->input('n_apt'),
            "remember" => $request->only('remember'),
        ];
        
        $credentials = $request->only('nome_usuario', 'password');
        
        $result = User::find($usuario['nome_usuario']);
        
        if($result) {
            return json_encode(false);
        }
        
        $data = $this->create($usuario);
        
        return json_encode($data);
    }
    
    public function getSindico(){
        $data = Usuario::all();
        $sindico = '';
        foreach($data as $item)
        {
            if($item->id_tipo == 'S'){
                $sindico = $item->nome.' '.$item->sobrenome;
            }
        }   
        return view('admin.sindico', ['data' => json_decode($data), 'sindico' => $sindico]);
        
    }
    public function definirSindico(Request $request){

        $novo = $request->input('sindico');

        $antsindico = Usuario::where('id_tipo', '=', 'S')->update(['id_tipo' => 'M']);

        $novosindico = Usuario::find($novo);
        $novosindico->id_tipo = 'S';
        $novosindico->save();

        return json_encode(true);

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
                'remember' => null
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
                'usuario' => $data['usuario'],
                ]
            );
            $usuario->save();
            
            $apartamento = new Apartamento();
            $apartamento->fill([
                'responsavel' => $data['nome_usuario'],
                'n_apt' => $data['n_apt'],
                ]
            );
            $apartamento->save();
            return true;
        }
        else{
            return false;
        }
    }
}