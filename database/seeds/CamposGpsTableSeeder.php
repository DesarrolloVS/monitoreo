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
        Camposgps::create([	'campo' => 'tipo_repo', 'descripcion' => 'Tipo de reporte, GTFRI, GTHBD, etc...' ]);
        Camposgps::create([ 'campo' => 'modelo_gps', 'descripcion' => 'Modelo del GPS' ]);
        Camposgps::create([ 'campo' => 'message_header', 'descripcion' => 'Cabecera de traza' ]);
        Camposgps::create([ 'campo' => 'report_mask', 'descripcion' => 'Cabecera de reporte' ]);
        Camposgps::create([ 'campo' => 'sack_enable', 'descripcion' => 'Sack activado o desactivado' ]);
        Camposgps::create([ 'campo' => 'message_type', 'descripcion' => 'Tipo de mensaje igual a tipo repo' ]);
        Camposgps::create([ 'campo' => 'protocol_version', 'descripcion' => 'Versión de protocolo XX0000 - XXFFFF' ]);
        Camposgps::create([ 'campo' => 'imei', 'descripcion' => 'IMEI chip ' ]);
        Camposgps::create([ 'campo' => 'device_name', 'descripcion' => 'Nombre del aparato, poner aqui modelo en la configuración del GPS' ]);
        Camposgps::create([ 'campo' => 'report_id', 'descripcion' => 'Identificador utilizado en algunos reportes' ]);
        Camposgps::create([ 'campo' => 'report_type', 'descripcion' => 'Identificador utilizado junto con algunos reportes' ]);
        Camposgps::create([ 'campo' => 'number_points', 'descripcion' => 'Número de reportes , siempre es 1' ]);
        Camposgps::create([ 'campo' => 'gps_accuracy', 'descripcion' => 'Precisión del GPS 1 - 50, menor el valor mas alta la precisión' ]);
        Camposgps::create([ 'campo' => 'speed', 'descripcion' => 'Velocidad del GPS' ]);
        Camposgps::create([ 'campo' => 'Azimuth', 'descripcion' => 'Azimuth del GPS' ]);
        Camposgps::create([ 'campo' => 'altitude', 'descripcion' => 'Altura sobre el nivel del mar del GPS' ]);
        Camposgps::create([ 'campo' => 'longitude', 'descripcion' => 'Longitud de la posición actual del GPS' ]);
        Camposgps::create([ 'campo' => 'latitude', 'descripcion' => 'Latitud de la posición actual del GPS' ]);
        Camposgps::create([ 'campo' => 'gps_utc_time', 'descripcion' => 'Timestamp del GPS' ]);
        Camposgps::create([ 'campo' => 'mcc', 'descripcion' => 'Mobile country code' ]);
        Camposgps::create([ 'campo' => 'mnc', 'descripcion' => 'Mobile network code' ]);
        Camposgps::create([ 'campo' => 'lac', 'descripcion' => 'Location area code in hex format' ]);
        Camposgps::create([ 'campo' => 'cell_id', 'descripcion' => 'Cell ID in hex format' ]);
        Camposgps::create([ 'campo' => 'batt_percentage', 'descripcion' => 'The current volume of the battery in percentage' ]);
        Camposgps::create([ 'campo' => 'send_time', 'descripcion' => 'Timestamp envío de traza' ]);
        Camposgps::create([ 'campo' => 'count_number', 'descripcion' => 'Contador y cierre de traza' ]);
        Camposgps::create([ 'campo' => 'gps_state', 'descripcion' => 'The current motion state of the device' ]);
        Camposgps::create([ 'campo' => 'iccid', 'descripcion' => 'The ICCID of the installed SIM card' ]);
        Camposgps::create([ 'campo' => 'csq_rssi', 'descripcion' => 'The GSM signal strength level' ]);
        Camposgps::create([ 'campo' => 'csq_ber', 'descripcion' => 'The quality of the GSM signal' ]);
        Camposgps::create([ 'campo' => 'external_power_suply', 'descripcion' => 'Whether the external power supply is connected' ]);
        Camposgps::create([ 'campo' => 'battery_voltage', 'descripcion' => 'The voltage of the battery' ]);
        Camposgps::create([ 'campo' => 'gps_charging', 'descripcion' => 'Whether the battery is charging when the external power supply is connected' ]);
        Camposgps::create([ 'campo' => 'led_on', 'descripcion' => 'The setting of <LED on> in AT+GTCFG' ]);
        Camposgps::create([ 'campo' => 'gps_on_need', 'descripcion' => 'The setting of <GPS on need> in AT+GTCFG' ]);
        Camposgps::create([ 'campo' => 'gps_antenna_type', 'descripcion' => 'A numeric to indicate which GPS antenna is working now' ]);
        Camposgps::create([ 'campo' => 'gps_antena_state', 'descripcion' => 'the status of the working GPS antenna' ]);
        Camposgps::create([ 'campo' => 'last_gps_fix_utc_time', 'descripcion' => 'The UTC time of the latest successful GPS fixing' ]);
        Camposgps::create([ 'campo' => 'gps_fix_delay', 'descripcion' => 'Modificar' ]);
        Camposgps::create([ 'campo' => 'report_items_mask', 'descripcion' => 'Modificar' ]);
        Camposgps::create([ 'campo' => 'fri_report_mask', 'descripcion' => 'Modificar' ]);
        Camposgps::create([ 'campo' => 'reserved_gps_bat', 'descripcion' => 'Modificar' ]);
        Camposgps::create([ 'campo' => 'porc_bat_backup', 'descripcion' => 'Modificar' ]);
        Camposgps::create([ 'campo' => 'ignicion', 'descripcion' => 'Modificar' ]);
        Camposgps::create([ 'campo' => 'combustible', 'descripcion' => 'Litros de combustible' ]);
    }
}
