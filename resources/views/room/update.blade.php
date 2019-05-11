@extends('layouts.master')

<div class="container col-md-6">
  
  <div class="container mt-4">

      <div class="container-fluid text-left my-2">     
          <ul class="list-inline mb-1">
              <li class="list-inline-item"> <h2>Room List</h2></li>
              <li class="list-inline-item"><h4 class="text-secondary">Edit Room</h4></li>
          </ul>
      </div>

    <!-- -->
   
      <div class="container">
          <form action="{{ route('room.update', $room->id ) }}" method="post" class="form-inline">
          {{csrf_field()}}
          @method('PUT')             
              <div class="row border-bottom border-top border-success py-3 my-2">
                 
                 <div class="form-group col-sm-6">
                        <label for="name" >Name:</label>
                        <input type="text" class="form-control mb-2 ml-auto w-75" placeholder="Name" name="name" value="{{ $room->name  }}">
                 </div>
                 
              </div>

              <div class="container">
                  <div class="row my-3">
                      <div class="col-sm-3">
                          <a  href="{{ route('') }}" role="button" class="btn btn-primary btn-block">Back</a>
                      </div>

                      <div class="col-sm-3 ml-auto">
                          <input type="submit" class="btn btn-success btn-block" name="editbtn" value="Save">
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

  </div>
</div>