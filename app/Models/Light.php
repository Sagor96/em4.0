<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Light extends Model
{
    protected $fillable = ['l_type','service_id'];

    //Many to many
    public function service(){
    	return $this->belongsTo(Service::class);
    }
}
