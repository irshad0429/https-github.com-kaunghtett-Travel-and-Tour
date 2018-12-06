<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Location;
class LocationsController extends Controller
{
    //
    public function __construct() {

        $this->middleware('auth');

    }

    public function index() {

        $location = Location::latest()->get();
        return view('admin.locations.index',compact('location'));


    }

    public function create() {

        return view('admin.locations.create'); 

    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $location = Location::create([
            'name' => request('name'),
            
        ]);

        $location->save();

        return redirect('/locations');


    }

    public function edit($id) {

        $location = Location::find($id);

        return view('admin.locations.edit', compact('location','id'));

    }

    public function update(Request $request,$id) {

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $location = Location::find($id);

        $location->name = $request->get('name');

        $location->save();
        return redirect('/locations');

    }


}
