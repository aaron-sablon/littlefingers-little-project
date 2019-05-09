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
            <form action="{{route('')}}" method="post" class="form-inline">
            {{csrf_field()}}
 
                <div class="row border-bottom border-top border-success py-3 my-2">

                    <div class="form-group col-sm-6">
                        <label for="subject" >Subject:</label>
                        <input type="text" class="form-control mb-2 ml-auto w-75" placeholder="Subject" name="subject">
                    </div>
              
                    <div class="form-group col-sm-6 ml-auto">
                        <label for="time">Time:</label>
                        <input type="text" class="form-control mb-2 ml-auto w-75" placeholder="Time" name="time" >
                    </div>

                    <div class="form-group col-sm-6 ml-auto">
                        <label for="room">Room:</label>
                        <input type="text" class="form-control mb-2 ml-auto w-75" placeholder="Room" name="room" >
                    </div>

                    <div class="form-group col-sm-6 ml-auto">
                        <label for="professor">Professor:</label>
                        <input type="text" class="form-control mb-2 ml-auto w-75" placeholder="Professor" name="professor" >
                    </div>

                    <div class="form-group col-sm-6 mt-3">
                        <label for="section" class="mr-4">Section:</label>
                        <select name="user_id" id="service_type" class="custom-select ml-auto w-75" data-style="select-with-transition" title="Select section" >
                        @foreach(  )
                            <option value="{{  }}">Einstein</option>
                            <option value="{{  }}">Archimedes</option>
                            <option value="{{  }}">Diamond</option>
                            <option value="{{  }}">Amethyst</option>
                            <option value="{{  }}">Emerald</option>
                            <option value="{{  }}">Jade</option>
                            <option value="{{  }}">Jasper</option>
                            <option value="{{  }}">Opal</option>
                            <option value="{{  }}">Pearl</option>
                            <option value="{{  }}">Moonstone</option>
                            <option value="{{  }}">Ruby</option>
                            <option value="{{  }}">Sapphire</option>
                            <option value="{{  }}">Tektite</option>
                            <option value="{{  }}">Topaz</option>
                            <option value="{{  }}">Tormaline</option>
                            <option value="{{  }}">Turquoise</option>
                            <option value="{{  }}">Zircon</option>
                        @endforeach
                        </select>
                    </div>

                </div>

                <div class="container">
                    <div class="row my-3">
                        <div class="col-sm-3">
                            <a  href="{{ route('') }}" role="button" class="btn btn-primary btn-block">Back</a>
                        </div>

                        <div class="col-sm-3 ml-auto">
                            <input type="submit" class="btn btn-success btn-block" name="addbtn" value="Add">
                        </div>
                    </div>
                </div>
            </form>
        </div> 