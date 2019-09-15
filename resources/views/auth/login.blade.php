@extends('layouts.master')

  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="row border-bottom border-top border-danger py-3 my-3">
            <div class="container-fluid text-center">     
                <div class="container-fluid text-center my-2 py-2">     
                    <ul class="list-inline mb-1">
                        <li class="list-inline-item"> <h2>QR Code Schedule Checker</h2></li>
                    </ul>
                </div>
              </div>
        </div>  
    </div>
    <div class="col-sm-2"></div>
  </div>    
   <br>
   <br>
    <form>
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="container-fluid text-left">  
                <div class="form-group row-sm-4">
                  <div class="row">
                    <div class="col-sm-2">
                     <i class="fa fa-user-circle"  style="font-size:55px;"></i>
                    </div>
                    <div class="col-sm-10">
                        <input id="username" type="text" class="form-control" name="username" placeholder="Enter Username" style="height: 55px">
                    </div>
                  </div>
                </div>
                <br>
                <br>
                 
                <div class="form-group row-sm-4">
                  <div class="row">
                    <div class="col-sm-2">
                        <i class="fa fa-lock"  style="font-size:55px;"></i>
                    </div>
                    <div class="col-sm-10">
                        <input id="password" type="password" class="form-control ml-auto" name="password" placeholder="Password" style="height: 55px">
                    </div>
                  </div>
                </div>
              </div>
              <button type="login" class="btn btn-success">Log in</button>
              
        <button type="register" class="btn btn-primary">Register</button>
      </div>
</div>
        <div class="col-sm-4"></div>
      </div>  
    </form>
  
