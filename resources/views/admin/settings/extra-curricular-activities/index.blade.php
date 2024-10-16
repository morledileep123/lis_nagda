@extends('layouts.main')
 @section('content')
<div id="content">
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Extra Curricular Activities<h4 class="panel-title"> 
         <a href="{{ url('settings-ext-culr-activities') }}" class="btn btn-primary btn-sm pull-right ">Back</a>
         <a href="{{ route('settings-ext-culr-activities.create') }}" class="btn btn-success fa fa-plus btn-sm pull-right ">Add Academics</a>
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
              @foreach($extCrclrActsDatas as $extCrclrActsData)
                <tr>
                  <td>{{ $i++}}</td>
                  <td>{{ $extCrclrActsData->ext_crclr_acts_title}}</td>
                  <td>
                    @if($extCrclrActsData->ext_crclr_acts_image !=null)
                        <a href="{{asset('storage/'.$extCrclrActsData->ext_crclr_acts_image)}}" target="_blank">{{file_name($extCrclrActsData->ext_crclr_acts_image)}}</a><img src="{{'storage/'.$extCrclrActsData->ext_crclr_acts_image}}" width="50px;" height="50px;">
                    @else <p>Not Uploaded</p>
                    @endif</td>
                  <td>{{ $extCrclrActsData->ext_crclr_acts_des}}</td>
                  <td> 
                    <a  href="{{ route('settings-ext-culr-activities.edit',$extCrclrActsData->ext_crclr_acts_id) }}"  ><i class="fa fa-pencil-square-o text-success"></i></a>
                    <a  href="{{ route('settings-ext-culr-activities.show',$extCrclrActsData->ext_crclr_acts_id) }}"  ><i class="fa fa-eye text-primary"></i></a>
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