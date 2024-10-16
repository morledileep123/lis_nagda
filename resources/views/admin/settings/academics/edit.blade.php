@extends('layouts.main')
@section('content')
<div id="content">
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Academic<h4 class="panel-title"> 
         <a href="{{ url('settings-academics') }}" class="btn btn-primary btn-sm pull-right ">Back</a>
       </h4></h6>
      </div>
      <div class="app-title full-right ">
         @if($message = Session::get('success'))   
            <div class="alert alert-success col-md-6">{{ $message }}</div>
         @endif
             <div class="card-body">
                <form action="{{route('settings-academics.update',$academicDatas->academic_id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                  <div class="row">
                      <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                          <label for="academic_title"> Title</label>
                          <input type="text" name="academic_title" id="academic_title" class="form-control " value="{{$academicDatas->academic_title}}" required="">
                          @error('academic_title')
                              <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div> 
                      <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                          <label for="academic_image"> Image</label>
                          <input type="file" name="academic_image" id="academic_image" class="form-control " value="{{$academicDatas->academic_image}}" accept="image/x-png,image/gif,image/jpeg">
                           @if($academicDatas->academic_image !=null)
                              <a href="{{asset('storage/'.$academicDatas->academic_image)}}" target="_blank">{{file_name($academicDatas->academic_image)}}</a><img src="{{'storage/'.$academicDatas->academic_image}}" width="50px;" height="50px;" >
                          @else <p>Not Uploaded</p>
                          @endif
                          @error('academic_image')
                              <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                       <div class="col-md-12 col-sm-6 col-lg-12 form-group">
                          <label for="academic_des"> Description</label>
                         <textarea id="academic_des" name="academic_des" class="form-control ckeditor" placeholder="Write your message.." required="">{{$academicDatas->academic_des}}</textarea>
                          @error('academic_des')
                              <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button  class="btn btn-primary btn-sm" type="submit" id="btnSubmit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   </div>
  <script type="text/javascript" src="http://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

@endsection