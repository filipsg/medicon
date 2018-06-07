<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre','precio','proveedor_id'];

    //Relación con Proveedores
    public function proveedor(){
    	return $this->belongsTo('App\Proveedor','proveedor_id');
    }
}
