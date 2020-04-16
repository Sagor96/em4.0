<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
     protected $fillable = ['m_type','dishtype_id','service_id'];

    //Many to many
    public function service(){
    	return $this->belongsTo(Service::class);
    }
}
