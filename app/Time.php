<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Time extends Model
{
	use SoftDeletes;

	protected $dates =['deleted_at'];

	public static $rules = array(
		'slot'		=>'required|min:4|max:8'
	);

	public function schedule(){
		return $this->hasMany('App\Schedule', 'time_id', 'id');
	}
    
}
