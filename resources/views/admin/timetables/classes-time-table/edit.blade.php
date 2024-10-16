@extends('layouts.main')
@section('content')
  <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Time Table<h4 class="panel-title">  <a href="{{route('class-wise-time-table.create')}}" class="btn btn-success pull-right btn-sm border-radius">Add Class Time Table</a><a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a></h4></h6>
      </div>
       <div class="app-title full-right">
       @if($message = Session::get('success'))   
          <div class="alert alert-success">{{ $message }}</div>
       @endif
    </div>
      <!-- Card Body -->
      <div class="card-body">
        <form action="{{route('class-wise-time-table.update',$classTimeTables->class_tt_mast_id)}}" method="post" id="form_submit" autocomplete="off">
            @csrf
            @method('PATCH')
                <div class="row form-group">
                  <div class="col-md-3 col-xs-6 col-sm-6 form-group">
                    <label for="std_class" class="required">Class</label>
                   
                    <select class="form-control required" name="std_class_id" id="std_class_id" required="required">
                        <option value="">Select Class</option>
                        @foreach($classes as $class)
                          <option value="{{$class->id}}" {{ ($classTimeTables->get_class->id ?? old('std_class_id')) == $class->id ? 'selected' : ''}}>{{$class->class_name}}</option>
                        @endforeach
                      </select>
                    @error('std_class_id')
                      <span class="text-danger">
                        <strong>{{$message}}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="col-md-3 col-xs-6 col-sm-6 form-group">
                    <label class="required"> Batch</label>
                    <select class="form-control required" name="batch_id" required="required" id="batch_id">
                      @foreach($studentBatchs as $studentBatch)
                        <option value="{{$studentBatch->id}}" {{ ($classTimeTables->get_batch->id ?? old('batch_id')) == $studentBatch->id ? 'selected' : ''}}>{{$studentBatch->batch_name}}</option>
                      @endforeach
                    </select>
                    @error('batch_id')
                      <span class="text-danger">
                        <strong>{{$message}}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="col-md-3 col-xs-6 col-sm-6 form-group">
                    <label class="required">Section</label>
                    <select class="form-control required" name="section_id" id="section_id" required="required">
                      @foreach($studentSections as $studentSection)
                        <option value="{{$studentSection->id}}" {{ ($classTimeTables->get_section->id ?? old('section_id')) == $studentSection->id ? 'selected' : ''}}>{{$studentSection->section_name}}</option>
                      @endforeach
                    </select>
                    @error('section_id')
                      <span class="text-danger">
                        <strong>{{$message}}</strong>
                      </span>
                    @enderror
                  </div>
                <div class="col-md-3 col-xs-6 col-sm-6 form-group">
                    <label class="required">Select Medium</label>
                    <select class="form-control required" name="medium" id="medium_id" required="medium" autocomplete="off">
                      @foreach(MEDIUM as $key => $medium)
                        <option value="{{$classTimeTables->medium}}" {{ ($classTimeTables->medium ?? old('medium')) == $key ? 'selected' : ''}}>{{$medium}}</option>
                      @endforeach

                    </select>
                    @error('medium')
                      <span class="text-danger">
                        <strong>{{$message}}</strong>
                      </span>
                    @enderror
                  </div>                 
                  <div class="col-md-4">
                    <label class="red"> *</label>
                    <label for="name">Number Of Period</label>
                     <select class="form-control" name="periods_no" id="periods_no" value="{{old('periods_no')}}">
                       <option value="">Select</option> 
                        @for($i=1;$i<=10;$i++)
                          <option value="{{$i}}" {{($classTimeTables->periods_no ?? old('periods_no')) == $i ? 'selected' : '' }}>{{$i}}</option> 
                        @endfor                        
                     </select>
                     @error('periods_no')
                        <span class="text-danger">
                          <strong>{{$message}}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="col-md-4">
                    <label class="red"> *</label>
                    <label for="name">Class Teacher</label>
                     <select class="form-control" name="class_teacher" id="class_teacher" value="{{old('class_teacher')}}">
                       <option value="">Select</option> 
                       @foreach ($teachers as $teacher)
                        <option value="{{$teacher->id}}" {{($classTimeTables->teachers_id ?? (old('class_teacher')) == $teacher->id ? 'selected=selected': '')}}>{{$teacher->name}}</option> 
                      @endforeach                       
                     </select>
                     @error('class_teacher')
                        <span class="text-danger">
                          <strong>{{$message}}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="col-md-4">
                    <label class="red"> *</label>
                    <label for="name">Remark</label>
                     <textarea class="form-control" name="remark" value="{{$classTimeTables->remark}}">{{$classTimeTables->remark}}</textarea>
                      @error('remark')
                        <span class="text-danger">
                          <strong>{{$message}}</strong>
                        </span>
                      @enderror 
                  </div>
                </div>
                <div class="col-md-12 mydiv">
                <?php 
                  $days = ['monday','tuesday','wednesday','thursday','friday','saturday']; 
                  $period = ['','I' ,'II','III','IV','LUNCH','V','VI','VII','VIII','IX','X'];
                ?>
                <table class="table">
                  <thead>
                    <tr colspan="2">
                      <th>Period</th>
                      <th>Assembly</th>
                      @for($i=1; $i <= $classTimeTables->periods_no ; $i++)
                      <th>{{$period[$i]}}</th>
                      @endfor
                    </tr>
                    <tr>
                      <th>Time</th>
                      <th>
                        <input type="text" name="from_time[]" placeholder="From time" class="form-control timepicker"  size="2" value="{{@@$classTimeTables->periodsTime[0]->from_time}}">
                        <input type="text" name="to_time[]" placeholder="To time" class="form-control timepicker"  size="2" value="{{@@$classTimeTables->periodsTime[0]->to_time}}">
                      </th>
                      @for($j=1; $j <= $classTimeTables->periods_no ; $j++)
                        @if($period == 'LUNCH')
                          <th>
                          <input type="text" name="from_time[]" placeholder="From time" class="form-control timepicker"  size="2" value="{{$classTimeTables->periodsTime[$j]->from_time}}">
                          <input type="text" name="to_time[]" placeholder="To time" class="form-control timepicker"  size="2" value="{{$classTimeTables->periodsTime[$j]->to_time}}">
                        </th>
                        @else
                        <th>
                          <input type="text" name="from_time[]" placeholder="From time" class="form-control timepicker"  size="2" value="{{$classTimeTables->periodsTime[$j]->from_time}}">
                          <input type="text" name="to_time[]" placeholder="To time" class="form-control timepicker"  size="2" value="{{$classTimeTables->periodsTime[$j]->to_time}}">
                        </th>
                        @endif
                      @endfor
                    </tr>
                    <tr>
                      <th >Day</th>
                    </tr>

                  </thead>
                  <tbody>
                  <?php $count =0;?> 
                    @foreach ($days as $key => $day)
                      @foreach($getClasses as $class)
                        <tr>
                          <td>{{strtoupper($day)}}</td>
                          <td></td>
                            @for($j=1; $j <= $classTimeTables->periods_no ; $j++)
                             <?php
                              $option = '<option value="">Select subject</option>';
                                foreach ($class->assignsubject as $subjects) {
                                  foreach($subjects->assign_subjectId as $subject_name){
                                  $selected = @@$classTimeTables->classTimetable[$count]->get_subject->id == $subject_name->subject->id ?"selected=selected":'';
                                    $id = $subject_name->subject !=null ? $subject_name->subject->id : '';
                                    $name = $subject_name->subject != null ? $subject_name->subject->subject_name : '' ;
                                    $option .='<option '.$selected.' value="'.$id.'" >'.$name.' </option>';
                                  }
                                } 
                              $option2 = '<option value="" >Select teacher</option>';
                                foreach ($teachers as $key1 => $teacher) {
                                  $selected = @@$classTimeTables->classTimetable[$count]->get_teacher->id == $teacher->id ?"selected=selected":'';
                                  $teachers_id = $teacher->id !=null ? $teacher->id : '';
                                  $teacher_name = $teacher->name != null ? $teacher->name : '' ;
                                  $option2 .='<option '.$selected.' value="'.$teachers_id.'"   >'.$teacher_name.' </option>';
                                }   
                              ?>  
                              @if($period[$j] == 'LUNCH')
                                 <td>LUNCH</td> 
                                
                              @else
                              @if( $class->id==14 OR $class->id==15 )
                                <td>
                                  <select name="subjects_id[]" value="{{$id}}" class="form-control sub_teacher" multiple="" selected="" >
                                    {!!$option!!}
                                  </select>
                                  <select name="teachers_id[]" value="{{$teachers_id}}" class="form-control sub_teacher" multiple="">
                                    {!!$option2!!}
                                  </select>
                                </td>
                              @else
                                <td>
                                 <?php   $count++; 
                                 ?>
                                 <input type="hidden" name="count" value="{{$count}}">
                                  <select name="subjects_{{$j}}_{{$key+1}}"  class="form-control "  readonly>
                                    {!!$option!!}
                                  </select>
                                  <select name="teachers_{{$j}}_{{$key+1}}"  class="form-control" readonly>
                                    {!!$option2!!}
                                  </select>
                                </td>
                              @endif  
                           @endif  
                          @endfor
                        </tr>
                      @endforeach 
                    @endforeach
                  </tbody>
                </table>

  </div>
<div class="row">
  <div class="col-md-12">
      <input type="submit" class="btn btn-success btn-sm" name="" value="Submit">
  </div>
</div>
@include('layouts.common')
</form>
  
</div>
</div><hr>
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
<script >
  
$(document).ready(function(){
    $('.sub_teacher').select2();
    $(function () {
      // $(".timepicker").timepicker();
    $('.timepicker').timeselector();

    });
  })

</script>
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

$(document).on('change','#periods_no',function(){
  var std_class_id = $('#std_class_id').val();
  // var classTo = $('#class_to').val();
  var periods_no = $(this).val();
    if (std_class_id != '') {
      $.ajax({
        method:'post',
        url:'{{route('class_tt_genrate')}}',
        data:{'std_class_id':std_class_id,'periods_no':periods_no,"_token": "{{ csrf_token() }}"},
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
        periods_no:{
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
 @endsection
