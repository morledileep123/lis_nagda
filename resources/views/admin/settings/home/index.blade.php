@extends('layouts.main')
 @section('content')
<div id="content">
  <div class="container">
  @include('admin.settings.header')
   <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Header<h4 class="panel-title"> 
         <button type="button" class="btn btn-primary btn-sm pull-right addHeader">Add Header</button>
       </h4></h6>
      </div>
      <div class="app-title full-right">
       @if($message = Session::get('success'))   
          <div class="alert alert-success">{{ $message }}</div>
       @endif
      <!-- Card Body -->
      <div class="card-body">
        <table class="table table-striped table-bordered">
           <thead>
              <tr>
                <th>#</th>
                <th>Mobile No</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
               
              </tr>
            </tbody>
        </table> 
      </div>
    </div>
  </div>
  
 </div>
</div>
@endsection