<?php

use App\Estadoturno;
use Illuminate\Database\Seeder;

class EstadoTurnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Estadoturno::truncate();
        Estadoturno::create([
        	'descripcion' => 'Nuevo Registro'
        ]);
        Estadoturno::create([
        	'descripcion' => 'Activo'
        ]);
        Estadoturno::create([
        	'descripcion' => 'Inactivo'
        ]);
        Estadoturno::create([
        	'descripcion' => 'Baja'
        ]);
    }
}
