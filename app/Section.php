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
		return $this->belongsTo('App\Schedule', 'section_id', 'id');
	}

	//can i do this? two belongsTo functions???
	public function student(){
		return $this->belongsTo('App\Student', 'section_id', 'id');
	}
}
