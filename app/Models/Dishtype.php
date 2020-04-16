<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dishtype extends Model
{
    protected $table='dishtypes';
    protected $fillable = [
     'dishtypes'
 ];

 public function foods(){
    	return $this->hasMany(Food::class);
    }
}
