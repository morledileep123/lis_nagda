@extends('layouts.main')
@section('content')
<div id="content">
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">CBSC-Setion Information<h4 class="panel-title"> 
         <a href="{{ url('settings-cbscsection-information') }}" class="btn btn-primary btn-sm pull-right ">Back</a>
       </h4></h6>
      </div>
      <div class="app-title full-right ">
         @if($message = Session::get('success'))   
            <div class="alert alert-success col-md-6">{{ $message }}</div>
         @endif
             <div class="card-body">
                <form action="{{route('settings-cbscsection-information.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="row">
                      <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                          <label for="cbsc_info_title"> Title</label>
                          <input type="text" name="cbsc_info_title" id="cbsc_info_title" class="form-control " value="{{old('cbsc_info_title')}}" >
                          @error('cbsc_info_title')
                              <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div> 
                      <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                          <label for="cbsc_info_file"> File</label>
                          <input type="file" name="cbsc_info_file" id="cbsc_info_file" class="form-control " value="{{old('cbsc_info_file')}}" accept="pdf" required="">
                          @error('cbsc_info_file')
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
@endsection