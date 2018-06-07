<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medicos';
    protected $fillable = ['telefono','tarjeta_prof','user_id','servicio_id'];


    //Relación con Servicios
    public function servicios(){
    	return $this->hasOne('App\Servicio','id','servicio_id');
    }

    //Relación con Usuarios
    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }

}
