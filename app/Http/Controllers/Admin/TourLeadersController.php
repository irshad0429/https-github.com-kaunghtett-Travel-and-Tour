<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TourLeader;


class TourLeadersController extends Controller
{
    //
	public function __construct() {

		$this->middleware('auth');

	}


	public function index() {

		$tourleaders = TourLeader::get();
		
		return view('admin.tourleaders.index', compact('tourleaders'));

	}

	public function create() {

		return view('admin.tourleaders.create');

	}

	public function store(Request $request) {

		$request->validate([
			'education' => 'required|max:255',
			'name' => 'required|max:255',
			'short_description' => 'required|min:4',
			'profile' => 'required|mimes:jpeg,png|max:5000',
			'special' => 'required'



		]);


		$extension =request()->file('profile')->getClientOriginalExtension();
		$name = time();

		$tourleaders = TourLeader::create([

			'education' => request('education'),
			'name' => request('name'),
			'short_description' => request('short_description'),
			'profile' => $name.".".$extension,
			'special' => implode(',',request('special')),
			
		]);


		
		$this->addImage(request()->file('profile'));
		$tourleaders->save();





		return redirect('/tourleaders');

		
	}

	public function edit($id) {


		$tourleaders = TourLeader::findorfail($id);

		$myArray = explode(',',  $tourleaders->special);




		return view('admin.tourleaders.edit', compact('tourleaders','myArray'));

	}

	public function update(Request $request, $id) {

		$request->validate([
			'education' => 'required|max:255',
			'name' => 'required|max:255',
			'short_description' => 'required|min:4',
			'profile' => 'mimes:jpeg,png|max:5000',
			'special' => 'required'

		]);
		



		$tourleaders = TourLeader::findorfail($id);

		$input = $request->except(['profile','special']);
		

		$input['special'] = implode(',',request('special'));

		
		  /** Upade Photo and Recent Photo Delete **/
        if ($file = request()->file('profile')) {
            \File::delete(public_path(). '/multimages/profile/' .$tourleaders->profile);

             $this->addImage(request()->file('profile'));

             $extension =request()->file('profile')->getClientOriginalExtension();
			$name = time();


             $input['profile'] = $name.".".$extension;
        }



		$tourleaders->update($input);

		


		return redirect('/tourleaders');
	


	}


	public function show($id){

		$tourleaders = TourLeader::findorfail($id);

		$myArray = explode(',',  $tourleaders->special);


		return view('admin.tourleaders.show', compact('tourleaders','myArray'));



	}

	public function destroy($id) {

		$tourleaders = TourLeader::findorfail($id);

        \File::delete(public_path(). '/multimages/profile/' .$tourleaders->profile);

       $tourleaders->delete();

       return redirect('/tourleaders');

	}


	protected function addImage($file)
	{
		/** ramdom key*/
		$extension = $file->getClientOriginalExtension();
		$name = time();


		return $file->move(public_path('/multimages/profile'), $name . "." . $extension);
        //public_path() . '/images/featured_companies';
        // return  public_path() . '/public/images/blogs/' .$image_name;  

	}


	



}
