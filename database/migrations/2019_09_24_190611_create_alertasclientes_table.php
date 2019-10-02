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
            $table->unsignedBigInteger('gpsalerta_id')->nullable();
            $table->foreign('gpsalerta_id')->references('id')->on('gpsalertas');
            $table->unsignedBigInteger('gpscliente_id')->nullable();
            $table->foreign('gpscliente_id')->references('id')->on('gpsclientes');
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
