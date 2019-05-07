<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class RoomsController extends Controller
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
        $rooms = Room::all();
        $this->params['rooms'] = $rooms;
        //no view yet
        return view('', $this->params);
    }

    public function update(Request $request, $id){
        $rules=Rooms::$rules;
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
    $rooms = Room::find($id);
    $rooms->name =INPUT::get('name');
}
    public function destroy(){
        $rooms = Room::find($id);
        $rooms->delete();

        $this->params['msg']='Professor was removed successfully.';
        //no route yet
        return redirect()->route('')->with($this->params);

    }

}
