<?php

use App\Estadoresponsablevehiculo;
use Illuminate\Database\Seeder;

class EstadoResponsableVehiculosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Estadoresponsablevehiculo::truncate();
        Estadoresponsablevehiculo::create([
        	'descripcion' => 'Nuevo Registro'
        ]);
        Estadoresponsablevehiculo::create([
        	'descripcion' => 'Activo'
        ]);
        Estadoresponsablevehiculo::create([
        	'descripcion' => 'Inactivo'
        ]);
        Estadoresponsablevehiculo::create([
        	'descripcion' => 'Baja'
        ]);
    }
}
