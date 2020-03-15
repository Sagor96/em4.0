<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decoration extends Model
{
   protected $fillable = ['imagePath', 'd_title','service_id','d_desc','qty','price',]; 
}
