<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detallesVentas extends Model
{
    protected $table = "detalles_venta";
    protected $fillable = ['idventa', 'idproducto', 'cantidad', 'valor'];

    public function ventas()
    {
        return $this->belongsTo('App\ventas', 'idventa', 'idventa');
    }

    public function producto()
    {
        return $this->hasOne('App\productos', 'idproductos', 'idproducto');
    }
}
