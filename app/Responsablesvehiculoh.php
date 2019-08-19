<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsablesvehiculoh extends Model
{
    public function usuario () {
        return $this->belongsTo(Usuario::class);
    }    

    // public function cliente () {
    //     return $this->belongsTo(Cliente::class)->select('nombre');
    // }    

}
