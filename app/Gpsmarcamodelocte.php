<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gpsmarcamodelocte extends Model
{
    public function cliente () {
        return $this->belongsTo(Cliente::class)->select('nombre');
    }

    public function gpsmarcamodelo () {
        return $this->belongsTo(Gpsmarcamodelo::class)->select('marca','modelo');
    }

}
