<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsablesvehiculo extends Model
{
    public function usuario () {
        return $this->belongsTo(Usuario::class);
    }    
}