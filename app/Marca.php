<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public function submarca () {
        return $this->hasMany(Submarca::class)->select('descripcion');
    }
}
