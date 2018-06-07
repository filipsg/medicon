<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auxiliar extends Model
{
    protected $table = 'auxiliares';
    protected $fillable = ['cargo','telefono','user_id']
    public $timestamps = false;
}
