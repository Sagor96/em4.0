<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event2 extends Model
{
    protected $fillable=['e_date','e_name','e_desc','catagory_id','service_id'];

   public function catagory()
    {
    	return $this->belongsTo(Catagory::class);
    }

   public function services()
    {
        return $this->belongsToMany(Services::class);
    }

}
