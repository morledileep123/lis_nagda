@extends('layouts.main')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			@include('admin.manage.header')
		</div>
	</div>
	<div class="row mb-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Assign Section
						<a href="{{route('subject.index')}}" class="btn btn-sm btn-success pull-right">Back</a>
					</h5>
				</div>
				<div class="card-body">
					<form action="{{route('subject_assign_add')}}" method="post">
						@csrf
						<div class="row">
							<div class="col-md-3 col-xs-6 col-sm-6 form-group">
								<label>Class</label><span class="text-danger">*</span>
								<select class="form-control" name="std_class_id" id="std_class_id" autocomplete="off"> 
									<option value="">Select Class</option>
									@foreach($classes as $class)
										<option value="{{$class->id}}" {{old('std_class_id') == $class->id ? 'selected' : ''}}>{{$class->class_name}}</option>
									@endforeach
								</select>
								@error('std_class_id')
									<span class="text-danger">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>	
							<div class="col-md-3 col-xs-6 col-sm-6 form-group">
								<label>Batch</label>
								<span class="text-danger">*</span>
								<select class="form-control" name="batch_id" id="batch_id">

								</select>
								@error('batch_id')
		                            <span class="text-danger">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
							</div>	
							<div class="col-md-3 col-xs-6 col-sm-6 form-group">
								<label>Section</label>
								<span class="text-danger">*</span>
								<select class="form-control" name="section_id" id="section_id"><span class="text-danger">*</span> 
										
								</select>
								@error('section_id')
		                            <span class="text-danger">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
							</div>	
							 <div class="col-md-3 col-xs-6 col-sm-6 form-group">
							 	<label class="required">Medium</label>
		                        <select class="form-control required" name="medium" id="medium_id" required="required">
		                           
		                        </select>
		                        @error('medium')
		                           <span class="text-danger error">
		                              <strong>{{$message}}</strong>
		                           </span>
		                        @enderror
		                     </div> 			
						</div>
						<div class="row">
							<div class="col-md-6 form-group">
								<label>Mendatory Subjects </label>
								<span class="text-danger">*</span>
								  <select name="mendatory_subject_id[]" class="form-control select2" multiple="multiple" autocomplete="off">
									@foreach($subjects as $subject)
										<option value="{{$subject->id}}" {{(collect(old('mendatory_subject_id'))->contains($subject->id) ? 'selected' : '')}}>{{$subject->subject_name}}</option>
									@endforeach
								</select>
								@error('mendatory_subject_id')
		                            <span class="text-danger">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
							</div>
							{{-- <div class="col-md-6">
								<label>Already Assigned Subjects </label>
								<select name="optional_subject_id[]" class="form-control select2" multiple="multiple" readonly >
								@foreach($subject as $subjects)
									<option value="{{$subjects->id}}">{{$subjects->subject_name}}</option>
								@endforeach
								</select>
								@error('optional_subject_id')
									<span class="text-danger">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div> --}}
							<div class="col-md-12 form-group">
								<button type="submit" class="btn btn-sm btn-success">Submit</button>
							</div>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row mb-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Assign Subject List</h5>
				</div>
				<div class="card-body">
					<table  class="table table-striped table-bordered myTable hide_table">
						<thead>
							<tr>
								<td>#</td>
								<td>Class</td>
								<td>Batch</td>
								<td>Section</td>
								<td>Medium</td>
								<td>Assign Subject</td>           
							</tr>
						</thead>
						<tbody>
							@php $count = 1; @endphp
							@foreach($assignSubjects as $assignSubject)
								<tr>
									<td>{{$count++}}</td>
									<td>{{$assignSubject->class->class_name}}</td>
									<td>{{$assignSubject->batch->batch_name}}</td>
									<td>{{$assignSubject->section->section_name}}</td>
									<td>{{Arr::get(MEDIUM,$assignSubject->medium)}}</td>
									<td>	
										@php $subjects = '' ; @endphp
					                    @foreach($assignSubject->assign_subjectId as $assignSubjectId)

					                        @if($assignSubjectId->subject !=null)
					                          @php  $subjects .= $assignSubjectId->subject->subject_name.', ' ; @endphp
					                        @endif
					                    @endforeach

					                    <span class="value">{{substr($subjects,0,strlen($subjects)-2)}}
					                     </span>									
									</td>
								</tr>
							@endforeach           
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@include('layouts.common')
@endsection
