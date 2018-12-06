<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogHeader extends Model
{
    //


	protected $fillable = ['title', 'slug', 'author', 'image', 'active'];


	public function blogs() {

		return $this->hasMany('App\Blog', 'blog_headers_id');

	}

	public  function blogspath()
	{
		
		
		return 'multimages/blogs/' . $this->image;	
	}

	/** Slug Mutator **/

	public function setSlugAttribute($value)
	{
	    $this->attributes['title'] = $value;
	    $this->attributes['slug'] = str_slug($value);
	}


}
