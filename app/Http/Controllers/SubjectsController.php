<?php

namespace App\Http\Controllers;

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

    public function create(){
        $subjects = Subject::all();
        $this->params['subjects'] = $subjects;
        //no route yet
        return view('', $this->params);

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
        $subjects->fname =INPUT::get('fname');
        $subjects->lname =INPUT::get('lname');
        $subjects->advisory=INPUT::get('advisory');
        $subjects->contact=INPUT::get('contact');
        
        $subject->save();

        $this->params['msg']='Information updated successfully.';
        //no route yet
        return redirect()->route('')->with($this->params);
    	
    }

    public function destroy($id){
        $subjects = Subject::find($id);
        $subjects->delete();

        $this->params['msg']='Subject was removed successfully.';
        //no route yet
        return redirect()->route('')->with($this->params);

    }

}
