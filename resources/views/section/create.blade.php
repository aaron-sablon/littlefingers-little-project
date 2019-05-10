@extends('layouts.master')
<div class="container col-md-6">
    
    <div class="container mt-4">

        <div class="container-fluid text-left my-2">     
            <ul class="list-inline mb-1">
                <li class="list-inline-item"> <h2>Section List</h2></li>
                <li class="list-inline-item"><h4 class="text-secondary">Add Section</h4></li>
            </ul>
        </div>
      <!-- -->
     
        <div class="container">
            <form action="{{route('')}}" method="post" class="form-inline">
            {{csrf_field()}}
 
                <div class="row border-bottom border-top border-success py-3 my-2">

                    <div class="form-group col-sm-6 mt-3">
                        <label for="gradelevel" class="mr-4">Gradelevel:</label>
                        <select name="user_id" id="service_type" class="custom-select ml-auto w-75" data-style="select-with-transition" title="Select Gradelevel" >
                        @foreach(  )
                            <option value="{{  }}">Grade 7</option>
                            <option value="{{  }}">Grade 8</option>
                            <option value="{{  }}">Grade 9</option>
                            <option value="{{  }}">Grade 10</option>
                         @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="section" >Section:</label>
                        <input type="text" class="form-control mb-2 ml-auto w-75" placeholder="Section" name="section">
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