<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metodo extends Model
{
    protected $table = 'metodos';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
