<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehiculo extends Model
{
    public function estadovehiculo () {
        return $this->belongsTo(Estadovehiculo::class)->select('descripcion');
    }

    public function gpscliente () {
        return $this->belongsTo(Gpscliente::class);
    }

    public function cliente () {
        return $this->belongsTo(Cliente::class)->select('nombre');
    }
}