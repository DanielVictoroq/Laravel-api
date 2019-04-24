<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Predio;
use App\ServicoAdicional;
use Session;

class PredioController extends Controller
{
    public function index(){
        $data = json_decode(Predio::find(Session::get('predio')->id_condominio));
        $servico = json_decode(ServicoAdicional::where('id_condominio','=',Session::get('predio')->id_condominio)->get());
        return view('pages.predio', ['data'=> $data, 'servico' => $servico]);
    }

    public function indexRecados(){
        return view('pages.recados');
    }
    
    public function indexOcorrencias(){
        return view('pages.ocorrencias');
    }
}