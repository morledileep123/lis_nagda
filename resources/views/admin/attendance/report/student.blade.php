@extends('layouts.main')
@section('content')
<style type="text/css">
	.text-danger{
		font-size: 12px;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			@include('admin.attendance.header')
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Student Attendance <span class="pull-right">Today Date :- {{date('d-m-Y')}} | Time: {{date('h:i A')}}</span></h5>
				</div>
				<div class="card-body">
					<div class="row mb-5">
						<div class="col-md-12">
							<a href="{{route('attendance.student_report')}}" class="btn btn-sm {{Request()->url() == Route('attendance.student_report') ? 'btn-primary' : 'btn-secondary'}}">{{__('Student Report')}}</a>
							<a href="{{route('attendance.teacher_report')}}" class="btn btn-sm {{Request()->url() == Route('attendance.teacher_report') ? 'btn-primary' : 'btn-secondary'}}">{{__('Staff Report')}}</a>
						</div>
					</div>

					<form action="{{route('attendance.report_generate')}}" method="post">
					@csrf
						
						@include('admin.attendance.details')
						
						<div class="row mt-2">
							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-sm btn-primary">Search</button>
							</div>
						</div>
					</form>
				</div>
			</div> 
		</div>
	</div>
</div>
@include('layouts.common')
@endsection
