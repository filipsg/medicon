<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'facturas';
    protected $fillable = ['numero','valor','iva','retencion','agenda_id','metodo_id','estado_factura_id'];

}
