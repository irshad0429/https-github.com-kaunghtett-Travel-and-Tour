<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\BlogHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class BlogsController extends Controller
{
    //


	public function __construct() {

		$this->middleware('auth');
	}



	public function index() {


		$blogs = Blog::with('owner')->latest()->get();

    

		return view ('admin.blogs.index', compact('blogs'));


	}


	public function create() {

		return view ('admin.blogs.create');

	}


	public function store(Request $request) {


		$request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required|min:4',
            'image' => 'mimes:jpeg,png|max:5000',
            

        ]);

		 $extension =request()->file('image')->getClientOriginalExtension();
           $name = time();

        /** BlogHeader Save **/
        $blogHeader = BlogHeader::create([
            'title' => request('title'),
            'slug' => request('title'),
            'author' => request('author'),
            'image' => $name . "." . $extension,
            'active' => request('active')?1:0,

        ]);

        $extension =request()->file('image')->getClientOriginalExtension();
        $name = time();


        $blog = new Blog([
            'blog_headers_id' => $blogHeader->id,
            'description' => request('description'),
            'image' => $name . "." . $extension,

        ]);

        $this->addImage(request()->file('image'));

        $blogHeader->blogs()->save($blog);

        

        

       return redirect('/blogs');


	}


    public function edit($id) {

       $blogs = Blog::with('owner')->where('id', $id)->first();
           return view('admin.blogs.edit', compact('blogs'));
    }

    public function update(Request $request, $id ) {


        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required|min:4',
            'image' => 'mimes:jpeg,png|max:5000',
           

        ]);

         /** Expect Image and Slug **/
        $input = $request->except(['image', 'slug','active']);

        /** Request Title change slug **/
        $input['slug'] = request('title');

        $input['active'] = request('active')?1:0;

        /** BlogHeader Update **/
        $blogHeader = BlogHeader::find($id);
        $blogHeader->update($input);


          /** Find Blog Id **/
         $blogs = Blog::where('blog_headers_id', $id)->first();
         /** Upade Photo and Recent Photo Delete **/
        if ($file = request()->file('image')) {
            \File::delete(public_path(). '/multimages/blogs/' .$blogs->image);

             $this->addImage(request()->file('image'));

             $extension =request()->file('image')->getClientOriginalExtension();
             $name = time();
 
 
              $input['image'] = $name.".".$extension;
        }

        $blogs->description = request('description');

        /** Blog Update **/
        $blogs->update($input);

        
       return redirect('/blogs');




    }



    public function post($id) {

        $blogs = Blog::find($id);
        $blogHeader = BlogHeader::where('id', $blogs->blog_headers_id)->first();
        return view ('admin.blogs.post', compact('blogs', 'blogHeader'));


    }


    public function show($id) {

         $blogs = Blog::find($id);
        $blogHeader = BlogHeader::where('id', $blogs->blog_headers_id)->first();
        return view ('admin.blogs.show', compact('blogs','blogHeader'));


    }


    public function destroy($id) {



        $blogs = Blog::find($id);

        /** Find BlogHeader **/
        $blogHeader = BlogHeader::where('id', $blogs->blog_headers_id)->first();
        \File::delete(public_path(). '/multimages/blogs/' .$blogs->image);

       $blogs->delete();
       $blogHeader->delete();

        return redirect('/blogs');

    }



	 protected function addImage($file)
    {
        /** ramdom key*/
           $extension = $file->getClientOriginalExtension();
           $name = time();


         return $file->move(public_path('multimages/blogs'), $name . "." . $extension);
        //public_path() . '/images/featured_companies';
        // return  public_path() . '/public/images/blogs/' .$image_name;  

    }


}
