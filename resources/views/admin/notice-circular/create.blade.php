@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12">
            @include('admin.notice-circular.header')              
        </div>
    </div>  
    <div class="row mb-4">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Add Notice & Circular</h5>
                </div>
                <div class="card-body">
                    <form method="post" id="FrmImgUpload" action="javascript:void(0)" enctype="multipart/form-data" autocomplete="off">
                        <div class="row mb-4">
                            <div class="col-md-3 form-group">
                                <label for="details">Select options</label>
                                <select class="form-control" name="sendtype" id="sendtype">
                                    <option value="0">--Select--</option>
                                    <option value="1">Send to All</option>
                                    <option value="2">Send to Classes</option>
                                    <option value="3">Send to All Faculty And Teacher</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group" id="course_batches_div" >
                                <label for="details">Classes</label>
                                <select class="form-control select-chosen" multiple="multiple" id="myid" name="course_batches[]" >
                                </select>
                                <input type="hidden" name="batch_id" value="{{session('current_batch')}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12 notice_circular" id="faculty_data" >
                                
                            </div>
                        </div>
                        <div class="row mb-4 notice_circular" style="display: none" >
                            <div class="col-md-4 form-group">
                                <label for="circularname">Title</label>
                                <input class="form-control " id="circulartitle2" name="circular_title" type="text" required>            
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="diaplaydate">Date From be displayed</label>
                                <input type="text" name="date_from_display"  class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="YYYY-mm-dd"data-date-start-date="0d" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="diaplaydate">Date To be displayed</label>
                                <input type="text" name="date_to_display" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="YYYY-mm-dd" required="">
                            </div>
                            <div class="col-md-4 form-group">
                               <label for="file">Filename:</label>
                               <input type="file" name="file" id="file2">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="circulardescription">Description</label>
                                <textarea class="form-control" name="circular_description" id="circulardescription2" rows="4" type="text" required></textarea>
                                @error('circular_description')
                                <span class="text-danger">
                                  <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <input class="btn btn-primary" type="submit" value="Add Circular" id="sendToAllFacultysad">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>
<script>

$(function () {
  $(".datepicker").datepicker({ 
    singleDatePicker: true,
    showDropdowns: true,
  });
});

$('label,required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');
$('th.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');

    $(function(){
        $('#validate-form').validate({
            rules: {
                circular_title: {
                    required: true,
                },
                date_from_display: {
                    required: true,
                },
                date_to_display: {
                    required: true,
                },
                circular_description: {
                    required: true,
                },
                file: {
                    required: true,
                }
            },
           
        });
    });
</script>

<script>

$(document).ready(function(){
    $("#course_batches_div").hide();
    $("#faculty_data").hide();
    $('#sendtype').on('change', function(){
      var type = $(this).val();
       if (type == 0) 
       {
        $(".notice_circular").hide();
        $(".container notice_circular").show();
        $("#course_batches_div").hide();
        $("#faculty_data").hide();

        }
      if (type == 1) 
       {
        $(".notice_circular").show();
        $("#course_batches_div").hide();
        $("#faculty_data").hide();

        }
      if (type == 2) {
        $(".notice_circular").show();
        $("#faculty_data").hide();
          $.ajax({
              type: "GET",
              url: "{{route('get_all_classes')}}",
              data: {"_token": "{{ csrf_token() }}"},
              success: function(data){
                  $("#course_batches_div").show();
                  $(".select-chosen").show();
                  $(".select-chosen").empty();
                  $.each(data,function(key,value){

                  $(".select-chosen").append('<option value="'+value.id+'">'+value.class_name+'</option>');

                   });
              }
          })
      }
    if (type == 3) {
        $("#course_batches_div").hide();
        var val ='send_to_faculty';
          $.ajax({
            type: "POST",
            url: "{{route('get_faculty_data')}}",
            data: {val:val,"_token": "{{ csrf_token() }}"},
            success: function(data){
            $('#faculty_data').html(data)
            $(".notice_circular").show();
                  
            }
        })
    }
    });
   
  $('#FrmImgUpload').on('submit',(function(e) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      e.preventDefault();
      var formData = new FormData(this);
      // var formData = $('#FrmImgUpload').serialize();
        $.ajax({
           type:'POST',
           url: "{{route('notice-circular.store')}}",
           data:formData,
           cache:false,
           contentType: false,
           processData: false,
           success:function(data){
              $.notify("Notice added Succesfully",'success');
               setTimeout(function () {
                    location.reload(true);
                  }, 2000);
           }, 
        });
       
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

@endsection
