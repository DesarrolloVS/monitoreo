<?php

use App\Tipovehiculo;
use Illuminate\Database\Seeder;

class TipoVehiculosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipovehiculo::truncate();
        Tipovehiculo::create([
        	'descripcion' => 'Automóvil'
        ]);
        Tipovehiculo::create([
        	'descripcion' => 'Camioneta'
        ]);
        Tipovehiculo::create([
        	'descripcion' => 'Tractocamión'
        ]);
        Tipovehiculo::create([
        	'descripcion' => 'Motocicleta'
        ]);
    }
}
