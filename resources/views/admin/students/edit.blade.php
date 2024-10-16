@extends('layouts.main')
@section('content')

<style type="text/css">
	.text-danger{
		font-size: 12px;
	}
</style>

<div class="container">

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			@include('admin.students.header')
		</div>
	</div>
	<div class="row mb-4">
		<div class="col-md-12 col-sm-12 col-lg-12">
			 <div class="card">
		        <div class="card-header">
	         		<h6 class="card-title">Edit Student <a href="{{route('student_detail.index')}}" class="btn btn-sm btn-primary pull-right fa fa-arrow-left"> Back</a></h6>
	          	</div>
	          	<div class="card-body">
	          		<div class="row ">
	          			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
	 						<div class="tabs">
	 							<ul class="nav nav-tabs tab-links">
									<li class="nav-item active">
								    	<a class="nav-link active" href="#basic_details">Basic Details</a>
									</li>
									<li class="nav-item"> 
								    	<a class="nav-link" href="#academic_dtl" >Academic Details</a>
									</li>
									<li class="nav-item"> 
								    	<a class="nav-link" href="#guardian_info" >Guardian Info</a>
									</li>
									<li class="nav-item"> 
								    	<a class="nav-link" href="#student_address" >Student Address</a>
									</li>
									<li class="nav-item"> 
								    	<a class="nav-link" href="#bank_details">Bank Details</a>
									</li>
									<li class="nav-item"> 
								    	<a class="nav-link" href="#student_document" >Student Document</a>
									</li>
								</ul>
	          		
		          				<form action="{{route('student_detail.update',$student->id)}}" method="post" enctype="multipart/form-data" autocomplete="off">
		          					@csrf
		          					@method('patch')
		          					<div class="tab-content mt-4 p-2" style="font-size: 15px !important; background-color: whitesmoke !important;" >
										<div class="tab-pane tab  active" id="basic_details" >
											<section>
							        	<h3 class="mb-3">Basic Details</h3>
							        	<hr/>
								        <div class="row form-group">
								        	<div class="col-md-2">
								        			<label class="font-weight-bold">Student Photo</label>
								        			<img src="{{asset($student->photo !=null ? 'storage/'.$student->photo : 'img/student_demo.png')}}" style="width: 100px; height: 100px;">
								        			<input type="file" name="s_photo" id="s_photo" accept="image/*" value="{{old('s_photo')}}" class="mt-5">
															@error('s_photo')
																<span class="text-danger">
																	<strong>{{$message}}</strong>
																</span>
															@enderror

								        	</div>
								        	<div class="col-md-10">
								        			<div class="row form-group">
																	<div class="col-md-4 col-xs-6 col-sm-6 form-group">
																		<label for="std_class" class="required">Class</label>
																		<select class="form-control required" name="std_class_id" id="std_class_id" required="required">
																			<option value="">Select Class</option>
																			@foreach($classes as $class)
																				<option value="{{$class->id}}" {{ ($student->std_class_id ?? old('std_class_id')) == $class->id ? 'selected' : ''}}>{{$class->class_name}}</option>
																			@endforeach
																		</select>
																		@error('std_class_id')
																			<span class="text-danger">
																				<strong>{{$message}}</strong>
																			</span>
																		@enderror
																	</div>
																	<div class="col-md-4 col-xs-6 col-sm-6 form-group">
																		<label class="required"> Batch</label>
																		<select class="form-control required" name="batch_id" required="required" id="batch_id">
																			
																		</select>
																		@error('batch_id')
																			<span class="text-danger">
																				<strong>{{$message}}</strong>
																			</span>
																		@enderror
																	</div>
																	<div class="col-md-4 col-xs-6 col-sm-6 form-group">
																		<label class="required">Section</label>
																		<select class="form-control required" name="section_id" id="section_id" required="required">
																			
																		</select>
																		@error('section_id')
																			<span class="text-danger">
																				<strong>{{$message}}</strong>
																			</span>
																		@enderror
																	</div>
																	<div class="col-md-3 col-xs-6 col-sm-6 form-group">
																		<label class="required">Select Medium</label>
																		<select class="form-control required" name="medium" id="medium_id" required="medium" autocomplete="off">
																			
																		</select>
																		@error('medium')
																			<span class="text-danger">
																				<strong>{{$message}}</strong>
																			</span>
																		@enderror
																	</div>
																	<div class="col-md-4 col-xs-6 col-sm-6 form-group">
																		<label class="required">Admision No</label>
																		<input type="text" name="admision_no" class="form-control" value="{{ $student->admision_no ?? old('admision_no')}}" required="required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{old('s_mobile')}}">
																		@error('admision_no')
																			<span class="text-danger">
																				<strong>{{$message}}</strong>
																			</span>
																		@enderror
																	</div>	
																	<div class="col-md-4 col-xs-6 col-sm-6 form-group">
																			<label class="required">Admission Date</label>
																			<input type="text" name="addm_date" class="form-control datepicker required addm_date"  data-date-format="yyyy-mm-dd"  value="{{$student->addm_date ?? old('addm_date')}}" placeholder="{{date('Y-m-d')}}" required="required">
																			@error('addm_date')
																				<span class="text-danger">
																					<strong>{{$message}}</strong>
																				</span>
																			@enderror
																		</div>	
																</div>
								        	</div>

												</div>
												
												<div class="row form-group">														
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label class="">Class Roll Number</label>
														<input type="text" name="roll_no" value="{{$student->roll_no ?? old('roll_no')}}" class="form-control" >
														@error('roll_no')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													
																								
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label class="required">First Name</label>
														<input type="text" name="f_name" id="f_name" value="{{$student->f_name ?? old('f_name')}}" class="form-control required" required="required">
														@error('f_name')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>								
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Middle Name</label>
														<input type="text" name="m_name" id="m_name" value="{{$student->m_name ?? old('m_name')}}" class="form-control">
														@error('m_name')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>									
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label class="required">Last Name</label>
														<input type="text" name="l_name" id="l_name" value="{{$student->l_name ?? old('l_name')}}" class="form-control required" required="required">
														@error('l_name')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6 has-success">
														<label class="required">Student Status</label>
														<select class="form-control required status" name="status" aria-invalid="false" required="required">
															@foreach(STUDENTSTATUS as $key => $status) 
																<option value="{{$key}}" {{($student->status ?? old('status') )== $key ? 'selected' : ''}}>{{$status}}</option>
															@endforeach
														</select>
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6 passout_date" style="display: none;">
														<label class="required">Passout Date</label>
														<input type="text" name="passout_date" class="form-control datepicker " readonly="true" data-date-format="yyyy-mm-dd" value="{{$student->passout_date ?? old('passout_date')}}"  placeholder="{{date('Y-m-d')}}" required="required">
													</div>

													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label class="required">Mobile Number</label>
														<input type="text" name="s_mobile" class="form-control required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{$student->s_mobile ?? old('s_mobile')}}" required="required"> 
														@error('s_mobile')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label class="required">Date of Birth</label>
														<input type="text" name="dob" class="form-control datepicker required dob" data-date-format="yyyy-mm-dd" placeholder="{{date('Y-m-d')}}" value="{{$student->dob ?? old('dob')}}" required="required">
														@error('dob')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label class="">Birth Place</label>
														<input type="text" name="birth_place" class="form-control birth_place required" placeholder="" id="birth_place" value="{{$student->birth_place ?? old('birth_place')}}">
														@error('birth_place')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Email Address</label>
														<input type="text" name="email" class="form-control required" value="{{$student->email ?? old('email')}}"> 
														
														@error('email')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
												{{-- </div>	
												<div class="row form-group"> --}}
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label class="required">Gender</label>
														<select name="gender" class="form-control required" required="required">
															<option value="">Select Gender</option>
																@foreach(GENDER as $key =>$value)
																	<option value="{{$key}}" {{($student->gender ?? old('gender')) == $key ? 'selected' : ''}}>{{$value}}</option>
																@endforeach
														</select>
														@error('gender')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label class="required">Cast Category</label>
														<select class="form-control required" name="reservation_class_id" required="required">
															<option value="">Select Category</option>
															@foreach(CASTCATEGORY as $key => $value)
																<option value="{{$key}}" {{($student->reservation_class_id ?? old('reservation_class_id')) == $key ? 'selected' : ''}}>{{$value}}</option>
															@endforeach
														</select>
														@error('reservation_class_id')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
											<div class="col-md-3 col-xs-6 col-sm-6 form-group "><label>Cast Name</label>
			        							<input type="text" name="cast" class="form-control" id="cast" value="{{old('cast') ?? $student->cast}}" >
			        						</div>
			        						<div class="col-md-3 col-xs-6 col-sm-6 form-group "><label>Cast Certificate No.</label>
			        							<input type="text" name="cast_cert_no" class="form-control" id="cast_cert_no" value="{{old('cast_cert_no') ?? $student->cast_cert_no}}" >
			        						</div>

													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Religion</label>
														<select class="form-control" name="religion_id">
															<option value="">Select Religion</option>
															@foreach(RELIGION as $key => $value)
																	<option value="{{$key}}" {{($student->religion_id ?? old('religion_id') )== $key ? 'selected' : ''}}>{{$value}}</option>
															@endforeach
														</select>
														@error('religion_id')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
												</div>	
												<div class="row form-group">
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Blood Group</label>
														<select class="form-control" name="blood_id">
															<option value="">Select Blood Group</option>
															@foreach(BLOODGROUP as $key => $value)
																	<option value="{{$key}}" {{($student->blood_id ?? old('blood_id')) == $key ? 'selected' : ''}}>{{$value}}</option>
															@endforeach
														</select>
														@error('blood_id')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Specific Ailment</label>
														<input type="text" name="spec_ailment" class="form-control" placeholder="Mole on nose. etc" value="{{$student->spec_ailment ?? old('spec_ailment')}}">
														@error('spec_ailment')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Age</label>
														<input type="text" value="{{$student->age ?? old('age')}}" name="age" class="form-control age" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
														@error('age')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Nationality</label>
														<select name="nationality_id" class="form-control">
															<option value="">Select Nationality</option>
															@foreach($studentNationalites as $key =>$studentNationalite)
																<option value="{{$studentNationalite->id}}" {{($student->nationality_id ?? old('nationality_id')) == $studentNationalite->id ? 'selected' : ''}}>{{$studentNationalite->nationality_name}}</option>
															@endforeach
														</select>
														@error('nationality_name')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
												</div>
												<div class="row form-group" >
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Taluka(Tehsil)</label>
														<input type="text" name="taluka" value="{{$student->taluka ?? old('taluka')}}" class="form-control">
														@error('taluka')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Mother tongue</label>
														<select name="language_id" class="form-control">
														<option value="">Select Mother Tongue</option>
														 	@foreach($studentMothertongues as $studentMothertongue)
														 	<option value="{{$studentMothertongue->id}}" {{($student->language_id ?? old('language_id')) == $studentMothertongue->id ? 'selected' : '' }}>{{$studentMothertongue->mothetongue_name}}</option>@endforeach >
														</select>
														@error('language_id')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Student SSMID</label>
														<input type="text" name="s_ssmid" value="{{$student->s_ssmid ?? old('s_ssmid')}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
														@error('s_ssmid')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Family SSMID</label>
														<input type="text" name="f_ssmid" value="{{$student->f_ssmid ?? old('f_ssmid')}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
														@error('f_ssmid')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
												</div>
												<div class="form-group row">
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Aadhar Card Number</label>
														<input type="text" name="aadhar_card" value="{{$student->aadhar_card ?? old('aadhar_card')}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
														@error('f_ssmid')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-xs-6 col-sm-6 form-group ">
														<label>Family Income</label>
			        							<input type="text" name="family_income" class="form-control" id="family_income" value="{{old('family_income') ?? $student->family_income}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
			        						</div>

					        				<div class="col-md-6 col-sm-6 form-group col-xs-6">
														<label>Siblings {{-- <span class="text-muted">(If student have sibling please select number wise)</span> --}}</label>
														<select name="siblings[]" class="form-control select2-multiple" multiple>
														<option value="" >Select Siblings</option>
															@foreach($students as $studentData)
																<option value="{{$studentData->admision_no}}"  {{in_array($studentData->admision_no,$studentSiblings->toArray()) ? 'selected' : ''}} {{(collect(old('siblings'))->contains($studentData->admision_no) ? 'selected' : '')}}>{{$studentData->admision_no .' | '. student_name($studentData) }}</option>
															@endforeach
															 	
														</select>														
													</div>
												
												 </div>



												{{-- <div class="row" style="background: #4f5775;color: #fff; padding: 10px;border-radius: 10px;margin: 20px;">
							                           <div class="col-md-3 form-group">
							                                <label for="phone1">
							                               Student User Name
							                               </label>
							                               <input class="form-control required" id="username" value="{{old('username')}}" name="username" type="text" >
							                               <spam id="usererror" style="color: red; display: none;"></spam>
							                           </div>
							                           
							                            <div class="col-md-3 form-group">
							                                <label for="password">
							                                Password
							                               </label>
							                               <input class="form-control required"   id="password" name="password" type="password">
							                           </div>
												</div> --}}
												<div class="row form-group">
													<div class="col-md-3">
														<label for="rte" class="required"> Staff Ward </label>
														<select class="form-control" name="staff_ward" id="staff_ward" required="required">
														    <option value="">Select</option>
														    <option value="1" {{($student->staff_ward ?? old('staff_ward') ) == '1' ? 'selected' : ''}}>Yes</option>
														    <option value="0"  {{($student->staff_ward ?? old('staff_ward') ) == '0' ? 'selected' : ''}}>No</option>
														</select>
													</div>
													<div class="col-md-3" id="staff_list" style="display: none">
														<label for="rte" class="required">Select Staff </label>
														<select class="form-control" name="staff_id" id="staff_id" >
														    <option value="">Select Staff List</option>
															@foreach(get_teachers() as $teacher)

														    <option value="{{$teacher->id}}" {{(old('staff_id') ?? $student->staff_id) == $teacher->id ? 'selected' : '' }}>{{$teacher->name}}</option>
														    @endforeach
														   
														</select>
													</div>
													<div class="col-md-3">
														<label for="rte"> CBSE  Registration no </label>
														<input class="form-control" id="CBSC_reg" name="cbsc_reg" type="text" value="{{$student->cbsc_reg ?? old('cbsc_reg')}}">	           
													</div>		

													<div class="col-md-3">
														<label for="bus_fee_allocate">Bus Fee Allocate</label>
														<select class="form-control" name="bus_fee_allocate" id="bus_fee_allocate" required="required">
														    <option value="0" {{old('bus_fee_allocate') == '0' ? 'selected' : ''}}>No</option>
														    <option value="1" {{(($student->bus_fee_id !=null) ?? old('bus_fee_allocate') )  ? 'selected' :''}}>Yes</option>
														</select>
													           
													</div>	
	
													<div class="col-md-3" style="display: none" id="busFeeDIV">
														<label for="bus_fee_id" class="required"> Bus Fee Structure</label>
														<select class="form-control" name="bus_fee_id" id="bus_fee_id" >
														    <!-- <option value="" >Select Bus Fee Struture</option>
															@foreach($bus_fees as $bus_fee)
																<option value="{{$bus_fee->bus_fee_id}}" {{$bus_fee->bus_fee_id == (old('bus_fee_id') ?? $student->bus_fee_id) ? 'selected' : ''}}>{{$bus_fee->bus_fee_title}}</option>
														    @endforeach
 -->
														 	@foreach($bus_fees as $student_fees)
														 		<option value="{{$student_fees->bus_fee_id}}" {{($student->bus_fee_id ?? old('bus_fee_id')) == $student_fees->bus_fee_id ? 'selected' : '' }}>{{$student_fees->bus_fee_title}}</option>
														    @endforeach

														</select>
													</div>
													<div class="col-md-3" style="display: none" id="busFeeAmount">
														<label for="bus_fee_amount" class="required"> Bus Fee Amout</label>
														<select class="form-control" name="bus_fee_amount" id="bus_fee_amount" >
														    <option value="" >Select Bus Fee Amount</option>
															<!-- @foreach($bus_fees as $bus_fee)
																<option value="{{$bus_fee->bus_fee_amount}}" {{$bus_fee->bus_fee_amount == (old('bus_fee_amount') ?? $student->bus_fee_amount) ? 'selected' : ''}}>{{$bus_fee->bus_fee_amount}}</option>
														    @endforeach -->
														    @foreach($bus_fees as $student_fees)
														 		<option value="{{$student_fees->bus_fee_id}}" {{($student->bus_fee_id ?? old('bus_fee_id')) == $student_fees->bus_fee_id ? 'selected' : '' }}>{{$student_fees->bus_fee_amount}}</option>
														    @endforeach
														</select>
													</div>
														                                
												</div>
									        </section>
											<ul class="tab-links nav nav-tabs pull-right mt-3">
												<li class="nav-item">
													<a href="#next_tab2" class="nav-link btn btn-sm bg-success text-white nextButton">Next</a>
												</li>
											</ul>


									        {{-- <div class="input-group mb-3 group-end">
										      <a class="btn btn-success nextButton" href="#next_Basic_details">Next</a>
										    </div> --}}
			          					</div>
			          				<div class="tab-pane tab" id="academic_dtl">
									    	<h3 class="mb-3">Academic Details</h3>
									    	<hr>
										   <section>									        	
								        		<div class="form-group row relation">
								        			<div class="col-sm-4 col-md-4 col-xs-6 ">
								        				<label >Previous School (last studied)</label>
								        				<input type="text" name="prev_school" class="form-control " id="prev_school" value="{{$student->prev_school}}">
								        			</div>
								        			<div class="col-md-4 col-sm-6 form-group col-xs-6 ">
								        				<label class=""> Year (left from Previous School)</label>
							        					<input type="text" name="year_of_prev_school" class="form-control" id="year_of_prev_school" value="{{ $student->year_of_prev_school ?? old('year_of_prev_school')}}">
						        					</div>
					        						<div class="col-md-4 col-sm-6 form-group col-xs-6 ">
							        					<label class="">Address 
							        					</label>
							        					<textarea class="form-control" name="address" id="acadmic_address">{{ $student->prev_school_address ?? old('acadmic_address')}}</textarea>
							        				</div>								        					
						        				</div>
						        				<div class="row form-group">
						        					<div class="col-md-4 col-xs-6 col-sm-6 form-group ">
						        						<label class="">City</label>
						        						<input type="text" class="form-control" name="acadmic_city" value="{{ $student->acadmic_city ?? old('acadmic_city')}}">

						        					</div>
						        					<div class="col-md-4 col-xs-6 col-sm-6 form-group ">
						        						<label class="">State</label>
						        						<input type="text" class="form-control" name="acadmic_state" value="{{ ($student->acadmic_state ?? old('acadmic_state') ?? 'Madhya Pradesh')}}">
						        						
						        					</div>
						        					<div class="col-md-4 col-xs-6 col-sm-6 form-group ">
						        						<label class="">Pin Code</label>
						        						<input type="text" name="acadmic_pin" class="form-control" id="acadmic_pin" value="{{ $student->acadmic_pin ?? old('acadmic_pin')}}">
					        						</div>
					        					</div>
					        					<div class="form-group row">
					        						<div class="col-md-4 col-xs-6 col-sm-6 form-group ">
					        							<label>Country</label>
					        							<input type="text" class="form-control" name="acadmic_country" value="{{ ($student->acadmic_country ?? old('acadmic_country') ?? 'India')}}">					
					        						</div>
					        						<div class="col-md-4 col-xs-6 col-sm-6 form-group "><label>Cast</label>
					        							<input type="text" name="acadmic_cast" class="form-control" id="acadmic_cast" value="{{$student->acadmic_cast ?? old('acadmic_cast')}}">
					        						</div>
					        						<div class="col-md-4 col-xs-6 col-sm-6 form-group ">
					        							<label> Attendance Reg. No (In device) </label>
					        							<input type="text" name="acadmic_attendance_reg_no" class="form-control" id="acadmic_attendance_reg_no" value="{{ $student->acadmic_attendance_reg_no ?? old('acadmic_attendance_reg_no')}}">
					        						</div>
					        						<div class="col-md-4 col-sm-6 form-group col-xs-6 ">
							        					<label class="">Remark </label>
							        					<textarea class="form-control" name="acadmic_remark" id="acadmic_remark">{{ $student->acadmic_remark ?? old('acadmic_remark')}}</textarea>
							        				</div>
					        							<hr>
				        						</div>
								    		</section>	
								    		<ul class="tab-links nav nav-tabs pull-right mt-3">
												<li class="nav-item">
													<a href="#back_tab1" class="nav-link btn btn-sm bg-primary text-white  prevButton">Prev</a>
												</li>
												<li class="nav-item">
													<a href="#next_tab2" class="nav-link btn btn-sm bg-success  text-white nextButton">Next</a>
												</li>
											</ul>									    	
									   </div>	   
									   <div class="tab-pane tab" id="guardian_info">
										    <h3 class="mb-3">Guardian Info</h3>
										    <hr>
										    <section>
										      <div class="row" >
										        	<div class="col-md-12 col-xl-12 col-sm-12" style="border:1px solid #eee9e9; " id="guard_info" >

										        	</div>
										      </div>
									        </section>
									        <ul class="tab-links nav nav-tabs pull-right mt-3">
													<li class="nav-item">
														<a href="#back_tab1" class="nav-link btn btn-sm bg-primary text-white  prevButton">Prev</a>
													</li>
													<li class="nav-item">
														<a href="#next_tab2" class="nav-link btn btn-sm bg-success  text-white nextButton">Next</a>
													</li>
												</ul>
									  	</div>   
									  	<div class="tab-pane tab" id="student_address">
									        <h3 class="mb-3">Student Address</h3>
									        <hr/>
									        <section>
								        			<div class="card">
														<div class="card-header">
															<h5 class="card-title">Permanent Address:</h5>
														</div>
														<div class="card-body">
															<div class="row form-group">
																	<div class="col-md-4 ">
																		<label class="required">Address Line</label> 
																		<input type="text" class="form-control" name="p_address" id="p_address" value="{{$student->p_address ?? old('p_address')}}">
																		@error('p_address')
																			<span class="text-danger">
																				<strong>{{$message}}</strong>
																			</span>
																		@enderror
																	</div>
																	<div class="col-md-4 ">
																		<label class="required">City Name</label>
																		<input type="text" class="form-control" id="p_city" name="p_city" value="{{$student->p_city ?? old('p_city')}}">
																		@error('p_city')
																			<span class="text-danger">
																				<strong>{{$message}}</strong>
																			</span>
																		@enderror		
																	</div>
																	
																	<div class="col-md-4 ">
																		<label class="required">State Name</label>
																		<input type="text" class="form-control" name="p_state" id="p_state" value="{{($student->p_state ?? old('p_state') ?? 'Madhya Pradesh')}}" >
																		@error('p_state')
																			<span class="text-danger">
																				<strong>{{$message}}</strong>
																			</span>
																		@enderror
																	</div>
															</div>
															<div class="row">		
																<div class="col-md-4 ">
																	<label class="required">Zip Code</label>
																	<input type="text" name="p_zip_code" class="form-control" id="p_zip_code" value="{{$student->p_zip_code ?? old('p_zip_code')}}" >
																	@error('p_zip_code')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>
																<div class="col-md-4 ">
																	<label class="required">Country Name</label>
																	<input type="text" class="form-control" name="p_country" id="p_country" value="{{($student->p_country ?? old('p_country') ?? 'India')}}">
																	@error('p_country')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>
															</div>
														</div>
													</div>
													<div class="card">
														<div class="card-header">
															<h5 class="card-title">Local Address:</h5>										
														</div>
														<div class="card-body">
															<div class="row form-group">
																<div class="col-md-12 ">
																	<label><input type="checkbox" name="same_as" id="p_l_same" {{($student->same_as ?? old('same_as')) == '1' ? 'checked' : ''}} />
																	</label>
																	<label>Same as Permanent Address</label><span class="text-muted">(Click to copy permanent address data)</span>
																</div>
															</div>
															<div class="row form-group">
																<div class="col-md-4 ">
																	<label class="required">Address Line</label>
																	<input type="text" class="form-control loc_addr" name="l_address" id="l_address" value="{{$student->l_address ?? old('l_address')}}" >
																	@error('l_address')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>												
																<div class="col-md-4 ">
																	<label class="required">City Name</label>
																	<input type="text" class="form-control loc_addr" name="l_city" id="l_city" value="{{$student->l_city ?? old('l_city')}}">
																	@error('l_city')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>				
																<div class="col-md-4 ">
																	<label class="required">State Name</label>
																	<input type="text" class="form-control loc_addr" name="l_state" id="l_state"  value="{{($student->l_state ?? ld('l_state') ?? 'Madhya Pradesh')}}">
																	@error('l_state')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>

															</div>
															<div class="row">
																<div class="col-md-4 ">
																	<label class="required">Zip Code</label>
																	<input type="text" name="l_zip_code" class="form-control loc_addr" id="l_zip_code" value="{{$student->l_zip_code ?? old('l_zip_code')}}">
																	@error('l_zip_code')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>
																<div class="col-md-4 ">
																	<label class="required">Country Name</label>
																	<input type="text" class="form-control loc_addr" name="l_country" id="l_country" value="{{($student->l_country ?? old('l_country') ?? 'India')}}">
																	@error('l_country')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>
															</div>
														</div>
								        			</div>						       
							        			</section>
											   <ul class="tab-links nav nav-tabs pull-right mt-3">
													<li class="nav-item">
														<a href="#back_tab1" class="nav-link btn btn-sm bg-primary text-white  prevButton">Prev</a>
													</li>
													<li class="nav-item">
														<a href="#next_tab2" class="nav-link btn btn-sm bg-success  text-white nextButton">Next</a>
													</li>
												</ul>
									  	</div>
									  	<div class="tab-pane tab" id="bank_details">
											<h3 class="mb-3">Bank Details</h3>
											<hr>
							        		<section>
									        	<div class="row form-group">
									        		<div class="col-md-6 col-sm-6 form-group col-xs-6">
									        			<label>Bank Name</label>
									        			<input type="text" name="bank_name" class="form-control" value="{{$student->bank_name ?? old('bank_name')}}"> 
									        			@error('bank_name')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror

									        		</div>
									        		<div class="col-md-6 col-sm-6 form-group col-xs-6">
									        			<label>Branch</label>
									        			<input type="text" name="bank_branch" class="form-control" value="{{$student->bank_branch ?? old('bank_branch')}}">
									        			@error('bank_branch')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
									        		</div>

									        	</div>
									        	<div class="row form-group">
									        		<div class="col-md-4 col-sm-6 form-group col-xs-6">
									        			<label>Account Name</label>
									        			<input type="text" name="account_name" class="form-control" value="{{$student->account_name ?? old('account_name')}}">
									        			@error('account_name')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
									        		</div>
									        		<div class="col-md-4 col-sm-6 form-group col-xs-6">
									        			<label>Account Number</label>
									        			<input type="text" name="account_no" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{$student->account_no ?? old('account_no')}}">
									        			@error('account_no')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
									        		</div>
									        		<div class="col-md-4 col-sm-6 form-group col-xs-6">
									        			<label>IFSC CODE</label>
									        			<input type="text" name="ifsc_code" class="form-control" id="ifsc_code" value="{{$student->ifsc_code ?? old('ifsc_code')}}">
									        			@error('ifsc_code')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
									        		</div>
									        	</div>
							        		</section>
							        		<ul class="tab-links nav nav-tabs pull-right mt-3">
												<li class="nav-item">
													<a href="#back_tab1" class="nav-link btn btn-sm bg-primary text-white  prevButton">Prev</a>
												</li>
												<li class="nav-item">
													<a href="#next_tab2" class="nav-link btn btn-sm bg-success  text-white nextButton">Next</a>
												</li>
											</ul>
										</div>
										<div class="tab-pane tab" id="student_document">
											<h3 class="mb-3">Student Documents</h3>
											<hr/>
											<section>
												<div class="row">
													<div class="col-md-12">                      	
														<input type="hidden" name="studentid" id="studentid" value="">		
														<table class="table table-bordered" style="" id="student_doc">
															<thead>
																<tr style="background-color: #e3f2fd;">
														
																	<th>Document Title  </th>
																	<th>Document Description </th>
																	<th>File </th>
																	<th >Add More</th>
																</tr>
															</thead>
															<tbody id="docTBody">
																

															</tbody>
														</table>											
													</div>												
												</div>											
											</section>		
											<ul class="tab-links nav nav-tabs pull-right mt-3">
												<li class="nav-item">
													<a href="#back_tab1" class="nav-link btn btn-sm text-white bg-primary prevButton">Prev</a>
												</li>
												<li class="nav-item">
													<input type="submit" name="submit" value="Submit"  class="btn bg-success text-white">
												</li>
											</ul>								
										</div>
		          					</div>
		          				</form>		
	 						</div>
	 					</div>
	          		</div>
	          	</div>
	        </div>
	    </div>
	</div>
</div>

@if($message = Session::get('success'))
	<script >
	$(document).ready(function(){	
		swal({
        text: "{{$message}}",
        icon : 'success',
      });
    });
	</script>	
@endif

@include('layouts.common')
<script type="text/javascript">

// For tabing ..........	
$(document).ready(function() {
	jQuery('.tabs .tab-links a').on('click', function(e)  {
		var currentAttrValue = jQuery(this).attr('href');

		// Show/Hide Tabs
		jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

		// Change/remove current tab to active
		jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

		e.preventDefault();
	});


	jQuery('.nextButton').on('click', function() {
		var $activeTab = $('.tab-links li.active');
		var $wrapper = jQuery(this).closest('.tabs');
		var indexActive = $wrapper.find('li.active').index();
		$wrapper.find('li').eq(indexActive + 1).find('a').click();
	});

	jQuery('.prevButton').on('click', function() {
		var $activeTab = $('.tab-links li.active');
		var $wrapper = jQuery(this).closest('.tabs');
		var indexActive = $wrapper.find('li.active').index();
		$wrapper.find('li').eq(indexActive - 1).find('a').click();
	});
});

$('.dob').on('blur',function(e){
		e.preventDefault();
		var c_d = new Date();
		year = c_d.getFullYear() - 8;
		date = new Date($(this).val());

		age = Math.floor((c_d.getTime() - date.getTime()) / (365.25 * 24 * 60 * 60 * 1000));

		$('.age').val(age).attr('readonly','true');
})


$('label.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');
$('th.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');

$(document).ready(function(){


	$(document).on('change','#staff_ward',function(e){
		e.preventDefault();
		var staff_ward = $(this).val();
		staff_ward_div(staff_ward);
	})

	var staff_ward = "{{old('staff_ward') ?? $student->staff_ward}}";
	if(staff_ward !=null){
		staff_ward_div(staff_ward);
	}

	function staff_ward_div(staff_ward){
		if(staff_ward == '1'){
			$('#staff_list').show();
			$('#staff_id').attr('required',true);
		}else{
			$('#staff_id').val('');
			$('#staff_id').attr('required',false);
			$('#staff_list').hide();
		}
	}
		


	$('#bus_fee_allocate').on('change',function(e){
		e.preventDefault();
		var bus_fee_allocate = $(this).val();
		bus_fee_show(bus_fee_allocate);
	})

	var bus_fee_allocate = "{{$student->bus_fee_id !=null ? '1' : (old('bus_fee_allocate') !=null ? old('bus_fee_allocate') : '0' ) }}";
	if(bus_fee_allocate !=''){
		 bus_fee_show(bus_fee_allocate);
	}


	function bus_fee_show(bus_fee_allocate){
		if(bus_fee_allocate == '1'){
			$('#busFeeDIV').show();
			$('#busFeeAmount').show();
		}else{
			$('#busFeeDIV').hide();
			$('#busFeeAmount').hide();
		}
	}


	$('.status').on('change',function(e){
		e.preventDefault();
		var status = $(this).val();
		// console.log(status);
		 passout_date(status);
		
	});

	var status = "{{$student->status ?? old('status')}}";
	if(status !=''){
		 passout_date(status);
	}

	function passout_date(status){
		if(status == 'P'){
			$('.passout_date').show();
		}else{
			$('.passout_date').hide();
		}
	} 

	var k =0;

	@php 
		$k =0;
		$count_guard = count($student->studentsGuardiantMast);
	@endphp


	$('#guard_info').append('<div id="row'+k+'"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-success " style="margin:10px 10px 0px 0px" id="add_guar"><i class="fa fa-plus"></i> Add More</a></div></div><div class="form-group row relation"><div class="col-sm-6 form-group col-md-4 col-xs-6 "><label class="">Relation <strong class="text-danger">*</strong></label><select name="relation[]" class="form-control "><option value="">Select Relation</option>@foreach(GUARDIAN_RELATION as $key =>$val)<option value="{{$key}}" {{$student->studentsGuardiantMast[$k]->relation_id == $key ? 'selected' : ''}}>{{$val}}</option>@endforeach</select></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="">Name <strong class="text-danger">*</strong></label><input type="text" name="g_name[]" class="form-control " value="{{$student->studentsGuardiantMast[$k]->g_name}}"></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="required">Mobile <strong class="text-danger">*</strong></label><input type="text" name="g_mobile[]" class="form-control " value="{{$student->studentsGuardiantMast[$k]->g_mobile}}"></div></div><div class="row form-group"><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label class="">Work Status</label><select name="work_status[]" class="form-control"><option value="">Select Work Status</option>@foreach(WORK_STATUS as $key =>$val)<option value="{{$key}}" {{$student->studentsGuardiantMast[$k]->work_status == $key ? 'selected' : ''}}>{{$val}}</option>@endforeach</select></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label class="">Employment Type</label><select name="employment_type[]" class="form-control"><option value="">Select Employment Type</option> @foreach(EMPLOYMENT_TYPE as $key =>$val)<option value="{{$key}}" {{$student->studentsGuardiantMast[$k]->employment_type == $key ? 'selected' : '' }} >{{$val}}</option>@endforeach </select></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label class="">Professtion Type</label><select name="profession_status[]" class="form-control"><option value="">Select Profession type</option>">@foreach($professionType as $key =>$professionTypes)<option value="{{$professionTypes->id}}" {{$student->studentsGuardiantMast[$k]->profession_status == $professionTypes->id ? 'selected' : ''}} >{{$professionTypes->name}}</option>@endforeach ></select></div></div><div class="form-group row"><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label>Employer</label><input type="text" name="employer[]" class="form-control" value="{{$student->studentsGuardiantMast[$k]->employer}}"></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label>Designation</label><select class="form-control" name="designation_id[]"><option value="">Select Designation Name</option> @foreach($guardianDesignation as $key =>$guardianDesignations)<option value="{{$guardianDesignations->id}}" {{$student->studentsGuardiantMast[$k]->designation == $guardianDesignations->id ? 'selected' : ''}}>{{$guardianDesignations->name}}</option>@endforeach </option></select></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label >Photo</label><input type="file" name="g_photo[]" id="g_photo" accept="image/*"> @if($student->studentsGuardiantMast[$k]->photo !=null)<a href="{{asset('storage/'.$student->studentsGuardiantMast[$k]->photo)}}" target="_blank">{{file_name($student->studentsGuardiantMast[$k]->photo)}}</a>@else <p>Not Uploaded</p> @endif<input type="hidden" name="g_check[]" class="g_photo" value=""><input type="hidden" name="g_id[]" value="{{$student->studentsGuardiantMast[$k]->id}}"></div><hr></div></div>');


	// for(var z = 0; z < guard_info; z++){
		// $('#guard_info').append('<div id="row'+k+'"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-success " style="margin:10px 10px 0px 0px" id="add_guar"><i class="fa fa-plus"></i> Add More</a></div></div>'+html_div+'</div>');

	// }
		

			        		
	k++;

	@php
	$k++;
	while ($k < $count_guard) {
	@endphp

	$('#guard_info').append('<div id="row{{$k}}"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-danger btn_remove" style="margin:10px 10px 0px 0px" id="{{$k}}"><i class="fa fa-minus"></i></a></div></div><div class="form-group row relation"><div class="col-sm-6 form-group col-md-4 col-xs-6 "><label class="">Relation <strong class="text-danger">*</strong></label><select name="relation[]" class="form-control "><option value="">Select Relation</option>@foreach(GUARDIAN_RELATION as $key =>$val)<option value="{{$key}}" {{$student->studentsGuardiantMast[$k]->relation_id == $key ? 'selected' : ''}}>{{$val}}</option>@endforeach</select></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="">Name <strong class="text-danger">*</strong></label><input type="text" name="g_name[]" class="form-control " value="{{$student->studentsGuardiantMast[$k]->g_name}}"></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="required">Mobile <strong class="text-danger">*</strong></label><input type="text" name="g_mobile[]" class="form-control " value="{{$student->studentsGuardiantMast[$k]->g_mobile}}"></div></div><div class="row form-group"><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label class="">Work Status</label><select name="work_status[]" class="form-control"><option value="">Select Work Status</option>@foreach(WORK_STATUS as $key =>$val)<option value="{{$key}}" {{$student->studentsGuardiantMast[$k]->work_status == $key ? 'selected' : ''}}>{{$val}}</option>@endforeach</select></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label class="">Employment Type</label><select name="employment_type[]" class="form-control"><option value="">Select Employment Type</option> @foreach(EMPLOYMENT_TYPE as $key =>$val)<option value="{{$key}}" {{$student->studentsGuardiantMast[$k]->employment_type == $key ? 'selected' : '' }}>{{$val}}</option>@endforeach </select></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label class="">Professtion Type</label><select name="profession_status[]" class="form-control"><option value="">Select Profession type</option>">@foreach($professionType as $key =>$professionTypes)<option value="{{$professionTypes->id}}" {{$student->studentsGuardiantMast[$k]->profession_status == $professionTypes->id ? 'selected' : ''}}>{{$professionTypes->name}}</option>@endforeach ></select></div></div><div class="form-group row"><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label>Employer</label><input type="text" name="employer[]" class="form-control" value="{{$student->studentsGuardiantMast[$k]->employer}}"></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label>Designation</label><select class="form-control" name="designation_id[]"><option value="">Select Designation Name</option> @foreach($guardianDesignation as $key =>$guardianDesignations)<option value="{{$guardianDesignations->id}}" {{$student->studentsGuardiantMast[$k]->designation == $guardianDesignations->id ? 'selected' : ''}}>{{$guardianDesignations->name}}</option>@endforeach </option></select></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label >Photo</label><input type="file" name="g_photo[]" id="g_photo" accept="image/*"> @if($student->studentsGuardiantMast[$k]->photo !=null)<a href="{{asset('storage/'.$student->studentsGuardiantMast[$k]->photo)}}" target="_blank">{{file_name($student->studentsGuardiantMast[$k]->photo)}}</a>@else <p>Not Uploaded</p> @endif<a href=""></a><input type="hidden" name="g_check[]" class="g_photo" value=""><input type="hidden" name="g_id[]" value="{{$student->studentsGuardiantMast[$k]->id}}"></div><hr></div></div>');

@php
	$k++;
	}
	@endphp
	k = "{{$k}}";



	function guard_info_fn(){
		$('#guard_info').append('<div id="row'+k+'"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-danger btn_remove" style="margin:10px 10px 0px 0px" id="'+k+'"><i class="fa fa-minus"></i></a></div></div><div class="form-group row relation"><div class="col-sm-6 form-group col-md-4 col-xs-6 "><label class="">Relation <strong class="text-danger">*</strong></label><select name="relation[]" class="form-control "><option value="">Select Relation</option>@foreach(GUARDIAN_RELATION as $key =>$val)<option value="{{$key}}">{{$val}}</option>@endforeach</select></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="">Name <strong class="text-danger">*</strong></label><input type="text" name="g_name[]" class="form-control " value=""></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="required">Mobile <strong class="text-danger">*</strong></label><input type="text" name="g_mobile[]" class="form-control " value=""></div></div><div class="row form-group"><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label class="">Work Status</label><select name="work_status[]" class="form-control"><option value="">Select Work Status</option>@foreach(WORK_STATUS as $key =>$val)<option value="{{$key}}" >{{$val}}</option>@endforeach</select></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label class="">Employment Type</label><select name="employment_type[]" class="form-control"><option value="">Select Employment Type</option> @foreach(EMPLOYMENT_TYPE as $key =>$val)<option value="{{$key}}">{{$val}}</option>@endforeach </select></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label class="">Professtion Type</label><select name="profession_status[]" class="form-control"><option value="">Select Profession type</option>">@foreach($professionType as $key =>$professionTypes)<option value="{{$professionTypes->id}}" >{{$professionTypes->name}}</option>@endforeach ></select></div></div><div class="form-group row"><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label>Employer</label><input type="text" name="employer[]" class="form-control" value=""></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label>Designation</label><select class="form-control" name="designation_id[]"><option value="">Select Designation Name</option> @foreach($guardianDesignation as $key =>$guardianDesignations)<option value="{{$guardianDesignations->id}}" >{{$guardianDesignations->name}}</option>@endforeach </option></select></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label >Photo</label><input type="file" name="g_photo[]" id="g_photo" accept="image/*"><input type="hidden" name="g_check[]" class="g_photo" value=""><input type="hidden" name="g_id[]" value=""></div><hr></div></div>');
		k++;
	}


    $('#add_guar').click(function(e){
    	e.preventDefault();
    	guard_info_fn();
    	
    });

   
    $(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id");
		//alert(button_id); 
		$('#row'+button_id+'').remove();
	});


var j = 0;
@php
		$j = 0;
		$count_docs = count($student->student_doc);
@endphp

$('#docTBody').append('<tr id="doc_row_'+j+'"><td><input id="doc_title" name="doc_title[]" class="form-control" type="text" placeholder="Enter doc title" value="{{$student->student_doc[$j]->doc_title}}" ></td><td><textarea id="doc_description" name="doc_description[]" class="form-control doc_description" placeholder="Enter doc description" value="" rows="2" cols="2">{{$student->student_doc[$j]->doc_description}}</textarea></td><td><input id="file_name" name="student_doc[]" class="form-control" type="file" placeholder="file" value="" > @if($student->student_doc[$j]->student_doc !=null)<a href="{{asset('storage/'.$student->student_doc[$j]->student_doc)}}" target="_blank">{{file_name($student->student_doc[$j]->student_doc)}}</a>@else <p>Not Uploaded</p> @endif</td><td><input type="hidden" name="student_doc_id[]" value="{{$student->student_doc[$j]->id}}"><button type="button" name="add_more_std_doc" id="add_doc" class="btn btn-success btn-sm" id="'+j+'"><i class="fa fa-plus"></i></button></td></tr>');

@php
	$j++;
	while ($j < $count_docs) {
@endphp
	 $('#docTBody').append('<tr id="doc_row_{{$j}}"><td><input id="doc_title" name="doc_title[]" class="form-control" type="text" placeholder="Enter doc title" value="{{$student->student_doc[$j]->doc_title}}" ></td><td><textarea id="doc_description" name="doc_description[]" class="form-control doc_description" placeholder="Enter doc description" value="" rows="2" cols="2">{{$student->student_doc[$j]->doc_description}}</textarea></td><td><input id="file_name" name="student_doc[]" class="form-control" type="file" placeholder="file" value="" >@if($student->student_doc[$j]->student_doc !=null)<a href="{{asset('storage/'.$student->student_doc[$j]->student_doc)}}" target="_blank">{{file_name($student->student_doc[$j]->student_doc)}}</a>@else <p>Not Uploaded</p> @endif</td><td><input type="hidden" name="student_doc_id[]" value="{{$student->student_doc[$j]->id}}"><button type="button"  class="btn btn-danger btn-sm remove_doc" id="{{$j}}"><i class="fa fa-minus"></i></button></td></tr>');
@php
	$j++;
}
@endphp
j = "{{$j}}";


$(document).on('click', '#add_doc', function(){
  $('#docTBody').append('<tr id="doc_row_'+j+'"><td><input id="doc_title" name="doc_title[]" class="form-control" type="text" placeholder="Enter doc title" value="" ></td><td><textarea id="doc_description" name="doc_description[]" class="form-control doc_description" placeholder="Enter doc description" value="" rows="2" cols="2"></textarea></td><td><input id="file_name" name="student_doc[]" class="form-control" type="file" placeholder="file" value="" ></td><td><input type="hidden" value="" name="student_doc_id[]"><button type="button" class="btn btn-danger btn-sm remove_doc" id="'+j+'"><i class="fa fa-minus" ></i></button></td></tr>');
  j++	
});
    

	$('#p_l_same').on('change',function(){
		var check = $("[name='same_as']:checked").val();
		if(check == 'on'){
			var address = $('#p_address').val();
			var city = $('#p_city').val();		
			var state = $('#p_state').val();
			var zip_code = $('#p_zip_code').val();
			var country = $('#p_country').val();
		
			$('#l_address').val(address);
			$('#l_city').val(city);
			$('#l_state').val(state);
			$('#l_country').val(country);
			$('#l_zip_code').val(zip_code);

			$('.loc_addr').attr('readonly','true');
		
		}else{
			$('#l_address').val('');
			$('#l_city').val('');
			$('#l_state').val('');
			$('#l_country').val('');
			$('#l_zip_code').val('');
					
			$('.loc_addr').removeAttr('readonly');
		}
	});


    });

 	$(document).on('click', '.remove_doc', function(){
       var row_id = $(this).attr("id");

       $('#doc_row_'+row_id).remove();
     });


</script>

 @endsection
