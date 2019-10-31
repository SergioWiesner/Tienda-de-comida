<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class clientes extends Model
{
    use SoftDeletes;
    protected $primaryKey = "idcliente";
    protected $table = "clientes";
    protected $fillable = ['idcliente', 'cedula', 'nombre', 'ciudad', 'puntos'];

    public function ventas()
    {
        return $this->hasMany('App\ventas', 'idcliente', 'idcliente');
    }
}
