<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Predio;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index()
    {
        if (!Auth::check()){
            return redirect('/login');
        }
        $sessao = $this->setarSessao();
        return view('pages.home', ['data' => $sessao]);
    }
    
    public function setarSessao(){
        $cred = Auth::user();
        $data = json_decode(
            User::with('usuario.predio.ocorrencia','usuario.predio.comunicado', 'apartamento')
            ->find($cred->nome_usuario)
        );
        $sindico = json_decode(
            Usuario::where('id_tipo', '=', 'S')
            ->where('id_condominio','=', $data->usuario[0]->id_condominio)
            ->get()
        );
        if($sindico){
            Session::put('sindico', $sindico[0]);
        }
        
        Session::put('dados_login',  $data->usuario[0]);
        Session::put('predio', $data->usuario[0]->predio);
        Session::put('ocorrencias', $data->usuario[0]->predio->ocorrencia);
        Session::put('recados', $data->usuario[0]->predio->comunicado);
        
        return $data->apartamento[0];
    }
    
    public function forgot(){
        return redirect('pages.home');
    }
    
    public function registerGet(){
        $data = json_decode(Predio::all());
        
        return view('auth.register',['data' => $data]);   
    }
    
    public function forgotGet(){
        return view('auth.passwords.reset');
    }
    
}
