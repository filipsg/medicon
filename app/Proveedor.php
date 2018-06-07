<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $fillable = ['nombre','telefono'];

    //Relación con Productos
    public function producto(){
    	return $this->hasMany('App\Producto');
    }

}
