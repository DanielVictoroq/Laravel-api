<?php

namespace App\Http\Controllers;

use Session;
use App\Predio;
use App\Comunicado;
use App\ServicoAdicional;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;

class PredioController extends Controller
{
    
    private $homeController;
    
    public function __construct(HomeController $homeController){
        $this->homeController = $homeController;
    }
    
    public function index(){
        $servico = json_decode(
            ServicoAdicional::where('id_condominio','=',Session::get('predio')->id_condominio)
            ->get()
        );
        
        if(date('d') == 10 && !Session::get('caixa')){
            Session::put('caixa', true);
            $ret = Predio::find(Session::get('predio')->id_condominio);
            $ret->vlr_caixa -= Session::get('predio')->vlr_total;
            if($ret->save()){
                $this->homeController->setarSessao();    
            }
        }
        return view('pages.predio', ['data'=> Session::get('predio'), 'servico' => $servico]);
    }
    
    public function gerenciarPredio(){
        $this->homeController->setarSessao();
        return view('pages.gerencia-predio');
    }
    
    public function registrarAlteracoes(Request $request){
        
        $condominio = str_replace(',', '.',$request->input('condominio'));
        $agua = str_replace(',', '.',$request->input('agua'));
        $luz = str_replace(',', '.',$request->input('luz'));
        $faxina = str_replace(',', '.',$request->input('faxina'));
        $elevador = str_replace(',', '.',$request->input('elevador'));
        $caixa = str_replace(',', '.',$request->input('caixa'));
        
        $servico = json_decode(
            ServicoAdicional::where('id_condominio','=',Session::get('predio')->id_condominio)
            ->get()
        );
        
        $valorservicos = 0;
        $valorcaixa = 0;
        foreach($servico as $item){
            $valorservicos += $item->vlr_servico/ $item->meio_pgt;
        }
        
        $valortotal = $valorservicos + $agua + $luz + $faxina + $elevador;
        
        $ret = Predio::find(Session::get('predio')->id_condominio);
        $ret->fill([
            'valor_cond' => $condominio,
            'vlr_agua'   => $agua,
            'vlr_luz'    => $luz,
            'faxina'     => $faxina,
            'elevador'   => $elevador,
            'vlr_total'  => $valortotal, 
            'vlr_caixa'  => $caixa
            ]
        );
        
        if($ret->save()){
            $this->homeController->setarSessao();
            return json_encode(true);
        }
        else{
            return json_encode(false);
        }
        
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