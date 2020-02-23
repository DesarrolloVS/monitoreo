<?php

use App\Estadogpscliente;
use Illuminate\Database\Seeder;

class EstadoGpsClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estadogpscliente::truncate();
        Estadogpscliente::create([
        	'descripcion' => 'Nuevo Registro'
        ]);
        Estadogpscliente::create([
        	'descripcion' => 'Activo'
        ]);
        Estadogpscliente::create([
        	'descripcion' => 'Inactivo'
        ]);
        Estadogpscliente::create([
        	'descripcion' => 'Baja'
        ]);
}
