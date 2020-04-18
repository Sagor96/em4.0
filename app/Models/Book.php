<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

	protected $fillable = ['eventdate','venue_id','m_type','food_id','equipment_id','flower_id','light_id','service_id'];

    //Many to many
    public function services()
    {
        return $this->belongsToMany('App\Models\Service');
    }

    //Many to many
    public function venues()
    {
        return $this->belongsToMany('App\Models\Venue');
    }

    //Many to many
    public function foods()
    {
        return $this->belongsToMany('App\Models\Food');
    }

    //Many to many
    public function equipments()
    {
        return $this->belongsToMany('App\Models\Equipment');
    }

    //Many to many
    public function flowers()
    {
        return $this->belongsToMany('App\Models\Flower');
    }

    //Many to many
    public function lights()
    {
        return $this->belongsToMany('App\Models\Light');
    }
}
