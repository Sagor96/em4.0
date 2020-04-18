<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model implements Buyable 
{
	protected $fillable = ['name','slug','details','price','weight',];
	public function getBuyableIdentifier($options = null) {
        return $this->id;
    }
    public function getBuyableDescription($options = null) {
        return $this->name;
    }
    public function getBuyablePrice($options = null) {
        return $this->price;
    }
    public function getBuyableWeight($options = null) {
        return $this->weight;
    }

    //Many to many
    public function flowers(){
    	return $this->hasMany(Flower::class);
    }

    //Many to many
    public function venues(){
        return $this->hasMany(Venue::class);
    }

    //Many to many
    public function equipments(){
        return $this->hasMany(Equipment::class);
    }

    //Many to many
    public function lights(){
        return $this->hasMany(Light::class);
    }

    //Many to many
    public function foods(){
        return $this->hasMany(Food::class);
    }

    //Many to many
    public function books()
    {
        return $this->belongsToMany('App\Models\Book');
    }

}