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
					<h5 class="card-title">Add Fees Concession
						<a href="{{route('concession.index')}}" class="btn btn-sm btn-primary pull-right">Back</a>
					</h5>					
				</div>
				<div class="card-body">
					<form action="{{route('concession.store')}}" method="post" autocomplete="off">
					@csrf
						<div class="row">
							<div class="col-md-6 form-group">
								<label for="name" class="required">Category </label>
								<input class="form-control" id="name" name="name" type="text" required="required">
							  	@error('name')
		                          <span class="text-danger">
		                            <strong>{{$message}}</strong>
		                          </span>
		                        @enderror
							</div>
							
							<div class="col-md-6 form-group">
								<label for="discount" class="">Discount</label>
								<select class="form-control" name="discount">
	    							<option value="">Select discount Type</option>
	    							@foreach(ConcessionDiscount as $key => $fine)
	    								<option value="{{$key}}">{{$fine}}</option>
	    							@endforeach
	    						</select>
	    						@error('discount')
		                          <span class="text-danger">
		                            <strong>{{$message}}</strong>
		                          </span>
		                        @enderror
							</div>
							
							<div class="col-md-6 form-group">
								<label for="concession_amnt" class="required"> Amount</label>
								<input class="form-control onlyDigit" id="concession_amnt" name="concession_amnt" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
								@error('concession_amnt')
		                          <span class="text-danger">
		                            <strong>{{$message}}</strong>
		                          </span>
		                        @enderror
							</div>
							<div class="col-md-6 form-group">
								<label for="conses_desc" class="">Description </label>
									<textarea class="form-control" name="conses_desc"></textarea>
								</select>
								@error('conses_desc')
		                          <span class="text-danger">
		                            <strong>{{$message}}</strong>
		                          </span>
		                        @enderror								     
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


 <script >

 	$(document).ready(function(){
 		$('label.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');

 	
 	})	
 </script>

@endsection

