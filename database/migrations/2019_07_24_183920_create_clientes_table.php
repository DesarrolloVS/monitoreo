<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('nombre');
            $table->string('logo')->nullable();
            $table->unsignedBigInteger('tipopersona_id');
            $table->foreign('tipopersona_id')->references('id')->on('tipopersonas');
            $table->string('rfc');
            $table->string('usuario_id')->comment('Usuario de Contacto')->nullable();
            $table->unsignedBigInteger('tipoempresa_id');
            $table->foreign('tipoempresa_id')->references('id')->on('tipoempresas');
            $table->unsignedBigInteger('estadocliente_id');
            $table->foreign('estadocliente_id')->references('id')->on('estadoclientes');
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
        Schema::dropIfExists('clientes');
    }
}
