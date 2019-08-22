<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traza extends Model
{
    public function tipotraza () {
        return $this->belongsTo(Tipotraza::class)->select('descripcion');
    }

    public function gpsmarcamodelo () {
        return $this->belongsTo(Gpsmarcamodelo::class)->select('modelo','marca');
    }
}
