@extends('layouts.main')
 @section('content')
<div id="content">
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Contactus<h4 class="panel-title"> 
         <a href="{{ url('settings-contactus') }}" class="btn btn-primary btn-sm pull-right ">Back</a>
       </h4></h6>
      </div>
      <div class="app-title full-right ">
         <div class="card-body">
              <div class="row">
                  <div class="col-md-4 col-sm-4 col-lg-4 form-group">
                      <label for="contact_us_title"> Title</label>
                      <input type="text" name="contact_us_title" id="contact_us_title" class="form-control " value="{{$contactusDatas->contact_us_title}}" readonly ="">
                  </div>  
                  <div class="col-md-4 col-sm-4 col-lg-4 form-group">
                      <label for="contact_us_map_url"> Map URL</label>
                      <p>{{$contactusDatas->contact_us_map_url}}</p>
                  </div> 
                  <div class="col-md-4 col-sm-4 col-lg-4 form-group">
                      <label for="contact_us_image"> Image</label><br>
                       @if($contactusDatas->contact_us_image !=null)
                          <a href="{{asset('storage/'.$contactusDatas->contact_us_image)}}" target="_blank">{{file_name($contactusDatas->contact_us_image)}}</a><img src="{{'storage/'.$contactusDatas->contact_us_image}}" width="50px;" height="50px;">
                      @else <p>Not Uploaded</p>
                      @endif
                  </div>
                   <div class="col-md-12 col-sm-6 col-lg-12 form-group">
                      <label for="contact_us_des"> Description</label>
                     <textarea id="contact_us_des" name="contact_us_des" class="form-control ckeditor" placeholder="Write your message.." readonly="">{{$contactusDatas->contact_us_des}}</textarea>
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