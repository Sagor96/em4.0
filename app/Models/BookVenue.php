<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookVenue extends Model
{
    protected $fillable = ['user_id', 'eventms_id','service_id', 'g_count','eventdate'];

    //Many to many
    public function service(){
    	return $this->belongsTo(Service::class);
    }
	public function eventms(){
    	return $this->belongsTo(Event::class);
    }

}
