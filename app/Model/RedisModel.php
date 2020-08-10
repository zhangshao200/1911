<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RedisModel extends Model
{
    public $table='p_goods';
    public $primaryKey='goods_id';
    public $timestamps=false;
}
