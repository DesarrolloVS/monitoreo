<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Ine extends Model
{
    protected $fillable = [
        'calle',
        'celular',
        'clave_elector',
        'colonia_id',
        'correo',
        'cp',
        'delegacion_id',
        'entidad_id',
        'exterior',
        'fechaafiliacion',
        'interior',
        'materno',
        'nombre',
        'paterno',
        'seccion',
        'telefono',
        'link'
    ];

    public function getUrlPathAttribute(){
        return Storage::disk('images')->get($this->link);
    }
}
