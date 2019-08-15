<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Gpscliente extends Model
{
    public function cliente () {
        return $this->belongsTo(Cliente::class)->select('nombre');
    }

    public function gpsmarcamodelo () {
        return $this->belongsTo(Gpsmarcamodelo::class)->select('marca','modelo');
    }

    public function estadogpscliente () {
        return $this->belongsTo(Estadogpscliente::class)->select('descripcion');
    }

    public function vehiculo () {
        return $this->belongsTo(Vehiculo::class);
    }
}
