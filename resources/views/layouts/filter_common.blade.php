<div class="row">								
	<div class="col-md-3 form-group">
		<select class="form-control" name="std_class_id" autocomplete="off" id="std_class_id"> 
			<option value="">Select Class</option>
			@foreach($classes as $key=>$class)
				<option value="{{$class->id}}">{{$class->class_name}}</option>
			@endforeach
		</select>
	</div>
	<div class="col-md-3 form-group">
		<select class="form-control" name="batch_id" autocomplete="off" id="batch_id">
			 
		</select>
	</div>
	<div class="col-md-3 form-group">
		<select class="form-control" name="section_id" autocomplete="off" id="section_id"> 
			
		</select>
	</div>
	<div class="col-md-3 col-xs-6 col-sm-6 form-group">
		<select class="form-control required" name="medium" id="medium_id" required="required">
			
		</select>
	</div>	
	<div class="col-md-3 form-group">
		<button class="btn btn-sm btn-primary fa fa-search" id="btnFilter">Search</button>
		
	</div>
</div>