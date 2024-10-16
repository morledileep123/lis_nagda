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
           @if($message = Session::get('warning'))   
              <div class="alert alert-warning">{{ $message }}</div>
           @endif
        </div>
           <div class="card-body">
              <form action="{{route('student-report-card-header.store')}}" method="post" id="form_submit" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-12">
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
                          <label for="std_class_from_id">Class From</label>                
                            <select class="form-control" name="std_class_id" autocomplete="off" id="std_class_id"> 
                              <option value="">Select Class</option>
                              @foreach($classes as $key=>$class)
                                <option value="{{$class->id}}">{{$class->class_name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-md-3 form-group">
                          <label for="std_class_to_id">Class To</label>                
                            <select class="form-control" name="std_class_to_id" autocomplete="off" id="std_class_id_to"> 
                              <option value="">Select to Class</option>
                              @foreach($classes as $key=>$class)
                                <option value="{{$class->id}}">{{$class->class_name}}</option>
                              @endforeach
                            </select>
                          </div>
    
                          <div class="col-md-3 form-group">
                          <label for="std_class_to_id">Batch</label>                

                            <select class="form-control" name="batch_id" autocomplete="off" id="batch_id">
                               
                            </select>
                          </div>
                          <div class="col-md-3 form-group">
                          <label for="std_class_to_id">Section</label>                
                            <select class="form-control" name="section_id" autocomplete="off" id="section_id"> 
                              
                            </select>
                          </div>
                          <div class="col-md-3 col-xs-6 col-sm-6 form-group">
                          <label for="std_class_to_id">Medium</label>                
                            <select class="form-control required" name="medium" id="medium_id" required="required">
                              
                            </select>
                          </div> 
                          <div class="col-md-3 col-xs-6 col-sm-6 form-group ">
                            <label for="header_name">Header Name </label>                
                              <div class="input-group">
                                 <span class="input-group-addon"></span>
                                 <input type="text" class="form-control onlyDigit input-sm" id="header_name"  name="header_name"  value="{{old('header_name')}}" >
                              </div>
                              @error('header_name')
                                <span class="text-danger">
                                  <strong>{{$message}}</strong>
                                </span>
                              @enderror
                          </div>   
                           <div class="col-md-3 col-xs-6 col-sm-6 form-group field_wrapper">
                            <label for="header_title">Header Title </label>                
                              <div class="input-group">
                                 <span class="input-group-addon"></span>
                                 <input type="text" class="form-control onlyDigit input-sm" id="header_title"  name="header_title[]"  value="{{old('header_title')}}" >
                                  <a href="javascript:void(0);" class="add_button ml-2" title="Add field"><i class="fa fa-plus"></i></a>
                              </div>
                              @error('header_title')
                                <span class="text-danger">
                                  <strong>{{$message}}</strong>
                                </span>
                              @enderror
                          </div>   
                          {{--  <div class="col-md-3 col-xs-6 col-sm-6 form-group">
                            <label for="discount_name">Add Title </label>  <br>              
                            <button class="btn btn-sm btn-primary" id="btnFilter">Submit</button>
                             
                          </div>  
                          --}}
                        </div>
                         <div class="row mt-3">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success btn-sm" name="" value="Submit">
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
                                            
    var fieldHTML = '<div class="input-group"><span class="input-group-addon"></span><input type="text" class="form-control" name="header_title[]" value="" /><a href="javascript:void(0);" class="remove_button"><i class="text-danger fa fa-minus"></a></div>'; //New input field html 
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

  $('#medium_id').change(function() {
    // alert( "Handler for .change() called." );
    var classFromName = $('#std_class_id option:selected').text();
    var classToName = $('#std_class_id_to option:selected').text();

   var sectionName = $('#section_id option:selected').text();
    $('#header_name').val(classFromName +'('+sectionName+')'+'_to_'+ classToName+'('+sectionName+')');
  });
});
</script>
 @endsection
