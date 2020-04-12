<?php

use App\Parametros;
use Illuminate\Database\Seeder;

class ParametrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Parametros::truncate();
        Parametros::create([
        	'parametro' => 'BATERIA_PORCENTAJE',
        	'descripcion' => 'VALOR PARA LANZAR ALERTA DE BATERíA BAJA',
        	'valor' => '70' ]);
        Parametros::create([
        	'parametro' => 'VELOCIDAD_CAMION',
        	'descripcion' => 'VALOR PARA LANZAR ALERTA EXCESO DE VELOCIDAD CAMIÓN',
        	'valor' => '80' ]);
        Parametros::create([
        	'parametro' => 'VELOCIDAD_AUTOMOVIL',
        	'descripcion' => 'VALOR PARA LANZAR ALERTA EXCESO DE VELOCIDAD AUTOMOVIL',
        	'valor' => '90' ]);
        Parametros::create([
        	'parametro' => 'DRENADO_AUTOMOVIL',
        	'descripcion' => 'VALOR PARA LANZAR ALERTA DRENADO DE COMBUSTIBLE AUTOMOVIL',
        	'valor' => '5']);
        Parametros::create([
        	'parametro' => 'DRENADO_CAMION',
        	'descripcion' => 'VALOR PARA LANZAR ALERTA DRENADO DE COMBUSTIBLE CAMION',
        	'valor' => '10' ]);
        Parametros::create([
        	'parametro' => 'CARGA_CAMION',
        	'descripcion' => 'VALOR PARA LANZAR ALERTA CARGA DE COMBUSTIBLE CAMION',
        	'valor' => '10']);
        Parametros::create([
        	'parametro' => 'CARGA_AUTOMOVIL',
        	'descripcion' => 'VALOR PARA LANZAR ALERTA CARGA DE COMBUSTIBLE AUTOMOVIL',
        	'valor' => '5' ]);
    }
}
