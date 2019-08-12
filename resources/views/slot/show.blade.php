@extends('layouts.master')

<div class="container col-md-6">
  
  <div class="container mt-4">

      <div class="container-fluid text-left my-2">     
          <ul class="list-inline mb-1">
              <li class="list-inline-item"> <h2>Time List</h2></li>
              <li class="list-inline-item"><h4 class="text-secondary">Show Time</h4></li>
          </ul>
      </div>
    <!-- -->
   
      <div class="container">
          <form action="{{ route('slots.destroy', $slots->id) }}" method="post" class="form-inline">
          {{csrf_field()}}
          @method('DELETE')
           
              <div class="row border-bottom border-top border-success py-3 my-2">

                  <div class="form-group col-sm-6">
                      <label for="time" >Time:</label>
                      <input type="text" class="form-control mb-2 ml-auto w-75" disabled data-style="select-with-transition" placeholder="Time" name="time" value="{{ $slots->slot }}">
                  </div>
            
              </div>

              <div class="container">
                  <div class="row my-3">
                      <div class="col-sm-3">
                          <a  href="{{ route('slots.index') }}" role="button" class="btn btn-primary btn-block">Back</a>
                      </div>

                      <div class="col-sm-3">
                          <a  href="{{ route('slots.edit', $slots->id) }}" role="button" class="btn btn-success btn-block">Edit</a>
                      </div>

                  </div>
              </div>

          </form>
      </div>
  </div>
</div>
