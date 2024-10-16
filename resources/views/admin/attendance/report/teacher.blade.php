@extends('layouts.main')
@section('content')
<div class="container">
	<div class="row mb-4">
		<div class="col-md-12">
			@include('admin.attendance.header')
		</div>
	</div>
	<div class="row mb-4">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Teachers Attendance <span class="pull-right">Today Date :- {{date('d-m-Y')}} | Time: {{date('h:i A')}}</span></h5>
				</div>
				<div class="card-body">
					<div class="row mb-5">
						<div class="col-md-12">
							<a href="{{route('attendance.student_report')}}" class="btn btn-sm {{Request()->url() == Route('attendance.student_report') ? 'btn-primary' : 'btn-secondary'}}">{{__('Student Report')}}</a>
							<a href="{{route('attendance.teacher_report')}}" class="btn btn-sm {{Request()->url() == Route('attendance.teacher_report') ? 'btn-primary' : 'btn-secondary'}}">{{__('Staff Report')}}</a>
						</div>
					</div>

					<form action="{{route('attendance.teacher_report_generate')}}" method="post">
					@csrf
						<div class="row mt-4">
							<div class="col-md-2">
								<input type="text" readonly="" name="attendance_date" value="{{date('Y-m')}}" class="datepicker form-control">
								@error('attendance_date')
									<span class="invalid-feedback text-danger" role="alert">
									<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>				
							<div class="col-md-2">
								<button class="btn btn-sm btn-primary search">Search</button>
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
		$(function () {
			$('.datepicker').datepicker( {
			    format: "yyyy-mm",
			    viewMode: "months", 
			    minViewMode: "months"
			});
		});
	});
</script>
@endsection