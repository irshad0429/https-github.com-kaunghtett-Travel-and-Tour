<?php

namespace App\Http\Controllers\Admin;

use App\TourCategory;
use App\TourPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TourGallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class TourPackagesController extends Controller
{
	//
	
	public function __construct(){
		
		$this->middleware('auth');
	}
	
	
	public function index() {
		
		$packages = TourPackage::latest()->get();
		
		
		return view('admin.packages.index', compact('packages'));
	}
	
	public function create() {
		
		
		return view ('admin.packages.create');
	}
	
	
	public function store(Request $request){
		
		$request->validate([
			"tour_categories_id" => 'required',
			"locations_id" => 'required',
			"tour_leaders_id" => 'required',
			"name" => 'required|max:255',
			"short_description" => 'required',
			"service" => 'required',
			"duration" => 'required',
			"image" => 'mimes:jpeg,png|max:5000',
			"price" => 'required',
			"lat" => 'required',
			"long" => 'required',
			
			]);
			
			
			
			$image =request()->file('image');
			$extension = $image->getClientOriginalExtension();
			$name = time();
			
			$packages = new TourPackage([
				
				'tour_categories_id'=> request('tour_categories_id'),
				'locations_id' => request('locations_id'),
				'tour_leaders_id' => request('tour_leaders_id'),
				'name' => request('name'),
				'short_description' => request('short_description'),
				'service' => request('service'),
				'duration' => request('duration'),
				'image' => $name . "." . $extension,
				'price' => request('price'),
				'lat' => request('lat'),
				'long' => request('long'),
				'p_status' => request('p_status')?1:0,
				
				]);
				
				
				$this->addImage(request()->file('image'));
				$packages->save();
	
				
				return redirect('/packages');
			}
			
			
			public function edit($id) {
				
				$packages = TourPackage::findorfail($id);
				
				return view('admin.packages.edit', compact('packages'));
				
				
			} 
			
			
			public function update(Request $request,$id) {
				
				
				$request->validate([
					"tour_categories_id" => 'required',
					"locations_id" => 'required',
					"tour_leaders_id" => 'required',
					"name" => 'required|max:255',
					"short_description" => 'required',
					"service" => 'required',
					"duration" => 'required',
					"image" => 'mimes:jpeg,png|max:5000',
					"price" => 'required',
					"lat" => 'required',
					"long" => 'required',
					]);
					
					$input = $request->except(['image']);
					
					$packages = TourPackage::findorfail($id);
					
					$packages->tour_categories_id = $request->get('tour_categories_id');

					$packages->locations_id = $request->get('locations_id');

					$packages->tour_leaders_id = $request->get('tour_leaders_id');
					
					$packages->name = $request->get('name');
					
					$packages->short_description = $request->get('short_description');

					$packages->service = $request->get('service');

					$packages->duration = $request->get('duration');
					
					/** Upade Photo and Recent Photo Delete **/
					if ($file = request()->file('image')) {
						\File::delete(public_path(). '/multimages/package/' .$packages->image);
						
						$this->addImage(request()->file('image'));
						
						$extension =request()->file('image')->getClientOriginalExtension();
						$name = time();
						
						
						$input['image'] = $name.".".$extension;
					}

					$packages->price = $request->get('price');

					$packages->lat = $request->get('lat');

					$packages->long = $request->get('long');

					$packages->p_status = $request->get('p_status')?1:0;

					
					
					$packages->update($input);

					
				
					
					
					
					return redirect('/packages');
					
				} 
				
				
				public function show($id) {
					
					$packages = TourPackage::findorfail($id);
					
					return view('admin.packages.show', compact('packages'));
					
					
				}
				
				public function destroy($id) {
					
					$packages = TourPackage::findorfail($id);
					\File::delete(public_path(). '/multimages/package/' .$packages->image);
					
					$packages->delete();
					
					return redirect('/packages');
					
					
				}
				
				// for gallery
				public function gallery($id) {

					$gallery = TourGallery::where('tour_packages_id','=', $id)->get();
					
					
					return view('admin.packages.gallery', compact('id','gallery'));
					
				}
				
				public function addnew($id) {
					
					return view('admin.packages.upload',compact('id'));
					
				}
				
				public function upload(Request $request,$id) {
					
					
					$request->validate([
						
						'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
						
						]);
						
								
						if($request->hasFile('gallery'))
						{
							foreach($request->file('gallery') as $image)
							{
								
								
								$gallery = new TourGallery;
								$gallery->tour_packages_id = $id;
								$time = rand(1000,9999).".".time();
								
								
								$extensionpath = $image->getClientOriginalExtension();
								$time = rand(1000,9999).".".time();
								
								$image_name = $time.".".$extensionpath;
								$destinationPath = '/multimages/gallery/' . $image_name;
								$image_resize = Image::make($image->getRealPath());
								
								// dd(public_path($destinationPath));

								$img = $image_resize->resize(825,437)->save(public_path($destinationPath),100);		

								
								$gallery->gallery = $destinationPath; 	
								// dd($img);
									
								$gallery->save();

								
								
							
								
							}
						}
						
						
						
						return redirect('/gallery/'.$id);
						
						
						
						
						
					}
					
					public function deleteattachment($id) {

						$attachments = TourGallery::findorfail($id);

						
						$path = public_path().$attachments->gallery;
						unlink($path);
					
						$attachments->delete();
					
						return response()->json($attachments);
					
					}
					
					
					
					
					
					
					protected function addImage($file)
					{
						/** ramdom key*/
						$extension = $file->getClientOriginalExtension();
						$name = time();
						
						
						return $file->move(public_path('multimages/package'), $name . "." . $extension);
						//public_path() . '/images/featured_companies';
						// return  public_path() . '/public/images/blogs/' .$image_name;  
						
					}
					
					
					
					
					
				}
				