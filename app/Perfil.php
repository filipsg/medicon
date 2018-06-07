<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfiles';
    protected $fillable = ['nombre'];
    public $timestamps = false;

    //Relación con los Usuarios
    public function user(){
    	return $this->belongsTo('App\User');
    }

}
