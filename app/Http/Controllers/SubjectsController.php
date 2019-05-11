<?php

namespace App\Http\Controllers;

use App\Subjects;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class SubjectsController extends Controller
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
        $subjects = Subject::paginate(10);
        $this->params['subjects'] = $subjects;
        //dd($students);
         return view('subject.index', $this->params);
    }

    public function show($id){
        $subjects = Subject::all();
       
        $this->params=[
            'subjects'=>$subjects
        ];
        //dd( $subjects);
        return view('subject.show', $this->params);
    }

    //undo delete from databse
    public function restore(Request $request, $id){
        $subjects = Subject::onlyTrashed()->find($id);
        $subjects->restore();
        return redirect()->route('subject.index')->with('Success','Information restored.');
    }    

    //CRUDE
    public function create(){
        $subjects = Subject::all();
        $this->params['subjects'] = $subjects;
        //no route yet
        return view('', $this->params);
    }
    //neccesary for create
    public function store(Request $request){

        $rules=Subject::$rules;
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
        $subjects= new Subject;
        $subjects->code =INPUT::get('code');
        
        $subjects->save();
        $this->params['msg']='Student created successfully.';

        return redirect()->route('subject.index')
                        ->with( $this->params);
    }
    
    public function update(Request $request, $id){
        $rules=Subject::$rules;
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
        $subjects = Subject::find($id);
        $subjects->code =INPUT::get('code');
        
        $subjects->save();

        $this->params['msg']='Information updated successfully.';
        //no route yet
        return redirect()->route('subject,index')->with($this->params);
    	
    }

    public function destroy($id){
        $subjects = Subject::find($id);
        $subjects->delete();

        $this->params['msg']='Subject was removed successfully.';
        //no route yet
        return redirect()->route('subject.index')->with($this->params);

    }
    //end of CRUDE

}
