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
 					<h5 class="card-title">Pay Regular Fee</h5>
 				</div>
 			
	 			<div class="card-body">
	 				<div class="row ">
	 					<div class="col-md-3 form-group">
	 						<input type="text" class="form-control" name="student_name" placeholder="Student Name" id="student_name">
	 					</div>
	 					<div class="col-md-3 form-group">
	 						<input type="text" class="form-control" name="admision_no" placeholder="Admission Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" id="admision_no">
	 					</div>
	 					<div class="col-md-3 form-group">
	 						<select class="form-control" name="std_class_id" id="std_class_id">
	 							<option value="">Select Class Name</option>
	 							@foreach($classes as $class)
	 								<option value="{{$class->id}}">{{$class->class_name}}</option>
	 							@endforeach
	 						</select>
	 					</div>
	 					<div class="col-md-3 form-group">
	 						<button class="btn btn-sm btn-success btnFilter">Filter</button>
	 					</div>
	 				</div>
	 				<div class="row">
	 					<div class="col-md-12" id="tableData">
	 						
	 					</div>
	 				</div>
	 			</div>
	 		</div> 			
 		</div>
 	</div>
</div>
<script >
	$(document).ready(function(){
		$('.btnFilter').on('click', function(e){
			e.preventDefault();
			var student_name = $('#student_name').val(); 
			var admision_no = $('#admision_no').val()
			var std_class_id = $('#std_class_id').val();

			var page = 'pay_regular_fee';
			$.ajax({
				type:'POST',
				url:'{{route('fee_student_fetch')}}',
				data:{student_name:student_name,admision_no:admision_no,std_class_id:std_class_id,page:page},
				success:function(res){
					// console.log(res);
					$('#tableData').empty().html(res);
				}
			})

		})
	})
</script>
@endsection