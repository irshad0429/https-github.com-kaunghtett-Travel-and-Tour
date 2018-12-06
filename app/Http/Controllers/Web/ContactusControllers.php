<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUs;

class ContactusControllers extends Controller
{
    //

    public function index() {

        $contact = Contactus::latest()->get();

        return view('dashboard', compact('contact'));

    }


  
    public function create() {


        return view('web.contact-us.create');


    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'subject' => '',
            'message' => 'required|min:4'
            

        ]);
        
        $contact = Contactus::create([
            'name' => request('name'),
            'email' => request('email'),
            'subject' => request('subject'),
            'message' => request('message'),

        ]);
        
        $contact->save();
        

        return redirect('/contact-us')->with('alert', 'Your message is success');
            


    }



}
