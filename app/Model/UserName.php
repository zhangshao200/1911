<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserName extends Model
{
    public $table='user_pwd';
    public $primaryKey='user_id';
    public $timestamps=false;
}
