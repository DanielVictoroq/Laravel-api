<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Usuario;
use App\User;
use App\Apartamento;

class HomeController extends Controller
{
    
    public function index()
    {
        if (!Auth::check()){
            return redirect('/login');
        }
        
        $cred = Auth::user();
        $data = json_encode(Apartamento::where('responsavel', '=', $cred->nome_usuario));

        dd($cred->nome_usuario);
        $data = json_decode(User::with('apartamento')->get());
        
        
        return view('pages.home', ['data' => $data[0]->apartamento[0]]);
    }    
    
    public function teste(){
        return json_decode(User::with('apartamento')->get());
        
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
