<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    protected $fillable=['c_name','c_desc'];

    public function events()
    {
    	return $this->hasMany(Event::class);
    }

}
