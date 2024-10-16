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
	      <li class="breadcrumb-item"><a href="#">ACL</a></li>
	    </ul>
	  </div>
	  <div class="container">
	  	<div class="row">
		<div class="col-md-12 m-auto">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<form class="form-block" method="post" action="{{route('admin.store')}}" style="width: 100%;">
							{{csrf_field()}}
							<div class="form-group" style="margin-left: 20px;text-align: center;">	
								<label  for="name">Name</label>
								<input style="max-width: 20%;position: relative;left: 425px;" class="form-control" type="text" name="name">
								@error('name')
									<span class="invalid-feedback d-block" role="alert">
									<strong>{{ $message }}</strong>
									</span>
								@enderror
								<input  style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit" value="Submit">
							</div>
						</form>		
					</div>
				</div>
			</div>
		</div>
	</div>
	  </div>
</main>			

@endsection