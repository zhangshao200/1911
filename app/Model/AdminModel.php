<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    public $table='admin';
    public $primaryKey='id';
    public $timestamps=false;
}
