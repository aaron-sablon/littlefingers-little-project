<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;

    protected $dates =['deleted_at'];

    public static $rules = array(
        'subject'   => 'required|min:1|max:20',
        'slot'      => 'required|min:1|max:20',
        'room'      => 'required|min:1|max:20',
        'professor' => 'required|min:1|max:20',
        'section'   => 'required|min:1|max:20'
         
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

    public function student(){
    	return $this->hasMany('App\Section', 'student_id', 'id');
    }


}
