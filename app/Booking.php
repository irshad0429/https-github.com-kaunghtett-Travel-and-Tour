<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = [ 'username','email','from','address','phone','tour_packages_id', 'quantity','status','date'];


    public function booking() {

        return $this->belongsTo('App\TourPackage', 'tour_packages_id');

    }

    public function getFromDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

}
