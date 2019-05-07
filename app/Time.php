<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Time extends Model
{
	use SoftDeletes;

	protected $dates =['deleted_at'];

	public static $rules = array(
		'slot'		=>'required|min:6|max:6'
	);

	public function schedule(){
		return $this->belongsTo('App\Schedule', 'time_id', 'id');
	}
    
}
