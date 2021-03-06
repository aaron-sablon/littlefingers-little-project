<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Subject;
use App\Time;
use App\Room;
use App\Professor;
use App\Section;
use App\Specialization;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
     public function __construct( Request $request )
    {
        $this->params = config('app.params');
        $this->params['is_logged'] = true;
        $this->params['forced_login'] = false;
        $this->params['token'] = $request->token;
    }
    public function index(){
        //$schedules = Schedule::paginate(10);
        //$this->params['schedules'] = $schedules;
        //dd($users);
        $sections = Section::paginate(10);
        $this->params['sections'] = $sections;
         return view('schedule.index', $this->params);
    }

    public function show($id) {

        $subjects = Subject::all();
        // $times = Time::all();
        // $rooms = Room::all();
        // $professors = Professor::all();
        // $sections = Section::all();
        $schedules = Schedule::with('subject')->find($id);
        $this->params=[
            'subjects' => $subjects,
            // 'slots' => $times,
            // 'rooms' => $rooms,
            // 'professors' => $professors,
            // 'sections' => $sections,
            'schedules' => $schedules
        ];
        dd($schedules);
        return view('schedule.show', $this->params);
    }

    //undo delete from databse
    public function restore(Request $request, $id){
        $schedules = Schedule::onlyTrashed()->find($id);
        $schedules->restore();
        return redirect()->route('schedule.index')->with('Success','Information restored.');
    }    

    //CRUDE
     public function create(){
        $sections = Section::all();
        $specializations = Specialization::all();
        $slots = Time::all();
        $rooms = Room::all();
        $professors = Professor::all();
        $subjects = Subject::all();
        $this->params['sections'] = $sections;
        $this->params['specializations'] = $specializations;
        $this->params['slots'] = $slots;
        $this->params['rooms'] = $rooms;
        $this->params['professors'] = $professors;
        $this->params['subjects'] = $subjects;
        return view('schedule.create', $this->params);
    }
    //NEED FOR CREATE
    //EDIT
    public function store(Request $request){

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
        $schedules= new Schedule;
        $schedules->subject_id =INPUT::get('subject');
        $schedules->time_id =INPUT::get('slot');
        $schedules->room_id =INPUT::get('room');
        $schedules->prof_id =INPUT::get('professor');
        $schedules->section_id =INPUT::get('section');
        
        $schedules->save();
        $this->params['msg']='Schedule was created successfully.';

        return redirect()->route('schedules.index')
                        ->with( $this->params);
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

        $this->params['msg']='Schedule updated successfully.';
        return redirect()->route('schedule.index')->with($this->params);

    }

    public function destroy($id){
        $schedules = Schedule::find($id);
        $schedules->delete();

        $this->params['msg']='Schedule was removed successfully.';
        //no route yet
        return redirect()->route('schedule.index')->with($this->params);

    }
    //end of CRUDE
}
