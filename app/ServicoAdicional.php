<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicoAdicional extends Model
{
    protected $table = 'servico_adicional';

    public $incrementing = false;
    
    protected $fillable = [
        'tipo_servico', 'descricao', 'id_condominio'
    ];
    
    protected $primaryKey = 'id_servico';
    
    function user() {
        return $this->belongsTo('App\User','nome_usuario');
    }
}
