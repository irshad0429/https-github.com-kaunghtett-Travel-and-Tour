<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use App\BlogHeader;
class TourBlogsControllers extends Controller
{
    //
    public function index() {

        $blogs = BlogHeader::with('blogs')->where('active','=',1)->paginate(4);

        
        

        return view ('web.blog', compact('blogs'));

    }

}
