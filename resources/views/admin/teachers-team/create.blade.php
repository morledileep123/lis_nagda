
@extends('layouts.main')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12">
			@include('admin.teachers.header')
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 ">
				<div class="card">
					<div class="card-header">
					<h3 class="">edit Team <a href="{{route('teachers.index')}}" class="btn btn-sm btn-primary pull-right">Back</a></h3>
				</div>
				<div class="card-body">
					<form action="{{route('teams.store')}}" method="post">
						@csrf
						<div class="row form-group">
							<div class="col-md-4">
								<label for="name">Team Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control timepicker" name="name" value="{{old('name')}}">  
								@error('name')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                                @if($message = Session::get('error'))
									<span class="text-danger">
										 <strong>{{ $message }}</strong>
									</span>
								@endif    
							</div>	
							<div class="col-md-4">
								<label for="class_id">Class <span class="text-danger">*</span></label>
								<select name=class_id class="form-control">
									<option value="">Select Class</option>
									@foreach($class as $classes)
										<option value="{{$classes->id}}">{{$classes->class_name}}</option>
									@endforeach
								</select>
								@error('class_id')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                                @if($message = Session::get('error'))
									<span class="text-danger">
										 <strong>{{ $message }}</strong>
									</span>
								@endif    
							</div>	
							<div class="col-md-4">
								<label for="users_id">members <span class="text-danger">*</span></label>
								<select name="users_id[]" class="form-control select2" multiple="multiple" >
									<option value="{{Auth::user()->id}}" {{ (collect(old('team_id'))->contains(Auth::user()->id)) ? 'selected':'selected' }} locked="locked">{{Auth::user()->name}}</option>
									@foreach($users as $user)
										<option value="{{$user->id}}">{{$user->name}}</option>
									@endforeach
								</select>
								@error('users_id')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
							</div>
						</div>									
						<div class="row ">
							<div class="col-md-12 ">
								<input type="submit" value="Submit" class="btn btn-sm btn-primary">
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
	$('.select2').select2({
		tags: true,
		placeholder: 'Select an option',
		templateSelection : function (tag, container){
				// here we are finding option element of tag and
		// if it has property 'locked' we will add class 'locked-tag' 
		// to be able to style element in select
			var $option = $('.select2 option[value="'+tag.id+'"]');
		if ($option.attr('locked')){
		   $(container).addClass('locked-tag');
		   tag.locked = true; 
		}
			return tag.text;
		},
	})
	.on('select2:unselecting', function(e){
			// before removing tag we check option element of tag and 
	  // if it has property 'locked' we will create error to prevent all select2 functionality
	   if ($(e.params.args.data.element).attr('locked')) {
	       e.preventDefault();
	    }
	 });
});
	</script>
@endsection
