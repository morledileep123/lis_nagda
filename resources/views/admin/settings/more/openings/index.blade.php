@extends('layouts.main')
@section('content')
<div id="content">
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Opening<h4 class="panel-title"> 
         <a href="{{ url('settings-more-dashboard') }}" class="btn btn-primary btn-sm pull-right ">Back</a>
         <a href="{{ route('settings-openings.create') }}" class="btn btn-success fa fa-plus btn-sm pull-right ">Add Opening</a>
       </h4></h6>
      </div>
      <div class="app-title full-right ">
         @if($message = Session::get('success'))   
            <div class="alert alert-success col-md-6">{{ $message }}</div>
         @endif
      <div class="card-body">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php $i=1; @endphp
              @foreach($openingsDatas as $openingsData)
                <tr>
                  <td>{{ $i++}}</td>
                  <td>{{ $openingsData->openings_title}}</td>
                  <td>
                    @if($openingsData->openings_image !=null)
                        <a href="{{asset('storage/'.$openingsData->openings_image)}}" target="_blank">{{file_name($openingsData->openings_image)}}</a><img src="{{'storage/'.$openingsData->openings_image}}" width="50px;" height="50px;">
                    @else <p>Not Uploaded</p>
                    @endif</td>
                  <td>{{ $openingsData->openings_des}}</td>
                  <td> 
                    <a  href="{{ route('settings-openings.edit',$openingsData->openings_id) }}"  ><i class="fa fa-pencil-square-o text-success"></i></a>
                    <a  href="{{ route('settings-openings.show',$openingsData->openings_id) }}"  ><i class="fa fa-eye text-primary"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table> 
      </div>
    </div>
  </div>
  <script type="text/javascript" src="http://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection