@extends('layouts.main')
@section('content')
<div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Edit Discount Type<h4 class="panel-title">  <a href="{{ route('discount_type.index') }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a></h4></h6>
          </div>
           <div class="app-title full-right col-md-4">
           @if($message = Session::get('success'))   
              <div class="alert alert-success">{{ $message }}</div>
           @endif
        </div>
          <!-- Card Body -->
          <div class="card-body">
              <form action="{{route('discount_type_update',$edit->discount_type_id)}}" method="post" id="form_submit" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                  <div class="col-md-12">
                       <div class="row">               
                  
                    <div class="col-md-6">
                        <label class="red"> *</label>
                        <label for="discount_type_name">Discount Name </label>                
                        <div class="input-group">
                           <span class="input-group-addon"></span>
                           <input type="text" class="form-control onlyDigit input-sm" id="name"  name="discount_type_name"  value="{{$edit->discount_type_name}}" >
                           <input type="hidden" class="form-control onlyDigit input-sm" id="name"  name="discount_code"  value="{{$edit->discount_code}}" >
                            
                        </div>
                        @error('discount_type_name')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label class="red"> *</label>
                        <label for="discount_type_desc">Discount type description</label>
                         <textarea type="text" name="discount_type_desc" class="form-control ">{{$edit->discount_type_desc}}</textarea> 
                          @error('discount_type_desc')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="red"> *</label>
                        <label for="shrt_desc">Short description</label>
                         <input type="text" name="shrt_desc" class="form-control " value="{{$edit->shrt_desc}}"   >
                          @error('shrt_desc')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-12">
                      <input type="submit" class="btn btn-success btn-sm" name="" value="Submit">
                  </div>
                </div>
              </form>
          </div>    
    </div>
</div>


 @endsection
