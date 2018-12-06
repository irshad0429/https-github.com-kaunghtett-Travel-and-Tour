<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //

	protected $fillable = ['blog_headers_id', 'image', 'description'];

	public function path()
	{

		
		return 'multimages/blogs/' . $this->image;	
	}

	public function owner()
	{
		return $this->belongsTo('App\BlogHeader', 'blog_headers_id');
	}








}
