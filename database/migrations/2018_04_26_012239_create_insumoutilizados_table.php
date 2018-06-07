<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsumoutilizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumos_utilizados', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('historia_id');
            $table->unsignedInteger('insumo_id');
            $table->integer('cantidad');
            $table->decimal('precio',8,2);

            $table->timestamps();

            $table->foreign('historia_id')->references('id')->on('historias');
            $table->foreign('insumo_id')->references('id')->on('insumos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insumos_utilizados');
    }
}
