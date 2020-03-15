<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['imagePath', 'f_title','service_id','f_desc','qty','price',];
}
