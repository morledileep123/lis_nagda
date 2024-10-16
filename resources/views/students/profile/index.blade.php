 @extends('layouts.main')
 @section('content')

<div class="container">
	<div class="col-lg-12">

	<div class="container">
		<div class="row mt-2">
	    <div class="col-lg-12">

	      <!-- Default Card Example -->
	      <div class="card mb-4">
	        <div class="card-header">
	          <div class="panel-heading">
	      	
				<section class="content">
				<div class="row">
					<div class="col-sm-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="" style="margin-top: 10px;">Profile <a href="{{route('your-profile.edit',$user->id)}}" class="btn btn-sm btn-info pull-right">Edit Profile</a>
										
							</h3>
							</div>
					 			
							<div class="box-body ">
										
								<div class="row">
									<div class="col-md-4 col-sm-4 col-xl-4 text-center " style="margin-top: 20px">
									<img src="{{asset($user->photo !=null ? 'storage/'.$user->photo : 'storage/admin/student_demo.png')}}" style="width: 200px; height: 175px;" class="img-circle " s>
									</div>
									<div class="col-md-8 col-sm-8 col-xl-8" style="margin-top: 20px">
										<div class="row">
											<div class="col-md-6">

												<h5><b>Full Name: </b>{{$user->f_name}} {{$user->m_name}} {{$user->l_name}}</h5>
												<h5><b>Email Address:</b> {{$user->email}}</h5>
												<h5><b>Registration Date:</b>{{date('Y-m-d',strtotime($user->created_at))}} </h5>
													<h5><b>Date of Birth:</b>{{$user->dob}}</h5>
											</div>
											<div class="col-md-6">
												<h5><b>Mobile Number:</b>{{$user->s_mobile}} </h5>
											</div>
										</div>
										

									</div>
								</div>
								
							</div>
						</div>
					</div>
					<div class="modal fade" id="verified_account" tabindex="-1" role="dialog" aria-labelledby="verified_account" aria-hidden="true">
			</div>
		</div>
	</section>
  </div>
</div>
</div>
	    
	        
</div>
</div>
 @endsection
