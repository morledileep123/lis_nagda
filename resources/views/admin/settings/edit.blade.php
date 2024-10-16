@extends('layouts.main')
@section('content')
  <div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Create Setting<h4 class="panel-title">  
              {{-- <a href="{{route('settings.create')}}" class="btn btn-success pull-right btn-sm border-radius">Add Setting</a> --}}
              <a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a></h4></h6>
          </div>
           <div class="app-title full-right">
           @if($message = Session::get('success'))   
              <div class="alert alert-success">{{ $message }}</div>
           @endif
        </div>
          <!-- Card Body -->
          <div class="card-body">
              <form action="{{route('settings.update',$showData->setting_id)}}" method="post" id="form_submit" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-md-12">
                       <div class="row">               
                    <div class="col-md-4">
                       <label class="red"> *</label>
                       <label for="name"> Title</label>
                       <input class="form-control input-small " id="title" name="title"  aria-label="Small" type="text" value="{{$showData->title}}">
                       @error('title')
                        <span class="text-danger">
                          <strong>{{$message}}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="logo">Logo </label>                
                        <div class="input-group">
                           <span class="input-group-addon"></span>
                            <input type="file" name="logo" class="form-control" id="logo" >
                        </div>
                        <img src="{{asset($showData->logo !=null ? 'storage/'.$showData->logo : 'storage/admin/student_demo.png')}}" style="width: 50px; height: 50px;" >
                         @error('logo')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="email">Email </label>                
                        <div class="input-group">
                           <span class="input-group-addon"></span>
                           <input type="emial" class="form-control onlyDigit input-sm" id="email"  name="email"  value="{{$showData->email}}" >
                            
                        </div>
                        @error('email')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                         <label for="website">Website</label>
                         <input type="text" name="website" class="form-control" value="{{$showData->website}}" >
                         @error('website')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="mobile1">Mobile1</label>
                         <input type="number" name="mobile1" class="form-control " value="{{$showData->mobile1}}"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                          @error('mobile1')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="mobile2">Mobile2</label>
                         <input type="number" name="mobile2" class="form-control " value="{{$showData->mobile2}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                          @error('mobile2')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="tel1">Telephone1</label>
                         <input type="number" name="tel1" class="form-control " value="{{$showData->tel1}}"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                          @error('tel1')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="tel2">Telephone2</label>
                         <input type="number" name="tel2" class="form-control " value="{{$showData->tel2}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                          @error('tel2')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div> 
                    
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="city_name">City Name</label>
                         <input type="text" name="city_name" class="form-control " value="{{$showData->city_name}}"  >
                         @error('city_name')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div> 
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="state_name">State Name</label>
                         <input type="text" name="state_name" class="form-control " value="{{$showData->state_name}}"  >
                         @error('state_name')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="country_name">County Name</label>
                         <input type="text" name="country_name" class="form-control " value="{{$showData->country_name}}"  >
                         @error('country_name')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="address">Address</label>
                         <textarea type="text" name="address" class="form-control ">{{$showData->address}}</textarea> 
                          @error('address')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="zip_code">Zip Code</label>
                         <input type="text" name="zip_code" class="form-control " value="{{$showData->zip_code}}" >
                         @error('zip_code')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-4">
                         <label class="red"> *</label>
                         <label for="school_code">School Code</label>
                         <input type="text" name="school_code" class="form-control " value="{{$showData->school_code}}" >
                         @error('school_code')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-4">
                         <label for="cbse_aff_no">CBSE AFFILIATION</label>
                         <input type="text" name="cbse_aff_no" class="form-control " value="{{$showData->cbse_aff_no}}" >
                         @error('cbse_aff_no')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-4">
                         <label for="mbse_aff_no">MPSE AFFILIATION</label>
                         <input type="text" name="mbse_aff_no" class="form-control " value="{{$showData->mbse_aff_no}}" >
                         @error('mbse_aff_no')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div> 
                    <div class="col-md-4">
                        <label class="red"> *</label>
                      
                         <label for="school_board">School Board</label>
                         <input type="text" name="school_board" class="form-control " value="{{$showData->school_board}}" >
                         @error('school_board')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-4">
                         <label for="description">Description</label>
                         <textarea type="text" name="description" class="form-control "  >{{$showData->description}}</textarea> 
                         @error('description')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>

                  </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                      <input type="submit" class="btn btn-success btn-sm" name="" value="Update">
                  </div>
                </div>
              </form>
          </div>    
  </div>
</div>

<style >
  .border-radius{
    border-radius: 4px;
  }
  .form-control{
    height: 34px;
  }
  label{
    font-size: 15px;
  }
  .red
      {
        color:red;
      }
</style>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="https://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script type="text/javascript">
  
   $.validator.addMethod("mobile_regex", function(value, element) {
    return this.optional(element) || /^\d{10}$/i.test(value);
    }, "Please Enter No Only.");
    
    $.validator.addMethod("password_regex", function(value, element) {
    return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/i.test(value);
    }, "Password must contain at least 1 lowercase, 1 uppercase, 1 numeric and 1 special character");
    
    $.validator.addMethod("email_regex", function(value, element) {
    return this.optional(element) || /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/i.test(value);
    }, "The Email Address Is Not Valid Or In The Wrong Format");
    
    $.validator.addMethod("name_regex", function(value, element) {
    return this.optional(element) || /^[a-zA-Z ]{2,100}$/i.test(value);
    }, "Please choose a name with only a-z 0-9.");
    
    $("#form_submit").validate({
        errorElement: 'required',
        errorClass: 'help-inline',
      
      rules: {
       
        title:{
          required:true
        }, 
         
        email:{
          required:true
        },
         website:{
          required:true
        },  
        mobile1:{
          required:true,
          minlength:10,
          maxlength:12,
          number: true
        }, 
         
        tel1:{
          required:true,
          minlength:10,
          maxlength:12,
          number: true
        },
        
        address:{
          required:true
        }, 
        city_name:{
          required:true
        },
        state_code:{
          required:true
        }, 
        country_name:{
          required:true
        }, 
        zip_code:{
          required:true
        }, 
        school_code:{
          required:true
        }, 
        school_board:{
          required:true
        },
        
     
     
    },
      submitHandler: function(form) {
      form.submit();
      }
 });



 $(document).ready(function(){
    $("#txtFromDate").datepicker({
        numberOfMonths: 2,
        onSelect: function(selected) {
          $("#txtToDate").datepicker("option","minDate", selected)
        }
    });
    $("#txtToDate").datepicker({ 
        numberOfMonths: 2,
        onSelect: function(selected) {
           $("#txtFromDate").datepicker("option","maxDate", selected)
        }
    });  
});
</script>
 @endsection
