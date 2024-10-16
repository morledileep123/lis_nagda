@extends('layouts.main')
@section('content')
<div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Create Setting
              <h4 class="panel-title">  
                {{-- <a href="{{route('settings.create')}}" class="btn btn-success pull-right btn-sm border-radius">Add Setting</a> --}}
                <a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a>
              </h4></h6>
          </div>
           <div class="app-title full-right">
           @if($message = Session::get('success'))   
              <div class="alert alert-success">{{ $message }}</div>
           @endif
        </div>
          <!-- Card Body -->
          <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                       <div class="row">               
                    <div class="col-md-4">
                       <label for="name"> Title</label>
                       <input class="form-control input-small " id="title" name="title"  aria-label="Small" type="text" value="{{$showData->title}}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="logo">Logo </label>                
                        <div class="input-group">
                           <span class="input-group-addon"></span>
                           
                            <img src="{{asset($showData->logo !=null ? 'storage/'.$showData->logo : 'storage/admin/student_demo.png')}}" style="width: 50px; height: 50px;" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="email">Email </label>                
                        <div class="input-group">
                           <span class="input-group-addon"></span>
                           <input type="emial" class="form-control onlyDigit input-sm" id="email"  name="email"  value="{{$showData->email}}"  readonly>
                         </div>
                    </div>
                    <div class="col-md-4">
                         <label for="website">Website</label>
                         <input type="text" name="website" class="form-control" value="{{$showData->website}}"  readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="mobile1">Mobile1</label>
                         <input type="text" name="mobile1" class="form-control " value="{{$showData->mobile1}}"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"  readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="mobile2">Mobile2</label>
                         <input type="text" name="mobile2" class="form-control " value="{{$showData->mobile2}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"  readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="tel1">Telephone1</label>
                         <input type="text" name="tel1" class="form-control " value="{{$showData->tel1}}"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="tel2">Telephone2</label>
                         <input type="text" name="tel2" class="form-control " value="{{$showData->tel2}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" readonly>
                    </div> 
                    
                    <div class="col-md-4">
                        <label for="city_name">City Name</label>
                         <input type="text" name="city_name" class="form-control " value="{{$showData->city_name}}"  readonly >
                    </div> 
                    <div class="col-md-4">
                        <label for="state_name">State Name</label>
                         <input type="text" name="state_name" class="form-control " value="{{$showData->state_name}}"  readonly >
                    </div>
                    
                    <div class="col-md-4">
                        <label for="country_name">County Name</label>
                         <input type="text" name="country_name" class="form-control " value="{{$showData->country_name}}"  readonly >
                    </div>
                    <div class="col-md-4">
                        <label for="address">Address</label>
                         <textarea type="text" name="address" class="form-control " readonly>{{$showData->address}}</textarea> 
                    </div>
                    <div class="col-md-4">
                        <label for="zip_code">Zip Code</label>
                         <input type="text" name="zip_code" class="form-control " value="{{$showData->zip_code}}" readonly >
                    </div>
                    <div class="col-md-4">
                         <label for="school_code">School Code</label>
                         <input type="text" name="school_code" class="form-control " value="{{$showData->school_code}}"  readonly>
                    </div>
                    <div class="col-md-4">
                         <label for="cbse_aff_no">CBSE AFFILIATION</label>
                         <input type="text" name="cbse_aff_no" class="form-control " value="{{$showData->cbse_aff_no}}" readonly >
                    </div>
                    <div class="col-md-4">
                         <label for="mbse_aff_no">MPSE AFFILIATION</label>
                         <input type="text" name="mbse_aff_no" class="form-control " value="{{$showData->mbse_aff_no}}" readonly >
                    </div>
                    <div class="col-md-4">
                         <label for="description">Description</label>
                         <textarea type="text" name="description" class="form-control "  readonly >{{$showData->description}}</textarea> 
                        
                    </div>

                  </div>
                  </div>
                </div>
                
              </form>
          </div>    
  </div>
</div>

 @endsection
