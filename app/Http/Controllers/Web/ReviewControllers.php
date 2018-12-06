<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;

class ReviewControllers extends Controller
{
    //
    public function store(Request $request) {

        $request->validate([

          
            'name' => 'required',
            'message' => 'required',


        ]);

        $review = Review::create([

            'tour_packages_id' => request('tour_packages_id'),
            'name' => request('name'),
            'message' => request('message'),

        ]);

        $review->save();
        return redirect('/tour-details/'.$review->tour_packages_id);

    }

    public function index() {
        $review = Review::latest()->get();
        return view('admin.reviews.index',compact('review'));
    }

}
