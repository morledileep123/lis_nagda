@extends('layouts.main')
 @section('content')
 <div class="container">
 	<div class="row mb-4">
 		<div class="col-md-12">
 			@include('admin.fees.header')
 		</div>
 	</div>
 	<div class="row mb-4">
 		<div class="col-md-12">
 			<div class="card">
 				<div class="card-header">
 					<h5 class="card-title">Fees
 						<a href="{{route('fees.create')}}" class="btn btn-sm btn-success pull-right">Add Fees</a>
 					</h5>
 				</div>
 				<div class="card-body table-responsive">
 					<table class="table table-hover table-bordered mytable">
						<thead>
							<tr>
								
								<th>Fees Name</th>
								<th>Fees Amount</th>
								<th>Course</th>
								<th>Batch</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($fees as $fee)
							<tr>
								<td>{{$fee->fees_name}}</td>
								<td>{{$fee->fees_amnt}}</td>
								<td>{{$fee->courseselection == 1 ? 'Multiple Courses' : 'Single Course'}}</td>
								<td>{{$fee->courseselection == 2 ? 'Multiple' : $fee->batch->batch_name }}</td>					
								<td><div class="btn-group">
									<a href="{{route('fees.show',$fee->fees_id)}}" class=""><i class="fa fa-eye text-green"></i></a>
	                               {{--  <a data-original-title="Edit" href="{{route('fees.edit',$fee->fees_id)}}" data-toggle="tooltip" class="btn btn-xs btn-default">
	                                    <i class="fa fa-pencil"></i>
	                                </a>
	                                <a data-original-title="Delete" href="{{route('fees.destroy',$fee->fees_id)}}" onclick="if(confirm('Are you sure you want to delete this fees')){ return true }else{ return false; }" data-toggle="tooltip" class="btn btn-xs btn-danger">
	                                    <i class="fa fa-times"></i>
	                                </a> --}}
	                            </div></td>
							</tr>
							@endforeach
						</tbody>
				</table> 
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
@if($message = Session::get('success'))
	<script >
	$(document).ready(function(){	
		swal({
          text: "{{$message}}",
          icon : 'success',
        });
       });
	</script>	
@endif
@endsection