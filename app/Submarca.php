<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submarca extends Model
{
    public function marca () {
        return $this->belongsTo(Marca::class)->select('descripcion');
    }
}
