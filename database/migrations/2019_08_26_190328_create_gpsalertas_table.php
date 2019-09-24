<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGpsalertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gpsalertas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gpsmarcamodelo_id');
            $table->foreign('gpsmarcamodelo_id')->references('id')->on('gpsmarcamodelos');
            $table->text('alerta');
            $table->integer('tipoalerta');
            $table->unsignedBigInteger('tipovehiculo_id')->nullable();
            $table->foreign('tipovehiculo_id')->references('id')->on('tipovehiculos');
            $table->unsignedBigInteger('camposgps_id');
            $table->foreign('camposgps_id')->references('id')->on('camposgps');
            $table->integer('tipodato');
            $table->integer('ventero')->nullable();
            $table->float('vdecimal', 8, 2)->nullable();
            $table->date('vfecha')->nullable();
            $table->boolean('vbooleano')->nullable();
            $table->string('vcadena')->nullable();
            $table->integer('funcion');
            $table->integer('repetir')->nullable();
            $table->integer('revisar')->nullable();
            $table->boolean('estado')->default(0);
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
        Schema::dropIfExists('gpsalertas');
    }
}
