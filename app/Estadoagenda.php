<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadoagenda extends Model
{
    protected $table = 'estados_agendas';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
