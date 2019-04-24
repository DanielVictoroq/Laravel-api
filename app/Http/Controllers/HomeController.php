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

        $cred = Auth::user();
        $data = json_decode(User::with('usuario', 'apartamento')->find($cred->nome_usuario));
        $sessao = $this->setarSessao($data);

        return view('pages.home', ['data' => $data->apartamento[0]]);
    }

    public function setarSessao($data){

        $sindico = Usuario::where('id_tipo', '=', 'S')->get();
        $condominio = json_decode(Predio::find($data->usuario[0]->id_condominio));
        $ocorrencias = json_decode(Ocorrencia::where('id_condominio', '=', $data->usuario[0]->id_condominio)->get());
        $recados = json_decode(Comunicado::where('id_condominio', '=', $data->usuario[0]->id_condominio)->get());
        Session::put('sindico', $sindico[0]);
        Session::put('predio', $condominio);
        Session::put('ocorrencias', $ocorrencias);
        Session::put('recados', $recados);
        
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
