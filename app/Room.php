<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;
    
    public function schedule() {
    	return $this->belongsTo('App\Schedule', 'room_id', 'id');
    }

    protected $dates = ['deleted_at'];

    public static $rules = array(
    	'name' => 'required|min:2|max:20' 
    );

}

