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
}