<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    public function marca () {
        return $this->belongsTo(Marca::class)->select('descripcion');
    }

    public function submarca () {
        return $this->belongsTo(Submarca::class)->select('descripcion');
    }
}
