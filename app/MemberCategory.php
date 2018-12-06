<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberCategory extends Model
{
    //
    protected $table = "member_categories";


    protected $fillable = ['name'];

    public function member() {

		return $this->hasMany('App\Ourteam', 'member_categories_id');
  }


}
