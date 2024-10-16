@extends('layouts.main')
@section('content')

<div class="container">
	<div class="row mb-4">
		<div class="col-md-12">
			@include('admin.students.header')
		</div>
	</div>
	<div class="row mb-4">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Previous Students Record</h5>
				</div>
				<div class="card-body">
					<div class="row ">
						<div class="col-md-3 form-group">
							<select class="form-control" name="std_class_id" id="std_class_id"> 
								<option value="">Select Class</option>
								@foreach($classes as $key=>$class)
									<option value="{{$class->id}}">{{$class->class_name}}</option>
								@endforeach
							</select>
						</div>								
						<div class="col-md-2 form-group">
							<select class="form-control" name="batch_id" id="batch_id">
							</select>
						</div>						
						<div class="col-md-2 form-group">
							<select class="form-control" name="section_id" id="section_id"> 							
							</select>
						</div>
						<div class="col-md-3 col-xs-6 col-sm-6 form-group">
                            <select class="form-control required" name="medium" id="medium_id" required="medium" autocomplete="off">
                              
                            </select>                            
                        </div>
						<div class="col-md-2 form-group">
							<select class="form-control" name="status" id="status">
								<option value="">Select Status</option>
								<option value="F">Forward</option>
								<option value="T">Transfer</option>
								<option value="D">Dropout</option>
							</select>
						</div>
						<div class="col-md-2 form-group">
							<button class="btn btn-sm btn-primary" id="btnFilter">Search</button>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12 table-responsive" id="tableDiv">
							@include('admin.students.previous-student-detail.table')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('layouts.common')

<script >
	$(document).ready(function(){
		$('#btnFilter').on('click',function(e){
			e.preventDefault();
			var std_class_id = $('#std_class_id').val();
			var batch_id 	 = $('#batch_id').val();
			var section_id	 = $('#section_id').val();
			var status 		 = $('#status').val();
			var medium 		 = $('#medium_id').val();

			if(std_class_id !='' && batch_id !='' && section_id !='' && status !='' ){
				$.ajax({
					type:'post',
					url:"{{route('student_filter')}}",
					data: {batch_id:batch_id,std_class_id: std_class_id, section_id:section_id,page:'previous_record',medium:medium,status:status, "_token": "{{ csrf_token() }}"},
					success:function(res){
						// console.log(res);

						$('#tableDiv').empty().html(res);
					}
				})
			}else{
				alert('Please select all field');
			}


		})
	})
</script>


@endsection
