<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';

    public $incrementing = false;
    
    protected $fillable = [
        'nome_usuario', 'nome', 'sobrenome','id_tipo', 'telefone', 'data_nascimento','login'
    ];

    protected $primaryKey = 'nome_usuario';

}
