<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('descripcion');
            $table->time('horainicio');
            $table->time('horafin');
            $table->unsignedBigInteger('tipoturno_id');
            $table->foreign('tipoturno_id')->references('id')->on('tipoturnos');
            $table->unsignedBigInteger('estadoturno_id')->nullable();
            $table->foreign('estadoturno_id')->references('id')->on('estadoturnos');
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
        Schema::dropIfExists('turnos');
    }
}
