@extends('layouts.master')
<div class="container col-md-6">
    
    <div class="container mt-4">

        <div class="container-fluid text-left my-2">     
            <ul class="list-inline mb-1">
                <li class="list-inline-item"> <h2>Professor List</h2></li>
                <li class="list-inline-item"><h4 class="text-secondary">Add Professor</h4></li>
            </ul>
        </div>
      <!-- -->
     
        <div class="container">
            <form action="{{route('professors.store')}}" method="post" class="form-inline">
            {{csrf_field()}}
 
                <div class="row border-bottom border-top border-success py-3 my-2">

                    <div class="form-group col-sm-6">
                        <label for="fname" >Firstname:</label>
                        <input type="text" class="form-control mb-2 ml-auto w-75" placeholder="Firstname" name="fname">
                    </div>
              
                    <div class="form-group col-sm-6 ml-auto">
                        <label for="lname">Lastname:</label>
                        <input type="text" class="form-control mb-2 ml-auto w-75" placeholder="Lastname" name="lname" >
                    </div>


                    <div class="form-group col-sm-6 ml-auto">
                        <label for="Contact Number">Contact Number:</label>
                        <input type="text" class="form-control mb-2 ml-auto w-75" placeholder="Contact Number" name="contact">
                    </div>

                    <div class="form-group col-sm-6 mt-3">
                        <label for="advisory" class="mr-4">Advisory:</label>
                        <select name="advisory" id="service_type" class="custom-select ml-auto w-75" data-style="select-with-transition" title="Select Advisory" >
                            <option value="">None</option>
                            @foreach($sections as $section) 
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="container">
                    <div class="row my-3">
                        <div class="col-sm-3">
                            <a  href="{{ route('professors.index') }}" role="button" class="btn btn-primary btn-block">Back</a>
                        </div>

                        <div class="col-sm-3 ml-auto">
                            <input type="submit" class="btn btn-success btn-block" name="addbtn" value="Add">
                        </div>
                    </div>
                </div>
            </form>
        </div> 