<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipotraza extends Model
{
    public function traza () {
        return $this->hasMany(Traza::class);
    }
}
