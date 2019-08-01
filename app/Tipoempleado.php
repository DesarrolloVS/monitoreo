<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Cliente;


class Tipoempleado extends Model
{   
    public function cliente () {
        return $this->belongsTo(Cliente::class)->select('nombre');
    }
    
}
