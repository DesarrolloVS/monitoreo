<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('descripcion');
            $table->unsignedBigInteger('marca_id');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->unsignedBigInteger('submarca_id');
            $table->foreign('submarca_id')->references('id')->on('submarcas');
            $table->unsignedBigInteger('modelo_id');
            $table->foreign('modelo_id')->references('id')->on('modelos');
            $table->integer('puertas');
            $table->integer('clindros');
            $table->string('serie');
            $table->string('chasis');
            $table->integer('capacidad');
            $table->unsignedBigInteger('procedencia_id');
            $table->foreign('procedencia_id')->references('id')->on('procedencias');
            $table->unsignedBigInteger('tipovehiculo_id');
            $table->foreign('tipovehiculo_id')->references('id')->on('tipovehiculos');
            $table->unsignedBigInteger('tipouso_id');
            $table->foreign('tipouso_id')->references('id')->on('tipousos');
            $table->unsignedBigInteger('tipocombustible_id');
            $table->foreign('tipocombustible_id')->references('id')->on('tipocombustibles');
            $table->unsignedBigInteger('tipotransmision_id');
            $table->foreign('tipotransmision_id')->references('id')->on('tipotransmisions');
            $table->string('version');
            $table->unsignedBigInteger('clasevehiculo_id');
            $table->foreign('clasevehiculo_id')->references('id')->on('clasevehiculos');
            $table->string('vin');
            $table->string('rfv');
            $table->string('color');
            $table->boolean('balizado');
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
        Schema::dropIfExists('vehiculos');
    }
}
