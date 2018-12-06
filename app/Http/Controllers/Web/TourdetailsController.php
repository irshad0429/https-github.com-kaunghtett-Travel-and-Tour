<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Destination;
use App\Location;
use App\TourPackage;
use App\TourGallery;
use App\TourSchedule;

class TourdetailsController extends Controller
{
    //

    public function index($id) {

        $packages = TourPackage::with('package_location')->where('id','=',$id)->first();

    

        $days = TourSchedule::where('tour_packages_id','=',$id)->get();

       $packagesgallery = TourGallery::where('tour_packages_id','=',$id)->get();

       $newgallery = TourGallery::where('tour_packages_id','=',$id)->max('id');


       $otherpackages = TourPackage::with('package_location')->limit(5)->get();

        return view('web.tourdetail', compact('packages','packagesgallery','newgallery','otherpackages' ,'days','id'));


    }



}
