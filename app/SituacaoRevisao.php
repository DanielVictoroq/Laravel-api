<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SituacaoRevisao extends Model
{
    protected $table = 'situacao_revisao';

    public $incrementing = false;
    
    protected $fillable = [
        'nome', 'ult_revisao', 'data_prox_revisao', 'id_condominio'
    ];

    protected $primaryKey = 'id_situacao';

    function user() {
        return $this->belongsTo('App\User','nome_usuario');
    }
    function admin() {
        return $this->belongsTo('App\Admin','nome_usuario');
    }
}
