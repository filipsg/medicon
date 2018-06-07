<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $fillable = ['numero','fecha','cantidad',
		'precio','proveedor_id','producto_id','user_id'];
}
