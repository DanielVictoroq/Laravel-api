<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
    protected $table = 'comunicados';
    
    public $incrementing = false;
    
    protected $fillable = [
        'comunicado', 'titulo', 'id_condominio'
    ];
    
    protected $primaryKey = 'id_comunicado';
    
    function user() {
        return $this->belongsTo('App\User','nome_usuario');
    }
    function predio(){
        return $this->belongsTo('App\Predio', 'id_condominio');
    }
}
