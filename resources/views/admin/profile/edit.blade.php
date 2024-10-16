 @extends('layouts.main')
 @section('content')

<div class="container">
	<div class="col-lg-12">
	<div class="container">
	    <div class="app-title">
	     @if($message = Session::get('success'))
	            
	      <div class="alert alert-success">
	       {{ $message }}
	      </div>
	          @endif
	    </div>
	</div>
	<div class="container">
		<div class="row mt-2">
	      <!-- Default Card Example -->
	      <div class="card mb-4">
	        <div class="card-header">
	          <div class="panel-heading">
	      	
				<section class="content">
					<div class="row">
						<div class="col-md-12 m-auto ">
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="" style="margin-top: 10px;">Edit Profile 
										<a href="" class="btn btn-sm btn-info pull-right">Back</a>
									</h3>
								</div>
							
								<div class="box-body">
									<form action="{{route('profile.update',$getUserData->id)}}" method="post" role="form" enctype="multipart/form-data">
									@csrf
                                     @method('PUT')
									<div class="row ">
										<div class="col-md-6" style="margin-top:10px;"> 
											<label for="name">User Name  <span class="text-danger">*</span></label> 
											<input type="text" name="name" class="form-control" placeholder="name" value="{{$getUserData->name}}"  required="">
											@error('name')
			                                  <span class="text-danger" role="alert">
			                                  <strong>{{ $message }}</strong>
			                                </span>
			                                @enderror
										</div>
								       <div class="col-md-6" style="margin-top:10px;">
								            <label for="email">Email Address / username</label>
								            <input id="email" type="email" class="form-control  " value="{{$getUserData->email}}" disabled="">
							            	@error('email')
			                                  <span class="text-danger" role="alert">
			                                  <strong>{{ $message }}</strong>
			                                </span>
			                                @enderror
								        </div>
							          {{-- 	<div class="col-md-6" style="margin-top:10px;">
								            <label for="alternative_email">Alternate Email Address</label>
								             <input id="alternative_email" type="email" class="form-control" name="alternative_email" value="{{$getUserData->alternative_email}}" placeholder="Enter Alternate Email Address">
							               @error('alternative_email')
			                                  <span class="text-danger" role="alert">
			                                  <strong>{{ $message }}</strong>
			                                </span>
			                                @enderror
								        </div>
 --}}
										<div class="col-md-6" style="margin-top:10px;">
											<label for="dob"> Date of birth<span class="text-danger">*</span></label>
											<input type="text" value="{{date('Y-m-d',strtotime($getUserData->dob))}}" class="form-control datepicker" name="dob" required="" autocomplete="dob" autofocus="" id="datepicker" data-date-format="yyyy-mm-dd">
											@error('dob')
			                                  <span class="text-danger" role="alert">
			                                  <strong>{{ $message }}</strong>
			                                </span>
			                                @enderror
										</div>

										{{-- <div class="col-md-6" style="margin-top:10px;">
											<label for="created_at"> Registration Date<span class="text-danger">*</span></label>
											<input type="text" value="{{date('Y-m-d',strtotime($getUserData->created_at))}}" class="form-control datepicker" name="created_at" required="" autocomplete="created_at" autofocus="" id="datepicker" data-date-format="yyyy-mm-dd">
											@error('created_at')
			                                  <span class="text-danger" role="alert">
			                                  <strong>{{ $message }}</strong>
			                                </span>
			                                @enderror
										</div>
									</div> --}}
									
									<div class="row form-group">
										<div class="col-md-6" style="margin-top:10px;">
											<label for="mobile">Mobile Number <span class="text-danger">*</span>  </label>
											<div class="input-group">
											
							             	<input type="text" name="mobile" class="form-control " placeholder="Mobile Number" value="{{$getUserData->mobile_no}}"  autocomplete="mobile" autofocus="" >
											</div>
							             	@error('mobile')
				                                <span class="text-danger" role="alert">
				                                 <strong>{{ $message }}</strong>
				                                </span>
				                             @enderror
											             			
										</div>
										<div class="col-md-6" style="margin-top:10px;">
											<label for="alternative_mo_no">Alternate Number</label>
											<div class="input-group">
							             		<input type="text" name="alternative_mo_no" class="form-control" placeholder="Enter Alternate Number" value="{{$getUserData->alternative_mo_no}}"> 
											</div>
							             		@error('alternative_mo_no')
				                                  <span class="text-danger" role="alert">
				                                  <strong>{{ $message }}</strong>
				                                </span>
				                                @enderror
										</div>
									</div>
									{{-- <div class="row form-group">
										<div class="col-md-4" style="margin-top:10px;">
											<label for="city_id">City <span class="text-danger">*</span> </label>
											<select name="city_id" class="form-control " id="city">
												<option value="{{$getUserData->city ? $getUserData->city->id :''}}">{{$getUserData->city ? $getUserData->city->city_name :''}}</option>
												@foreach($city as $cities)
												
												<option value="{{$cities->id}}">{{$cities->city_name}}</option>
												@endforeach
											</select>
											@error('city_id')
			                                <span class="text-danger" role="alert">
			                                 <strong>{{ $message }}</strong>
			                                </span>
			                             @enderror
										</div>
										<div class="col-md-4" style="margin-top:10px;">
											<label for="state_code">State <span class="text-danger">*</span> </label>

											<select name="state_id" class="form-control" id="state">
												<option value="{{$getUserData->state ? $getUserData->state->id : ''}}">{{$getUserData->state ? $getUserData->state->state_name : ''}}</option>
												@foreach($state as $states)
												<option value="{{$states->id}}">{{$states->state_name}}</option>
												@endforeach
										</select>
										 @error('state_id')
			                                <span class="text-danger" role="alert">
			                                 <strong>{{ $message }}</strong>
			                                </span>
			                             @enderror
										</div>
										
										<div class="col-md-4" style="margin-top:10px;">
											<label for="country_id">Country <span class="text-danger">*</span> </label>
											<select name="country_id" class="form-control " id="city">
												<option value="{{$getUserData->country ? $getUserData->country->id : ''}}">{{$getUserData->country ? $getUserData->country->country_name : ''}}</option>
												@foreach($country as $countries)
												<option value="{{$countries->id}}">{{$countries->country_name}}</option>
												@endforeach
											</select>
											@error('country_id')
				                                <span class="text-danger" role="alert">
				                                 <strong>{{ $message }}</strong>
				                                </span>
			                             	@enderror
										</div>
										<div class="col-md-6" style="margin-top:10px;">
											<label for="zip_code">Zip Code <span class="text-danger">*</span>
											</label>
											<input type="text" name="zip_code" class="form-control " value="{{$getUserData->zip_code}} " placeholder="Enter Zip code">
											@error('zip_code')
				                                <span class="text-danger" role="alert">
				                                 <strong>{{ $message }}</strong>
				                                </span>
			                             	@enderror
										</div> --}}
										<div class="col-md-4" style="margin-top:10px;">
											<label for="profile_photo">Profile <span class="text-danger">*</span>
											</label>
											<input type="file" name="photo" id="photo" accept="image/*" class="form-control " value="{{$getUserData->photo}}">
											@error('photo')
				                                <span class="text-danger" role="alert">
				                                 <strong>{{ $message }}</strong>
				                                </span>
			                             	@enderror
										</div>
										<div class="row">
											<label>Profile Photo</label>
										<div class="col-md-12" style="margin-top:10px;"> 
											<img src="{{asset($getUserData->photo !=null ? 'storage/'.$getUserData->photo : 'storage/admin/student_demo.png')}}" style="width: 100px; height: 100px;">
										</div>
										</div>
										{{-- <div class="col-md-6" style="margin-top:10px;">
											<label for="mobile">Old Password <span class="text-danger">*</span>  </label>
											<div class="input-group">
							             	<input type="text" name="mobile" class="form-control " placeholder="Mobile Number" value=" " required="" autocomplete="mobile" autofocus=""> 
											</div>
											             			
										</div>
										<div class="col-md-6" style="margin-top:10px;">
											<label for="mobile">New Password <span class="text-danger">*</span>  </label>
											<div class="input-group">
							             	<input type="text" name="mobile" class="form-control " placeholder="Mobile Number" value=" " required="" autocomplete="mobile" autofocus=""> 
											</div>
											             			
										</div> --}}
									</div>
								</div>					
							</div>
							<div class="row">
								<div class="col-md-12" style="margin-top:10px;">
									<input type="hidden" name="user_flag" value="{{$getUserData->user_flag}}">
									<input type="submit" name="submit" class="btn btn-md btn-info" value="Update" id="submitdata">
								</div>							
							</div>
							</form>
						</div>		
					</div>
				</div>
			</div>
			</section>
	  </div>
    </div>
</div>
</div>

 @endsection
