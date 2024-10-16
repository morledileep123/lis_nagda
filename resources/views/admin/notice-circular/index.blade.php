@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            @include('admin.notice-circular.header')              
        </div>
    </div>   
    <div class="row mt-2 mb-4">
          <div class="col-lg-12">
            <div class="card mb-4">
              <div class="card-header">
                <div class="panel-heading">
                      <h4 class="panel-title">Notice & Circular</h4>
                  </div>
              </div>
              <div class="card-body">
              <div class="panel panel-default">
                 <div class="row">
                    <div class="col-md-3 form-group">
                      <label>Select Option</label>
                        <select class="form-control" name="sendtype" id="sendtype" autocomplete="off">
                          <option value="0">--Select--</option>
                          <option value="1">Send to All</option>
                          <option value="2">Send to Classes</option>
                          <option value="3">Send to All Faculty And Teacher</option>
                        </select>
                    </div>
                    <div class="col-md-12 form-group" id="all_data" ></div>

                 </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>
<script>
  
  $(document).ready(function(){
        
      $('#sendtype').on('change', function(){
        var type = $(this).val();
         if (type == 1) 
         {
          $(".notice_circular_for_all").show();
            var val = $(this).val()
            var getSendAllData = 'send_to_all';
              if(val==1){
                $.ajax({
                  type: "POST",
                  url: "{{route('get_send_to_all_data')}}",
                  data: {val:val,getSendAllData:getSendAllData,"_token": "{{ csrf_token() }}"},
                  success: function(data){
                      $('#all_data').html(data)
                      $(".notice_circular").show();
                  }
              })
            }
          }
        if (type == 2) {
         var val = $(this).val()
          var getSendAllData = 'send_to_all';
          $.ajax({
              type: "POST",
              url: "{{route('get_student_data_for_notice_circul')}}",
              data: {val:val,"_token": "{{ csrf_token() }}"},
              success: function(data){
                  $('#all_data').html(data)
                  $(".notice_circular").show();
                    
              }
          })
        }
        if (type == 3) {
          var val = $(this).val()
          var getSendAllData = 'send_to_faculty';
          if(val==3){
            $.ajax({
              type: "POST",
              url: "{{route('get_send_to_faculty_data')}}",
              data: {val:val,getSendAllData:getSendAllData,"_token": "{{ csrf_token() }}"},
              success: function(data){
                  $('#all_data').html(data)
                  $(".notice_circular").show();
                    
              }
          })
        }
      }
    });
       
});
</script>
 @endsection('content')
