<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadoturno extends Model
{
    public function turno () {
        return $this->hasMany(Turno::class);
    }
}
