<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illumintae\Database\Eloquent\SoftDeletes;

class Room extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];

    public static $rules = array(
    	'name' => 'required|min:2|max:20' 
    );

    //This is for relations
    
    public function schedule() {
    	return $this->belongsTo('App\Schedule', 'room_id', 'id');
    }

}

