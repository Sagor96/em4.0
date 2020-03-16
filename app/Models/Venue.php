<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = ['imagePath', 'v_title','service_id','v_location','v_addr','v_status','qty','price',];
}
