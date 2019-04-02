<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\JobsController;
class HomeController extends Controller
{
    
    private $jobs;
    
    public function __construct(JobsController $jobs){
        $this->jobs = $jobs;
    }
    public function index()
    {
        return view('home');
    }
    
    public function tabelafu(){
        $jobs = $this->jobs->index();
        $jobs = $jobs->getData();

        return view('tabela', ['jobs' => $jobs ]);
    }
    
    public function inserirJobs(Request $request){
        
        $jobs = $this->jobs->store($request);
        return redirect('tabela');  
    }
    public function criarJob(Request $request){
        return view('job');
    }
    
    public function excluirJob(Request $request){
        $id = $request->input('id');
        $ret = $this->jobs->destroy($id);

        return redirect('tabela'); 
    }
}
