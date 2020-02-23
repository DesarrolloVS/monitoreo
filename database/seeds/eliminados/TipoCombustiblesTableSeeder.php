<?php

use App\Tipocombustible;
use Illuminate\Database\Seeder;

class TipoCombustiblesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipocombustible::truncate();
        Tipocombustible::create([
        	'descripcion' => 'Gasolina'
        ]);
        Tipocombustible::create([
        	'descripcion' => 'Diesel'
        ]);    }
}
