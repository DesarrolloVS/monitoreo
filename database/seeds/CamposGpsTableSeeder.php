<?php

use App\Camposgps;
use Illuminate\Database\Seeder;

class CamposGpsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Camposgps::truncate();
        Camposgps::create([	'descripcion' => 'Velocidad' ]);
        Camposgps::create([ 'descripcion' => 'Dirección' ]);
        Camposgps::create([ 'descripcion' => 'Altitud' ]);
        Camposgps::create([ 'descripcion' => 'Longitud' ]);
        Camposgps::create([ 'descripcion' => 'Latitude' ]);
        Camposgps::create([ 'descripcion' => 'Fecha Registro GPS' ]);
        Camposgps::create([ 'descripcion' => 'MCC' ]);
        Camposgps::create([ 'descripcion' => 'MNC' ]);
        Camposgps::create([ 'descripcion' => 'LAC' ]);
        Camposgps::create([ 'descripcion' => 'Cell ID' ]);
        Camposgps::create([ 'descripcion' => 'Porcentaje Batería' ]);
        Camposgps::create([ 'descripcion' => 'Respaldo Batería' ]);
        Camposgps::create([ 'descripcion' => 'Fecha Registro Envío' ]);
        Camposgps::create([ 'descripcion' => 'Ignición' ]);
        Camposgps::create([ 'descripcion' => 'GTEPN Alim. Ext. Conectado' ]);
        Camposgps::create([ 'descripcion' => 'GTEPF Alim. Ext. Desconectado' ]);
        Camposgps::create([ 'descripcion' => 'GTBPL Bateria Baja' ]);
        Camposgps::create([ 'descripcion' => 'GTSTC Carga Detenido' ]);
        Camposgps::create([ 'descripcion' => 'Cambio de estado' ]);
        Camposgps::create([ 'descripcion' => 'GTSPD Fuera de Rango de Velocidad' ]);
        Camposgps::create([ 'descripcion' => 'GTNMR 0 Cam Edo, mov a detenido' ]);
        Camposgps::create([ 'descripcion' => 'GTNMR 1 Cam Edo, det a Movimiento' ]);
        Camposgps::create([ 'descripcion' => 'GTSTT 21 Encendido y sin Movimiento' ]);
        Camposgps::create([ 'descripcion' => 'GTSTT 22 Encendido y en movimiento' ]);
        Camposgps::create([ 'descripcion' => 'GTSTT 41 Sin movimiento y apagado' ]);
        Camposgps::create([ 'descripcion' => 'GTSTT 42 en movimiento y encendido' ]);
        Camposgps::create([ 'descripcion' => 'Fecha último envío' ]);
        Camposgps::create([ 'descripcion' => 'Señal GPS ' ]);
        Camposgps::create([ 'descripcion' => 'Señal GPRS' ]);
        Camposgps::create([ 'descripcion' => 'Estado del GPS' ]);
        Camposgps::create([ 'descripcion' => 'Hodometro' ]);
        Camposgps::create([ 'descripcion' => 'Horometro' ]);
        Camposgps::create([ 'descripcion' => 'Satelites' ]);
        Camposgps::create([ 'descripcion' => 'Voltage' ]);
        Camposgps::create([ 'descripcion' => 'Combustible' ]);
    }
}
