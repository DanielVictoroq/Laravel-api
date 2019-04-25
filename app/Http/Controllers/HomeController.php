<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Predio;
use App\Usuario;
use App\Comunicado;
use App\Ocorrencia;
use Session;

class HomeController extends Controller
{
    
    public function index()
    {
        if (!Auth::check() && !Auth::guard('admin')->check() ){
            return redirect('/login');
        }
        if(Auth::guard('admin')->check()){
            return redirect()->route('getSindico');
        }
        
        $sessao = $this->setarSessao();
        
        return view('pages.home', ['data' => $sessao]);
    }
    
    public function setarSessao(){
        $data = json_decode(User::with('usuario', 'apartamento')->find(Session::get('dados_login')->nome_usuario));
        $sindico = Usuario::where('id_tipo', '=', 'S')->get();
        $condominio = json_decode(Predio::find($data->usuario[0]->id_condominio));
        $ocorrencias = json_decode(Ocorrencia::where('id_condominio', '=', $data->usuario[0]->id_condominio)->get());
        $recados = json_decode(Comunicado::where('id_condominio', '=', $data->usuario[0]->id_condominio)->get());
        Session::put('sindico', $sindico[0]);
        Session::put('predio', $condominio);
        Session::put('ocorrencias', $ocorrencias);
        Session::put('recados', $recados);
        return $data->apartamento[0];
    }
    
    public function forgot(){
        return redirect('pages.home');
    }
    
    public function registerGet(){
        return view('auth.register',['user'=> 'register/post']);   
    }
    
    public function forgotGet(){
        return view('auth.passwords.reset');
    }
    
}
