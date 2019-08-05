<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsablevehiculo extends Model
{   
    public function usuario () {
        return $this->belongsTo(Usuario::class);
    }    

    public function cliente () {
        return $this->belongsTo(Cliente::class)->select('nombre');
    }    

    public function turno() {
        return $this->belongsTo(Turno::class);
    }

    public function estadoresponsablevehiculo() {
        return $this->belongsTo(Estadoresponsablevehiculo::class)->select('descripcion');
    }
}
