<?php

use App\Estadotraza;
use Illuminate\Database\Seeder;

class EstadoTrazasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Estadotraza::truncate();
        Estadotraza::create([
        	'descripcion' => 'Nuevo Registro'
        ]);
        Estadotraza::create([
        	'descripcion' => 'Activo'
        ]);
        Estadotraza::create([
        	'descripcion' => 'Inactivo'
        ]);
        Estadotraza::create([
        	'descripcion' => 'Baja'
        ]);
    }
}
