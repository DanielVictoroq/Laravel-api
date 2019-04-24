<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';

    public $incrementing = false;
    
    protected $fillable = [
        'nome_usuario', 'nome', 'sobrenome','id_tipo', 'telefone', 'data_nascimento','usuario'
    ];

    protected $primaryKey = 'nome_usuario';

    function user() {
        return $this->belongsTo('App\User','nome_usuario');
    }
    function admin() {
        return $this->belongsTo('App\Admin','nome_usuario');
    }
}
