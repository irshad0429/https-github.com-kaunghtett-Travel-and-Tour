<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $contact = Contactus::latest()->get();

        return view('dashboard', compact('contact'));

    }
}
