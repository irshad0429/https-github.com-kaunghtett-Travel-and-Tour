<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleImage extends Model
{
    //

	protected $fillable = ['tour_schedules_id', 'image'];

	public function boo()
	{

		
		return 'multimages/schedules/' . $this->image;	
	}



	public function foo() {

		return $this->belongsTo('App\TourSchedule', 'tour_schedules_id');

	}

}
