<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourSchedule extends Model
{
    //
	protected $fillable = ['name', 'tour_packages_id', 'description'];

	public function schedule() {

		return $this->belongsTo('App\TourPackage', 'tour_packages_id');
	}


	public function multi() {

		return $this->hasMany('App\ScheduleImage', 'tour_schedules_id');
	}

}
