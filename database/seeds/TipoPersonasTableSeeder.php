<?php

use App\Tipopersona;
use Illuminate\Database\Seeder;

class TipoPersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('nombre de tabla')->truncate();

		// id, descripcion, created_at, updated_at
        Tipopersona::truncate();
        Tipopersona::create([
        	'descripcion' => 'Persona Física'
        ]);
        Tipopersona::create([
        	'descripcion' => 'Persona Moral'
        ]);

    }
}
