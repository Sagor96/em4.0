<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entertainment extends Model
{
    protected $fillable = ['imagePath', 'et_title','service_id','et_desc','qty','price',];
}
