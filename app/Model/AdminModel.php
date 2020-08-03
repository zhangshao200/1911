<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    public $table='comment';
    public $primaryKey='id';
    public $timestamps=false;
}
