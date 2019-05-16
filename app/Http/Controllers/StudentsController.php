<?php

namespace App\Http\Controllers;

use App\Student;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class StudentsController extends Controller
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

    public function index(){
        $students = Student::paginate(10);
        $this->params['students'] = $students;
        //dd($students);
         return view('student.index', $this->params);
    }

    public function show($lrn){
        $students = Student::all();
       
        $this->params=[
            'students'=>$students
        ];
        //dd( $students);
        return view('student.show', $this->params);
    }

    //undo delete from databse
    public function restore(Request $request, $lrn){
        $students = Student::onlyTrashed()->find($lrn);
        $students->restore();
        return redirect()->route('student.index')->with('Success','Information restored.');
    }    
    //CRUDE
    public function create(){
        $students = Student::all();
        $this->params['students'] = $students;
        return view('student.create', $this->params);
    }
    //neccesary for create
    public function store(Request $request){

        $rules=Student::$rules;
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
        $students= new Student;
        $students->lrn =INPUT::get('lrn');
        $students->fname =INPUT::get('fname');
        $students->lname =INPUT::get('lname');
        $students->section_id =INPUT::get('section_id');
        $students->spec_id =INPUT::get('spec_id');
        
        
        $students->save();
        $this->params['msg']='Student created successfully.';

        return redirect()->route('student.index')
                        ->with( $this->params);
    }

    public function update(Request $request, $lrn){
        $rules=Student::$rules;
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
        $students = Student::find($lrn);
        $students->fname =INPUT::get('fname');
        $students->lname =INPUT::get('lname');
        $students->section_id =INPUT::get('section_id');
        $students->spec_id =INPUT::get('spec_id');
        $students->save();

        $this->params['msg']='Student information updated successfully.';
        //no route yet
        return redirect()->route('student.index')->with($this->params);
    	
    }

    public function destroy($lrn){
        $students = Student::find($lrn);
        $students->delete();

        $this->params['msg']='Student was removed successfully.';
        //no route yet
        return redirect()->route('student.index')->with($this->params);

    }

}
