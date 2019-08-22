<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrazaposicionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trazaposicions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('camposgps_id');
            $table->foreign('camposgps_id')->references('id')->on('camposgps');
            $table->integer('posicion');
            $table->unsignedBigInteger('traza_id');
            $table->foreign('traza_id')->references('id')->on('trazas');
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
        Schema::dropIfExists('trazaposicions');
    }
}
