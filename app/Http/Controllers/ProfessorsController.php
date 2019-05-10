<?php

namespace App\Http\Controllers;

use App\Professor;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ProfessorsController extends Controller
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
    //these functions are not complete yet
    //create; done
    //update;done
    //delete;done
    //index;done
    //show;done
    //restore;done
    
    public function create(){
    	$professors = Professor::all();
        $this->params['professors'] = $professors;
        //no route yet
        return view('', $this->params);

    }

    public function update(Request $request, $id){
 		$rules=Professor::$rules;
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
        $professors = Professor::find($id);
        $professors->fname =INPUT::get('fname');
        $professors->lname =INPUT::get('lname');
        $professors->advisory=INPUT::get('advisory');
        $professors->contact=INPUT::get('contact');
        
        $professors->save();

        $this->params['msg']='Information updated successfully.';
        //no route yet
        return redirect()->route('')->with($this->params);

    }

    public function destroy($id){
    	$professors = Professor::find($id);
        $professors->delete();

        $this->params['msg']='Professor was removed successfully.';
        //no route yet
        return redirect()->route('')->with($this->params);

    }

    //end of CRUDE


    //other needed functions

    //index page 

    public function index(){
        // $album=Album::with('user')->find();
        // dd($album->user()->id);
    	$professors = Professor::paginate(10);

    	$this->params['professors'] = $professors;
    	// // dd($users->albums());
    	 return view('professors.index', $this->params);
    }

    //show the professors tab
     public function show($id){
        $professors = Professor::find($id);
        $this->params=['professor' => $professor];

        // dd( $albums->user->id);
        //no rout yet
        return view('', $this->params);

    }


    //edit the professors tab
    public function edit($id){
        $professors = Professor::find($id);
        $this->params=['professors'=>$professors];
        //no route yet
        return view('', $this->params);
    }

    //undo delete from databse
    public function restore(Request $request, $id){
        $professors = Professor::onlyTrashed()->find($id);
        $professors->restore();
        //no route yet
        return redirect()->route('')->with('Success','Professor was restored.');

    }

}
