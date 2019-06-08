<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public static $rules = array(
		'name'	=> 'required|min:2|max:30'
	);

	//this is for relationships
	public function schedule(){
		return $this->hasMany('App\Schedule', 'section_id', 'id');
	}

	public function student(){
		return $this->hasMany('App\Student', 'section_id', 'id');
	}

	//don't know if this will work
	public function professor(){
		return $this->hasMany('App\Professor', 'advisory', 'id');
	}
}
