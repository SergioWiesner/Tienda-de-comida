<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ventas extends Model
{
    use SoftDeletes;
    protected $table = "ventas";
    protected $primaryKey = "idventa";
    protected $fillable = ['idventa', 'idcliente', 'valortotal', 'puntos', 'utilizados', 'fechaventa', 'idempleado'];

    public function clientes()
    {
        return $this->belongsTo('App\clientes', 'idcliente', 'idcliente');
    }

    public function detallesventas()
    {
        return $this->hasMany('App\detallesVentas', 'idventa', 'idventa');
    }

    public function empleado()
    {
        return $this->belongsTo('App\User', 'idempleado', 'id');
    }

}
