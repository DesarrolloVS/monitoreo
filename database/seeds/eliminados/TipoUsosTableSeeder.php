<?php

use App\Tipouso;
use Illuminate\Database\Seeder;

class TipoUsosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipouso::truncate();
        Tipouso::create([
        	'descripcion' => 'Particular'
        ]);
        Tipouso::create([
        	'descripcion' => 'Transporte'
        ]);
        Tipouso::create([
        	'descripcion' => 'Operación'
        ]);
        Tipouso::create([
        	'descripcion' => 'Mensajería'
        ]);
    }
}
