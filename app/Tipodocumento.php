<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipodocumento extends Model
{
    protected $table = 'tipos_documento';
    protected $fillable = ['nombre','formato_id'];

}
