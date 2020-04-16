<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    protected $fillable = ['service_id', 'color'];

    //Many to many
    public function service(){
    	return $this->belongsTo(Service::class);
    }
}
