<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $table='events';

    public function book_veunes(){
    	return $this->belongsTo(BookVenue::class);
    }
}
