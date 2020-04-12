<?php

use App\Tipoempresa;
use Illuminate\Database\Seeder;

class TipoEmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipoempresa::truncate();
        Tipoempresa::create([
        	'descripcion' => 'Logística'
        ]);
        Tipoempresa::create([
        	'descripcion' => 'Seguridad'
        ]);
    }
}
