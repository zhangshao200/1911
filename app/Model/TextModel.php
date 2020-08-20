<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TextModel extends Model
{
    public $table='p_goods';
    public $primaryKey='goods_id';
    public $timestamps=false;
}
