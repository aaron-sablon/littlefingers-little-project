@extends('layouts.master')

<div class="container col-md-6">
  
  <div class="container mt-4">

      <div class="container-fluid text-left my-2">     
          <ul class="list-inline mb-1">
              <li class="list-inline-item"> <h2>Schedule List</h2></li>
              <li class="list-inline-item"><h4 class="text-secondary">Show Schedule</h4></li>
          </ul>
      </div>
    <!-- -->
   
      <div class="container">
          <form action="{{ route('', ) }}" method="post" class="form-inline">
          {{csrf_field()}}
          @method('DELETE')
           
              <div class="row border-bottom border-top border-success py-3 my-2">

                  <div class="form-group col-sm-6">
                      <label for="subject" >Subject:</label>
                      <input type="text" class="form-control mb-2 ml-auto w-75" disabled data-style="select-with-transition" placeholder="Subject" name="subject" value="{{  }}">
                  </div>
            
                  <div class="form-group col-sm-6 ml-auto">
                      <label for="time">Time:</label>
                      <input type="text" class="form-control mb-2 ml-auto w-75" disabled data-style="select-with-transition" placeholder="Time" name="time" value="{{  }}" >
                  </div>

                  <div class="form-group col-sm-6 ml-auto">
                      <label for="room">Room:</label>
                      <input type="text" class="form-control mb-2 ml-auto w-75" disabled data-style="select-with-transition" placeholder="Room" name="room" value="{{  }}" >
                  </div>

                  <div class="form-group col-sm-6 ml-auto">
                      <label for="Schedule">Schedule:</label>
                      <input type="text" class="form-control mb-2 ml-auto w-75" disabled data-style="select-with-transition" placeholder="Schedule" name="Schedule" value="{{  }}" >
                  </div>

                   <div class="form-group col-sm-6 mt-3">
                      <label for="section" class="mr-4">Section:</label>
                      <select name="user_id" id="service_type" class="custom-select ml-2 w-75" disabled data-style="select-with-transition" title="Select Section" >

                      @foreach (  )
                          <option value="{{  }}" {{  }}> {{  }} {{  }}</option>
                      @endforeach
                      </select>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#"></a>
                  </div>

              </div>

              <div class="container">
                  <div class="row my-3">
                      <div class="col-sm-3">
                          <a  href="{{ route('') }}" role="button" class="btn btn-primary btn-block">Back</a>
                      </div>

                      @extends('layouts.master')

<div class="container col-md-6">
  
  <div class="container mt-4">

      <div class="container-fluid text-left my-2">     
          <ul class="list-inline mb-1">
              <li class="list-inline-item"> <h2>Schedule List</h2></li>
              <li class="list-inline-item"><h4 class="text-secondary">Show Schedule</h4></li>
          </ul>
      </div>
    <!-- -->
   
      <div class="container">
          <form action="{{ route('', ) }}" method="post" class="form-inline">
          {{csrf_field()}}
          @method('DELETE')
           
              <div class="row border-bottom border-top border-success py-3 my-2">

                  <div class="form-group col-sm-6">
                      <label for="subject" >Subject:</label>
                      <input type="text" class="form-control mb-2 ml-auto w-75" disabled data-style="select-with-transition" placeholder="Subject" name="subject" value="{{  }}">
                  </div>
            
                  <div class="form-group col-sm-6 ml-auto">
                      <label for="time">Time:</label>
                      <input type="text" class="form-control mb-2 ml-auto w-75" disabled data-style="select-with-transition" placeholder="Time" name="time" value="{{  }}" >
                  </div>

                  <div class="form-group col-sm-6 ml-auto">
                      <label for="room">Room:</label>
                      <input type="text" class="form-control mb-2 ml-auto w-75" disabled data-style="select-with-transition" placeholder="Room" name="room" value="{{  }}" >
                  </div>

                  <div class="form-group col-sm-6 ml-auto">
                      <label for="Schedule">Schedule:</label>
                      <input type="text" class="form-control mb-2 ml-auto w-75" disabled data-style="select-with-transition" placeholder="Schedule" name="Schedule" value="{{  }}" >
                  </div>

                   <div class="form-group col-sm-6 mt-3">
                      <label for="section" class="mr-4">Section:</label>
                      <select name="user_id" id="service_type" class="custom-select ml-2 w-75" disabled data-style="select-with-transition" title="Select Section" >

                      @foreach (  )
                          <option value="{{  }}" {{  }}> {{  }} {{  }}</option>
                      @endforeach
                      </select>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#"></a>
                  </div>

              </div>

              <div class="container">
                  <div class="row my-3">
                      <div class="col-sm-3">
                          <a  href="{{ route('') }}" role="button" class="btn btn-primary btn-block">Back</a>
                      </div>

                      @extends('layouts.master')

<div class="container col-md-6">
  
  <div class="container mt-4">

      <div class="container-fluid text-left my-2">     
          <ul class="list-inline mb-1">
              <li class="list-inline-item"> <h2>Schedule List</h2></li>
              <li class="list-inline-item"><h4 class="text-secondary">Show Schedule</h4></li>
          </ul>
      </div>
    <!-- -->
   
      <div class="container">
          <form action="{{ route('', ) }}" method="post" class="form-inline">
          {{csrf_field()}}
          @method('DELETE')
           
              <div class="row border-bottom border-top border-success py-3 my-2">

                  <div class="form-group col-sm-6">
                      <label for="subject" >Subject:</label>
                      <input type="text" class="form-control mb-2 ml-auto w-75" disabled data-style="select-with-transition" placeholder="Subject" name="subject" value="{{  }}">
                  </div>
            
                  <div class="form-group col-sm-6 ml-auto">
                      <label for="time">Time:</label>
                      <input type="text" class="form-control mb-2 ml-auto w-75" disabled data-style="select-with-transition" placeholder="Time" name="time" value="{{  }}" >
                  </div>

                  <div class="form-group col-sm-6 ml-auto">
                      <label for="room">Room:</label>
                      <input type="text" class="form-control mb-2 ml-auto w-75" disabled data-style="select-with-transition" placeholder="Room" name="room" value="{{  }}" >
                  </div>

                  <div class="form-group col-sm-6 ml-auto">
                      <label for="Schedule">Schedule:</label>
                      <input type="text" class="form-control mb-2 ml-auto w-75" disabled data-style="select-with-transition" placeholder="Schedule" name="Schedule" value="{{  }}" >
                  </div>

                   <div class="form-group col-sm-6 mt-3">
                      <label for="section" class="mr-4">Section:</label>
                      <select name="user_id" id="service_type" class="custom-select ml-2 w-75" disabled data-style="select-with-transition" title="Select Section" >

                      @foreach (  )
                          <option value="{{  }}" {{  }}> {{  }} {{  }}</option>
                      @endforeach
                      </select>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#"></a>
                  </div>

              </div>

              <div class="container">
                  <div class="row my-3">
                      <div class="col-sm-3">
                          <a  href="{{ route('') }}" role="button" class="btn btn-primary btn-block">Back</a>
                      </div>

                      <div class="col-sm-3 ml-auto">
                          <input type="submit" class="btn btn-danger btn-block" name="dltbtn" value="Delete">
                      </div>
                     
                  </div>
              </div>

          </form>
      </div>
  </div>
</div>

                     
                  </div>
              </div>

          </form>
      </div>
  </div>
</div>

                     
                  </div>
              </div>

          </form>
      </div>
  </div>
</div>
