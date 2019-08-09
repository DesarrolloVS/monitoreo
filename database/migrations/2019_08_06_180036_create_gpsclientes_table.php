<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGpsclientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gpsclientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serie');
            $table->string('imei');
            $table->integer('puerto')->nullable();
            $table->integer('sincronizacion')->nullable();
            $table->unsignedBigInteger('gpsmarcamodelo_id');
            $table->foreign('gpsmarcamodelo_id')->references('id')->on('gpsmarcamodelos');
            $table->unsignedBigInteger('estadogpscliente_id')->nullable();
            $table->foreign('estadogpscliente_id')->references('id')->on('estadogpsclientes');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes');
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
        Schema::dropIfExists('gpsclientes');
    }
}
