<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trazaposicion extends Model
{
    public function tipotraza () {
        return $this->belongsTo(Tipotraza::class)->select('descripcion');
    }

    public function camposgps () {
        return $this->belongsTo(Camposgps::class)->select('descripcion');
    }
}
