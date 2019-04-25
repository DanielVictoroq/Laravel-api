<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Predio;
use App\ServicoAdicional;
use App\Comunicado;
use Session;

class PredioController extends Controller
{
    
    private $homeController;
    
    public function __construct(HomeController $homeController){
        $this->homeController = $homeController;
    }
    
    public function index(){
        $data = json_decode(Predio::find(Session::get('predio')->id_condominio));
        $servico = json_decode(ServicoAdicional::where('id_condominio','=',Session::get('predio')->id_condominio)->get());
        return view('pages.predio', ['data'=> $data, 'servico' => $servico]);
    }
    
    public function indexRecados(){
        $this->homeController->setarSessao();
        return view('pages.recados');
    }

    public function criarRecados(Request $request){
        $recado = new Comunicado();
        $recado->fill([
            'comunicado' => $request->input('recado'),
            'titulo' => $request->input('titulorecado'),
            'id_condominio' =>Session::get('predio')->id_condominio,
            ]
        );
        if($recado->save()){
            return json_encode(true);
        }
        return json_encode(false);
    }
    public function excluirRecados(Request $request){
        $data = Comunicado::find($request->input('recado'));
        $this->homeController->setarSessao();
        if($data){
            $data->delete();
            $this->homeController->setarSessao();
            return json_encode(true);
        }
        return json_encode(false);
    }
    
    public function indexOcorrencias(){
        return view('pages.ocorrencias');
    }
}