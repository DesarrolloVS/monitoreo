<?php

use App\Tipodomicilio;
use Illuminate\Database\Seeder;

class TipoDomiciliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Tipodomicilio::truncate();
        Tipodomicilio::create([
        	'descripcion' => 'Domicilio Fiscal'
        ]);
        Tipodomicilio::create([
        	'descripcion' => 'Domicilio Empresa'
        ]);
        Tipodomicilio::create([
        	'descripcion' => 'Domicilio Notificaciones'
        ]);    }
}
