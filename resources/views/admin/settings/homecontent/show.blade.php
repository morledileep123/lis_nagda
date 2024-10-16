@extends('layouts.main')
@section('content')
<div id="content">
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Home Content<h4 class="panel-title"> 
         <a href="{{ url('settings-home') }}" class="btn btn-primary btn-sm pull-right ">Back</a>
       </h4></h6>
      </div>
      <div class="app-title full-right ">
         
             <div class="card-body">
                  <div class="row">
                    <div class="col-md-4 col-sm-4 col-lg-4 form-group">
                          <label for="content_title"> Title</label>
                          <input type="text" name="content_title" id="content_title" class="form-control " value="{{$homeContent->content_title}}"  readonly="">
                      </div> 
                      <div class="col-md-4 col-sm-4 col-lg-4 form-group">
                          <label for="content_image"> Image</label><br>
                           @if($homeContent->content_image !=null)
                              <a href="{{asset('storage/'.$homeContent->content_image)}}" target="_blank">{{file_name($homeContent->content_image)}}</a><img src="{{asset('storage/'.$homeContent->content_image)}}" width="50px;" height="50px;" >
                          @else 
                            <img id="frame" src="" width="50px;" height="50px;"/>
                          @endif
                      </div> 
                      <div class="col-md-4 col-sm-4 col-lg-4 form-group">
                          <label for="content_icon"> Icon</label><br>
                          @if($homeContent->content_icon !=null)
                              <a href="{{asset('storage/'.$homeContent->content_icon)}}" target="_blank">{{file_name($homeContent->content_icon)}}</a><img src="{{asset('storage/'.$homeContent->content_icon)}}" width="50px;" height="50px;" >
                          @else 
                            <img id="frame" src="" width="50px;" height="50px;"/>
                          @endif
                      </div>
                       <div class="col-md-12 col-sm-6 col-lg-12 form-group">
                          <label for="content_des"> Description</label>
                         <textarea id="content_des" name="content_des" class="form-control ckeditor" placeholder="Write your message.." readonly="">{{$homeContent->content_des}}</textarea>
                      </div>
                  </div>
              </div>
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