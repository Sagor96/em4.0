<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = ['service_id', 'v_addr'];

    //Many to many
    public function service(){
    	return $this->belongsTo(Service::class);
    }
}
