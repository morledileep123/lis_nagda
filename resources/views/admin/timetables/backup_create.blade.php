@extends('layouts.main')
@section('content')
<div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Time Table<h4 class="panel-title">  <a href="{{route('time-table.create')}}" class="btn btn-success pull-right btn-sm border-radius">Add Time Table</a><a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a></h4></h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
          <div id="content">
            <div class="col-md-12">
              <form action="{{route('time-table.store')}}" method="post" autocomplete="off">
                @csrf
                <div class="row">               
                    <div class="col-md-4">
                       <label class="red"> *</label>
                       <label for="name"> Name</label>
                       <input class="form-control input-small " id="exam_name" name="exam_name"  aria-label="Small" type="text">
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="class_from">Class From </label>                
                        <div class="input-group">
                           <span class="input-group-addon"></span>
                           <select class="form-control onlyDigit input-sm" id="class_from" name="class_from" >
                            <option value="0"> Select Class</option>
                            @foreach($class as $classes)
                            <option value="{{$classes->id}}"> {{$classes->class_name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="class_to">Class To </label>                
                        <div class="input-group">
                           <span class="input-group-addon"></span>
                           <select class="form-control onlyDigit input-sm" id="class_to"  name="class_to">
                            <option value="0"> Select Class</option>
                            @foreach($class as $classes)
                            <option value="{{$classes->id}}"> {{$classes->class_name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <label for="name">Reporting Time</label>
                       <input type="text" name="reporting_time" class="form-control timepicker">
                    </div>
                    <div class="col-md-6">
                      <label for="name">Examination Time</label>
                       <input type="text" name="examination_time" class="form-control timepicker">
                    </div>
                    <div class="col-md-6">
                      <label for="name">Start Date</label>
                       <input type="text" name="start_date" class="form-control datepicker">
                    </div>
                    <div class="col-md-6">
                      <label for="name">End Date</label>
                       <input type="text" name="end_date" class="form-control datepicker">
                    </div>
                    <div class="col-md-12">
                      <label for="name">Remark</label>
                       <input type="text" name="remark" class="form-control">
                    </div>
                  </div>
                </div>
            </div>
        </div>


         <div class="card shadow mb-4">
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary"><h4 class="panel-title"> <a class="btn btn-outline-success waves-effect pull-right btn-sm border-radius add_button1"><i class="fa fa-plus">Add More </i></a></h4></h6>
          </div>
          <!-- Card Body -->
          <div class="card-body mydiv" >
          <div id="content">
            <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-4">
                       <label class="red"> *</label>
                       <label for="name"> Date</label>
                       <input class="form-control input-small datepicker" id="date" name="date"   type="text">
                        <input class="form-control input-small datepicker" name="date_id"   type="hidden" value="1">
                      </div>
                  </div>
                  
                  <div class="field_wrapper">
                    <div class="row">
                     <div class="col-md-12 "> 
                       <a  class="add_button btn btn-sm btn-success pull-right" id="add-row"><i class="fa fa-plus"></i> </a>
                    </div>
                    <div class="col-md-6">
                        <label class="red"> *</label>
                        <label for="amount">Class  </label>                
                        <div class="input-group">
                           <span class="input-group-addon"></span>
                           <select class="form-control" id="class_id" name="class_id[]">
                            
                            </select>
                            
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="red"> *</label>
                        <label for="subject_id">Subject </label>                
                        <div class="input-group">
                           <span class="input-group-addon"></span>
                           <select class="form-control subject_id input-sm" id="subject_id"  name="subject_id[]" selecte='true'>
                          </select>
                         
                        </div>
                    </div>
                </div>
                </div>
                <div class="field_wrapper1"></div>
                <div class="field_wrapper2"></div> 
            </div>
            <div class="mt-2"> 
              <input type="submit" name="submit" value="submit" class="btn btn-success">
            </div>
        </div>
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
</style>
<script type="text/javascript">
$(document).ready(function(){

// code for get classes after select class to to class from..................
  $(document).on('change','#class_to',function(){
    var classFrom = $('#class_from').val();
    var classTo = $('#class_to').val();
    if (classFrom !='' && classTo !='') {
      $.ajax({
        type:'POST',
        url:'{{route('get_class_for_timetable')}}',
        data: {classFrom:classFrom,classTo:classTo, "_token": "{{ csrf_token() }}"},
        success:function(res){
          if (!empty(res)) {
              $("#class_id").empty();
                  
                $("#class_id").append('<option>Select class</option>');
                $.each(res,function(key,value){
                  $("#class_id").append('<option value="'+value.id+'">'+value.class_name+'</option>');
            });
          }else{
            alert('Please select class from and class to');
          }
      }

    });
    }else{
      alert('Please select class from and class to')
    }
  });
// end code for get classes after select class to to class from.........

// code for get subject after select class ..............................
$('#class_id').on('change',function(){
  var classId = $('#class_id').val(); 
    $.ajax({
        type:'POST',
        url:'{{route('get_assigne_subject')}}',
        data: {classId:classId, "_token": "{{ csrf_token() }}"},
        success:function(res){
          if (!empty(res)) {
              $("#subject_id").empty();
                $.each(res,function(key,value){
                $("#subject_id").append('<option value="'+value.id+'" selected>'+value.subject_name+'</option>');
            });
          }else{
            alert('Subjects not assigned this classs');
          }
      }

    });
});
// end code for get subject after select class ..............................



//  code start for add more row .........

    var maxField = 10; 
    var addButton = $('.add_button'); 
    var wrapper = $('.field_wrapper');
    var count = 1;
    var classToid = $('#class_to').val()
    var x = 1; 
    $(addButton).click(function(){
      count++;
       var fieldHTML = '<div id="rmv'+count+'" class="row"> <div class="col-md-6"><label class="red"> *</label> <label for="classes">Class  </label>  <div class="input-group"><span class="input-group-addon"></span><select class="classId form-contro"l  name="class_id[]" id="class_id'+count+'"></select></div></div><div class="col-md-6"><label class="red"> *</label><label for="subject">Subject </label><div class="input-group"><span class="input-group-addon "></span><select class=" form-control onlyDigit input-sm" id="subject'+count+'"  name="subject_id[]"></select></div><button type="button" class=" remove_button btn btn-sm btn-danger pull-right" data-id="'+count+'" id="remove"><i class="fa fa-minus"></i></button></div>'; 

        // if(x < maxField){ 
        //     x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        // }

        // code for get subject after select class ..............................
        $('#class_id'+count+'').on('change',function(){
          var classId = $('#class_id'+count+'').val(); 
          $.ajax({
            type:'POST',
            url:'{{route('get_assigne_subject')}}',
            data: {classId:classId, "_token": "{{ csrf_token() }}"},
            success:function(res){
              if (!empty(res)) {
                  $('#subject'+count+'').empty();
                    $.each(res,function(key,value){
                    $('#subject'+count+'').append('<option value="'+value.id+'" selected>'+value.subject_name+'</option>');
                });
              }else{
                alert('Subjects not assigned this classs');
              }
          }

        });
      });
      // end code for add more get subject after select class ..............................

      // code for add more  get classes after select class to of class from.........
        $(document).on('click','.add_button',function(){
            var classFrom = $('#class_from').val();
            var classTo = $('#class_to').val();
            if (classFrom !='' && classTo !='') {
              $.ajax({
                type:'POST',
                url:'{{route('get_class_for_timetable')}}',
                data: {classFrom:classFrom,classTo:classTo, "_token": "{{ csrf_token() }}"},
                success:function(res){
                  if (!empty(res)) {
                      $('#class_id'+count+'').empty();
                          
                        $('#class_id'+count+'').append('<option>Select class</option>');
                        $.each(res,function(key,value){
                        $('#class_id'+count+'').append('<option value="'+value.id+'">'+value.class_name+'</option>');
                    });
                  }else{
                    alert('Please select class from and class to');
                  }
              }

            });
            }else{
              alert('Please select class from and class to')
            }
          });
        // end code for add more get classes after select class to to class from.........

    });

//Once remove button is clicked
$(wrapper).on('click', '.remove_button', function(e){
    e.preventDefault();
    var id = $(this).attr('data-id'); //Remove field html
    $('#rmv'+id).remove()
    x--; //Decrement field counter
});

// code for add more new date class and subject .........................

    var addButton1 = $('.add_button1'); 
    var wrapper1 = $('.field_wrapper1'); 
    var count1 = 2;
    var x1 = 1; 
    
    $(addButton1).click(function(){
      count1++;
       var fieldHTML1 = '<div id="rm'+count1+'"><hr> <div class="row" ><div class="col-md-4"><label class="red"> *</label><label for="date"> Date</label><input class="form-control input-small datepicker" id="date" name="date" type="hidden" value ="'+count1+'"><input class="form-control input-small datepicker" name="date_id" type="text"></div>  </div><div class="field_wrapper'+count1+'"> <div class="row"><div class="col-md-12 "> <button  data-count="'+count1+'" class="add_more_button2 btn btn-sm btn-success pull-right" id="add_row2'+count1+'"><i class="fa fa-plus"></i> </button></div><div class="col-md-6"><label class="red"> *</label> <label for="amount">Class  </label>  <div class="input-group"><span class="input-group-addon"></span><select class="form-control onlyDigit input-sm" id="class_id_more'+count1+'" name="class_id"></select></div></div><div class="col-md-6"><label class="red"> *</label><label for="subject_id">Subject </label><div class="input-group"><span class="input-group-addon"></span><select class="form-control subject_id input-sm" id="subject_id_more'+count1+'"  name="subject_id[]" multiple=""></select></div></div></div></div><i class="text-danger fa fa-times  remove_button1 float-right" style="z-index:99;" data-id="'+count1+'" style="font-size: 21px; ">Remove all</i></div>'; 
        $(wrapper1).append(fieldHTML1);

        // code for get subject after select class ..............................
        $('#class_id_more'+count1+'').on('change',function(){
          // alert(count1);
          var classId = $('#class_id_more'+count1+'').val(); 
            $.ajax({
              type:'POST',
              url:'{{route('get_assigne_subject')}}',
              data: {classId:classId, "_token": "{{ csrf_token() }}"},
              success:function(res){
                if (!empty(res)) {
                    $("#subject_id_more"+count1+'').empty();
                      $.each(res,function(key,value){
                      $("#subject_id_more"+count1+'').append('<option value="'+value.id+'" selected>'+value.subject_name+'</option>');
                  });
                }else{
                  alert('Subjects not assigned this classs');
                }
            }
          });
        });
      // end code for add more get subject after select class ..............................

      // code for add more get classes after select class to to class from.........
        $(document).on('click','.add_button1',function(){
            var classFrom = $('#class_from').val();
            var classTo = $('#class_to').val();
            if (classFrom !='' && classTo !='') {
              $.ajax({
                type:'POST',
                url:'{{route('get_class_for_timetable')}}',
                data: {classFrom:classFrom,classTo:classTo, "_token": "{{ csrf_token() }}"},
                success:function(res){
                  if (!empty(res)) {
                      $('#class_id_more'+count1+'').empty();
                        $('#class_id_more'+count1+'').append('<option>Select class</option>');
                        $.each(res,function(key,value){
                        $('#class_id_more'+count1+'').append('<option value="'+value.id+'">'+value.class_name+'</option>');
                    });
                  }else{
                    alert('Please select class from and class to');
                  }
              }

            });
            }else{
              alert('Please select class from and class to')
            }
          });
      // end code for add more get classes after select class to to class from.........

    });

  $(wrapper1).on('click', '.remove_button1', function(e){
      e.preventDefault();
      var id = $(this).attr('data-id')
      $('#rm'+id).remove(); 
      // x1--; 
  });
 
    // code for add more new date class and subject .........................
    var addButton2 = $('.add_button2'); 
    var wrapper2 = $('.field_wrapper2');
    var count2 = 1;
    var x2 = 1; 
  
    $(this).on('click','.add_more_button2',function(){
      var countId = $(this).attr('data-count')
      count2++;
       var fieldHTML2 = ' <div id="rm2'+count2+'" class="row"><div class="col-md-6"><label class="red"> *</label> <label for="amount">Class  </label>  <div class="input-group"><span class="input-group-addon"></span><select class="form-control onlyDigit input-sm" id="class_id_more'+count2+'" name="class_id"></select></div></div><div class="col-md-6"><label class="red"> *</label><label for="subject_id">Subject </label><div class="input-group"><span class="input-group-addon"></span><select class="form-control subject_id input-sm" id="subject_id_more2'+count2+'"  name="subject_id[]" multiple=""></select></div><button type="button" class=" remove_button2 btn btn-sm btn-danger pull-right mb-3" data-id="'+count2+'"><i class="fa fa-minus"></i></button>';

        $('.field_wrapper'+countId).append(fieldHTML2);
        // var id = $(this).attr('data-count')
        //  alert('#add_row2'+id);
        // code for add more get classes after select class to to class from.........
          // $(document).on('click','#add_row2'+id,function(){
            alert()
            var classFrom = $('#class_from').val();
            var classTo = $('#class_to').val();
            if (classFrom !='' && classTo !='') {
              $.ajax({
                type:'POST',
                url:'{{route('get_class_for_timetable')}}',
                data: {classFrom:classFrom,classTo:classTo, "_token": "{{ csrf_token() }}"},
                success:function(res){
                  if (!empty(res)) {
                        $('#class_id_more'+count2+'').empty();
                        $('#class_id_more'+count2+'').append('<option>Select class</option>');
                        $.each(res,function(key,value){
                        $('#class_id_more'+count2+'').append('<option value="'+value.id+'" >'+value.class_name+'</option>');
                    });
                  }else{
                    alert('Please select class from and class to');
                  }
              }

            });
            }else{
              alert('Please select class from and class to')
            }
          // });
        // end code for add more get classes after select class to to class from.........

        // code for get subject after select class ..............................
        // alert('.add_row2'+count1)
        $('#class_id_more'+count2+'').on('change',function(){
          var classId = $('#class_id_more'+count2+'').val();
            $.ajax({
              type:'POST',
              url:'{{route('get_assigne_subject')}}',
              data: {classId:classId, "_token": "{{ csrf_token() }}"},
              success:function(res){
                $('#subject_id_more2'+count2+'').empty();
                $.each(res,function(key,value){
                  $('#subject_id_more2'+count2+'').append('<option value="'+value.id+'" selected>'+value.subject_name+'</option>');
                  });
                
            }
          });
        });
      // end code for add more get subject after select class ..............................
      // });
    });

    $(this).on('click', '.remove_button2', function(e){
        e.preventDefault();
        var id = $(this).attr('data-id')
        $('#rm2'+id).remove(); 
    });


});


</script>
 @endsection
