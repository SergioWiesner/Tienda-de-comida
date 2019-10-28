<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class franquicias extends Model
{
    use SoftDeletes;
    protected $table = "franquicias";
    protected $fillable = ['id', 'nombrefranquicia', 'idlocalidad', 'direccion', 'telefono'];
}
