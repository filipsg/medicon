<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
        'name', 'email', 'password', 'perfil_id' , 'estado_id', 'foto'
    ];

   
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Relación con Perfiles
    public function perfil(){
    	return $this->hasOne('App\Perfil','id','perfil_id');
    }

    //Relación con Estados
    public function estado(){
    	return $this->hasOne('App\Estado','id','estado_id');
    }

    //Relación con Medicos
    public function medico(){
        return $this->belongsTo('App\Medico');
    }

    // 2018-05-07 BUSCADOR DE USUARIOS POR NOMBRE
    public function scopeNombres($query,$nombre){
        return $query->where('name','LIKE','%'.$nombre.'%');
    }
    // 2018-05-07 BUSCADOR DE USUARIOS POR EMAIL
    public function scopeEmail($query,$nombre){
        return $query->where('email','LIKE','%'.$nombre.'%');
    }
    // 2018-05-07 BUSCADOR DE USUARIOS POR PERFIL
    public function scopePerfil($query,$nombre){
        return $query->where('perfil_id','LIKE','%'.$nombre.'%');
    }
    // 2018-05-07 BUSCADOR DE USUARIOS POR ESTADO
    public function scopeEstado($query,$nombre){
        return $query->where('estado_id','LIKE','%'.$nombre.'%');
    }
}
