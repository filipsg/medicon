<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = 'cuentas';
    protected $fillable = ['nombre','nivel_id'];
    public $timestamps = false;
}
