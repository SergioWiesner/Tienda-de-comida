<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class proveedores extends Model
{
    use SoftDeletes;
    protected $table = "proveedores";
    protected $fillable = ['nombreproveedor'];
}
