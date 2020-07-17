<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NameModel extends Model
{
    protected $table='name';
    protected $primaryKey='id';
    public $timestamps=false;
}
