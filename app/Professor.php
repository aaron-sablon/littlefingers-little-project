<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    // This is for professor login
    // TODO: Add these fields in databse before created_at
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    //This is for user authentication
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];



    //TODO: add more rules bc
    //we need to authenticate profs
    public static $rules = array(
        'fname'		=> 'required|min:1|max:50',
        'lname'		=> 'required|min:2|max:50',
        'section_id'	=> 'required|min:1|max:50',
        'contact'	=> 'required|min:2|max:50'
        
    );

    //This is for relationships in database
    
    public function schedule() {
    	return $this-> hasMany('App\Schedule', 'prof_id', 'id');
    }

    public function section(){
        return $this-> belongsTo('App\Section', 'section_id', 'id');
    }

     
}
