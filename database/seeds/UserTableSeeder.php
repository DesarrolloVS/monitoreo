<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
        	'name' => 'Victor',
        	'email' => 'system@mon.com',
        	'password' => bcrypt('1234'),
        	'nombre' => 'Victor',
        	'paterno' => 'L',
        	'materno' => 'H',
        	'rfc' => 'rfc',
        	'curp' => 'curp',
        	'tipo_usuario' => 1,
            'usuario' => 1,
            'estadousuario_id' => 2
        ]);
    }
}

