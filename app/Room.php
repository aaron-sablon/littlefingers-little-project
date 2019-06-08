<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public static $rules = array(
    	'name' => 'required|min:2|max:20' 
    );


    public function schedule() {
    	return $this->hasMany('App\Schedule', 'room_id', 'id');
    }


}

