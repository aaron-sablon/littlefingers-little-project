<?php

namespace App\Http\Controllers;

use App\Section;
use App\Professor;
use App\Specialization;
use App\Student;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function __construct( Request $request )
    {
        $this->params = config('app.params');
        $this->params['is_logged'] = true;
        $this->params['forced_login'] = false;
        $this->params['token'] = $request->token;
    }

    public function index(){
        $sections = Section::paginate(5);
        $this->params['sections'] = $sections;
        //dd($rooms);
         return view('section.index', $this->params);
    }

    public function show($id){
        $sections = Section::find($id);
       
        $this->params=[
            'sections'=>$sections
        ];
        //dd( $rooms);
        return view('section.show', $this->params);
    }

    //undo delete from databse
    public function restore(Request $request, $id){
        $sections = Section::onlyTrashed()->find($id);
        $sections->restore();
        return redirect()->route('section.index')->with('Success','Information restored.');
    }    

    //CRUDE here
    public function create(){
        $specializations = Specialization::all();
        $this->params['specializations'] = $specializations;
        return view('section.create', $this->params);
    }
    //neccesary for create
    public function store(Request $request){

        $rules=Section::$rules;
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
        $sections= new Section;
        $sections->grade=INPUT::get('section_grade');
        $sections->name =INPUT::get('name');
        
        $sections->save();
        $this->params['msg']='Section was created successfully.';

        return redirect()->route('sections.index')
                        ->with( $this->params);
    }

        public function edit($id)
    {
        $sections = Section::find($id);
        
        $this->params=[
            'sections'=>$sections
        ];
        //dd($sections);
        return view('section.edit', $this->params);
    }
    public function update(Request $request, $id){
    	$rules=Section::$rules;
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
    $sections = Section::find($id);
    $sections->name =INPUT::get('name');

    $sections->save();

    $this->params['msg']='Information updated successfully.';
    //no route yet
    return redirect()->route('sections.index')->with($this->params);
    }

    public function destroy($id){
        $sections = Section::find($id);
        $sections->delete();

        $this->params['msg']='Section was removed successfully.';
        //no route yet
        return redirect()->route('section.index')->with($this->params);
    }
    //end CRUDE
}
