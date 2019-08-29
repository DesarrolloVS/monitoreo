<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gpsmarcamodelo extends Model
{
    public function gpscliente () {
        return $this->hasMany(Gpscliente::class);
    }

    // public function camposgps () {
    //     return $this->hasMany(Camposgps::class);
    // }

    public function traza () {
        return $this->hasMany(Traza::class);
    }

    public function gpsalerta () {
        return $this->hasMany(Gpsalerta::class);
    }
}
