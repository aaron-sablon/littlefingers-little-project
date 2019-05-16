@extends('layouts.master')
<div class="container col-md-6">
    
    <div class="container mt-4">

        <div class="container-fluid text-left my-2">     
            <ul class="list-inline mb-1">
                <li class="list-inline-item"> <h2>Specialization List</h2></li>
                <li class="list-inline-item"><h4 class="text-secondary">Add Specialization</h4></li>
            </ul>
        </div>
      <!-- -->
     
        <div class="container">
            <form action="{{route('specializations.store')}}" method="post" class="form-inline">
            {{csrf_field()}}
            <div class="row border-bottom border-top border-success py-3 my-2">
            <div>
                <table class="table table-bordered">
                    <thead class="text-center thead-light">
                        <tr>
                            <th>Grade 7</th>
                            <th>Grade 8</th>
                            <th>Grade 9</th>
                            <th>Grade 10</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row" class="text-center" >
                                <input class="form-check-input filled-in" type="checkbox" id="checkbox123" value="Grade 7" name="grade">
                                <label class="form-check-label" for="grade" class="label-table"></label>
                            </td> 
                            <td scope="row" class="text-center" >
                                <input class="form-check-input filled-in" type="checkbox" id="checkbox123" value="Grade 8" name="grade">
                                <label class="form-check-label" for="grade" class="label-table"></label>
                            </td> 
                            <td scope="row" class="text-center" >
                                <input class="form-check-input filled-in" type="checkbox" id="checkbox123" value="Grade 9" name="grade">
                                <label class="form-check-label" for="grade" class="label-table"></label>
                            </td> 
                            <td scope="row" class="text-center" >
                                <input class="form-check-input filled-in" type="checkbox" id="checkbox123"  value="Grade 10" name="grade">
                                <label class="form-check-label" for="grade" class="label-table"></label>
                            </td> 
                           
                           
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="form-group col-sm-6 mt-3">
                        <label for="name" class="mr-4">Name:</label>
                        <input type="text" class="form-control mb-2 ml-auto w-75" placeholder="Specialization" name="name">
                    </div>

            </div>
                <div class="container">
                    <div class="row my-3">
                        <div class="col-sm-3">
                            <a  href="{{ route('specializations.index') }}" role="button" class="btn btn-primary btn-block">Back</a>
                        </div>

                        <div class="col-sm-3 ml-auto">
                            <input type="submit" class="btn btn-success btn-block" name="addbtn" value="Add">
                        </div>
                    </div>
                </div>
            </form>
        </div> 