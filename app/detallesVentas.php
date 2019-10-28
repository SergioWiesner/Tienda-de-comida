<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detallesVentas extends Model
{
    use SoftDeletes;
    protected $table = "detalles_venta";
    protected $fillable = ['idventa', 'idProducto', 'cantidad', 'valor'];
}
