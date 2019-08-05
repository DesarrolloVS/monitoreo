<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    
    public function tipoturno () {
        return $this->belongsTo(Tipoturno::class);
    }

    public function estadoturno() {
        return $this->belongsTo(Estadoturno::class);
    }

    public function responsablevehiculo() {
        return $this->hasMany(Responsablevehiculo::class);
    }
}
