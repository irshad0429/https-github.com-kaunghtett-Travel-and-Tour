<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourLeader extends Model
{
    //
	protected $fillable = ['education', 'name', 'short_description', 'profile','special'];

	public function leader_package() {

		return $this->hasOne('App\TourPackage', 'tour_leaders_id');

	}


	public function profilepath()
	{

		
		return 'multimages/profile/'. $this->profile;	
	}

	

}
