 @extends('layouts.main')
 @section('content')
<div class="container">
	<div class="row mb-4">
		<div class="col-md-12">@include('admin.students.header')</div>
	</div>
	<div class="row mb-4">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">ID Card <a href="{{route('id-card-format')}}" class="btn bt-sm  btn btn-outline-primary pull-right fa fa-eye">Id Card Format</a></h5>
				</div>
				<div class="card-body">
					<div class="row mb-4">
						<div class="col-md-4 form-group">
							<label>Admission Number </label>
							<input type="text" name="admision_no " class="form-control" id="admision_no" placeholder="Search Id Card">
						</div>
						
						<div class="col-md-3 form-group pt-2">
							<button class="btn btn-sm btn btn-outline-primary mt-4 fa fa-search" id="btnFilter">View ID-Card</button>
							
						</div>
					</div>
					<div class="mt-4" id="idCardDiv">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		
		$('#btnFilter').on('click',function(e){
			e.preventDefault();
			var admision_no = $('#admision_no').val();
			// alert(admision_no);
			 if(admision_no !=''){
				$.ajax({
					type:'POST',
					url: "{{route('get_id_card')}}",
					data: {admision_no:admision_no, "_token": "{{ csrf_token() }}",},
					success:function(res){
						if(res =="error"){
							alert('student id card not found. Admission no wrong')
						}else{
							$('#idCardDiv').empty().html(res);

						}
					}
				});
			}else{
				alert('Enter Admission Number');
			}

		});
	});
</script>
 @endsection
