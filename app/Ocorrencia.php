<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    
    public $incrementing = false;
    
    protected $fillable = [
        'ocorrencia', 'titulo', 'nome_usuario', 'id_condominio'
    ];
    
    protected $primaryKey = 'id_ocorrencia';
    
    function user() {
        return $this->belongsTo('App\User','nome_usuario');
    }
    function predio(){
        
        return $this->belongsTo('App\Predio', 'id_condominio');
        
    }
}
