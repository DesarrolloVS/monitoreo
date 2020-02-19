<?php

use App\Clasevehiculo;
use Illuminate\Database\Seeder;

class ClaseVehiculosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clasevehiculo::truncate();
        Clasevehiculo::create([
        	'descripcion' => 'Particular'
        ]);
        Clasevehiculo::create([
        	'descripcion' => 'Transporte Público'
        ]);
    }
}
