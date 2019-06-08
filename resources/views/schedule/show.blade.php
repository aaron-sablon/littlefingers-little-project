@extends('layouts.master')

<div class="container col-md-6">
  
  <div class="container mt-4">

      <div class="container-fluid text-left my-2">     
          <ul class="list-inline mb-1">
              <li class="list-inline-item"> <h2>Section List</h2></li>
              <li class="list-inline-item"><h4 class="text-secondary">Show Schedule</h4></li>
          </ul>
      </div>
    <!-- -->
   
      <div class="container">
          <form action="{{ route('schedules.destroy', $schedules->id) }}" method="post" class="form-inline">
          {{csrf_field()}}
          @method('DELETE')
           
              <div class="row border-bottom border-top border-success py-3 my-2">
              <div>
                <table class="table table-bordered">
                    <thead class="text-center thead-light">
                        <tr>
                            <th></th>
                            <th scope="col">Subject</th>
                            <th scope="col">Time</th>
                            <th scope="col">Room</th>
                            <th scope="col">Professor</th>
                            <th scope="col">Section</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" >
                        <tr>
                            <td scope="row">
                                <input class="form-check-input filled-in" type="checkbox" id="checkbox123">
                                <label class="form-check-label" for="checkbox123" class="label-table"></label>
                            </td>
                            @foreach($schedules as $sched)
                            <td>{{ $schedule->subject->name }}</td>
                            @endforeach
                           
                            
                        </tr>
                    </tbody>
                </table>
            </div>

                   
              </div>

              <div class="container">
                  <div class="row my-3">
                      <div class="col-sm-3">
                          <a  href="{{ route('schedules.index') }}" role="button" class="btn btn-primary btn-block">Back</a>
                      </div>

                      <div class="col-sm-3">
                          <a  href="{{ route('schedules.edit', $schedules->id ) }}" role="button" class="btn btn-success btn-block">Edit</a>
                      </div>

                  </div>
              </div>

          </form>
      </div>
  </div>
</div>
