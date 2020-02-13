<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoBase extends Model
{
    protected $table = 'productobase';
    protected $primaryKey = 'id_producto_base';
}
