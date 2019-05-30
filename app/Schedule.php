<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;

    public static $rules = array(
        'subject'		=> 'required|min:1|max:50',
        'time'		    => 'required|min:2|max:50',
        'room'	        => 'required|min:1|max:50',
        'professor'	    => 'required|min:2|max:50',
        'section'	    => 'required|min:2|max:50',
        'student'	    => 'required|min:2|max:50'
        
    );

    protected $dates =['deleted_at'];

    public static $rules = array(
        'subject_id'   => 'required|min:1|max:20', 
        'time_id'      => 'required|min:1|max:20', 
        'room_id'      => 'required|min:1|max:20', 
        'prof_id'      => 'required|min:2|max:20', 
        'section_id'   => 'required|min:1|max:20'
    );

    public function subject(){
    	return $this->hasMany('App\Subject', 'subject_id', 'id');
    }

    public function time(){
    	return $this->hasMany('App\Time', 'time_id', 'id');
    }

    public function room(){
    	return $this->hasMany('App\Room', 'room_id', 'id');
    }

    public function professor(){
    	return $this->hasMany('App\Professor', 'prof_id', 'id');
    }

    public function section(){
    	return $this->hasMany('App\Section', 'section_id', 'id');
    }


}
