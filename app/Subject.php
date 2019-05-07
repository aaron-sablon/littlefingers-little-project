<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illumintae\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
	use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    public static $rules = array(
		'name'		=>'required|min:2|max:20'
    );

    public function schedule(){
    	return $this->belongsTo('App\Schedule', 'subject_id', 'id');
    }
}