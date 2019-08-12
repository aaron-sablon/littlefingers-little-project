<?php

namespace App\Http\Controllers;
use App\Room;
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


    public function index(){
        $rooms = Room::paginate(5);
        $this->params['rooms'] = $rooms;
        //dd($rooms);
         return view('room.index', $this->params);
    }

    public function show($id){
        $rooms = Room::find($id);
       
        $this->params=[
            'rooms'=>$rooms
        ];
        //dd( $rooms);
        return view('room.show', $this->params);
    }

    //undo delete from databse
    public function restore(Request $request, $id){
        $rooms = Room::onlyTrashed()->find($id);
        $rooms->restore();
        return redirect()->route('room.index')->with('Success','Information restored.');
    }    

   
    //CRUDE here
    public function create(){
        $rooms = Room::all();
        $this->params['rooms'] = $rooms;
        //no view yet
        return view('room.create', $this->params);
    }
    //neccesary for create
    public function store(Request $request){

        $rules=Room::$rules;
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
        $rooms= new Room;
        $rooms->name =INPUT::get('name');
        
        $rooms->save();
        $this->params['msg']='Room was created successfully.';

        return redirect()->route('rooms.index')
                        ->with( $this->params);
    }
    
    public function edit($id)
    {
        $rooms = Room::find($id);
        
        $this->params=[
            'rooms'=>$rooms
        ];
        //dd($rooms);
        return view('room.edit', $this->params);
    }
    public function update(Request $request, $id){
        $rules=Room::$rules;
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

        $rooms->save();

    $this->params['msg']='Information updated successfully.';
    //no route yet
    return redirect()->route('rooms.index')->with($this->params);
}

    public function destroy($id){
        $rooms = Room::find($id);
        $rooms->delete();

        $this->params['msg']='Room was removed successfully.';
        //no route yet
        return redirect()->route('room.index')->with($this->params);

    }

    //end of crude

   
}
