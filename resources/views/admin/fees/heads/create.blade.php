@extends('layouts.main')
@section('content')
<div class="container">
	<div  class="row mb-4">
		<div class="col-sm-12">@include('admin.fees.header')</div>
	</div>
	<div class="row mb-4"> 
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Add Fees Heads
						<a href="{{route('concession.index')}}" class="btn btn-sm btn-primary pull-right">Back</a>
					</h5>					
				</div>
				<div class="card-body">
					<form action="{{route('fees-heads.store')}}" method="post" autocomplete="off">
					@csrf
						<div class="row">
							<div class="col-md-3 form-group">
								<label for="feeheader" class="required">Fees Heads </label>
								<input class="form-control" id="head_name" name="head_name" type="text" required="required">
							  	@error('head_name')
		                          <span class="text-danger">
		                            <strong>{{$message}}</strong>
		                          </span>
		                        @enderror
							</div>
							
							<div class="col-md-3 form-group">
								<label for="feeheader" class="required">Fees Amount</label>
								<input class="form-control onlyDigit" id="head_amnt" name="head_amnt" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
								@error('head_amnt')
		                          <span class="text-danger">
		                            <strong>{{$message}}</strong>
		                          </span>
		                        @enderror
							</div>
							<div class="col-md-3 form-group">
								<label for="feesheadtype" class="required">Head Types </label>
								<select id="headtype" name="headtype" class="form-control" required="required">
									@foreach(HEAD_TYPES as $key => $headType)
									<option value="{{$key}}">{{$headType}}</option>
									@endforeach
								</select>								     
							</div>

							<div class="col-md-3 form-group">
								<label for="feeheader" class="required">Head Sequence Order </label>
								<input class="form-control" id="head_sequence_order" name="head_sequence_order" type="number" value="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">	
							</div>
							<div class="col-md-3 form-group">
								<label for="feeheader" class="required">Status</label>
									<select class="form-control" name="status">
        							<option value="">Select Status</option>
        							@foreach(STATUS as $key => $status)
        								<option value="{{$key}}">{{$status}}</option>
        							@endforeach
        						</select>
							</div>
							<div class="col-md-3 form-group">
								<label for="feeheader" class="required">Batch Name</label>
									<select class="form-control" name="batch_id">
        							<option value="">Select Batch</option>
        							@foreach(batches() as $batch)
        								<option value="{{$batch->id}}" {{$batch->id == session('current_batch') ? 'selected' : ''}}>{{$batch->batch_name}}</option>
        							@endforeach
        						</select>
							</div>
		                </div>
		                <hr>
		                <div class="row">		                	
		                	<div class="col-md-12 table-responsive">
		                		<table class="table table-bordered">
		                			<thead>
		                				<tr>
		                					<th>Fine Type</th>
											<th>Fine</th>
											<th>No of Days</th>
											<th>Fine Amount</th>
											<th>Action</th>
		                				</tr>
		                			</thead>
		                			<tbody id="fineBody">
		                				<tr >
		                					<td class="form-group">
		                						<select class="form-control" name="fine_type[]">
		                							<option value="">Select Fine Type</option>
		                							@foreach(FINE_TYPES as $key => $fine)
		                								<option value="{{$key}}">{{$fine}}</option>
		                							@endforeach
		                						</select>
		                					</td>
		                					<td class="form-group">
		                						<select class="form-control" name="fine[]">
		                							<option value="">Select Fine Type</option>
		                							@foreach(FINE as $key => $fine)
		                								<option value="{{$key}}">{{$fine}}</option>
		                							@endforeach
		                						</select>
		                					</td>
		                					<td class="form-group">
		                						<input type="text" name="fine_day[]" id="fine_day_1" class="form-control" value="0" placeholder="fine_day" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
		                					</td>
		                					<td class="form-group">
		                						<input type="text" name="fine_amount[]" id="fine_amount_1" class="form-control" value="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
		                					</td>
		                					<td>
		                						<a href="javascript:void(0)" class="btn btn-sm btn-success" id="addBtn"><i class="fa fa-plus"></i></a>
		                					</td>
		                				</tr>
		                			</tbody>
		                		</table>		                		
		                	</div>
		                </div>
		                <div class="row">
		                	<div class="col-md-2 form-group">
								<input type="radio" name="applicable_on" value="0" checked=""> <label for="applicable_on">General</label>
							</div>

						    <div class="col-md-2 form-group">
								<input type="radio" name="applicable_on" value="1"> <label for="during_admission">Admission</label>
						    </div>
						 <!--   <div class="col-md-2">
							<input type="radio" name="applicable_on" value="during_hostel" > <label for="applicable_on">Hostel</label>
						    </div>
						    <div class="col-md-2">
							<input type="radio" name="applicable_on" value="during_transport" > <label for="applicable_on">Transport</label>
						    </div>-->
						    <div class="col-md-2 form-group">
								<input type="checkbox" name="refundable" value="Refundable"> <label for="refundable">Refundable</label>
						    </div>
						    <div class="col-md-4 form-group">
								<input type="checkbox" name="installable"> <label for="installable">Instalment Applicable</label>
						    </div>
						</div>
						 <div class="row">
						 	<div class="col-md-12">
						 		<button type="submit" class="btn btn-sm btn-success">Submit</button>
						 	</div>
						 </div>
					</form>	
				</div>
			</div>
		</div>
	</div>	
</div>


{{-- 
<div id="myModal{{$feesHeadMasts->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Fees Head</h4>
      </div>
      <div class="modal-body">
       <form method="post" action="{{route('fees-heads.update',$feesHeadMasts->id)}}">
       	@csrf
       	@method('PUT')
        	<label for="feeheader">Head Name</label>
			<input type="text" value="{{$feesHeadMasts->name}}" name="head_name" id="head_name_pop" class="form-control" >
      		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      	<input type="submit" name="submit" value="Update" class="btn btn-success">
        </form>
      </div>
    </div>

  </div>
</div>
 --}}

 <script >

 	$(document).ready(function(){
 		$('label.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');

 		var i = 0;
 		$('#addBtn').on('click', function(){	
 			$('#fineBody').append('<tr id="row'+i+'"><td class="form-group"><select class="form-control" name="fine_type[]"><option value="">Select Fine Type</option>@foreach(FINE_TYPES as $key => $fine)<option value="{{$key}}">{{$fine}}</option>@endforeach</select></td><td class="form-group"><select class="form-control" name="fine[]"><option value="">Select Fine Type</option>@foreach(FINE as $key => $fine)<option value="{{$key}}">{{$fine}}</option>@endforeach</select></td><td class="form-group"><input type="text" name="fine_day[]" id="fine_day_1" class="form-control" value="0" placeholder="fine_day"></td><td class="form-group"><input type="text" name="fine_amount[]" id="fine_amount_1" class="form-control" value="0"></td><td><a href="javascript:void(0)" class="btn btn-sm btn-danger btnRemove" id="'+i+'"><i class="fa fa-minus"></i></a></td></tr>');
 				i++;			
		});
		
		$(document).on('click','.btnRemove',function(e){
			e.preventDefault();
			var row_id = $(this).attr('id');
			// console.log(row_id);
		   $('#row'+row_id).remove();
		});


	 	@if($message = Session::get('success'))
	 		$.notify("{{$message}}",'success');
	 	@endif
 	})	
 </script>

@endsection

