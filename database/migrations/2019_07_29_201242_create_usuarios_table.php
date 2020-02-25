<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadousuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('descripcion');
            $table->timestamps();
        });

        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('nombre');
            $table->text('paterno');
            $table->text('materno');
            $table->text('email');
            $table->text('rfc');
            $table->text('curp');
            $table->integer('empleado')->nullable();
            $table->unsignedBigInteger('tipoempleado_id')->nullable();
            $table->integer('rep_legal')->nullable();
            $table->integer('contacto')->nullable();
            $table->integer('usuario')->nullable();
            $table->unsignedBigInteger('estadousuario_id')->nullable();
            $table->foreign('estadousuario_id')->references('id')->on('estadousuarios');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->string('password')->nullable();
            $table->timestamps();
//            $table->foreign('tipoempleado_id')->references('id')->on('tipoempleados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('estadousuarios');
    }
}
