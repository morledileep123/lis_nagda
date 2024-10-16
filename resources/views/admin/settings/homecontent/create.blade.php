@extends('layouts.main')
@section('content')
<div id="content">
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Home<h4 class="panel-title"> 
         <a href="{{ url('settings-home') }}" class="btn btn-primary btn-sm pull-right ">Back</a>
       </h4></h6>
      </div>
      <div class="app-title full-right ">
         @if($message = Session::get('success'))   
            <div class="alert alert-success col-md-6">{{ $message }}</div>
         @endif
             <div class="card-body">
                <form action="{{route('settings-home.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="row">
                      <div class="col-md-4 col-sm-4 col-lg-4 form-group">
                          <label for="content_title"> Title</label>
                          <input type="text" name="content_title" id="content_title" class="form-control " value="{{old('content_title')}}" >
                          @error('content_title')
                              <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div> 
                      <div class="col-md-4 col-sm-4 col-lg-4 form-group">
                          <label for="content_image"> Image</label>
                          <input type="file" name="content_image" id="content_image" class="form-control " value="{{old('content_image')}}" accept="image/x-png,image/gif,image/jpeg" onchange="preview()">
                            <img id="frame" src="" width="100px" height="100px"/>
                          @error('content_image')
                              <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div> 
                      <div class="col-md-4 col-sm-4 col-lg-4 form-group">
                          <label for="content_icon"> Icon</label>
                          <input type="file" name="content_icon" id="content_icon" class="form-control " value="{{old('content_icon')}}" accept="image/x-png,image/gif,image/jpeg">
                          @error('content_icon')
                              <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                       <div class="col-md-12 col-sm-6 col-lg-12 form-group">
                          <label for="content_des"> Description</label>
                         <textarea id="content_des" name="content_des" class="form-control ckeditor" placeholder="Write your message.." required="">{{old('content_des')}}</textarea>
                          @error('content_des')
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
<script>
  
  function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
}
</script>
@endsection