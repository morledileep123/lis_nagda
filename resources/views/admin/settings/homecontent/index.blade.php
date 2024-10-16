@extends('layouts.main')
 @section('content')
<div id="content">
  <div class="container">
   <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Home<h4 class="panel-title"> 
         <a href="{{route('settings-home.create')}}" type="button" class="btn btn-primary btn-sm pull-right addHeader">Add Content</a>
       </h4></h6>
      </div>
      <div class="app-title full-right">
       @if($message = Session::get('success'))   
          <div class="alert alert-success">{{ $message }}</div>
       @endif
      <!-- Card Body -->
      <div class="card-body">
        <table class="table table-striped table-bordered mytable">
           <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Image</th>
                <th>Icon</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php $count = 1; @endphp
               @foreach($homeContents as $homeContent)
              <tr>
                  <td>{{$count++}}</td>
                  <td>{{$homeContent->content_title}}</td>
                  <td><img src="{{'storage/'.$homeContent->content_image}}" width="100px;" height="100px;" ></td>
                  <td><img src="{{'storage/'.$homeContent->content_icon}}" width="100px;" height="100px;" ></td>
                  <td>{{$homeContent->content_des}}</td>
                  <td> <a  href="{{ route('settings-home.edit',$homeContent->home_c_id) }}"  ><i class="fa fa-pencil-square-o text-success"></i></a>
                    <a  href="{{ route('settings-home.show',$homeContent->home_c_id) }}"  ><i class="fa fa-eye text-primary"></i></a></td>
              </tr>
               @endforeach
            </tbody>
        </table> 
      </div>
    </div>
  </div>
  
 </div>
</div>
@endsection