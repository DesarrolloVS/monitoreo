<?php

use App\Tipoconfiguracion;
use Illuminate\Database\Seeder;

class TipoConfiguracionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Tipoconfiguracion::truncate();
        Tipoconfiguracion::create([
        	'descripcion' => 'Cambio en valor, en cuanto cambia el valor, se genera la alerta'
        ]);
        Tipoconfiguracion::create([
        	'descripcion' => 'Valor igual, si el valor es igual al que se envía, genera la alerta de acuerdo al
parámetro repetir'
        ]);
        Tipoconfiguracion::create([
        	'descripcion' => 'Valor menor, si el valor que se envía es menor que el parámetro, genera alerta y la
repite de acuerdo al parámetro de repetición'
        ]);
        Tipoconfiguracion::create([
        	'descripcion' => 'Valor mayor, si el valor que se envía es mayor que el parámetro, genera alerta y la
repite de acuerdo al parámetro de repetición'
        ]);
        Tipoconfiguracion::create([
        	'descripcion' => 'Valor menor del enviado, pero con un margen más amplio se envía valor máximo'
        ]);
        Tipoconfiguracion::create([
        	'descripcion' => 'Valor mayor del enviado, pero con un margen más amplio se envía valor máximo'
        ]);
        Tipoconfiguracion::create([
        	'descripcion' => 'Heart Beat, crontab que revise esta alarma'
        ]);
        Tipoconfiguracion::create([
        	'descripcion' => 'Tipo de mensaje igual a, dispara alerta si se cumple el tipo de mensaje'
        ]);
        Tipoconfiguracion::create([
        	'descripcion' => 'Tipo de mesaje y Tipo de reporte igual, dispara alerta si se cumple el tipo de mensaje y tipo de reporte'
        ]);
        Tipoconfiguracion::create([
        	'descripcion' => 'Tipo de mensaje y ID Reporte, dispara alerta si se cumple el tipo de mensaje y ID reporte'
        ]);
    }
}
