<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';
    protected $fillable = ['nombre'];
    public $timestamps = false;

    //Relación con los Usuarios
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
