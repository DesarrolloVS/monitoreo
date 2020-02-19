<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
    	//Catálogos clientes
         $this->call(TipoPersonasTableSeeder::class);
         $this->call(TipoEmpresasTableSeeder::class);
         $this->call(TipoServiciosTableSeeder::class);
         $this->call(EstadosClienteTableSeeder::class);
         $this->call(TipoDomiciliosTableSeeder::class);
         $this->call(ClientesTableSeeder::class);
         // Catálogos Usuarios
         $this->call(EstadoUsuariosTableSeeder::class);
         // Catálogos Turnos
         $this->call(EstadoTurnosTableSeeder::class);
         $this->call(TipoTurnosTableSeeder::class);
         // Catálogos Responsable Vehículo
         $this->call(EstadoResponsableVehiculosTableSeeder::class);
         // Catálogos GPS
         $this->call(TipoTrazasTableSeeder::class);
         $this->call(EstadoTrazasTableSeeder::class);
         $this->call(CamposGpsTableSeeder::class);

         //Catálogos vehiculos
         $this->call(ProcedenciasTableSeeder::class);
         $this->call(TipoVehiculosTableSeeder::class);
         $this->call(TipoUsosTableSeeder::class);
         $this->call(TipoCombustiblesTableSeeder::class);
         $this->call(TipoTransmisionsTableSeeder::class);
         $this->call(EstadoVehiculosTableSeeder::class);
         $this->call(ClaseVehiculosTableSeeder::class);
         $this->call(MarcasTableSeeder::class);
         */
         $this->call(SubMarcasTableSeeder::class);
    }
}
