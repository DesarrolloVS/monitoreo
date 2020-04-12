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
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->string('placa');
            $table->string('serie');
            $table->unsignedBigInteger('tipovehiculo_id');
            $table->foreign('tipovehiculo_id')->references('id')->on('tipovehiculos');
            $table->string('marca');
            $table->string('submarca');
            $table->string('modelo');
            $table->string('color');
            $table->unsignedBigInteger('gpscliente_id')->nullable();
            $table->foreign('gpscliente_id')->references('id')->on('gpsclientes');
            $table->unsignedBigInteger('estadovehiculo_id')->nullable();
            $table->foreign('estadovehiculo_id')->references('id')->on('estadovehiculos');
            $table->timestamps();

            /*
            $table->integer('puertas');
            $table->integer('cilindros');
            $table->string('chasis');
            $table->integer('capacidad');
            $table->unsignedBigInteger('procedencia_id');
            $table->foreign('procedencia_id')->references('id')->on('procedencias');
            $table->unsignedBigInteger('tipouso_id');
            $table->foreign('tipouso_id')->references('id')->on('tipousos');
            $table->unsignedBigInteger('tipocombustible_id');
            $table->foreign('tipocombustible_id')->references('id')->on('tipocombustibles');
            $table->unsignedBigInteger('tipotransmision_id');
            $table->foreign('tipotransmision_id')->references('id')->on('tipotransmisions');
            $table->string('version');
            $table->unsignedBigInteger('clasevehiculo_id');
            $table->foreign('clasevehiculo_id')->references('id')->on('clasevehiculos');
            $table->unsignedBigInteger('estadovehiculo_id')->nullable();
            $table->foreign('estadovehiculo_id')->references('id')->on('estadovehiculos');
            $table->unsignedBigInteger('gpscliente_id')->nullable();
            $table->foreign('gpscliente_id')->references('id')->on('gpsclientes');
            $table->unsignedBigInteger('responsablevehiculo_id')->nullable();
            $table->foreign('responsablevehiculo_id')->references('id')->on('responsablevehiculos');
            $table->string('vin');
            $table->string('rfv');
            $table->boolean('balizado');
            */
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
