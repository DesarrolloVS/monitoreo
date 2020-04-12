<?php

namespace App;

use App\Parametros;
use Illuminate\Database\Eloquent\Model;

class Alertascliente extends Model
{
    public function cliente () {
        return $this->belongsTo(Cliente::class);
    }

    public function gpsmarcamodelo () {
        return $this->belongsTo(Gpsmarcamodelo::class)->select('modelo','marca');
    }

    public function camposgps () {
        return $this->belongsTo(Camposgps::class)->select('campo');
    }
    public function tipoconfiguracion()
    {
        return $this->belongsTo(Tipoconfiguracion::class)->select('id','descripcion');
    }
    public function tipovehiculo()
    {
        return $this->belongsTo(Tipovehiculo::class)->select('descripcion');
    }

    public function parametros()
    {
        return $this->belongsTo(Parametros::class)->select('id', 'parametro');
    }

    public function tipogravedad()
    {
        return $this->belongsTo(Tipogravedad::class)->select('id', 'descripcion');
    }

}
