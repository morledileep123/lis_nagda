@extends('layouts.main')
@section('content')
<div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Create Certificate<h4 class="panel-title">  <a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a></h4></h6>
          </div>
           <div class="app-title full-right">
           @if($message = Session::get('success'))   
              <div class="alert alert-success">{{ $message }}</div>
           @endif
        </div>
          <!-- Card Body -->
          <div class="card-body">
              <form action="{{route('certificates.store')}}" method="post" id="form_submit" autocomplete="off" enctype="multipart/form-data">
                @csrf
                  <input type="hidden" name="stu_id" value="{{$certifReqApprove->studentInfo->user_id}}" id="stu_id">
                  <input type="hidden" name="approve_request" value="approve_request" id="approve_request">
                  <input type="hidden" name="cert_req_id" value="{{$certifReqApprove->cert_req_id}}" id="cert_req_id">

                <div class="row">
                  <div class="col-md-12">
                    <div class="row">               
                      <div class="col-md-4 form-group">
                            <label for="std_class" class="required">Class</label>
                            <select class="form-control required" name="std_class_id" id="std_class_id" required="required" readonly>
                              <option value="{{$certifReqApprove->studentInfo->std_class_id}}">{{$certifReqApprove->studentInfo->student_class->class_name}}</option>
                             
                            </select>
                            @error('std_class_id')
                              <span class="text-danger">
                                <strong>{{$message}}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="col-md-4 form-group">
                            <label class="required"> Batch</label>
                            <select class="form-control required" name="batch_id" required="required" id="batch_id" readonly>
                              <option value="{{$certifReqApprove->studentInfo->batch_id}}">{{$certifReqApprove->studentInfo->student_batch->batch_name}}</option>
                            </select>
                            @error('batch_id')
                              <span class="text-danger">
                                <strong>{{$message}}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="col-md-4 form-group">
                            <label class="required">Section</label>

                            <select class="form-control required" name="section_id" id="section_id" required="required" readonly>
                              <option value="{{$certifReqApprove->studentInfo->section_id}}">{{$certifReqApprove->studentInfo->student_section->section_name}}</option>
                             
                            </select>
                            @error('section_id')
                              <span class="text-danger">
                                <strong>{{$message}}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="col-md-4 form-group">
                            <label class="required">Select Student</label>

                            <select class="form-control required" name="students" id="students" required="required" readonly>
                              <option value="{{$certifReqApprove->studentInfo->id}}">{{$certifReqApprove->studentInfo->f_name}}</option>
                            </select>
                            @error('students')
                              <span class="text-danger">
                                <strong>{{$message}}</strong>
                              </span>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="required">Admission No</label>
                            <input type="text" name="admission_no" id="admission_no" readonly="" class="form-control" value="{{$certifReqApprove->studentInfo->admision_no}}">
                            @error('admission_no')
                              <span class="text-danger">
                                <strong>{{$message}}</strong>
                              </span>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="required"> Apply Date </label>
                            <input type="text" name="apply_date" id="apply_date" readonly="" data-date-format="yyyy-mm-dd" class="form-control datepicker" value="{{$certifReqApprove->apply_date}}">
                            @error('apply_date')
                              <span class="text-danger">
                                <strong>{{$message}}</strong>
                              </span>
                            @enderror
                        </div>
                         <div class="col-md-4 form-group">
                            <label class="required"> Issue Date </label>
                            <input type="text" name="issue_date" id="issue_date " readonly="" data-date-format="yyyy-mm-dd" class="form-control datepicker" value="{{old('issue_date') }}">
                            @error('issue_date')
                              <span class="text-danger">
                                <strong>{{$message}}</strong>
                              </span>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="required"> General Conduct </label>
                            <input type="text" name="general_conduct" id="general_conduct"  class="form-control "value="{{old('general_conduct') }}">
                            @error('general_conduct')
                              <span class="text-danger">
                                <strong>{{$message}}</strong>
                              </span>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                              <label for="name"> Certificate Type</label>
                              <input type="text" class="form-control input-small " id="cert_type" name="cert_type"  aria-label="Small" value="{{$certifReqApprove->cert_type}}" readonly="">
                      
                            @error('school_board')
                              <span class="text-danger">
                                <strong>{{$message}}</strong>
                              </span>
                            @enderror
                        </div> 
                        <div class="col-md-4 form-group">
                            <label class="required">School Board  </label>
                            <select class="form-control required" name="school_board" id="school_board" required="required">
                              <option value="">Select Class</option>
                              @foreach($settings as $setting)
                                <option value="{{$setting->school_board}}">{{$setting->school_board}}</option>
                              @endforeach
                            </select>
                            @error('school_board')
                              <span class="text-danger">
                                <strong>{{$message}}</strong>
                              </span>
                            @enderror
                        </div>
                         <div class="col-md-4 form-group">
                            <label class="required"> Reason </label>
                            <textarea  name=" reason" id=" reason" class="form-control " readonly=""> {{$certifReqApprove->reason}}
                            </textarea> 
                            @error('reason')
                              <span class="text-danger">
                                <strong>{{$message}}</strong>
                              </span>
                            @enderror
                        </div>
                  </div>
                   
                </div>
                <div class="row mt-3">
                  <div class="col-md-12">
                      <input type="submit" class="btn btn-success btn-sm" name="" value="Approve">
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
       
        std_class_id:{
          required:true
        }, 
         
        batch_id:{
          required:true
        },
         section_id:{
          required:true
        },  
        students:{
          required:true
        }, 
         
        admision_no:{
          required:true
        },
        
        apply_date:{
          required:true
        }, 
        issue_date:{
          required:true
        },
        cert_type:{
          required:true
        }, 
        general_conduct:{
          required:true
        }, 
        school_board:{
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

$(document).on('change','#section_id',function(){
  var section_id = $(this).val();
  var std_class_id = $('#std_class_id').val();
  var batch_id = $('#batch_id').val();
    // if (section_id !='' && std_class_id !='' && batch_id !='' &&) {
      $.ajax({
       type:'POST',
       url: "{{route('get_students_for_certificate')}}",
       data:{
          section_id:section_id,
          std_class_id:std_class_id,
          batch_id:batch_id, 
          "_token": "{{ csrf_token() }}"
        },
         success:function(res){
           // $('#p_state_id').empty().html(res);
           $("#students").empty();
           $("#students").append('<option>Select</option>');
           $.each(res,function(key,value){
           $("#students").append('<option value="'+value.id+'">'+value.f_name+'</option>');
        });
       }
     });
    // }else{
    //   alert('please selecte option')
    // }
})
$(document).on('change','#students',function(){
  var studentId = $(this).val();
  // alert(studentId)
    if (studentId !='') {
      $.ajax({
       type:'POST',
       url: "{{route('get_admission_no')}}",
       data:{
          studentId:studentId, 
          "_token": "{{ csrf_token() }}"
        },
         success:function(res){
           // $('#p_state_id').empty().html(res);
           $("#admission_no").val(res.admision_no);
           $("#stu_id").val(res.id);
          
       }
     });
    }else{
      alert('please selecte option')
    }
})

</script>
 @endsection
