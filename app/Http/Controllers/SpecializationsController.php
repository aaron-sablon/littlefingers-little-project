<?php

namespace App\Http\Controllers;

use App\Specialization;
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
    
    public function index(){
        $specializations = Specialization::paginate(5);
        $this->params['specializations'] = $specializations;
        //dd($specializations);
         return view('specialization.index', $this->params);
    }

    public function show($id){
        $specializations = Specialization::all();
       
        $this->params=[
            'specializations'=>$specializations
        ];
        //dd( $specialzations);
        return view('specialization.show', $this->params);
    }

    //undo delete from databse
    public function restore(Request $request, $id){
        $specializations = Specialization::onlyTrashed()->find($id);
        $specializations->restore();
        return redirect()->route('specialization.index')->with('Success','Information restored.');
    }    

    //CRUDE
    public function create(){
    	$specializations = Specialization::all();
        $this->params['specializations'] = $specializations;
        return view('specialization.create', $this->params);
    }
    //neccesary for create
    public function store(Request $request){

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
        $specializations= new Specialization;
        $specializations->specialization_grade = INPUT::get('specialization_grade'); 
        $specializations->name = INPUT::get('name');
        
        $specializations->save();
        $this->params['msg']='Specialization was created successfully.';

        return redirect()->route('specializations.index')
                        ->with( $this->params);
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
       $specializations->specialization_grade = INPUT::get('specialization_grade'); 
       $specializations->name =INPUT::get('name');
       
       $specializations->save();

       $this->params['msg']='Information updated successfully.';
       return redirect()->route('specialization.index')->with($this->params);
    }

    public function destroy($id){
    	$specializations = Specialization::find($id);
        $specializations->delete();

        $this->params['msg']='Specialization was removed successfully.';
        return redirect()->route('specialization.index')->with($this->params);
    }
    //END OF CRUDE
}
