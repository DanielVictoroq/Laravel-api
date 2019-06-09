<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{
    protected $table = 'condominio';

    public $incrementing = false;
    
    protected $fillable = [
        'id_condominio','nome_cond', 'valor_cond', 'vlr_agua','vlr_luz', 'faxina', 'elevador','vlr_total', 'vlr_caixa', 'sindico_atual'
    ];
    protected $primaryKey = 'id_condominio';

    function usuario() {
        return $this->hasMany('App\Usuario','id_condominio');
    }
    function ocorrencia(){
        return $this->hasMany('App\Ocorrencia', 'id_condominio');
    }
    function comunicado(){
        return $this->hasMany('App\Comunicado', 'id_condominio');
    }

}
