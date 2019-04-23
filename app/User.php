<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nome_usuario', 'email', 'password',
    ];
    
    public $incrementing = false;

    protected $primaryKey = 'nome_usuario';

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function usuario()
    {
        return $this->hasMany('App\Usuario', 'usuario');
    }
    public function apartamento()
    {
        return $this->hasMany('App\Apartamento', 'responsavel');
    }
}
