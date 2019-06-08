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
    	return $this->belongsTo('App\Subject', 'subject_id', 'id');
    }

    public function time(){
    	return $this->belongsTo('App\Time', 'time_id', 'id');
    }

    public function room(){
    	return $this->belongsTo('App\Room', 'room_id', 'id');
    }

    public function professor(){
    	return $this->belongsTo('App\Professor', 'prof_id', 'id');
    }

    public function section(){
    	return $this->belongsTo('App\Section', 'section_id', 'id');
    }

    public function student(){
    	return $this->belongsTo('App\Section', 'student_id', 'id');
    }


}
