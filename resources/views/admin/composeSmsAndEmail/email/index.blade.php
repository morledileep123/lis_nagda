 @extends('layouts.main')
 @section('content') 
 <meta name="csrf-token" content="{{ csrf_token() }}" /> 
<div class="container">
    
    <div class="app-title">
     @if($message = Session::get('success'))
            
      <div class="alert alert-success">
        {{ $message }}
      </div>
          @endif
    </div>

<div class="row mt-2">
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header">
          <div class="panel-heading">
                <h4 class="panel-title"> Email Compose <a href="{{ URL::previous() }}"><a href="{{route('send_email_delivery_report')}}"><button class="btn btn-success" style="float:right;">Mail Delivery Report</button></a></h4>
            </div>
        </div>
        <div class="card-body">
          <div class="panel panel-default">
            <form method="post" id="FrmImgUpload" action="javascript:void(0)" enctype="multipart/form-data">
               @csrf
                <div class="row">
                    <div class="col-md-3">
                      <select class="form-control" name="sendtype" id="sendtype">
                        <option value="0">--Select--</option>
                        <option value="A">Send to All</option>
                        <option value="S">Send to Students</option>
                        <option value="T">Send to All Faculty</option>
                      </select>
                      </div>
                      <div class="col-md-9" id="class_batch_section" style="display: none;">
                       <div class="row">
                          <div class="col-md-3">
                            <select class="form-control" name="std_class_id" id="std_class_id">
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
                <hr>
                </div>
                 <div class="container mt-3" id="students_data">
                   <div class="row">
                     <div class="col-md-12"></div>
                   </div>
                 </div>
                 <div class="container mt-3" id="faculty_data">
                   <div class="row">
                     <div class="col-md-12"></div>
                   </div>
                 </div> 

               <div class="container editor_show" style="display: none;">
                <hr>
                 <div class="row mt-3">
                  <div class="col-md-12">
                    <label>Subject</label> <span class="required">*</span>
                    <input type="text" name="subject" class="form-control" id="subject" required="">
                  </div>
                    <div class="col-md-12 mt-3">
                      <label> Compose Mail </label> <span class="required">*</span>
                      <textarea class="form-control" id="compose_mail_content" name="compose_mail_content" spellcheck="false" required=""></textarea>
                    </div>
                    <div class="col-md-12 mt-3">
                      <label>Attechment</label> <span class="required">*</span>
                      <input type="file" name="attechment" class="form-control" id="attechment" required="">
                    </div>
                 </div>
                <hr><hr>
               <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-sm btn-success pull-right" id="btnSubmit">Send</button>
                </div>
              </div>
               </div>
               <div class="col-md-12" id="all_data" >
                  {{-- Show student Data................. --}}
                </div>
              <hr>
          </strong>
      </div>
    </form>
</div>
</div>

@include('layouts.common')


<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script>

  CKEDITOR.replace('compose_mail_content')

  $(document).ready(function(){

        $("#course").hide();
        $("#batch").hide();
        $(".editor_show").hide();
        $("#course_batches_section").hide();
        $('.required').css('color', 'red');

        $('#sendtype').on('change', function(){
          var type = $(this).val();
          // alert(type)
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
              url: "{{route('get_students_for_email_compose')}}",
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

                  url: "{{route('get_students_for_email_compose')}}",
                  data: {batch_id:batch_id,std_class_id: std_class_id, section_id:section_id,type:type, "_token": "{{ csrf_token() }}",},
                  success:function(res){

                    $('#students_data').empty().html(res);
                    $(".editor_show").show();

                  }
                });
              }else{
                $.notify("please select all field");

              }

            // }
        }); 
       
  $('#FrmImgUpload').on('submit',(function(e) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      e.preventDefault();
      var formData = new FormData(this);
      var subject = $('#subject').val();
      var compose_mail_content = $('#compose_mail_content').val();
      var attechment = $('#attechment').val();
      if(subject != '' && compose_mail_content != '' && attechment != ''){
        $.ajax({
           type:'POST',
           url: "{{route('send_email')}}",
           data:formData,
           cache:false,
           contentType: false,
           processData: false,
           success:function(data){
              $.notify("Email send Succesfully",'success');
               setTimeout(function () {
                    location.reload(true);
                  }, 3000);
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
