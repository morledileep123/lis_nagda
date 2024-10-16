@extends('layouts.main')
@section('content')
<div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Create Certificate Request<h4 class="panel-title"> <a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a></h4></h6>
          </div>
           <div class="app-title full-right">
           @if($message = Session::get('success'))   
              <div class="alert alert-success col-md-4">{{ $message }}</div>
           @endif
        </div>
          <!-- Card Body -->
          <div class="card-body">
              <form action="{{route('certificate-request.store')}}" method="post" id="form_submit" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                       <div class="row">               
                    <div class="col-md-6">
                       <label class="red"> *</label>
                       <label for="name"> Certificate Type</label>
                       <select class="form-control input-small " id="cert_type" name="cert_type"  aria-label="Small">
                        <option value=""> Select certificate type..</option>
                        @foreach(CERTIFICATE as $key => $value)
                          <option value="{{$value}}" {{old('cert_type') }}>{{$value}}</option>
                        @endforeach
                        
                       </select>
                       @error('cert_type')
                        <span class="text-danger">
                          <strong>{{$message}}</strong>
                        </span>
                      @enderror
                    </div> 
                    <div class="col-md-6">
                       <label class="red"> *</label>
                       <label for="name"> Apply Date</label>
                       <input  type="text" class="form-control input-small datepicker dob" id="apply_date" name="apply_date"  aria-label="Small" readonly="" data-date-format="yyyy-mm-dd">
                      @error('apply_date')
                        <span class="text-danger">
                          <strong>{{$message}}</strong>
                        </span>
                      @enderror
                    </div>
                    
                    <div class="col-md-6">
                         <label class="red"> *</label>
                         <label for="reason">Reason</label>
                         <textarea type="text" name="reason" class="form-control "  ></textarea> 
                         @error('reason')
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
                      <input type="submit" class="btn btn-success btn-sm " name="" value="Send" >
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
       
        cert_type:{
          required:true
        }, 
        reason:{
          required:true
        }, 
        
     
    },
      submitHandler: function(form) {
      form.submit();
      }
 });


</script>
 @endsection
