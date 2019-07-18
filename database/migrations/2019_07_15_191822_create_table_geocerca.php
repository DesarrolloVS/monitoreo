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
            $table->bigIncrements('id');
            $table->float('latitud', 10, 7);
            $table->float('longitud', 10, 7);
            $table->text('descripcion_geocerca');
            $table->integer('id_tipo_geocerca');
            $table->integer('id_tipo_alerta');
            $table->float('metros_alerta');
            $table->integer('estado');
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
        Schema::dropIfExists('geocerca');
    }
}
