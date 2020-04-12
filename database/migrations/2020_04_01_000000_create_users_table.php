<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->text('nombre');
            $table->text('paterno');
            $table->text('materno');

            $table->text('rfc');
            $table->text('curp');
            $table->integer('rep_legal')->nullable();
            $table->integer('contacto')->nullable();
            $table->integer('usuario')->nullable();
            $table->integer('aviso')->nullable();
            $table->integer('tipo_usuario');

            $table->unsignedBigInteger('estadousuario_id')->nullable();
            $table->foreign('estadousuario_id')->references('id')->on('estadousuarios');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
