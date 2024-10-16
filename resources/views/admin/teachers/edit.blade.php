
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
					<h4 class="card-title">Edit Teacher			
						<a href="{{ Route('teachers.index') }}" class="btn btn-sm btn-primary pull-right">Back</a>
					</h4>
				</div>
				<div class="card-body">	
					<form action="{{route('teachers.update',$teacher->id)}}" method="post">
						@csrf
						@method('PUT')
						<div class="row form-group">
							<div class="col-md-6">
								<label for="name">Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="name" value="{{old('name') ?? $teacher->name}}" id="name" >  
								@error('name')
		                            <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                          </span>
		                         @enderror     
							</div>	
							<div class="col-md-6">
								<label for="email">Email Address <span class="text-danger">*</span></label>
								<input type="email" name="email" class="form-control" value="{{old('email') ?? $teacher->email}}">
								@error('email')
		                            <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                          </span>
		                         @enderror 
							</div>
						</div>	
						<div class="row form-group">
							<div class="col-md-6">
								<label for="mobile_no">Mobile Number <span class="text-danger">*</span></label>
								<input type="text" class="form-control \" name="mobile_no" value="{{old('mobile_no') ?? $teacher->mobile}}" oninput ="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off">   
								 @error('mobile_no')
		                            <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                          </span>
		                         @enderror     
							</div>
							<div class="col-md-6 form-group">
								<label for="username">Username</label>
								<input type="text" name="username" class="form-control" id="username" value="{{old('username') ?? $teacher->username}}" readonly="readonly" >
							</div>	
							{{-- <div class="col-md-6">
								<label for="password">Password <span class="text-danger">*</span></label>
								<input type="password" class="form-control" name="password" value="{{old('password')}}">
								@error('password')
		                            <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                          </span>
		                         @enderror
							</div> --}}
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
<script>
	$(document).ready(function(){
		$('#name').on('blur',function(e){
			e.preventDefault();
			var name = $(this).val();
			var random_no = Math.floor((Math.random() * 100) + 1);
			var username = name.replace(' ','');
			$('#username').val(username.toLowerCase()+random_no);
			// console.log($(this).val());

		})
	})
</script>
@endsection
