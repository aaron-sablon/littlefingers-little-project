<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];

    //not sure if I should include lrn here, 
    //since it will take the place of id;
    //or do we not include id bc it's
    //auto-increment???

    //Students cannot access the app
    //therefore no need for authentication

    public static $rules => array(
    	'fname'		=> 'required|min:2|max:50',
    	'lname'		=> 'required|min:2|max:50'
    );


    //This is for relationships
    public function schedule(){
    	return $this->belongsTo('App\Schedule', 'student_id', 'id');
    }
}
