<?php

use App\Tipotraza;
use Illuminate\Database\Seeder;

class TipoTrazasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Tipotraza::truncate();
        Tipotraza::create([
        	'descripcion' => 'Heart Beat'
        ]);
        Tipotraza::create([
        	'descripcion' => 'Reporte x tiempo'
        ]);
        Tipotraza::create([
        	'descripcion' => 'Reporte x Movimiento'
        ]);
        Tipotraza::create([
        	'descripcion' => 'Reporte Extemporaneo'
        ]);
    }
}
