<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table = 'movimientos';
    protected $fillable = ['fecha','concepto','debito','credito','tipo_id','centro_id','cuenta_id'];
}
