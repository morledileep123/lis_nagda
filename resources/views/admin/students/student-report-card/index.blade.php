@extends('layouts.main')
@section('content')

<div class="container">
   <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Get Student Report Card according to the Class, Batch, Section and Medium Wise<h4 class="panel-title">  <a href="{{route('student-report-card.create')}}" class="btn btn-success pull-right btn-sm fa fa-plus">Add Report Card</a>{{-- <a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm">Back</a> --}}</h4></h6>
      </div>
      <div class="app-title full-right">
       @if($message = Session::get('success'))   
          <div class="alert alert-success">{{ $message }}</div>
       @endif
      <!-- Card Body -->
      <div class="card-body">
         
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
          <label for="yearly">Class</label>

            <select class="form-control" name="std_class_id" autocomplete="off" id="std_class_id"> 
              <option value="">Select Class</option>
              @foreach($classes as $key=>$class)
                <option value="{{$class->id}}">{{$class->class_name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3 form-group">
           <label for="yearly">Batch</label>

            <select class="form-control" name="batch_id" autocomplete="off" id="batch_id">
               
            </select>
          </div>
          <div class="col-md-3 form-group">
           <label for="yearly">Section</label>
            <select class="form-control" name="section_id" autocomplete="off" id="section_id"> 
              
            </select>
          </div>
          <div class="col-md-3 col-xs-6 col-sm-6 form-group">
           <label for="yearly">Medium</label>

            <select class="form-control required" name="medium" id="medium_id" required="required">
              
            </select>
          </div>  
          <div class="col-md-3 form-group mt-4">

            <button class="btn btn-sm btn-primary fa fa-search" id="btnFilter">Search</button>
            
          </div>
        </div>
          <div class="row mt-3 mb-5">
            <div class="col-md-12 table-responsive" id="tableFilter">
              <table class="table table-striped table-bordered" >
                <thead>
                  <tr role="row">
                    <th class="sorting_asc">#</th>
                    <th class="sorting" >Student Name</th>
                    <th class="sorting" >Class</th>
                    <th class="sorting" >Action</th>
                  </tr>
                </thead>
                <tbody>                 
                  <tr class="odd text-center" >
                    <td colspan="10" class="dataTables_empty" valign="top">No data available in table please select Class, Batch, Section Medium for get data</td>
                  </tr>
                </tbody>
              </table>            
            </div> 
          </div>      
      </div>
  </div>
</div>

@include('layouts.common')
<script>
  $(document).ready(function(){

    $('#btnFilter').on('click',function(e){
      e.preventDefault();
      var batch_id   = $('select[name="batch_id"] option:selected').val();
      var std_class_id = $('select[name="std_class_id"] option:selected').val();
      var section_id   = $('select[name="section_id"] option:selected').val();
      var medium     = $('select[name="medium"] option:selected').val();
      var report_card_type     = $('select[name="report_card_type"] option:selected').val();
      var status = 'R';
      var user_id = 'user_id';

      var page = 'student_detail';
       if(section_id !=''  && batch_id !='' && std_class_id != '' ){
        $.ajax({
          type:'POST',
          url: "{{route('report_card_filter')}}",
          data: {batch_id:batch_id,std_class_id: std_class_id, section_id:section_id,user_id:user_id,page:page,medium:medium,report_card_type:report_card_type, status:status, "_token": "{{ csrf_token() }}"},
          success:function(res){
            $('#tableFilter').empty().html(res);
          }
        });
      }else{
        alert('please select all field');
      }

    });

  });
</script>
 @endsection