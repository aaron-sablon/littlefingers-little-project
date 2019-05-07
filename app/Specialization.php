<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialization extends Model
{
    use SoftDeletes;

    protected $dates =['deleted_at'];

    public static $rules = array(
    	'name'		=> 'required|min:2|max:10'
    );

    public function student(){
    	return $this->belongsTo('App\Student', 'spec_id', 'id');
    }
}
