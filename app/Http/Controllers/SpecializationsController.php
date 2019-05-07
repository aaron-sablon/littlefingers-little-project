<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class SpecializationsController extends Controller
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
    	$specializations = Specialization::all();
        $this->params['specializations'] = $specializations;
        //no route yet
        return view('', $this->params);


    }

    public function update(Request $request, $id){
        $rules=Specialization::$rules;
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
       $specializations = Specialization::find($id);
       $specializations->name =INPUT::get('name');
       
       $specializations->save();

       $this->params['msg']='Information updated successfully.';
       //no route yet
       return redirect()->route('')->with($this->params);
    	
    }

    public function destroy($id){
    	$specializations = Specialization::find($id);
        $specializations->delete();

        $this->params['msg']='Specialization was removed successfully.';
        //no route yet
        return redirect()->route('')->with($this->params);
    }
}
