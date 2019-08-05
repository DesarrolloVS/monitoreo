<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadoresponsablevehiculo extends Model
{
    public function responsablevehiculo () {
        return $this->hasMany(Responsablevehiculo::class);
    }
}
