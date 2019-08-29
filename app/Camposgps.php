<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camposgps extends Model
{
    // public function gpsmarcamodelo () {
    //     return $this->belongsTo(Gpsmarcamodelo::class)->select('marca','modelo');
    // }

    public function trazaposicion () {
        return $this->hasMany(Trazaposicion::class)->select('marca','modelo');
    }

    public function gpsalerta () {
        return $this->hasMany(Gpsalerta::class);
    }
}
