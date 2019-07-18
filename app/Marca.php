<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = "marca"; // table name
    protected $primaryKey = 'id_marca';
}