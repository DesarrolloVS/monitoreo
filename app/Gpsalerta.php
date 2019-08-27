<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gpsalerta extends Model
{
    public function gpsmarcamodelo () {
        return $this->belongsTo(Gpsmarcamodelo::class)->select('modelo','marca');
    }

    public function camposgps () {
        return $this->belongsTo(Camposgps::class)->select('descripcion');
    }
}
