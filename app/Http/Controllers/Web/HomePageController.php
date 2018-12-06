<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Destination;
use App\Location;
use App\TourPackage;
use App\Testimonial;


class HomePageController extends Controller
{
    //

    public function index() {

        $packages = TourPackage::with('package_location')->where('p_status','=',1)->limit(6)->get();

        $destination = Destination::with('des_location')->where('p_status','=',1)->limit(4)->get();

       $testimonials = Testimonial::where('status','=',1)->limit(6)->get();


        return view("web.main", compact('packages','destination','testimonials'));

    }

}
