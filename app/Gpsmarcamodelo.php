<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gpsmarcamodelo extends Model
{
    public function gpscliente () {
        return $this->hasMany(Gpscliente::class);
    }
}
