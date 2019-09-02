<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametroscliente extends Model
{
    public function cliente(){
        return $this->belongsTo(Cliente::class)->select('nombre');
    }
}
