<?php

use App\Estadousuario;
use Illuminate\Database\Seeder;

class EstadoUsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Estadousuario::truncate();
        Estadousuario::create([
        	'descripcion' => 'Nuevo Registro'
        ]);
        Estadousuario::create([
        	'descripcion' => 'Activo'
        ]);
        Estadousuario::create([
        	'descripcion' => 'Inactivo'
        ]);
        Estadousuario::create([
        	'descripcion' => 'Baja'
        ]);
    }
}
