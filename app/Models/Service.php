<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['s_name','slug','s_desc'];

     public function events()
    {
        return $this->belongsToMany(Event2::class);
    }
}
