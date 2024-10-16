@extends('layouts.main')
@section('content')

<div class="container">

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			@include('admin.students.header')
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">				
			<div class="card">
				<div class="card-header">
					<h4 class="card-title font-weight-bold">Export Student Batch Wise
						<a href="{{route('student_import_export')}}" class="btn btn-sm btn-primary pull-right">Back</a>
					</h4>
					
				</div>
				<div class="card-body">	
					<form method="post" action="{{route('batch_wise_export')}}">
						@csrf
						<div class="row">
							<div class="col-md-3">
								<select class="form-control" name="std_class_id" id="std_class_id">
									<option value="">Select Class</option>
										@foreach($classes as $class)
											<option value="{{$class->id}}">{{$class->class_name}}</option>
										@endforeach
									</select>
								@error('std_class_id')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>								
							<div class="col-md-3">
								<select class="form-control" name="batch_id" id="batch_id">
									 
								</select>
								@error('batch_id')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-3">
								<select class="form-control" name="section_id" id="section_id"> 
									
								</select>
								@error('section_id')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-3">
								<input type="submit" name="submit" value="Export" class="btn btn-sm btn-primary">
								{{-- <a href="{{route('student_detail.create')}}" class="btn btn-sm btn-success pull-right">Add Export</a> --}}
							</div>
						</div>
					</form>	

					<div class="row mt-5">
						<div class="col-md-8 p-4" style="
							color: #e74c3c;
							background-color: #fff5f4;
							border-color: #fff5f4;">
							{{-- <h5>Before upload read terms &amp; conditions:</h5>
							<ol>

								<li>Don't change sample file header.</li> 
								<li>Some field value format fixed. Date format is already fixed don't change</li>
								<li>Date of birth define should not equal to current year.</li> 
								<li>Please Don't insert sibling name in excel sheet. Insert sibling admission number with comma like that :- <b>502, 500 </b></li>
								
								<br>
								<li>Mandatory fields: 
									<ul>
										<li>Admission Number</li>									
										<li>First Name</li>									
										<li>Last Name</li>									
										<li>Date of Birth</li>									
										<li>Date of Admission</li>									
										<li>Medium</li>									
										<li>Student Gender</li>									
										<li>Father Name</li>									
										<li>Mother Name</li>									
										<li>Mobile Number</li>									
										<li>Cast Category</li>									
										<li>Address Line</li>									
										<li>City</li>									
										<li>State</li>									
										<li>Country</li>									
										<li>Status</li>									
									</ul>
								</li>
							</ol>
							
							Gender:
							<ul>
								@foreach(GENDER as $key => $gender)
								<li>{{$gender}} : - {{$key}}</li>
								@endforeach
								
							</ul> --}}
									
						</div>
					
						<div class="col-md-4">
							<div class="row">
								<div class="col-md-12 form-group">
									<div class="card border-left-success">
										<div class="card-header">
											Download Sample
										</div>								
										<div class="card-body text-center">
											<a href="{{route('download_student_sample')}}" class="btn btn-sm btn-success form-control"><i class="fa fa-download"></i> Download Sample</a>
										</div>
									</div>
								</div>

								<div class="col-md-12 form-group">
									<div class="card border-left-primary ">
										<div class="card-header">
											Export All Students
										</div>								
										<div class="card-body text-center">
											<a href="{{route('export_all_student')}}" class="btn btn-sm btn-primary form-control"><i class="fa fa-file-excel-o"></i> Export</a>
										</div>
									</div>
								</div>
								<div class="col-md-12 form-group">
									<div class="card border-left-info ">
										<div class="card-header">
											Export Student Batch And Section Wise
										</div>								
										<div class="card-body text-center">
											<a href="{{route('export_student_class_section_batch_wise')}}" class="btn btn-sm btn-info form-control"><i class="fa fa-file-excel-o"></i> Export</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>		
				</div>
			</div>
		</div>
	</div>

</div>

@include('layouts.common')

@endsection
