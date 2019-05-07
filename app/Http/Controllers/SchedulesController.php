<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
     public function __construct()
    {
        $this->params = [
            'error'                 => false, 
            'status_code'           => 200, 
            'msg'                   => '',
            'results'               => [],
            'results_count'         => 0,
            'is_logged'             => true,
            'forced_login'          => false,
            'api_version'           => env('API_VERSION'),
            'token'                 => null,
        ]; 
    }

     public function create(){
        $schedules = Schedule::all();
        $this->params['schedules'] = $schedules;
        //no route yet
        return view('', $this->params);

    }

    public function update(Request $request, $id){
        $rules=Schedule::$rules;
        $validator = Validator::make(
            Input::all(),
            $rules
        );

        // If validator fails.
        if ( $validator->fails() ) {
            
            $error_messages = $validator->messages()->getMessages();
            $this->params['error'] = true;
            $this->params['msg'] = 'Form validation error. Please fix.';
            $this->params['form_errors'] = $error_messages;

            return redirect()->back()->with($this->params);
        }
        $schedules = Schedule::find($id);
        $schedules->fname =INPUT::get('fname');
        $schedules->lname =INPUT::get('lname');
        $schedules->advisory=INPUT::get('advisory');
        $schedules->contact=INPUT::get('contact');
        
        $schedules->save();

        $this->params['msg']='Information updated successfully.';
        //no route yet
        return redirect()->route('')->with($this->params);

    }

    public function destroy($id){
        $schedules = Schedule::find($id);
        $schedules->delete();

        $this->params['msg']='Schedule was removed successfully.';
        //no route yet
        return redirect()->route('')->with($this->params);

    }

    //end of CRUDE

     public function show($id) {

        $subjects = Schedule::find($id)->subjects;
        $times = Schedule::find($id)->times;
        $rooms = Schedule::find($id)->rooms;
        $professors = Schedule::find($id)->professors;
        $sections = Schedule::find($id)->sections;
        $schedules = Schedule::find($id);
        $this->params=[
            'subjects' => $user,
            'times' => $albums,
            'rooms' => $rooms,
            'professors' => $professors,
            'sections' => $sections,
            'schedules' => $schedules
        ];

        // dd( $albums->user->id);
        //no view yet
                return view('', $this->params);

    }

}
