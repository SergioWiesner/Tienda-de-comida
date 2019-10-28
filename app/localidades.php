<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class localidades extends Model
{
    protected $table = "localidades";
    protected $fillable = ['nombrelocalidad'];
}
