<?php

namespace App\Http\Controllers;

use App\Time;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class TimesController extends Controller
{
    public function __construct( Request $request )
    {
        $this->params = config('app.params');
        $this->params['is_logged'] = true;
        $this->params['forced_login'] = false;
        $this->params['token'] = $request->token;
    }

    public function index(){
        $times= Time::paginate(10);
        $this->params['times'] = $times;
       //dd($times);
         return view('slot.index', $this->params);
    }

    public function show($id){
        $times = Time::find($id);
       
        $this->params=[
            'slots'=>$times
        ];
        //dd( $times);
        return view('slot.show', $this->params);
    }

    //undo delete from databse
    public function restore(Request $request, $id){
        $times = Time::onlyTrashed()->find($id);
        $times->restore();
        return redirect()->route('time.index')->with('Success','Information restored.');
    }    
    //CRUDE
    public function create(){
        $times = Time::all();
        $this->params['slots'] = $times;
        return view('slot.create', $this->params);
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
        $times->slot =INPUT::get('slot');
        
        $times->save();
        $this->params['msg']='Slot created successfully.';

        return redirect()->route('slots.index')
                        ->with( $this->params);
    }
    public function edit($id){
        $times = Time::find($id);
        
        $this->params=[
            'slots'=>$times
        ];
        //dd($times);
        return view('slot.edit', $this->params);
    }

    public function update(Request $request, $id){
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
        $times = Time::find($id);
        $times->slot = INPUT::get('slot');

        $times->save();

        $this->params['msg']='Information updated successfully.';
        //no route yet
        return redirect()->route('slots.index')->with($this->params);
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
