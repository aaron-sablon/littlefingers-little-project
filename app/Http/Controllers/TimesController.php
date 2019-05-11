<?php

namespace App\Http\Controllers;

use App\Time;
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

    public function index(){
        $times= Time::paginate(10);
        $this->params['times'] = $times;
        //dd($students);
         return view('time.index', $this->params);
    }

    public function show($id){
        $times = Time::all();
       
        $this->params=[
            'times'=>$times
        ];
        //dd( $times);
        return view('time.show', $this->params);
    }

    //undo delete from databse
    public function restore(Request $request, $id){
        $times = Time::onlyTrashed()->find($id);
        $times->restore();
        return redirect()->route('subject.index')->with('Success','Information restored.');
    }    
    //CRUDE
    public function create(){
        $times = Times::all();
        $this->params['times'] = $times;
        return view('time.create', $this->params);
    }
    //neccesary for create
    public function store(Request $request){

        $rules=Time::$rules;
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
        $times= new Time;
        $times->code =INPUT::get('slot');
        
        $times->save();
        $this->params['msg']='Student created successfully.';

        return redirect()->route('time.index')
                        ->with( $this->params);
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
        return redirect()->route('time.index')->with($this->params);
    }

    public function destroy($id){
        $times = Times::find($id);
        $times->delete();

        $this->params['msg']='Timeslot removed successfully.';
        //no route yet
        return redirect()->route('time.index')->with($this->params);
    }
    //END CRUDE

    //DIFOTA SUNDA NYO MAN INSTRUCTIONS FULAW PA MORE

}
