<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    //
		protected $fillable =  [ 'tour_categories_id','locations_id','tour_leaders_id', 'name', 'short_description','service','duration','image','price','lat','long','p_status'];

		public function packagepath()
	{

		
		return 'multimages/package/' . $this->image;	
	}

		public function package() {
			
			return $this->belongsTo('App\TourCategory', 'tour_categories_id');
		}

		public function tours() {

			return $this->hasMany('App\TourSchedule', 'tour_packages_id');
		}

		public function gallerypackage() {
			
			return $this->hasMany('App\TourGallery', 'tour_packages_id');
		}

		public function package_location() {
			
			return $this->belongsTo('App\Location', 'locations_id');
		}

		public function package_booking() {
			
			return $this->hasMany('App\Booking', 'tour_packages_id');
		}

		public function tour_leader() {

			return $this->belongsTo('App\TourLeader', 'tour_leaders_id');

		}
		

}
