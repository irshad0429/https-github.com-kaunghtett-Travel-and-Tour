<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Ourteam;
use App\MemberCategory;

class OurteamControllers extends Controller
{
    //
    public function __construct() {

        $this->middleware('auth')->except('team');

    }

    public function team() {

        $ourteams = Ourteam::latest()->get();

        $teamone = MemberCategory::with('member')->get();
        
        return view('web.ourteam',compact('ourteams','teamone'));


    }

    public function index() {

        $ourteams = Ourteam::latest()->get();
       

        return view('admin.ourteams.index',compact('ourteams'));

    }

    public function create() {

        return view('admin.ourteams.create');

    }

    public function store(Request $request) {

        $request->validate([
            "member_categories_id" => 'required',
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "name" => 'required',
            "role" => 'required',
			
            ]);
            
        $ourteam = new Ourteam([
           
         'member_categories_id' => request('member_categories_id'),   
         'name' => request('name'),
         'role' => request('role'),
         'description' => request('description'),   


        ]);
            
        if($request->hasFile('image'))

        {
            $image = $request->file('image');

            
            
            $time = rand(1000,9999).".".time();


            $extensionpath = $image->getClientOriginalExtension();
           
			$time = rand(1000,9999).".".time();
								
			$image_name = $time.".".$extensionpath;
			$destinationPath = '/multimages/ourteam/' . $image_name;
			$image_resize = Image::make($image->getRealPath());
								
								// dd(public_path($destinationPath));

			$img = $image_resize->save(public_path($destinationPath),100);		

								
			$ourteam->image = $destinationPath; 	
								// dd($img);
									
			$ourteam->save();


        }

        $ourteam->save();
        
        return redirect('/admin/team');
    }

    public function edit($id) {

        $ourteams = Ourteam::find($id);
        return view('admin.ourteams.edit',compact('ourteams'));

    }

    public function update(Request $request,$id) {

        $request->validate([
            "member_categories_id" => 'required',
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "name" => 'required',
            "role" => 'required',
			
            ]);
            
        $ourteams = Ourteam::find($id);
        $ourteams->member_categories_id = $request->get('member_categories_id');
        
        $ourteams->name = $request->get('name');
        $ourteams->role = $request->get('role');
        $ourteams->description = $request->get('description');
            
        if($request->hasFile('image'))

        {
            \File::delete(public_path(). '/multimages/ourteam/' .$ourteams->image);
            $image = $request->file('image');

            
            
            $time = rand(1000,9999).".".time();


            $extensionpath = $image->getClientOriginalExtension();
           
			$time = rand(1000,9999).".".time();
								
			$image_name = $time.".".$extensionpath;
			$destinationPath = '/multimages/ourteam/' . $image_name;
			$image_resize = Image::make($image->getRealPath());
								
								// dd(public_path($destinationPath));

			$img = $image_resize->save(public_path($destinationPath),100);		

								
			$ourteams->image = $destinationPath; 	
								// dd($img);
									
			$ourteams->save();


        }
        $ourteams->update();
        return redirect('/admin/team');

    }

    public function show($id) {

        $ourteams = Ourteam::find($id);
       
        return view ('admin.ourteams.show',compact('ourteams'));
    }


    public function destroy($id) {

        $ourteams = Ourteam::find($id);

        \File::delete(public_path(). '/multimages/ourteam/' .$ourteams->image);

        $ourteams->delete();

        return redirect('/admin/team');

    }

}


