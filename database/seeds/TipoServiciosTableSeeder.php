<?php

use App\Tiposervicio;
use Illuminate\Database\Seeder;

class TipoServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Tiposervicio::truncate();
        Tiposervicio::create([
        	'descripcion' => 'Monitoreo'
        ]);
        Tiposervicio::create([
        	'descripcion' => 'API'
        ]);
        Tiposervicio::create([
        	'descripcion' => 'Envío'
        ]);
    }
}
