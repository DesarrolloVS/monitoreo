<?php

use App\Procedencia;
use Illuminate\Database\Seeder;

class ProcedenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Procedencia::truncate();
        Procedencia::create([
        	'descripcion' => 'Nacional'
        ]);
        Procedencia::create([
        	'descripcion' => 'Extranjera'
        ]);
    }
}
