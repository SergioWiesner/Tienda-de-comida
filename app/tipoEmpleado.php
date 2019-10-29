<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoEmpleado extends Model
{
    protected $table = "tipo_empleado";
    protected $fillable = ['nombre'];
}
