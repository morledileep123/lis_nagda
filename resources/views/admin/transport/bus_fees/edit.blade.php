@extends('layouts.main')
@section('content')
 <style >
 	.text-danger{
 		font-size: 12px;
 	}
 </style>
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
 					<h5 class="card-title">Create Bus Fee Structure
 						<a href="{{route('bus_fee_index')}}" class="btn btn-sm btn-primary pull-right">Back</a>
 					</h5>
 				</div>
 				<div class="card-body">
 					<form action="{{route('bus_fee_update',$bus_fee->bus_fee_id)}}" method="post" autocomplete="off">
	 				@csrf
	 				@method('patch')
	 					<div class="row">	 						
	 						<div class="col-md-3 form-group">
	 							<label class="required">From <span class="text-muted"><i>(In Kilometer)</i></span></label>
	 							<input type="text" name="bus_fee_from" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" id="from_km" value="{{$bus_fee->bus_fee_from}}">
	 							@error('bus_fee_from')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
	 						</div>
	 						<div class="col-md-3 form-group">
	 							<label class="required">To <span class="text-muted"><i>(In Kilometer)</i></span></label>
	 							<input type="text" name="bus_fee_to" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" id="to_km" value="{{$bus_fee->bus_fee_to}}">
	 							@error('bus_fee_to')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
	 						</div>
	 						<div class="col-md-6 form-group">
	 							<label class="required">Title</label>
	 							<input type="text" name="bus_fee_title" class="form-control" readonly="readonly" id="title" value="{{$bus_fee->bus_fee_title}}">
	 							@error('bus_fee_title')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
	 						</div>
	 					</div>
	 					<div class="row">
	 						<div class="col-md-6 form-group">
	 							<label class="required">Amount</label>
	 							<input type="text" name="bus_fee_amount" class="form-control" placeholder="Enter amount here" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{$bus_fee->bus_fee_amount}}"> 
	 							@error('bus_fee_amount')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
	 						</div>
	 						<div class="col-md-6 form-group">
	 							<label class="required">Status</label>
	 							<select class="form-control" name="bus_fee_status">
	 								<option value="">Select Status</option>
	 								@foreach(STATUS as $key => $status)
	 									<option value="{{$key}}" {{$key== $bus_fee->bus_fee_status ? 'selected' :''}}>{{$status}}</option>
	 								@endforeach
	 							</select>
	 							@error('bus_fee_status')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
	 						</div>
	 					</div>
	 					<div class="col-md-12 form-group">
	 						<button class="btn btn-sm btn-success pull-right">Submit</button>
	 					</div>
 					</form>
 				</div>
 			</div>
 		</div>
 	</div>

 </div>
 <script>



 	$(document).ready(function(){
 		@if($message = Session::get('success'))
	 		$.notify("{{$message}}",'success');
	 	@endif
 		$('label.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');

 		$('#to_km, #from_km').on('blur',function(e){
 			e.preventDefault();
 			var from_km = $('#from_km').val();
 			var to_km = $('#to_km').val();
 			
 			if(from_km !='' && to_km !=''){
 				if(parseInt(from_km) < parseInt(to_km)){
 					var title = from_km +'-'+to_km + ' KM';
 					$('#title').val(title);
 				}else{
 					$('#title').val('');
 					$.notify('Please enter To Kilometer greater than to First Kilometer.','warning');
 				}
 			}else if(from_km ==''){
					$('#title').val('');
					$.notify('From Kilometer field is required.','warning');
 			}
 		})
 	})

 </script>
@endsection