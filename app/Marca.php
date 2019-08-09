<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public function submarca () {
        return $this->hasMany(Submarca::class)->select('descripcion');
    }

    public function vehiculo () {
        return $this->hasMany(Vehiculo::class)->select('descripcion');
    }
}
