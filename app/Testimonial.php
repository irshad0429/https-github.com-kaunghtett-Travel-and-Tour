<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //
    protected $fillable = ['name','description','image','status'];

    public function monial() {

        return $this->image;
    }

}
