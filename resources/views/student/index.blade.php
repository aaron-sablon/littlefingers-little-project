@extends('layouts.master')

<div class="container col-md-10">
        
        <div class="container mt-4">
    
            <div class="container-fluid text-left my-3 py-2 border-top border-bottom border-success"> 
                <div class="row">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"> <h2>Students List</h2></li>
                        <li class="list-inline-item"><h4 class="text-secondary">View Students</h4></li>
                    </ul>
                    <div class="col-sm-2  mt-4 ml-auto">
                        <a  class="btn btn-info btn-block" href="{{route('schedules.index')}}" role="button">View Schedule</a>
                    </div>
                </div>
            </div>
    
            @if(
                session()->has('msg') && session()->has('error') &&
                session()->get('msg') && !session()->get('error')
                )
                <div class="alert alert-success">
                    <p>{{ session()->get('msg') }}</p>
                    <hr>
                </div>
             @endif
    
            <div>
                <table class="table table-bordered">
                    <thead class="text-center thead-light">
                        <tr>
                            <th></th>
                            <th scope="col">Name</th>
                            <th scope="col">Grade</th>
                            <th scope="col">Section</th>
                            <th scope="col">Specialization</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach( $students as $stu )
                        <tr>
                            <td scope="row" class="text-center" >
                                <input class="form-check-input filled-in" type="checkbox" id="checkbox123">
                                <label class="form-check-label" for="checkbox123" class="label-table"></label>
                            </td>
                            <td>{{ $stu->fname. " " . $stu->lname }}</td>
                            <td>{{ $stu->grade }}</td>
                            <td>{{ $stu->section->name }}</td>
                            <td>{{ $stu->specialization->name }}</td>
                            <td class="text-center">
		      				<a href="{{route('students.show', $stu->lrn)}}" class="text-success fa fa-angle-double-right mr-2"></a>
		      			</td>   
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            <div class="container">
    
                <div class="row">                   
                    <div class="col-sm-2  mt-4">
                        <a  class="btn btn-success btn-block" href="{{route('students.create')}}" role="button">Add</a>
                    </div>
                     
                    <div class="col-sm-10  mt-4">
                        <div class="pagination justify-content-end">
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>
            </div>
    
    
        </div>
    </div>