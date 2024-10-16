@extends('layouts.main')
@section('title','Welcom: To Admin Panel')

@section('content')

 <main class="app-content">
	  <div class="app-title">
	    <div>
	      <h1><i class="fa fa-dashboard"></i>ACL</h1>
	    </div>
	    <ul class="app-breadcrumb breadcrumb">
	      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	      <li class="breadcrumb-item"><a href="#">ACL/{{request()->segment(count(request()->segments()))}}</a></li>
	    </ul>
	  </div>
	 <div class="container">
	 	 <div class="row">
		<div class="col-md-12 m-auto">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Create Permission</h5>
				</div>
				<div class="card-body">
					<form style="width:100%;" class="form-block" method="post" action="{{route('permissions.store')}}">
							{{csrf_field()}}
					<div class="row mb-5">
						<div class="col-md-8">
							<label  for="name">Permission Name</label>
							<input class="form-control" type="text" name="name" >
							@error('name')
								<span class="invalid-feedback d-block" role="alert">
								<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="col-md-2 pt-3">
							<input class="btn btn-sm btn-primary mt-3" type="submit" name="submit" value="Submit">
						</div>
					</div>
						</form>		
					<div class="row">
						@foreach($permissions as $permission)
						<div class="col-md-3 form-group"><span class="btn btn-sm btn-info">{{$permission->name}}</span></div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</main>			

@endsection