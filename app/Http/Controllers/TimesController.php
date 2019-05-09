<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class TimesController extends Controller
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
        $times = Times::all();
        $this->params['times'] = $times;
        //no route yet
        return view('', $this->params);
    }

    public function update(Request $request, $id){
    	$rules=Times::$rules;
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
        $times = Times::find($id);
        $times->slot = INPUT::get('slot');

        $times->save();

        $this->params['msg']='Information updated successfully.';
        //no route yet
        return redirect()->route('')->with($this->params);
    }

    public function destroy($id){
        $times = Times::find($id);
        $times->delete();

        $this->params['msg']='Timeslot was removed successfully.';
        //no route yet
        return redirect()->route('')->with($this->params);


    }

}
