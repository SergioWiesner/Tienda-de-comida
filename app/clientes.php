<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class clientes extends Model
{
    use SoftDeletes;
    protected $table = "clientes";
    protected $fillable = ['idcliente', 'cedula', 'nombre', 'ciudad', 'puntos'];
}
