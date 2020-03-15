<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $fillable = ['imagePath', 't_title','service_id','t_desc','qty','price',];
}
