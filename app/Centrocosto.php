<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centrocosto extends Model
{
    protected $table = 'centros_costo';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
