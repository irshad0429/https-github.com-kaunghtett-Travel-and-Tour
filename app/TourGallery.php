<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourGallery extends Model
{
    //
    protected $fillable = ['tour_packages_id','gallery'];

    public function gallery() {

        return $this->belongsTo('App\TourPackage', 'tour_packages_id');

    }

    public function gallerypath()
	{

		
        return $this->gallery;	
        
	}



}
