<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $fillable = ['name'];

    public function location() {

		return $this->hasOne('App\TourPackage', 'locations_id');
  }
  
  public function destination_location() {

    return $this->hasMany('App\Destination', 'locations_id');

  }

}
