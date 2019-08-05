<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoturno extends Model
{
    
    public function turno () {
        return $this->hasMany(Turno::class);
    }
    
}
