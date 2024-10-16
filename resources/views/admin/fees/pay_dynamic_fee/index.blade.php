@extends('layouts.main')
@section('content')
<style>
	 .error{
      font-size: 13px;
   }
</style>
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
 					<h5 class="card-title">Pay Dynamic Fee</h5>
 				</div>
 				<div class="card-body">
 					<form action="{{route('pay_dynamic_fee_store')}}" method="post">
 						@csrf
	 					<div class="row">
	 						<div class="col-md-6 form-group">
	 							<label>Select Class</label>
	 							<select class="form-control" name="std_class_id" id="std_class_id" autocomplete="off">
		 							<option value="">Select Class Name</option>
		 							@foreach($classes as $class)
		 								<option value="{{$class->id}}" {{old('std_class_id') == $class->id ? 'selected' : ''}}>{{$class->class_name}}</option>
		 							@endforeach
		 						</select>
		 						@error('std_class_id')
		                           <span class="text-danger error">
		                              <strong>{{$message}}</strong>
		                           </span>
		                        @enderror
	 						</div>
	 						<div class="col-md-6 form-group">
	 							<label>Search Student</label>
	 							<select class="form-control" name="std_fees_mast_id" id="std_fees_mast_id" autocomplete="off">
	 								
	 							</select>
	 							@error('std_fees_mast_id')
		                           <span class="text-danger error">
		                              <strong>{{$message}}</strong>
		                           </span>
		                        @enderror
	 						</div>
	 						<div class="col-md-6 form-group">
	 							<label>Amount</label>
	 							<input type="text" onkeypress="return isNumberKey(this, event);"  name="amount" class="form-control" value="{{old('amount') ?? '0'}}" autocomplete="off">
	 							@error('amount')
		                           <span class="text-danger error">
		                              <strong>{{$message}}</strong>
		                           </span>
		                        @enderror
	 						</div>
	 						<div class="col-md-6 form-group">
	 							<label>Receipt Date</label>
	 							<input type="text" readonly="readonly" name="receipt_date" class="datepicker form-control" data-date-format="yyyy-mm-dd" value="{{old('receipt_date') ?? date('Y-m-d')}}" autocomplete="off">
	 							@error('receipt_date')
		                           <span class="text-danger error">
		                              <strong>{{$message}}</strong>
		                           </span>
		                        @enderror 
	 						</div>
	 						<div class="col-md-6 form-group">
	 							<label>Payment Mode</label>
	 							<select name="payment_mode" class="form-control" id="payment_mode" autocomplete="off" >
									<option value="">Select Payment Mode</option>
									@foreach(PAYMENTMODE as $key => $payment_mode)
										<option value="{{$key}}" {{old('payment_mode') == $key ? 'selected' : ''}}>{{$payment_mode}}</option>
									@endforeach
								</select>
								@error('payment_mode')
		                           <span class="text-danger error">
		                              <strong>{{$message}}</strong>
		                           </span>
		                        @enderror
	 						</div>
	 						<div class="col-md-6 form-group"></div>
	 						<div class="col-md-6 form-group">
	 							<label>Remarks</label>
	 							<textarea class="form-control" name="remarks" autocomplete="off">{{old('remarks')}}</textarea>
	 							@error('remarks')
		                           <span class="text-danger error">
		                              <strong>{{$message}}</strong>
		                           </span>
		                        @enderror 
	 						</div>
	 						<div class="col-md-12 form-group">
	 							<button class="btn btn-sm btn-success">Submit</button>
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
	$('#std_class_id').on('change', function(e){
		e.preventDefault();
		
		fee_student_fetch();
	});

	var old_std_fees_mast_id = "{{old('std_fees_mast_id')}}";
	if(old_std_fees_mast_id !=''){
		fee_student_fetch(old_std_fees_mast_id);
	}

	function fee_student_fetch(old_std_fees_mast_id =''){

		var student_name = ''; 
		var admision_no = '';
		var std_class_id = $('#std_class_id').val();
		var page = 'pay_dynamic_fee';
		
		$.ajax({
			type:'POST',
			url:'{{route('fee_student_fetch')}}',
			data:{student_name:student_name,admision_no:admision_no,std_class_id:std_class_id,page:page},
			 headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
			success:function(res){
				// console.log(res);
				$('#std_fees_mast_id').empty()
				$.each(res,function(i,v){
					$('#std_fees_mast_id').append('<option value='+v.std_fees_mast_id+'   '+(old_std_fees_mast_id !='' ? (old_std_fees_mast_id == v.std_fees_mast_id ? 'selected' : '') : '')+' >'+v.student.f_name +' '+ (v.student.m_name !=null ? v.student.m_name +(' ') : '') +''+ v.student.l_name +' | '+v.student.medium+' </option>');

				})

				// $('#tableData').empty().html(res);
			}
		});
	}
})
</script>
@endsection