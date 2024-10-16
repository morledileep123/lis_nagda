@extends('layouts.main')
@section('content')

<div class="container">
  <div class="row mb-4">
    <div class="col-md-12">@include('admin.students.header')</div>
  </div>
  <div class="row mb-4">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Student Report Card</h5>
        </div>
        <div class="card-body">
          <div class="row mb-4">
            <div class="col-md-4 form-group">
              <label>Admission Number </label>
            <input class="form-control mr-sm-2" type="text" id="admfrom" name="admision_no" placeholder="Enter admission no" aria-label="Search">
            </div>
            
            <div class="col-md-3 form-group pt-2">
              <button class="btn btn-sm btn btn-outline-primary mt-4 fa fa-search" id="rcbtn">View Report-Card</button>
              
            </div>
          </div>
          <div class="row mt-3 mb-5">
            <div class="col-md-12 table-responsive" id="dataFilter">
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
                    <td colspan="10" class="dataTables_empty" valign="top">No data available in table please select admission no</td>
                  </tr>
                </tbody>
              </table>            
            </div> 
          </div>    
        </div>
      </div>
    </div>
  </div>
</div>


@include('layouts.common')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){

      $('#rcbtn').on('click',function(e){
      e.preventDefault();
      var admision_no = $("#admfrom").val();
      var status = 'R';
      var user_id = 'user_id';
      var page = 'student_detail';
      {
        $.ajax({
          type:'get',
          url: "{{route('rc-filter')}}",
          data: {admision_no:admision_no,user_id:user_id,status:status,page:page},
          success:function(data){
            // alert(data);
            // console.log(data);
            $('#dataFilter').html(data);
          }
        });
      }
        
    });

  });
</script>
 @endsection