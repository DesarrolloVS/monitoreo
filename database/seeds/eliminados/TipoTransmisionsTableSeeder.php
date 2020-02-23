<?php

use App\Tipotransmision;
use Illuminate\Database\Seeder;

class TipoTransmisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipotransmision::truncate();
        Tipotransmision::create([
        	'descripcion' => 'Estándar'
        ]);
        Tipotransmision::create([
        	'descripcion' => 'Automático'
        ]);
    }
}
