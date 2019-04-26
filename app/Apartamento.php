<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartamento extends Model
{
    protected $table = 'apartamentos';

    public $incrementing = false;
    
    protected $fillable = [
        'n_apt', 'responsavel', 'vlr_agua','vlr_gas', 'med_agua', 'med_gas','vlr_total'
    ];

    protected $primaryKey = 'id_apartamento';

    function user() {
        return $this->belongsTo('App\User','nome_usuario');
    }
    function admin() {
        return $this->belongsTo('App\Admin','nome_usuario');
    }
}
