<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadovehiculo extends Model
{
    public function vehiculo () {
        return $this->hasMany(Vehiculo::class)->select('descripcion');
    }
}
