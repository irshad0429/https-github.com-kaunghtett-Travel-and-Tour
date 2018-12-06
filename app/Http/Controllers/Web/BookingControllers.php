<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TourPackage;
use App\Booking;

class BookingControllers extends Controller
{
    //
    public function booking($id) {

        $package = TourPackage::with('package_location','tour_leader')->where('id','=',$id)->first();

        
        return view('web.booking', compact('id','package'));

    }

    public function index() {

        $bookings = Booking::with('booking')->latest()->get();

        return view('admin.bookings.index',compact('bookings'));

    }

   

    public function store(Request $request) {

        $request->validate([
			"username" => 'required',
            "email" => 'required',
            "from" => 'required',
			"phone" => 'required|min:7',
			"tour_packages_id" => 'required',
			"quantity" => 'required',
			"date" => 'required',
			
            ]);
            
            

            $date = request('date');
            // dd($date);
            $oldDate = implode('-', array_reverse(explode('/', $date)));
            // $oldDate = explode('-', $date);
            
            // dd($oldDate);
            $newDate = $oldDate;
           
            // dd($newDate);
            $dates = date('Y-m-d',strtotime($newDate));
    

         

            

            $bookings = new Booking([
				
				'username'=> request('username'),
                'email' => request('email'),
                'from' => request('from'),
				'address' => request('address'),
                'phone' => request('phone'),
				'tour_packages_id' => request('tour_packages_id'),
                'quantity' => request('quantity'),
				'status' => "pending",
                'date' => $dates,
                ]);
                
            $bookings->save();

            $package = TourPackage::with('package_location')->where('id','=',$bookings->tour_packages_id)->first();

            

            return view('web.booking-information', compact('bookings','package'));   

    }

    




    public function edit($id) {

        $bookings = Booking::find($id);
       
        return view('admin.bookings.edit',compact('bookings','id'));

    }


    public function update($id,Request $request) {

         
        $request->validate([
			"username" => 'required',
			"email" => 'required',
            "from" => 'required',
			"phone" => 'required|min:7',
			"tour_packages_id" => 'required',
            "quantity" => 'required',
            "status" => 'required',
			"date" => 'required',
			
            ]);

            
            $date = $request->get('date');

            // dd($date);
            // dd($ddd);
            // $oldDate = implode('-', array_reverse(explode('/', $date)));
            $oldDate = explode('/', $date);
            // dd($oldDate);
            $newDate = $oldDate[0];
            // dd($newDate);

            $dates = date('Y-m-d',strtotime($newDate));
            


            $bookings = Booking::find($id);
            $bookings->username = $request->get('username');
            $bookings->email = $request->get('email');
            $bookings->from = $request->get('from');
            $bookings->address = $request->get('address');
            $bookings->phone = $request->get('phone');
            $bookings->tour_packages_id = $request->get('tour_packages_id');
            $bookings->quantity = $request->get('quantity');
            $bookings->status = $request->get('status');
            $bookings->date = $dates;

            $bookings->save();
            
            return redirect('booking');


    }



}
