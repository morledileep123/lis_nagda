
 @extends('layouts.main')
 @section('content') 
 <meta name="csrf-token" content="{{ csrf_token() }}" /> 
<div class="container">
    <div class="row mt-2">
    <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header">
        <div class="panel-heading">
              <h4 class="panel-title">  SMS Report 
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
						<th>Mobile No </th>
						<th>Status </th>
					</tr>
				</thead>
				<tbody>
					<?php $count = 1; ?>
					@if(!empty($getComposeSms))

						@foreach($getComposeSms as $value)
						<tr>
						@if(empty($getComposeSms))
							<td colspan="10">No Data found</td>
						@endif
						{{-- {{dd($value->compose_sms_id)}} --}}
						@if(in_array($value->compose_sms_id, $receiverIds))
						<td>{{$count++}}</td>
						<td>{{$value->get_user ? $value->get_user->username : ''}}</td>
						<td> <?php if($value->get_user ){ ?>
							{{ $value->get_user->user_flag == 'S' ? 'Student': 'Teacher'}}
						<?php }  ?>
						</td>
						<td> <?php if($value->get_user ){ ?>{{date('Y-m-d',strtotime($value->get_user->created_at))}}<?php }  ?>
							
						</td>
						<td>
							<?php if($value->get_user ){ ?>{{$value->get_user->mobile_no}}<?php }  ?>
								
						</td>
						<td><?php if($value->get_user ){ ?>{{$value->get_user->mobile_no ? 'Send' : 'Faild'}}<?php }  ?></td>
						@endif
					</tr>
						@endforeach
						@else
					@endif
				</tbody>
			</table>
            </div>
       		</div>
          <hr>
      </strong>
 </div>
</div>

 @endsection('content')
