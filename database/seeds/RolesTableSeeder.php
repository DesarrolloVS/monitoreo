<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create([
        	'name' => 'consulta',
        	'display_name' => 'Usuario de Consulta',
        	'descripcion' => 'Usuario de consulta cliente o owner'
        ]);
        Role::create([
        	'name' => 'supervisor',
        	'display_name' => 'Usuario Supervisor',
        	'descripcion' => 'Usuario Supervisor cliente o owner'
        ]);
        Role::create([
        	'name' => 'admin',
        	'display_name' => 'Administrador',
        	'descripcion' => 'Usuario administrador cliente o owner'
        ]);
        Role::create([
        	'name' => 'superuser',
        	'display_name' => 'Super Usuario',
        	'descripcion' => 'Usuario con todos los permisos en el sistema'
        ]);
    }
}
