@extends('layouts.main')
 @section('content')
<div id="content">
  <div class="container">
   <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Certificate Request<h4 class="panel-title">  <a href="{{route('certificate-request.create')}}" class="btn btn-success pull-right btn-sm fa fa-send">send request</a></h4></h6>
      </div>
      <div class="app-title full-right">
       @if($message = Session::get('success'))   
          <div class="alert alert-success">{{ $message }}</div>
       @endif
      <!-- Card Body -->
      <div class="card-body">
        {{-- {{dd($examTimeTableMast)}} --}}
        <table class="table table-striped table-bordered">
           <thead>
              <tr>
                <th>#</th>
                <th>Certificate Type</th>
                <th>Apply Date</th>
                <th>Reason</th>
                <th>Response</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php $count = 1; ?>
                @foreach($certifReq as $certifReqs)
                 <td>{{$count++}}</td>
                  <td>{{$certifReqs->cert_type}}</td>
                  <td>{{date('Y-m-d',strtotime($certifReqs->created_at))}}</td>
                  <td>{{$certifReqs->reason}}</td>
                  <td>@if($certifReqs->status==1)
                    <span style="color: green;">Wait for approval</span> 
                    @elseif($certifReqs->status==2)
                      <span style="color: red;"> Decline &nbsp;<a data-toggle="modal"  data-target="#decline_reason" class="fa fa-eye text-primary decline_reason" data-decline="{{$certifReqs->decline_reason}}" ></a></span> 
                    @elseif($certifReqs->status==3)
                    <span style="color: green;">Appoved</span> <a href="{{route('centificate_download',$certifReqs->cert_req_id)}}" target="_blank">(Download)<i class="fa fa-download"></i></a>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
        </table> 
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="decline_reason" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Decline Reason</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="dec-reason" style="color: red;"></span>
      </div>
     
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('.decline_reason').on('click',function(){
      var dec = $(this).attr('data-decline');
      $("#dec-reason").html('Your request decline regarding this:- '+dec);

    });
  });
</script>
@endsection