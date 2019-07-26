<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('calle');
            $table->text('colonia');
            $table->string('cp');
            $table->text('municipio')->nullable();
            $table->text('ciudad')->nullable();
            $table->text('estado');
            $table->text('interior')->nullable();
            $table->text('exterior')->nullable();
            $table->unsignedBigInteger('cliente_id');                    
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->unsignedBigInteger('tipodomicilio_id');                    
            $table->foreign('tipodomicilio_id')->references('id')->on('tipodomicilios');
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
        Schema::dropIfExists('domicilios');
    }
}
