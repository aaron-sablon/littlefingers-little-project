<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illumintae\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;

    protected $dates =['deleted_at'];

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
    	return $this->hasMany('App\Professor', 'professor_id', 'id');
    }

    public function section(){
    	return $this->hasMany('App\Section', 'section_id', 'id');
    }


}
