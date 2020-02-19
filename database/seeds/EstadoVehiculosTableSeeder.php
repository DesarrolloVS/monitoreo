<?php

use App\Estadovehiculo;
use Illuminate\Database\Seeder;

class EstadoVehiculosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Estadovehiculo::truncate();
        Estadovehiculo::create([
        	'descripcion' => 'Nuevo Registro'
        ]);
        Estadovehiculo::create([
        	'descripcion' => 'Activo'
        ]);
        Estadovehiculo::create([
        	'descripcion' => 'Inactivo o Taller'
        ]);
        Estadovehiculo::create([
        	'descripcion' => 'Sin GPS'
        ]);    }
}
