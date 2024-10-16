@extends('layouts.main')
@section('content')
<div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Create Discount<h4 class="panel-title">  <a href="{{ route('discount.index') }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a></h4></h6>
          </div>
           <div class="app-title full-right col-md-4">
           @if($message = Session::get('success'))   
              <div class="alert alert-success">{{ $message }}</div>
           @endif
        </div>
          <!-- Card Body -->
          <div class="card-body">
              <form action="{{route('discount.store')}}" method="post" id="form_submit" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                       <div class="row">               
                   {{--  <div class="col-md-4">
                       <label class="red"> *</label>
                       <label for="discount_code"> Discount Code</label>
                       <input class="form-control input-small " id="discount_code" name="discount_code"  aria-label="Small" type="text" value="{{old('discount_code')}}">
                       @error('discount_code')
                        <span class="text-danger">
                          <strong>{{$message}}</strong>
                        </span>
                      @enderror
                    </div> --}}
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="discount_name">Discount Name </label>                
                        <div class="input-group">
                           <span class="input-group-addon"></span>
                           <input type="text" class="form-control onlyDigit input-sm" id="discount_name"  name="discount_name"  value="{{old('discount_name')}}" >
                        </div>
                        @error('discount_name')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                        @enderror
                    </div>
                     <div class="col-md-4">
                        <label class="red"> *</label>
                         <label for="discount_no_type">Discount no type</label>
                         <select name="discount_no_type" class="form-control" >
                           <option value="">Select Discount Mode</option>
                           <option value="1" {{old('discount_no_type') == '1' ? 'selected':'' }}>First</option>
                           <option value="2" {{old('discount_no_type') =='1' ? 'selected':'' }}>Second</option>
                           <option value="3" {{old('discount_no_type') =='2' ? 'selected':'' }}>Third</option>
                         </select>
                         @error('discount_no_type')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                         <label for="batch_id">Batch</label>
                         <select name="batch_id" class="form-control" value="{{old('batch_id')}}">
                          <option value="">Select batch</option>
                           @foreach($studentBatch as $key => $studentBatchs)
                           <option value={{$studentBatchs->id}}>{{$studentBatchs->batch_name}}</option>
                           @endforeach
                         </select>
                         @error('batch_id')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>   
                    <div class="col-md-4">
                        <label class="red"> *</label>
                         <label for="gender">Gender</label>
                         <select name="gender" class="form-control" value="{{old('gender')}}">
                          <option value="">Select gender</option>
                           @foreach(GENDER as $key => $gender)
                           <option value={{$key}}>{{$gender}}</option>
                           @endforeach
                         </select>
                         @error('gender')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>  
                    <div class="col-md-4">
                        <label class="red"> *</label>
                         <label for="discount_type_id">Discount Type</label>
                         <select name="discount_type_id" class="form-control" value="{{old('discount_type_id')}}">
                           <option value="">Select Discount type</option>
                           @foreach($descountType as $descountTypes)
                           <option value="{{$descountTypes->discount_type_id}}">{{$descountTypes->discount_type_name}}</option>
                           @endforeach 
                         </select>
                         @error('discount_no_type')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>                    
                    <div class="col-md-4">
                        <label class="red"> *</label>
                         <label for="discount_mode">Discount Mode</label>
                         <select name="discount_mode" class="form-control" value="{{old('discount_mode')}}">
                           <option value="">Select Discount Mode</option>
                           <option value="P">Percentage(%)</option>
                           <option value="R">Rupee</option>
                         </select>
                         @error('discount_mode')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="discount_amnt">Discount Amount</label>
                         <input type="text" name="discount_amnt" class="form-control " value="{{old('discount_amnt')}}"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                          @error('discount_amnt')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="discount_desc">Discount description</label>
                         <textarea type="text" name="discount_desc" class="form-control ">{{old('discount_desc')}}</textarea> 
                          @error('discount_desc')
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
