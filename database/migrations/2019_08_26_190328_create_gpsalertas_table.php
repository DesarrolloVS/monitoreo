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
            $table->text('alerta');
            $table->text('descripcion');
            $table->unsignedBigInteger('gpsmarcamodelo_id');
            $table->foreign('gpsmarcamodelo_id')->references('id')->on('gpsmarcamodelos');
            $table->unsignedBigInteger('camposgps_id');
            $table->foreign('camposgps_id')->references('id')->on('camposgps');
            $table->string('condicion');
            $table->integer('valor');
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
