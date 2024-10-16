			
<div class="row mb-4 mt-4">
  <div class="col-md-3">
		<select class="form-control" name="std_class_id" id="std_class_id" autocomplete="off"> 
			<option value="">Select Class</option>
			@foreach($classes as $key=>$class)
				<option value="{{$class->id}}" {{old('std_class_id') == $class->id ? 'selected' : ''}}>{{$class->class_name}}</option>
			@endforeach
		</select>
		@error('std_class_id')
			<span class="text-danger" role="alert">
			<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>								
	<div class="col-md-3">
		<select class="form-control" name="batch_id" id="batch_id">
					 
		</select>
		@error('batch_id')
			<span class="text-danger" role="alert">
			<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
	
	<div class="col-md-3">
		<select class="form-control" name="section_id" id="section_id"> 
		
		</select>
		@error('section_id')
			<span class="text-danger" role="alert">
			<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
	<div class="col-md-3 col-xs-6 col-sm-6 form-group">
		<select class="form-control required" name="medium" id="medium_id" >
			
		</select>
		@error('medium')
			<span class="text-danger" role="alert">
			<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
	<div class="col-md-3">
		<input type="text" readonly="" name="attendance_date" value="{{old('attendance_date') ?? date('Y-m')}}" class="datepicker1 form-control">
		@error('attendance_date')
			<span class="text-danger" role="alert">
			<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
</div>
<script >
	$(document).ready(function(){
		$(function () {
			$('.datepicker1').datepicker( {
			    format: "yyyy-mm",
			    viewMode: "months", 
			    minViewMode: "months"
			});
		});
	});
</script>