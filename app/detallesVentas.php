<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detallesVentas extends Model
{
    protected $table = "detalles_venta";
    protected $fillable = ['idventa', 'idProducto', 'cantidad', 'valor'];

    public function ventas()
    {
        return $this->belongsTo('App\ventas', 'idventa', 'idventa');
    }
}
