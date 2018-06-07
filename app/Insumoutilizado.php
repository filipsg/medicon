<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumoutilizado extends Model
{
    protected $table = 'insumos_utilizados';
    protected $fillable = ['cantidad','precio','historia_id','insumo_id'];
}
