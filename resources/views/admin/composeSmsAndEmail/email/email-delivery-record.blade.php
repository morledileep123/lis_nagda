
 @extends('layouts.main')
 @section('content') 
 <meta name="csrf-token" content="{{ csrf_token() }}" /> 
<div class="container">
    <div class="row mt-2">
    <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header">
        <div class="panel-heading">
              <h4 class="panel-title">  Email Report 
                 <a href="{{ URL::previous() }}"><button class="btn btn-success" style="float:right;">Back</button></a>
              </h4>
          </div>          
        </div>
    <div class="card-body">
      <div class="panel panel-default">
        <div class="col-md-12 mt-3">
    		<table class="table table-bordered table-striped mytable" id="facultiestable">
				<thead>
					<tr>
						<th>#</th>
						<th>User Name</th>
						<th>Type</th>
						<th>Date</th>
						<th> Email </th>
						<th>Status </th>
					</tr>
				</thead>
				<tbody>
					<?php $count = 1; ?>
					@foreach($getComposeSms as $value)
					<tr>
						@if(empty($getComposeSms))
							<td colspan="10">No Data found</td>
						@endif
						@if(in_array($value->compose_sms_id, $receiverIds))
						
							<td>{{$count++}}</td>
							<td>{{$value->get_user->username}}</td>
							<td>{{$value->get_user->user_flag == 'S' ? 'Student': 'Teacher'  }}</td>
							<td>{{date('Y-m-d',strtotime($value->get_user->created_at))}}</td>
							<td>{{$value->get_user->email}}</td>
							<td>{{$value->get_user->email ? 'Send' : 'Faild'}}</td>
						@endif

					</tr>
					@endforeach
				</tbody>
			</table>
            </div>
       		</div>
          <hr>
      </strong>
 </div>
</div>

 @endsection('content')
