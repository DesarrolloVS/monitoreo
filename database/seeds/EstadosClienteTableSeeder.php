<?php

use App\Estadocliente;
use Illuminate\Database\Seeder;

class EstadosClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Estadocliente::truncate();
        Estadocliente::create([
        	'descripcion' => 'Nuevo Registro'
        ]);
        Estadocliente::create([
        	'descripcion' => 'Activo'
        ]);
        Estadocliente::create([
        	'descripcion' => 'Inactivo'
        ]);
        Estadocliente::create([
        	'descripcion' => 'Baja'
        ]);
    }
}
