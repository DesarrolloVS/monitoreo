<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGeocerca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geocerca', function (Blueprint $table) {
            $table->bigIncrements('id_geocerca');
            $table->geometry('geom');
            $table->text('descripcion_geocerca');
            $table->text('coordenadas');
            $table->integer('id_tipo_geocerca');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geocerca');
    }
}
