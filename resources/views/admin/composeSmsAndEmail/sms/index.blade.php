@extends('layouts.main')
@section('content') 
<div class="container">  
    <div class="row mt-2">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title"> SMS Compose 
                        <a href="{{route('send_sms_delivery_report')}}"><button class="btn btn-success" style="float:right;">SMS Delivery Report</button></a>
                    </h4>              
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <select class="form-control" name="send_to" id="sendtype">
                                <option value="0">--Select--</option>
                                @foreach(SENDTO as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>                         
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-9" id="class_batch_section" style="display: none;">
                            <div class="row">
                                <div class="col-md-3">
                                    <select class="form-control" name="std_class_id" id="std_class_id" autocomplete="off">
                                        <option value="">Select Class</option>
                                        @foreach($classes as $class)
                                            <option value="{{$class->id}}">{{$class->class_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('std_class_id')
                                        <span class="text-danger">
                                        <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>                
                                <div class="col-md-3">
                                    <select class="form-control" name="batch_id" id="batch_id">

                                    </select>
                                    @error('batch_id')
                                        <span class="text-danger">
                                        <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" name="section_id" id="section_id"> 

                                    </select>
                                    @error('section_id')
                                        <span class="text-danger">
                                        <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>                     
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12" id="students_data"></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12" id="faculty_data"></div>
                    </div>
                    <div class="row mb-4 editor_show" style="display: none">
                        <div class="col-md-12 form-group">
                            <label> Compose SMS </label> <span class="required">*</span>
                            <textarea class="form-control" id="compose_sms_content" name="compose_sms_content" spellcheck="false" required=""></textarea>
                        </div>
                        <div class="col-md-12 form-group">
                            <button class="btn btn-sm btn-success " id="btnSubmit" align-center>Send</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="all_data" ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
@include('layouts.common')


<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script>

  // CKEDITOR.replace('compose_mail_content')

  $(document).ready(function(){

        $("#course").hide();
        $("#batch").hide();
        $(".editor_show").hide();
        $("#course_batches_section").hide();
        $('.required').css('color', 'red');

        $('#sendtype').on('change', function(){
          var type = $(this).val();
          if (type == 0) 
          {
            $("#course").hide();
            $("#batch").hide();
            $("#dept_id").hide();
            $("#course_batches_section").hide();
            $(".editor_show").hide();
            $("#class_batch_section").hide();
            $("#students_data").hide();
            $("#faculty_data").hide();

          }
           if (type == 'A') 
           {
            $("#message-block").show();
            $("#course").hide();
            $("#batch").hide();
            $(".notice_circular_for_all").show();
            $(".editor_show").show();
            $("#course_batches_section").hide();
            $("#class_batch_section").hide();
            $("#students_data").hide();
            $("#faculty_data").hide();

            
          //  $("#transStu").hide();
            }
          
          if (type == 'S') {
            $("#course").show();
            $("#batch").show();
            $("#course_batches_section").show();
            $("#class_batch_section").show();
            $("#students_data").show();
            $("#course_batches_par_div").hide();
            $(".editor_show").hide();
            $("#faculty_data").hide();

          }
          
          if (type == 'T') {
            $("#course").hide();
            $("#batch").hide();
            $(".notice_circular_for_all_faculties").show();
            $(".editor_show").show();
            $("#course_batches_section").hide();
            $("#class_batch_section").hide();
            $("#students_data").hide();
            $("#faculty_data").show();
            var type = 'faculty';
            $.ajax({
              type:'POST',
              url: "{{route('get_students_for_sms_compose')}}",
              data: {type:type,"_token": "{{ csrf_token() }}",},
              success:function(res){

                $('#faculty_data').empty().html(res);
                $(".editor_show").show();

              }
            });
        }
        });

        $("#section_id").on('change', function(){
              var val = $(this).val()
              // if(val==2){
              var batch_id = $('select[name="batch_id"] option:selected').val();
              var std_class_id = $('select[name="std_class_id"] option:selected').val();
              var section_id = $('select[name="section_id"] option:selected').val();
              var type = 'student';
               if(section_id !=''  && batch_id !='' && std_class_id != '' ){
                $.ajax({
                  type:'POST',

                  url: "{{route('get_students_for_sms_compose')}}",
                  data: {batch_id:batch_id,std_class_id: std_class_id, section_id:section_id,type:type, "_token": "{{ csrf_token() }}",},
                  success:function(res){

                    $('#students_data').empty().html(res);
                    $(".editor_show").show();
                    $("#compose_sms_content").show();

                  }
                });
              }else{
                $.notify("please select all field");

              }

            // }
        }); 
       
      $('#btnSubmit').on('click',(function(e) {
         e.preventDefault();
          console.log("adsasd")
          var reciver_id = [];
          var i = 0;
          $('input[name="reciver_id[]"]:checked').each(function() {
            reciver_id[i++] = $(this).val();
          });
          var sendtype = $('#sendtype').val();
          var std_class_id = $('#std_class_id').val();
          var batch_id = $('#batch_id').val();
          var section_id = $('#section_id').val();
          var clas_batch_section = [batch_id,batch_id,section_id] 
          var compose_sms_content = $('#compose_sms_content').val();
          if(compose_sms_content != ''){
            $.ajax({
               type:'POST',
               url: "{{route('send_sms')}}",
               data:{reciver_id:reciver_id,compose_sms_content:compose_sms_content,sendtype:sendtype,clas_batch_section:clas_batch_section,"_token": "{{ csrf_token() }}"},
              
               success:function(data){
                  $.notify("Message send Succesfully",'success');
                  alert('Message send Succesfully');
                   setTimeout(function () {
                        location.reload(true);
                      }, 2000);
               }, 
        });
       }else{
          $.notify("Please select all * fields");

       } 
    }));
   $(document).on('click','.selectAll' ,function(){  
       if ($(this).is( ":checked" )) {
        $('body .check').prop('checked',true);

       }else{
        $('body .check').prop('checked',false);
       }
    }); 

  });
</script>
 @endsection('content')
