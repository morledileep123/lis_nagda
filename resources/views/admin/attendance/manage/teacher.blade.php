{{-- @extends('lawschools.main') --}}
@extends('layouts.main')
@section('content')
<section class="content">
@include('admin.attendance.header')
<div class="container">
 	<div class="card shadow mb-4">
	        <!-- Card Header - Dropdown -->
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	          <h6 class="m-0 font-weight-bold text-primary"> Attendance</h6>
	          <h4 class="panel-title pull-right"> Today Date :- {{date('d-m-Y')}} | Time: {{date('h:i A')}}</h4>
	    </div>
	        <!-- Card Body -->
	<div class="card-body">
		<div class="col-md-12 m-auto">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row mb-4">
					<div class="col-md-12">
						<a href="{{route('attendance.manage_student')}}" class="btn btn-sm {{Request()->segment(3) == 'student' ? 'btn-primary' : 'btn-info'}}">Student attendance</a>
						<a href="{{route('attendance.manage_teacher')}}" class="btn btn-sm {{Request()->segment(3) == 'teacher' ? 'btn-primary' : 'btn-default'}} ">Teachers attendance</a>
					</div>
				</div>

				<div class="row mt-4">
					<div class="col-md-2">
						<input type="text" readonly="" name="attendance_date" value="{{date('Y-m-d')}}" class="datepicker form-control">
					</div>
					<div class="col-md-2">
						<button class="btn btn-sm btn-primary search">Search</button>
					</div>
				</div>
				
				<br>
				<div class="row">
					<div class="col-md-12" id="tableBody" >
						{{-- @include('attendance.manage.staff_table') --}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
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
			var attendance_date = $('input[name="attendance_date"]').val();

			filter_staff(attendance_date)
		});

		function filter_staff(attendance_date){
			$.ajax({
					type:'post',
					url:'{{route('attendance.teacher_filter')}}',
					data:{attendance_date:attendance_date, "_token": "{{ csrf_token() }}"},
					success:function(res){
						 $('#tableBody').empty().html(res);
						// console.log(res);
					}
				});
		}
			$(document).on('click','#updateBtn',function(e){
			e.preventDefault();
			// console.log("adsasd")
			var presents = [];
			var i = 0;
			$('input[name="staff_id[]"]:checked').each(function() {
				presents[i++] = $(this).val();
			});
			var j =0;
			var totals = [];
			$('input[name="staff_id[]"]').each(function() {
				totals[j++] = $(this).val();
			});
			
			var attendance_date = $('input[name="attendance_date"]').val();
			
				$.ajax({
					type:'post',
					url:'{{route('attendance.teacher_update')}}',
					data:{presents:presents,totals:totals,attendance_date:attendance_date ,"_token": "{{ csrf_token() }}"},
					success:function(res){
						if(res == 'success'){
							$.notify('Teachers attendance updated successfully','success');
						}
						filter_staff(attendance_date);

					}
				});

			// }else{
			// 	alert('Select the students first')
			// }	
		});

		
	});
</script>
@endsection