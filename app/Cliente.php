<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function tipoempleado () {
        return $this->hasMany(Tipoempleado::class)->select('cliente_id','descripcion');
    }

    public function usuario () {
        return $this->hasMany(Usuario::class)->select('cliente_id','nombre');
    }
}
