<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadofactura extends Model
{
    protected $table = 'estados_facturas';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
