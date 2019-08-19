<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function cliente(){
        return $this->belongsTo(Cliente::class)->select('nombre');
    }
    
    public function responsablevehiculo () {
        return $this->hasMany(Responsablevehiculo::class);
    }

    public function responsablesvehiculoh () {
        return $this->hasMany(Responsablesvehiculoh::class);
    }

    public function responsablesvehiculo () {
        return $this->hasMany(Responsablesvehiculo::class);
    }
}
