<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nome_usuario', 'email', 'password',
    ];
    public $incrementing = false;
    
    protected $primaryKey = 'nome_usuario';
    
    protected $guard = 'admin';
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function usuario()
    {
        return $this->hasMany('App\Usuario','usuario');
    }
    
    public function apartamento()
    {
        return $this->hasMany('App\Apartamento', 'responsavel');
    }
}
