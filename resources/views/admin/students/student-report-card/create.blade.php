@extends('layouts.main')
@section('content')
<div class="container">
  <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
    <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
      <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Create Report Card<h4 class="panel-title"> {{--  <a href="{{route('time-table.create')}}" class="btn btn-success pull-right btn-sm border-radius">AddReport Card</a> --}}<a href="{{ route('student-report-card.index') }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a></h4></h6>
    </div>
    <div class="app-title full-right">
       @if($message = Session::get('success'))   
          <div class="alert alert-success">{{ $message }}</div>
       @endif
        @if($message = Session::get('warning'))   
              <div class="alert alert-warning">{{ $message }}</div>
        @endif
    </div>
    <!-- Card Body -->
    <div class="card-body">
       <form action="{{route('student-report-card.store')}}" method="post" id="form_submit" autocomplete="off">
          @csrf              
      <div class="row">

        <div class="col-md-3 form-group">
          <label for="yearly">Report Card type</label>
          <select class="form-control" name="report_card_type" autocomplete="off" id="report_card_type" required="">
             <option value="">Select Type</option>
             <option value="half">Half Yearly</option>
             <option value="full">full Yearly</option>
          </select>
        </div> 
        <div class="col-md-3 form-group">
          <label for="yearly"> Class</label>
          <select class="form-control" name="std_class_id" autocomplete="off" id="std_class_id"> 
            <option value="">Select Class</option>
            @foreach($class as $key=>$classes)

              <option value="{{$classes->id}}">{{$classes->class_name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-3 form-group">
          <label for="batch_id"> Batch</label>
          <select class="form-control" name="batch_id" autocomplete="off" id="batch_id">
             
          </select>
        </div>
        <div class="col-md-3 form-group">
          <label for="section_id"> Section</label>
          <select class="form-control" name="section_id" autocomplete="off" id="section_id"> 
            
          </select>
        </div>
        <div class="col-md-3 col-xs-6 col-sm-6 form-group">
          <label for="medium"> Medium</label>
          <select class="form-control required" name="medium" id="medium_id" required="required">
            
          </select>
        </div>  
       {{--  <div class="col-md-3 form-group">
          <button class="btn btn-sm btn-primary fa fa-search" id="btnFilter">Search</button>
          
        </div> --}}
        <div class="col-md-3 col-xs-6 col-sm-6 form-group">
          <label for="medium"> Student</label>

          <select class=" form-control required" name="student_id" id="student_detail" required="required" >
            
          </select>
        </div> 
       
            <div class="col-md-12">
                <div class="reoprt_card"></div>
            </div>
          </div>
          <hr>
           <div class="row">
            <div class="col-md-12 mydiv">
         
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
<script>
$(function () {
  $(".datepicker").datepicker({ 
    singleDatePicker: true,
    showDropdowns: true,
  });
});
  $(document).on('click','#submit',function(event){
    event.preventDefault();
    console.log( $('#form_submit').serialize() )
  })

$(document).on('change','#nod',function(){
  var classFrom = $('#class_from').val();
  var classTo = $('#class_to').val();
  var nod = $(this).val();
    if (classFrom != '' && classTo != '') {
      $.ajax({
        method:'post',
        url:'{{route('generateTable')}}',
        data:{'classFrom':classFrom,'classTo':classTo,'nod':nod,"_token": "{{ csrf_token() }}"},
        success:function(data){
          $('.mydiv').html(data)
        }

      })
    }
    else{
      alert('Please Select Class From and  Class To Field....')
    }
    
});
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="https://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
{{-- <script type="text/javascript">
  
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
       
        exam_name:{
          required:true
        }, 
        class_from:{
          required:true
        }, 
        class_to:{
          required:true
        },
         reporting_time:{
          required:true
        },  
        deprature_time:{
          required:true
        }, 
        exam_from_time:{
          required:true
        }, 
        exam_to_time:{
          required:true
        },
        lunch_from_time:{
          required:true
        },
        lunch_to_time:{
          required:true
        }, 
        start_date:{
          required:true
        }, 
        end_date:{
          required:true
        }, 
        deprature_time:{
          required:true
        }, 
        nod:{
          required:true
        },
        remark:{
          required:true
        },
        'date[]':{
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
 --}}
@include('layouts.common')
<script>
  $(document).ready(function(){
   $('.js-example-basic-single').select2();
    $('#medium_id').on('change',function(e){
      e.preventDefault();
      var batch_id   = $('select[name="batch_id"] option:selected').val();
      var std_class_id = $('select[name="std_class_id"] option:selected').val();
      var section_id   = $('select[name="section_id"] option:selected').val();
      var medium     = $('select[name="medium"] option:selected').val();
      var status = 'R';
      var user_id = 'user_id';

      var page = 'student_detail';
       if(section_id !=''  && batch_id !='' && std_class_id != '' ){
        $.ajax({
          type:'POST',
          url: "{{route('get_std_For_rep_crd')}}",
          data: {batch_id:batch_id,std_class_id: std_class_id, section_id:section_id,user_id:user_id,page:page,medium:medium,status:status, "_token": "{{ csrf_token() }}"},
          success:function(res){
            $('#tableFilter').empty().html(res);

              $("#student_detail").empty();
                    $("#student_detail").append('<option>Select student_detail</option>');
                    $.each(res,function(key,value){
                        $("#student_detail").append('<option value="'+value.id+'">'+value.f_name+' '+value.l_name+' </option>');
              });
          }
        });
      }else{
        alert('please select all field');
      }

    });
    $('#student_detail').on('change',function(e){
      e.preventDefault();
      var batch_id   = $('select[name="batch_id"] option:selected').val();
      var std_class_id = $('select[name="std_class_id"] option:selected').val();
      var section_id   = $('select[name="section_id"] option:selected').val();
      var medium     = $('select[name="medium"] option:selected').val();
      var repCardtype     = $('select[name="report_card_type"] option:selected').val();
      
      var status = 'R';
      var user_id = $(this).val();
      // alert(user_id);
      var page = 'student_detail';
       if(section_id !=''  && batch_id !='' && std_class_id != '' ){
        $.ajax({
          type:'POST',
          url: "{{route('get_std_dtl_rep_crd')}}",
          data: {batch_id:batch_id,std_class_id: std_class_id, section_id:section_id,user_id:user_id,page:page,medium:medium,status:status,repCardtype:repCardtype, "_token": "{{ csrf_token() }}"},
          success:function(res){
            // $('.reoprt_card').empty().html(res);
            $(".reoprt_card").html(res);
              // $("#reoprt_card").empty();
                    
          }
        });
      }else{
        alert('please select all field');
      }

    });

  });
</script>
 @endsection
