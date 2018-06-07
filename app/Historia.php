<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    protected $table = 'historias';
    protected $fillable = ['fecha','asunto','descripcion','paciente_id','	medico_id'];
}
