<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Destination;
use App\Destination_Image;
use App\Location;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class DestinationsController extends Controller
{
    //
    public function __construct(){

        $this->middleware('auth');

    }

    public function index() {

		$destinations = Destination::with('des_location')->latest()->get();
		
    

        return view('admin.destinations.index', compact('destinations'));

    }

    public function create() {

        return view('admin.destinations.create');

    }

    public function store(Request $request) {

        $request->validate([
			
			"locations_id" => 'required',
			"name" => 'required|max:255',
			"description" => 'required',
			"image" => 'mimes:jpeg,png|max:5000',
			
			]);
			
			
			
			$extension =request()->file('image')->getClientOriginalExtension();
			$name = time();
			
			$destinations = new Destination([
				
				
				'locations_id' => request('locations_id'),
				'name' => request('name'),
				'description' => request('description'),
				'image' => $name . "." . $extension,
				'p_status' => request('p_status')?1:0,
				
				]);
				
				$this->addImage(request()->file('image'));
				$destinations->save();

				
				
				return redirect('/admin/destinations');

    }


    public function edit($id) {

        $destinations = Destination::findorfail($id);

        return view('admin.destinations.edit', compact('destinations'));

    }

    public function update(Request $request,$id) {


        
				$request->validate([
					"locations_id" => 'required',
					"name" => 'required|max:255',
					"description" => 'required',
					"image" => 'mimes:jpeg,png|max:5000',
					]);
					
					$input = $request->except(['image']);
					
					$destinations = Destination::findorfail($id);
			
					$destinations->locations_id = $request->get('locations_id');
					
					$destinations->name = $request->get('name');
					
					$destinations->description = $request->get('description');
					
					/** Upade Photo and Recent Photo Delete **/
					if ($file = request()->file('image')) {
						\File::delete(public_path(). '/multimages/destinations/' .$destinations->image);
						
						$this->addImage(request()->file('image'));
						
						$extension =request()->file('image')->getClientOriginalExtension();
						$name = time();
						
						
						$input['image'] = $name.".".$extension;
					}

					$destinations->p_status = $request->get('p_status')?1:0;

					
					
					$destinations->update($input);

				
					
					
					
					return redirect('/admin/destinations');


	}
	
	public function show($id) {

		$destinations = Destination::findorfail($id);

		return view('admin.destinations.show', compact('destinations'));

	}

	public function destroy($id) {

		$destinations = Destination::findorfail($id);

		\File::delete(public_path(). '/multimages/destinations/' .$destinations->image);
					
					$destinations->delete();
					
					return redirect('/admin/destinations');


	}

	//gallery
	public function gallery($id) {

		$gallery = Destination_Image::where('destinations_id','=', $id)->get();
		
		
		return view('admin.destinations.gallery', compact('id','gallery'));
		
	}
	
	public function addnew($id) {
		
		return view('admin.destinations.upload', compact('id'));
		
	}
	
	public function upload(Request $request,$id) {
		
		
		$request->validate([
			
			'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
			
			]);
			
			
			if($request->hasFile('image'))
			{
				foreach($request->file('image') as $image)
				{
					
					
					$gallery = new Destination_Image;
					$gallery->destinations_id = $id;
					
					
					
					
					
					$destinationPath = 'multimages/destinationsgallery';
					$extensionpath = $image->getClientOriginalExtension();
					
					$time = rand(1000,9999).".".time();
					$image_name = $time.".".$extensionpath;
								$destinationPath = '/multimages/destinationsgallery/' . $image_name;
								$image_resize = Image::make($image->getRealPath());
								
								// dd(public_path($destinationPath));

								$img = $image_resize->resize(825,437)->save(public_path($destinationPath),100);		

								$gallery->image = $destinationPath; 	
								// dd($img);
									
								$gallery->save();
					
					
					
					
					
				}
			}
			
			
			return redirect('/admin/destinations-gallery/'.$id);
			
			
			
			
			
		}
		
		public function deleteattachment($id) {

			$attachments = Destination_Image::findorfail($id);

			
			$path = public_path().$attachments->image;
			unlink($path);
		
			$attachments->delete();
		
			return response()->json($attachments);
		
		}

    
					
    protected function addImage($file)
    {
        /** ramdom key*/
        $extension = $file->getClientOriginalExtension();
        $name = time();
        
        
        return $file->move(public_path('multimages/destinations'), $name . "." . $extension);
        //public_path() . '/images/featured_companies';
        // return  public_path() . '/public/images/blogs/' .$image_name;  
        
    }

}
