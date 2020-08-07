<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    public $table='user_token';
    public $primaryKey='user_id';
    public $timestamps=false;
}
