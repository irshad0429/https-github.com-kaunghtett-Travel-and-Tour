<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourCategory extends Model
{
    //

    protected $table = "tour_categories";
	protected $fillable = ['name', 'status'];

	public function category() {

		return $this->hasOne('App\TourPackage', 'tour_categories_id');
	}
 
}
