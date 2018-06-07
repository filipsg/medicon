<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->decimal('valor',8,2);
            $table->decimal('iva',8,2)->nullable();
            $table->decimal('retencion',8,2)->nullable();
            $table->unsignedInteger('agenda_id');
            $table->foreign('agenda_id')->references('id')->on('agendas');
            $table->unsignedInteger('metodo_id');
            $table->foreign('metodo_id')->references('id')->on('metodos');
            $table->unsignedInteger('estado_factura_id');
            $table->foreign('estado_factura_id')->references('id')->on('estados_facturas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
