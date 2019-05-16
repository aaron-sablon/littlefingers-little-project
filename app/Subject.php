<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
	use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    public static $rules = array(
		'code'		=>'required|min:2|max:20'
    );

    public function schedule(){
    	return $this->belongsTo('App\Schedule', 'subject_id', 'id');
    }
}
