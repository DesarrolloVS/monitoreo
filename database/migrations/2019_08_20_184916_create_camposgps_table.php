<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCamposgpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camposgps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('descripcion');
            $table->unsignedBigInteger('gpsmarcamodelo_id');
            $table->foreign('gpsmarcamodelo_id')->references('id')->on('gpsmarcamodelos');
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
        Schema::dropIfExists('camposgps');
    }
}
