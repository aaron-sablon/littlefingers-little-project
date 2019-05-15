@extends('layouts.master')

<div class="container col-md-6">
  
  <div class="container mt-4">

      <div class="container-fluid text-left my-2">     
          <ul class="list-inline mb-1">
              <li class="list-inline-item"> <h2>Professor List</h2></li>
              <li class="list-inline-item"><h4 class="text-secondary">Show Professor</h4></li>
          </ul>
      </div>
    <!-- -->
   
      <div class="container">
          <form action="{{ route('professors.destroy',$professors->id ) }}" method="post" class="form-inline">
          {{csrf_field()}}
          @method('DELETE')
           
              <div class="row border-bottom border-top border-success py-3 my-2">

                  <div class="form-group col-sm-6">
                      <label for="fname" >Firstname:</label>
                      <input type="text" class="form-control mb-2 ml-auto w-75" disabled data-style="select-with-transition" placeholder="Firstname" name="fname" value="{{  }}">
                  </div>
            
                  <div class="form-group col-sm-6 ml-auto">
                      <label for="lname">Lastname:</label>
                      <input type="text" class="form-control mb-2 ml-auto w-75" disabled data-style="select-with-transition" placeholder="Lastname" name="lname" value="{{  }}" >
                  </div>

                  <div class="form-group col-sm-6 mt-3">
                      <label for="gradelevel" class="mr-4">Gradelevel:</label>
                      <select name="user_id" id="service_type" class="custom-select ml-2 w-75" disabled data-style="select-with-transition" title="Select Gradelevel" >

                      @foreach (  )
                          <option value="{{  }}" {{  }}> {{  }} {{  }}</option>
                      @endforeach
                      </select>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#"></a>
                  </div>

                  <div class="form-group col-sm-6 ml-auto">
                      <label for="contact">Contact:</label>
                      <input type="text" class="form-control mb-2 ml-auto w-75" disabled data-style="select-with-transition" placeholder="Contact" name="contact" value="{{  }}" >
                  </div>


                   <div class="form-group col-sm-6 mt-3">
                      <label for="advisory" class="mr-4">Advisory:</label>
                      <select name="user_id" id="service_type" class="custom-select ml-2 w-75" disabled data-style="select-with-transition" title="Select Advisory" >

                      @foreach ( $professors as $prof  )
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
                          <a  href="{{ route('professor.index') }}" role="button" class="btn btn-primary btn-block">Back</a>
                      </div>

                      <div class="col-sm-3">
                          <a  href="{{ route('professor.update', $professors->id ) }}" role="button" class="btn btn-success btn-block">Edit</a>
                      </div>

                  </div>
              </div>

          </form>
      </div>
  </div>
</div>
