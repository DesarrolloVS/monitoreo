<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gpsalerta extends Model
{
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
}
