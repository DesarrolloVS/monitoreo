<?php

use App\Cliente;
use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Cliente::truncate();
        Cliente::create([
        	'nombre' => 'Empresa 1',
        	'tipopersona_id' => 1,
        	'rfc' => 'XXXX999999111',
        	'tipoempresa_id' => 1,
        	'estadocliente_id' => 1
        ]);
        Cliente::create([
        	'nombre' => 'Empresa 2',
        	'tipopersona_id' => 1,
        	'rfc' => 'XXXX999999222',
        	'tipoempresa_id' => 2,
        	'estadocliente_id' => 1
        ]);
    }
}
