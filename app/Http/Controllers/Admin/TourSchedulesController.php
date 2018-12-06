<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\TourSchedule;
use App\ScheduleImage;


class TourSchedulesController extends Controller
{
    //
	public function __construct() {

		$this->middleware('auth');

	}


	public function index($id) {


		$schedules = TourSchedule::where('tour_packages_id','=', $id)->get();

		


		

		return view('admin.schedules.index', compact('id','schedules'));

	}

	public function create($id) {
		
		return view('admin.schedules.create', compact('id'));

	}


	public function store(Request $request, $id) {

		

		$request->validate([

			'name' => 'required|max:255',
			'description' => 'required|min:4',
			'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'


		]);

		

		$schedules = TourSchedule::create([

			'name' => request('name'),
			'tour_packages_id' => request('tour_packages_id'),
			'description' => request('description'),	


		]);

		
		if($request->hasFile('image'))
		{
			foreach($request->file('image') as $image)
			{
				
				$schimg = new ScheduleImage;
				$schimg->tour_schedules_id = $schedules->id;

				$destinationPath = 'multimages/schedules';
				$extensionpath = $image->getClientOriginalExtension();
				$time = rand(1000,9999).".".time();
				$filename = $time.".".$extensionpath;
				$image->move($destinationPath, $filename);
				$schimg->image = $filename;
				$schimg->save();

				


			}
		}
		

		return redirect('/schedules/'.$schedules->tour_packages_id);

	}

	public function edit($id) {

		$schedules = TourSchedule::with('multi')->where( 'id' ,$id)->first();

		return view ('admin.schedules.edit', compact('schedules', 'id'));
	}

	public function update(Request $request,$id) {

		$request->validate([

			'name' => 'required|max:255',
			'description' => 'required|min:4',
			'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'


		]);

		

		$schedules = TourSchedule::findorfail($id);
		$schedules->name = request('name');
		$schedules->description = request('description');
		$schedules->save();
		
		
		if($request->hasFile('image'))
		{
			foreach($request->file('image') as $image)
			{
				$schimg = new ScheduleImage();
				$schimg->tour_schedules_id = $schedules->id;

				$destinationPath = 'multimages/schedules';
				$extensionpath = $image->getClientOriginalExtension();
				$time = rand(1000,9999).".".time();
				$filename = $time.".".$extensionpath;
				$image->move($destinationPath, $filename);
				$schimg->image = $filename;
				$schedules->multi()->save($schimg);


			}
		}

		return redirect('/schedules/'.$schedules->tour_packages_id);



	}

	public function show($id){

		$schedules = TourSchedule::with('multi')->where( 'id' ,$id)->first();

		return view ('admin.schedules.show', compact('schedules', 'id'));

	}

	public function showdel($id) {

		$schedules = TourSchedule::with('multi')->where( 'id' ,$id)->first();

		return view ('admin.schedules.delete', compact('schedules', 'id'));

	}

	public function destroy($id) {


		$schedules = TourSchedule::with('multi')->where( 'id' ,$id)->first();



		foreach($schedules->multi as $image ) {

			\File::delete(public_path() . '/multimages/schedules/' .$image->image);
		}
			
		


		$schedules->multi()->delete();
			
			

			

			$schedules->delete();





		return redirect('/schedules/'.$id);
	}






public function deleteattachment($id) {

	$attachments = ScheduleImage::find($id);
	$path = public_path().'/multimages/schedules/'.$attachments->image;
	unlink($path);

	$attachments->delete();

	return response()->json($attachments);

}

}




