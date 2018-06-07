<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agendas';
    protected $fillable = ['fecha_ini','fecha_fin','user_id','paciente_id','medico_id',
		'servicio_id','estado_id'];
}
