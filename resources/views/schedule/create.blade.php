@extends('layouts.master')
<div class="container col-md-6">
    
    <div class="container mt-4">

        <div class="container-fluid text-left my-2">     
            <ul class="list-inline mb-1">
                <li class="list-inline-item"> <h2>Schedule List</h2></li>
                <li class="list-inline-item"><h4 class="text-secondary">Add Schedule</h4></li>
            </ul>
        </div>
      <!-- -->
     
        <div class="container">
            <form action="{{route('schedules.store')}}" method="post" class="form-inline">
            {{csrf_field()}}
 
                <div class="row border-bottom border-top border-success py-3 my-2">

                <div class="form-group col-sm-6 mt-3">
                        <label for="subject" class="mr-4">Subject:</label>
                        <select name="subject" id="service_type" class="custom-select ml-auto w-75" data-style="select-with-transition" title="Select section" >
                        @foreach( $subjects as $sub  )
                            <option value="{{ $sub->id }}">{{ $sub->code }}</option>
                        @endforeach
                        </select>
                    </div>
              
                    <div class="form-group col-sm-6 mt-3">
                        <label for="slot" class="mr-4">Time Slot:</label>
                        <select name="slot" id="service_type" class="custom-select ml-auto w-75" data-style="select-with-transition" title="Select section" >
                        @foreach( $slots as $slot  )
                            <option value="{{ $slot->id }}">{{ $slot->slot }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-6 mt-3">
                        <label for="room" class="mr-4">Room:</label>
                        <select name="room" id="service_type" class="custom-select ml-auto w-75" data-style="select-with-transition" title="Select section" >
                        @foreach( $rooms as $room  )
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-6 mt-3">
                        <label for="professor" class="mr-4">Professor:</label>
                        <select name="professor" id="service_type" class="custom-select ml-auto w-75" data-style="select-with-transition" title="Select section" >
                        @foreach( $professors as $prof  )
                            <option value="{{ $prof->id }}">{{ $prof->fname. " " . $prof->lname }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-6 mt-3">
                        <label for="section" class="mr-4">Section:</label>
                        <select name="section" id="service_type" class="custom-select ml-auto w-75" data-style="select-with-transition" title="Select section" >
                        @foreach( $sections as $sec  )
                            <option value="{{ $sec->id }}">{{ $sec->name }}</option>
                        @endforeach
                        </select>
                    </div>

                </div>

                <div class="container">
                    <div class="row my-3">
                        <div class="col-sm-3">
                            <a  href="{{ route('schedules.index') }}" role="button" class="btn btn-primary btn-block">Back</a>
                        </div>

                        <div class="col-sm-3 ml-auto">
                            <input type="submit" class="btn btn-success btn-block" name="addbtn" value="Add">
                        </div>
                    </div>
                </div>
            </form>
        </div> 
        @if(
                    session()->has('error') && session()->has('form_errors')
                    )
                    <div class="alert alert-danger">
                    @foreach(session()->get('form_errors') as $error)
                        <p>{{ $error[0] }}</p>
                        <hr>
                    @endforeach
                    </div>
                @endif