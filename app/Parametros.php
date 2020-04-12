<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametros extends Model
{
    public function gpsalerta () {
        return $this->hasMany(Gpsalerta::class);
    }
}
