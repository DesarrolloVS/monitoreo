<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertasclientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alertasclientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gpsalerta_id');
            $table->foreign('gpsalerta_id')->references('id')->on('gpsalertas');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->unsignedBigInteger('gpsmarcamodelo_id');
            $table->foreign('gpsmarcamodelo_id')->references('id')->on('gpsmarcamodelos');
            $table->string('desc_corta');
            $table->text('descripcion');
            $table->integer('tipoconfiguracion_id')->nullable();
            $table->foreign('tipoconfiguracion_id')->references('id')->on('tipoconfiguracions');
            $table->unsignedBigInteger('camposgps_id');
            $table->foreign('camposgps_id')->references('id')->on('camposgps');
            $table->string('campos_condicion')->nullable();
            $table->Biginteger('valor')->nullable();
            $table->integer('parametros_id')->nullable();
            $table->foreign('parametros_id')->references('id')->on('parametros');
            $table->integer('repetir')->nullable();
            $table->unsignedBigInteger('tipovehiculo_id')->nullable();
            $table->foreign('tipovehiculo_id')->references('id')->on('tipovehiculos');
            $table->boolean('estado')->nullable();
            $table->boolean('pov')->nullable();
            $table->integer('revisar')->nullable();
            $table->integer('aux')->nullable();
            $table->unsignedBigInteger('tipogravedad_id')->nullable();
            $table->foreign('tipogravedad_id')->references('id')->on('tipogravedads');
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
        Schema::dropIfExists('alertasclientes');
    }
}
