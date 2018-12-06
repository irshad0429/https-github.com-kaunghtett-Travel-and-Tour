<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MemberCategory;

class MembercategoriesControllers extends Controller
{
    //
    public function __construct() {

        

        $this->middleware('auth');


    }




    public function index()
    {
        //
        $category = MemberCategory::latest()->get();

        return view('admin.member.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('admin.member.create');
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

        $category = MemberCategory::create([
            'name' => request('name'),
            
        ]);

        $category->save();

        return redirect('/membercategory');

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

        $category = MemberCategory::findorfail($id);

        return view('admin.member.show', compact('category', 'id'));

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
        $category = MemberCategory::findorfail($id);

       
        return view('admin.member.edit', compact('category', 'id'));


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

        $category = MemberCategory::find($id);

        $category->name = $request->get('name');

        

        $category->save();

        return redirect('/membercategory');

    }


}
