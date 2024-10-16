@extends('layouts.main')
@section('content')
<div id="content">
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Aboutus<h4 class="panel-title"> 
         <a href="{{ url('settings-aboutus') }}" class="btn btn-primary btn-sm pull-right ">Back</a>
       </h4></h6>
      </div>
      <div class="app-title full-right ">
         <div class="card-body">
              <div class="row">
                  <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                      <label for="about_title"> Title</label>
                      <input type="text" name="about_title" id="about_title" class="form-control " value="{{$aboutusDatas->about_title}}" readonly="">
                  </div> 
                  <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                      <label for="about_image"> Image</label><br>
                      
                       @if($aboutusDatas->about_image !=null)
                      <a href="{{asset('storage/'.$aboutusDatas->about_image)}}" target="_blank">{{file_name($aboutusDatas->about_image)}}</a><img src="{{'storage/'.$aboutusDatas->about_image}}" width="50px;" height="50px;">
                        @else <p>Not Uploaded</p>
                        @endif
                  </div>
                   <div class="col-md-12 col-sm-6 col-lg-12 form-group">
                      <label for="about_des"> Description</label>
                     <textarea id="about_des" name="about_des" class="form-control ckeditor" placeholder="Write your message.." readonly="">{{$aboutusDatas->about_des}}</textarea>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>
  <script type="text/javascript" src="http://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

@endsection