<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialization extends Model
{
    use SoftDeletes;

    protected $dates =['deleted_at'];

    public static $rules = array(
        'name'		=> 'required|min:2|max:10',
        'specialization'     => 'required|min:1|max:1'
    );

    // public function student(){
    // 	return $this->belongsTo('App\Student', 'spec_id', 'id');
    // }

    public function student(){
    	return $this->hasMany('App\Student', 'spec_id', 'id');
    }
}
