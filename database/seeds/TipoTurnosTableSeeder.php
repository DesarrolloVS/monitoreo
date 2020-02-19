<?php

use App\Tipoturno;
use Illuminate\Database\Seeder;

class TipoTurnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Tipoturno::truncate();
        Tipoturno::create([
        	'descripcion' => 'Turno Matutino'
        ]);
        Tipoturno::create([
        	'descripcion' => 'Turno Vespertino'
        ]);
        Tipoturno::create([
        	'descripcion' => 'Turno Nocturno'
        ]);
    }
}
