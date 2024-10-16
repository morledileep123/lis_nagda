@extends('layouts.main')
@section('content')
<div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Create ReportCard Header<h4 class="panel-title">  <a href="{{ route('student-report-card-header.index') }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a></h4></h6>
          </div>
           <div class="app-title full-right col-md-4">
           @if($message = Session::get('success'))   
              <div class="alert alert-success">{{ $message }}</div>
           @endif
        </div>
           <div class="card-body">
              <form action="{{route('student-report-card-header.update',$reportCardHeader->id)}}" method="post" id="form_submit" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row">
                  <div class="col-md-12">
                       <div class="row">                    
                         <div class="col-md-3 form-group">
                          <label for="std_class_from_id">Class From</label>                
                            <select class="form-control" name="std_class_from_id" autocomplete="off" id="std_class_id"> 
                              <option value="">Select from Class</option>
                              @foreach($classes as $key=>$class)
                                  <option value="{{$class->id}}" {{ ($reportCardHeader->std_class_from_id ?? old('std_class_id')) == $class->id ? 'selected' : ''}}>{{$class->class_name}}</option>
                              @endforeach
                            </select>
                          </div>  
                          <div class="col-md-3 form-group">
                          <label for="std_class_to_id">Class To</label>                
                            <select class="form-control" name="std_class_to_id" autocomplete="off" id="std_class_id_to"> 
                              <option value="">Select to Class</option>
                              @foreach($classes as $key=>$class)
                                 <option value="{{$class->id}}" {{ ($reportCardHeader->std_class_to_id ?? old('std_class_id')) == $class->id ? 'selected' : ''}}>{{$class->class_name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-md-3 form-group">
                            <label for="batch_id">Batch </label>                
                            <select class="form-control" name="batch_id" autocomplete="off" id="batch_id">

                                @foreach($studentBatch as $key=>$studentBatchs)
                                 <option value="{{$studentBatchs->id}}" {{ ($reportCardHeader->batch_id ?? old('batch_id')) == $studentBatchs->id ? 'selected' : ''}}>{{$studentBatchs->batch_name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-md-3 form-group">
                            <label for="discount_name">Section </label>                
                            <select class="form-control" name="section_id" autocomplete="off" id="section_id"> 
                               @foreach($studentSections as $key=>$studentSection)
                                 <option value="{{$studentSection->id}}" {{ ($reportCardHeader->section_id ?? old('section_id')) == $studentSection->id ? 'selected' : ''}}>{{$studentSection->section_name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-md-4 col-xs-6 col-sm-6 form-group">
                            <label for="medium">Medium </label>                

                            <select class="form-control required" name="medium" required="required" id="medium" >
                              <option value="{{$reportCardHeader->medium }}">{{$reportCardHeader->medium == 'EM' ? 'English Medium' : ( $reportCardHeader->medium =='HM' ? 'Hindi Medium' :'') }}</option>
                              <option value="EM">English Medium</option>
                              <option value="HM">Hindi Medium</option>
                            </select>
                          </div>
                           <div class="col-md-3 form-group">
                            <label for="yearly">Report Card type</label>
                            <select class="form-control" name="report_card_type" autocomplete="off" id="report_card_type" required="">
                               <option value="{{$reportCardHeader->report_card_type}}">{{$reportCardHeader->report_card_type == 'half'? 'Half Yearly' : 'full Yearly'}}</option>
                               <option value="half">Half Yearly</option>
                               <option value="full">full Yearly</option>
                            </select>
                          </div>   
                          <div class="col-md-4 col-xs-6 col-sm-6 form-group ">
                            <label for="header_name">Header Name </label>                
                              <div class="input-group">
                                 <span class="input-group-addon"></span>
                                 <input type="text" class="form-control onlyDigit input-sm" id="header_name"  name="header_name"  value="{{$reportCardHeader->header_name}}" >
                              </div>
                              @error('header_title')
                                <span class="text-danger">
                                  <strong>{{$message}}</strong>
                                </span>
                              @enderror
                          </div>  
                          <?php $count = 1; ?> 
                          @foreach($reportCardHeader->report_card_headre as $report_card_headres)
                           <div class="col-md-4 col-xs-6 col-sm-6 form-group ">
                            <label for="header_title">Header Title ({{$count++}})</label>                
                              <div class="input-group">
                                 <span class="input-group-addon"></span>
                                 
                                    <input type="text" class="form-control onlyDigit input-sm" id="header_title"  name="header_title[]"  value="{{$report_card_headres->header_title}}" >
                                    <input type="hidden" class="form-control onlyDigit input-sm" id="headers_titles_id"  name="headers_titles_id[]"  value="{{$report_card_headres->headers_titles_id}}" >

                              </div>
                              @error('header_title')
                                <span class="text-danger">
                                  <strong>{{$message}}</strong>
                                </span>
                              @enderror
                          </div>   
                          @endforeach
                           <div class="col-md-4 col-xs-6 col-sm-6 form-group field_wrapper">
                            <label for="header_title">Header Title </label>                
                            
                            @error('header_title')
                              <span class="text-danger">
                                <strong>{{$message}}</strong>
                              </span>
                            @enderror
                            
                          </div>   
                          <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa fa-plus"></i></a>
                          {{--  <div class="col-md-4 col-xs-6 col-sm-6 form-group">
                            <label for="discount_name">Add Title </label>  <br>              
                            <button class="btn btn-sm btn-primary" id="btnFilter">Submit</button>
                             
                          </div>  
                          --}}
                        </div>
                         <div class="row mt-3">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success btn-sm" name="" value="Update">
                            </div>
                        </div>
                    </form>
               </div>    
        </div>
    </div>
@include('layouts.common')
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 20; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
                                            
    var fieldHTML = '<div class="input-group"><span class="input-group-addon"></span><input type="text" class="form-control name=" name="header_title[]" value=""/><input type="hidden" class="form-control" name="headers_titles_id[]" value=""/><a href="javascript:void(0);" class="remove_button"><i class="text-danger fa fa-minus"></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

  $('#medium').change(function() {
    // alert( "Handler for .change() called." );
    var classFromName = $('#std_class_id option:selected').text();
    var classToName = $('#std_class_id_to option:selected').text();
    var sectionName = $('#section_id option:selected').text();
    $('#header_name').val(classFromName +'('+sectionName+')'+'_to_'+ classToName+'('+sectionName+')');
    // alert(classFromName)
  });
});
</script>
 @endsection
