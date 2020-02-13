<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicable extends Model
{
    protected $table = 'ipublicable';
    protected $primaryKey = 'id_publicable';
}
