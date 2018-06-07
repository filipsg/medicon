<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';
    protected $fillable = ['nombre'];

    //Relación con los Medicos
    public function medico(){
    	return $this->belongsTo('App\Medico');
    }
}
