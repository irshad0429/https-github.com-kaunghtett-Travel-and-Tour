<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Destination;
use App\Location;
use App\Destination_Image;
use App\TourPackage;

class DestinationsdetailsController extends Controller
{
    //

    public function index($id) {

        
        $destination = Destination::with('des_location')->where('p_status','=',1)->first();

        $gallery = Destination_Image::where('destinations_id','=',$id)->get();

        $newpic = Destination_Image::where('destinations_id','=',$id)->max('id');


       $des_location = $destination->locations_id;

       
        $packages = TourPackage::with('package_location')->where('locations_id','=',$des_location)->limit(3)->get();
     
        return view('web.destinations-details', compact('destination','id','gallery','newpic','packages'));


    }




}
