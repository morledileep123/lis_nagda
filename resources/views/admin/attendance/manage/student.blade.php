@extends('layouts.main')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			@include('admin.attendance.header')
		</div>
	</div>
	<div class="row mb-4">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Manage Attendance <span class="pull-right">Today Date :- {{date('d-m-Y')}} | Time: {{date('h:i A')}}</span></h5>
				</div>
				<div class="card-body">
					<div class="row mb-4">
						<div class="col-md-12">
							<a href="{{route('attendance.manage_student')}}" class="btn btn-sm {{Request()->segment(3) == 'student' ? 'btn-primary' : 'btn-default'}}">Student attendance</a>
							@role('superadmin')
							<a href="{{route('attendance.manage_teacher')}}" class="btn btn-sm {{Request()->segment(3) == 'staff' ? 'btn-primary' : 'btn-info'}} ">Teachers attendance</a>
							@endrole
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-md-3">
							<select class="form-control" name="std_class_id" id="std_class_id" autocomplete="off"> 
								<option value="">Select Class</option>
								@foreach($classes as $key=>$class)
									<option value="{{$class->id}}">{{$class->class_name}}</option>
								@endforeach
							</select>							
						</div>								
						<div class="col-md-3">
							<select class="form-control" name="batch_id" id="batch_id">
								
							</select>							
						</div>
						
						<div class="col-md-3">
							<select class="form-control" name="section_id" id="section_id"> 
								
							</select>
						</div>
						<div class="col-md-3 col-xs-6 col-sm-6 form-group">
							<select class="form-control required" name="medium" id="medium_id" required="medium">
								
							</select>
						</div>
						<div class="col-md-3">
							<input type="text" readonly="" name="attendance_date" value="{{date('Y-m-d')}}" class="datepicker form-control">
							@error('attendance_date')
								<span class="invalid-feedback text-danger" role="alert">
								<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						<div class="col-md-12 text-center">
							<button class="btn btn-sm btn-primary search">Search</button>
						</div>
		
					</div>
					<div class="row mt-4">
						<div class="col-md-12" id="tableBody" ></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('layouts.common')

	<script >
		$(document).ready(function(){

			$(document).on('click','.selectAll' ,function(){	
			 console.log('select');
			 if ($(this).is( ":checked" )) {
				$('body .check').prop('checked',true);

			 }else{
				$('body .check').prop('checked',false);
			 }
			});
			 
			$(function () {
				$(".datepicker").datepicker({
					format: 'yyyy-mm-dd'
				});
			});

		$('.search').on('click',function(e){
			e.preventDefault();
			filter_students();
		});

		function filter_students(){
			var batch_id = $('select[name="batch_id"] option:selected').val();
			var std_class_id = $('select[name="std_class_id"] option:selected').val();
			var section_id = $('select[name="section_id"] option:selected').val();
			var medium = $('select[name="medium"] option:selected').val();
			var attendance_date = $('input[name="attendance_date"]').val();

			 if(section_id !=''  && batch_id !='' && std_class_id != '' && attendance_date != '' ){
				$.ajax({
					type:'POST',

					url: "{{route('attendance.manage_student_filter')}}",
					data: {batch_id:batch_id,std_class_id: std_class_id, section_id:section_id,attendance_date:attendance_date,medium:medium, "_token": "{{ csrf_token() }}",},
					   success:function(res){

						$('#tableBody').empty().html(res);


					}
				});
			}else{
				$.notify("All select field are mandatory.");
			}
		}


		$(document).on('click','#updateBtn',function(e){
			e.preventDefault();
			// console.log("adsasd")
			var present_student = [];
			var i = 0;
			$('input[name="s_id[]"]:checked').each(function() {
				present_student[i++] = $(this).val();
			});
			var j =0;
			var total_student = [];
			$('input[name="s_id[]"]').each(function() {
				total_student[j++] = $(this).val();
			});
			

			// console.log(present_student)
			var attendance_date = $('input[name="attendance_date"]').val();
			// console.log(s_ids1);
			// if(present_student.length !=0){
				$.ajax({
					type:'post',
					url:'{{route('attendance.update')}}',
					data:{present_student:present_student,total_student:total_student,attendance_date:attendance_date, "_token": "{{ csrf_token() }}"},
					success:function(res){
						if (res = "success") {
							$.notify("Students attendance updated successfully",'success');
						}
						filter_students();
					}
				});

			// }else{
			// 	alert('Select the students first')
			// }	
		});



	});
</script>
@endsection