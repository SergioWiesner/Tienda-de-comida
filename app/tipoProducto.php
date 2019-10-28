<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class tipoProducto extends Model
{

    protected $table = "tipo_producto";
    protected $fillable = ['id', 'nombre'];
}
