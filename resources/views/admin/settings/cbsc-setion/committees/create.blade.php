@extends('layouts.main')
 @section('content')
<div id="content">
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">CBSC-Setion Commitees<h4 class="panel-title"> 
         <a href="{{ url('settings-cbscsection-committees') }}" class="btn btn-primary btn-sm pull-right ">Back</a>
       </h4></h6>
      </div>
      <div class="app-title full-right ">
         @if($message = Session::get('success'))   
            <div class="alert alert-success col-md-6">{{ $message }}</div>
         @endif
             <div class="card-body">
                <form action="{{route('settings-cbscsection-committees.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="row">
                      <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                          <label for="commitees_title"> Title</label>
                          <input type="text" name="commitees_title" id="commitees_title" class="form-control " value="{{old('commitees_title')}}" required="">
                          @error('commitees_title')
                              <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div> 
                      <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                          <label for="commitees_image"> Image</label>
                          <input type="file" name="commitees_image" id="commitees_image" class="form-control " value="{{old('commitees_image')}}" accept="image/*">
                          @error('commitees_image')
                              <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                       <div class="col-md-12 col-sm-6 col-lg-12 form-group">
                          <label for="commitees_des"> Description</label>
                         <textarea id="commitees_des" name="commitees_des" class="form-control ckeditor" placeholder="Write your message.." required="">{{old('commitees_des')}}</textarea>
                          @error('commitees_des')
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