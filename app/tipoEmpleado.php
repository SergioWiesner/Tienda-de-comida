<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tipoEmpleado extends Model
{
    use SoftDeletes;
    protected $table = "tipo_empleado";
    protected $fillable = ['nombre'];
}
