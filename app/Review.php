<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    
    protected $fillable = ['tour_packages_id','name','message'];

}
