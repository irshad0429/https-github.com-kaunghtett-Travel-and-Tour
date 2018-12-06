<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    //
    protected $fillable = ['locations_id','name','description','image','p_status'];

    public function destinationspath()
	{

		
		return 'multimages/destinations/' . $this->image;	
	}
    
    public function destination() {

		return $this->hasMany('App\Destination_Image', 'destinations_id');

    }
    
    public function des_location() {

            return $this->belongsTo('App\Location', 'locations_id');

    }


}
