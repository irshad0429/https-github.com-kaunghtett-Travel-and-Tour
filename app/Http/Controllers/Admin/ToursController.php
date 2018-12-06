<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\TourCategory;
use App\Http\Controllers\Controller;

class ToursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {

        

        $this->middleware('auth');


    }




    public function index()
    {
        //
        $category = TourCategory::latest()->get();

        return view('admin.categories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = TourCategory::create([
            'name' => request('name'),
            'status' => request('status')?1:0,
        ]);

        $category->save();

        return redirect('/category');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $category = TourCategory::findorfail($id);

        return view('admin.categories.show', compact('category', 'id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = TourCategory::findorfail($id);

       
        return view('admin.categories.edit', compact('category', 'id'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = TourCategory::find($id);

        $category->name = $request->get('name');

        $category->status = $request->get('status')?1:0;

        $category->save();

        return redirect('/category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}
