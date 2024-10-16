
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
						<h3 class="">Edit Team <a href="{{route('teachers.index')}}" class="btn btn-sm btn-primary pull-right">Back</a></h3>
					</div>
					<div class="card-body">
						<form action="{{route('teams.update',$team->id)}}" method="post">
							@csrf
							@method('PATCH')
							<input type="hidden" name="id" value="{{$team->id}}">
							<div class="row form-group">
								<div class="col-md-4">
									<label for="name">Team Name <span class="text-danger">*</span></label>
									<input type="text" class="form-control timepicker" name="name" value="{{old('name') ?? $team->name}}">  
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
										<option value="{{$team->class_name->id}}">{{$team->class_name->class_name}}</option>
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
									@foreach($users as $user)	
										<option value="{{$user->id}}" {{ $user->id ? 'selected=""':'selected=""' }} locked="locked" >{{$user->name}}</option>
											

									@endforeach	

										@foreach($allUsers as $allUser)
										{{-- @foreach ($user as $val) {{$val->id ? 'selected' : ''}} 
										@endforeach	 --}}

											<option value="{{$allUser->id}}" >
												{{$allUser->name}}</option>
											
										@endforeach										
									</select>
									@error('users')
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
	</section>
	<script >
		$(document).ready(function(){
			$('.select2').select2({
				tags: true,
				placeholder: 'Select an option',
				templateSelection : function (tag, container){
				
					var $option = $('.select2 option[value="'+tag.id+'"]');
				if ($option.attr('locked')){
				   $(container).addClass('locked-tag');
				   tag.locked = true; 
				}
					return tag.text;
				},
			})
			.on('select2:unselecting', function(e){
				
			   if ($(e.params.args.data.element).attr('locked')) {
			       e.preventDefault();
			    }
			 });
		});
	</script>
@endsection