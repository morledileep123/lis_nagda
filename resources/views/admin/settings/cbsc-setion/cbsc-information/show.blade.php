@extends('layouts.main')
 @section('content')
<div id="content">
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">CBSC Section-information<h4 class="panel-title"> 
         <a href="{{ url('settings-cbscsection-information') }}" class="btn btn-primary btn-sm pull-right ">Back</a>
       </h4></h6>
      </div>
      <div class="app-title full-right ">
         <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                  <label for="cbsc_info_title"> Title</label>
                  <input type="text" name="cbsc_info_title" id="cbsc_info_title" class="form-control " value="{{$cbscInfoDatas->cbsc_info_title}}" readonly="">
              </div> 
              <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                  <label for="cbsc_info_file"> Image</label><br>
                  
                   @if($cbscInfoDatas->cbsc_info_file !=null)
                  <a href="{{asset('storage/'.$cbscInfoDatas->cbsc_info_file)}}" target="_blank">{{file_name($cbscInfoDatas->cbsc_info_file)}}</a>
                    @else <p>Not Uploaded</p>
                    @endif
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