<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ventas extends Model
{
    use SoftDeletes;
    protected $table = "ventas";
    protected $fillable = ['idventa', 'idcliente', 'valortotal', 'puntos', 'utilizados', 'fechaventa', 'idempleado'];
}
