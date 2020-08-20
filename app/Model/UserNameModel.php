<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserNameModel extends Model
{
    public $table='user_name';
    public $primaryKey='user_id';
    public $timestamps=false;
}
