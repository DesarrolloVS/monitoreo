<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadogpscliente extends Model
{
    public function gpscliente () {
        return $this->hasMany(Gpscliente::class);
    }
}
