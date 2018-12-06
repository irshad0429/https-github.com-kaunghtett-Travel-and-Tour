<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Destination;

class TourDestinationControllers extends Controller
{
    //
    public function index() {

        $destinations = Destination::with('des_location')->paginate(9);

    
        return view('web.destinations', compact('destinations'));
    }

}
