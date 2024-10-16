@extends('layouts.main')
 @section('content')
 <div class="container">
 	<div class="row mb-4">
 		<div class="col-md-12">
 			@include('admin.transport.header')
 		</div>
 	</div>
 	<div class="row mb-4">
 		<div class="col-md-12">
 			<div class="card">
 				<div class="card-header">
 					<h5 class="card-title">Bus Fee Structure
 						<a href="{{route('bus_fee_create')}}" class="btn btn-sm btn-success pull-right">Create Fee Structure</a>
 					</h5>
 				</div>
 				<div class="card-body">
 					<div class="row">
 						<div class="col-md-12 table-responsive">
 							<table class="table table-hover table-bordered mytable">
 								<thead>
 									<tr>
 										<th>#</th>
 										<th>Title</th>
 										<th>From (In Kilometer)</th>
 										<th>To (In Kilometer)</th>
 										<th>Amount</th>
 										<th>Status</th>
 										<th>Action</th>
 									</tr>
 								</thead>
 								<tbody>
 									@php $count = 1 @endphp
 									@foreach($bus_fees as $bus_fee)
	 									<tr>
	 										<td>{{$count++}}</td>
	 										<td>{{$bus_fee->bus_fee_title}}</td>
	 										<td>{{$bus_fee->bus_fee_from}}</td>
	 										<td>{{$bus_fee->bus_fee_to}}</td>
	 										<td>{{$bus_fee->bus_fee_amount}}</td>
	 										<td>{{Arr::get(STATUS,$bus_fee->bus_fee_status)}}</td>
	 										<td>
	 											<a href="{{route('bus_fee_edit',$bus_fee->bus_fee_id)}}" class=""><i class="fa fa-edit text-success"></i></a>
	 										</td>
	 									</tr>
 									@endforeach
 								</tbody>
 							</table>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>

 </div>
@endsection