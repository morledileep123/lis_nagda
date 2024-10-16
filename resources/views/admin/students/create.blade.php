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
	         		<h6 class="card-title">Add Student
	         			<a href="{{route('student_detail.index')}}" class="btn btn-sm btn-primary pull-right fa fa-arrow-left"> Back</a>
	         		</h6>
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
	          		
		          				<form action="{{route('student_detail.store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
		          					@csrf
		          					<div class="tab-content mt-4 p-2" style="font-size: 15px !important; background-color: whitesmoke !important;" >
										<div class="tab-pane tab  active" id="basic_details" >
											<section>
									        	<h3 class="mb-3">Basic Details</h3>
									        	<hr/>
										        <div class="row form-group">
													<div class="col-md-12">
														<label >Student Photo</label>
														<input type="file" name="s_photo" id="s_photo" accept="image/*" value="{{old('s_photo')}}">
														@error('s_photo')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>

												</div>
												<div class="row form-group">
													<div class="col-md-3 col-xs-6 col-sm-6 form-group">
														<label for="std_class" class="required">Class</label>
														<select class="form-control required" name="std_class_id" id="std_class_id" required="required">
															<option value="">Select Class</option>
															@foreach($classes as $class)
																<option value="{{$class->id}}" {{old('std_class_id') == $class->id ? 'selected' : ''}}>{{$class->class_name}}</option>
															@endforeach
														</select>
														@error('std_class_id')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-xs-6 col-sm-6 form-group">
														<label class="required"> Batch</label>
														<select class="form-control required" name="batch_id" required="required" id="batch_id">
															
														</select>
														@error('batch_id')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-xs-6 col-sm-6 form-group">
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
												</div>
												<div class="row form-group">
													<div class="col-md-3 col-xs-6 col-sm-6 form-group">
														<label class="required">Admision No</label>
														<input type="text" name="admision_no" class="form-control" value="{{old('admision_no')}}" required="required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{old('s_mobile')}}">
														@error('admision_no')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>		

													<div class="col-md-3 col-xs-6 col-sm-6 form-group">
														<label class="required">Admission Date</label>
														<input type="text" name="addm_date" class="form-control datepicker required addm_date"  data-date-format="yyyy-mm-dd"  value="{{old('addm_date')}}" placeholder="{{date('Y-m-d')}}" required="required">
														@error('addm_date')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
														
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label class="">Class Roll Number</label>
														<input type="text" name="roll_no" value="{{old('roll_no')}}" class="form-control" >
														@error('roll_no')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
														
													<div class="col-md-3 col-sm-6 form-group col-xs-6 has-success">
														<label class="required">Student Status</label>
														<select class="form-control required status" name="status" aria-invalid="false" required="required">
															<option value="R" {{old('status') == 'R' ? 'selected' : ''}}>Running</option>
															<option value="P" {{old('status') == 'P' ? 'selected' : ''}}>Pass</option>
															<option value="F" {{old('status') == 'F' ? 'selected' : ''}}>Fail</option>
														</select>
													</div>
																								
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label class="required">First Name</label>
														<input type="text" name="f_name" id="f_name" value="{{old('f_name')}}" class="form-control required" required="required" >
														@error('f_name')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>								
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Middle Name</label>
														<input type="text" name="m_name" id="m_name" value="{{old('m_name')}}" class="form-control">
														@error('m_name')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>									
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label class="required">Last Name</label>
														<input type="text" name="l_name" id="l_name" value="{{old('l_name')}}" class="form-control required" required="required">
														@error('l_name')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
												
													<div class="col-md-3 col-sm-6 form-group col-xs-6 passout_date" style="display: none;">
														<label class="required">Passout Date</label>
														<input type="text" name="passout_date" class="form-control datepicker " readonly="true" data-date-format="yyyy-mm-dd" value="{{old('passout_date')}}"  placeholder="{{date('Y-m-d')}}" required="required">
													</div>

													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label class="required">Mobile Number</label>
														<input type="text" name="s_mobile" class="form-control required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{old('s_mobile')}}" required="required"> 
														@error('s_mobile')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label class="required">Date of Birth</label>
														<input type="text" name="dob" class="form-control datepicker required dob" data-date-format="yyyy-mm-dd" placeholder="{{date('Y-m-d')}}" value="{{old('dob')}}" required="required">
														@error('dob')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label class="">Birth Place</label>
														<input type="text" name="birth_place" class="form-control birth_place required" placeholder="" id="birth_place" value="{{old('birth_place')}}">
														@error('birth_place')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Email Address</label>
														<input type="text" name="email" class="form-control required" value="{{old('email')}}"> 
														
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
																	<option value="{{$key}}" {{old('gender') == $key ? 'selected' : ''}}>{{$value}}</option>
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
																<option value="{{$key}}" {{old('reservation_class_id') == $key ? 'selected' : ''}}>{{$value}}</option>
															@endforeach
														</select>
														@error('reservation_class_id')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-xs-6 col-sm-6 form-group "><label>Cast Name</label>
					        							<input type="text" name="cast" class="form-control" id="cast" value="{{old('cast')}}" >
					        						</div>
					        						<div class="col-md-3 col-xs-6 col-sm-6 form-group ">
					        							<label>Cast Certificate No.</label>
					        							<input type="text" name="cast_cert_no" class="form-control" id="cast_cert_no" value="{{old('cast_cert_no')}}" >
					        						</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Religion</label>
														<select class="form-control" name="religion_id">
															<option value="">Select Religion</option>
															@foreach(RELIGION as $key => $value)
																	<option value="{{$key}}" {{old('religion_id') == $key ? 'selected' : ''}}>{{$value}}</option>
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
																	<option value="{{$key}}" {{old('blood_id') == $key ? 'selected' : ''}}>{{$value}}</option>
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
														<input type="text" name="spec_ailment" class="form-control" placeholder="Mole on nose. etc" value="{{old('spec_ailment')}}">
														@error('spec_ailment')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Age</label>
														<input type="text" value="{{old('age')}}" name="age" class="form-control age" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
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
																<option value="{{$studentNationalite->id}}" {{old('nationality_id') == $studentNationalite->id ? 'selected' : ''}}>{{$studentNationalite->nationality_name}}</option>
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
														<input type="text" name="taluka" value="{{old('taluka')}}" class="form-control">
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
														 	@foreach($studentMothertongues as $studentMothertongue)<option value="{{$studentMothertongue->id}}" {{old('language_id') == $studentMothertongue->id ? 'selected' : '' }}>{{$studentMothertongue->mothetongue_name}}</option>
														 	@endforeach 
														</select>
														@error('language_id')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Student SSMID</label>
														<input type="text" name="s_ssmid" value="{{old('s_ssmid')}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
														@error('s_ssmid')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 form-group col-xs-6">
														<label>Family SSMID</label>
														<input type="text" name="f_ssmid" value="{{old('f_ssmid')}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
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
														<input type="text" name="aadhar_card" value="{{old('aadhar_card')}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
														@error('f_ssmid')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
												
					        						<div class="col-md-3 col-xs-6 col-sm-6 form-group "><label>Family Income</label>
					        							<input type="text" name="family_income" class="form-control" id="family_income" value="{{old('family_income')}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
					        						</div>

					        						<div class="col-md-6 col-sm-6 form-group col-xs-6">
														<label>Siblings {{-- <span class="text-muted">(If student have sibling please select number wise)</span> --}}
														</label>
														<select name="siblings[]" class="form-control select2-multiple" multiple>
														<option value="" >Select Siblings</option>
															@foreach($students as $student)
																<option value="{{$student->admision_no}}" {{(collect(old('siblings'))->contains($student->admision_no) ? 'selected' : '')}} }>{{$student->admision_no .' | '. student_name($student) }}</option>
															@endforeach
															 	
														</select>														
													</div>
												</div>
												<div class="row" style="background: #4f5775;color: #fff; padding: 10px;border-radius: 10px;margin: 20px;">
			                                         <div class="col-md-6 form-group">
			                                              <label for="username" class="required">
			                                             Student User Name
			                                             </label>
			                                             <input class="form-control required" id="username" value="{{old('username')}}" name="username" type="text" >
			                                             <spam id="usererror" style="color: red; display: none;"></spam>
			                                         </div>
			                                         
			                                          <div class="col-md-6 form-group">
			                                              <label for="password" class="required">
			                                              Password (Username and password same for student)
			                                             </label>
			                                             <input class="form-control required"   id="password" name="password" type="password" readonly="readonly">
			                                         </div>
												</div>
												<div class="row form-group">
													<div class="col-md-3">
														<label for="staff_ward" class="required"> Staff Ward Status</label>
														<select class="form-control" name="staff_ward" id="staff_ward" required="required">
														    <option value="">Select</option>
														    <option value="1" {{old('staff_ward') == '1' ? 'selected' : ''}}>Yes</option>
														    <option value="0" {{old('staff_ward') == '0' ? 'selected' : ''}}>No</option>
														</select>
													</div>

													<div class="col-md-3" id="staff_list" style="display: none">
														<label for="rte" class="required">Select Staff </label>
														<select class="form-control" name="staff_id" id="staff_id" >
														    <option value="">Select Staff List</option>
															@foreach(get_teachers() as $teacher)

														    <option value="{{$teacher->id}}" {{old('staff_id') == $teacher->id ? 'selected' : ''}}>{{$teacher->name}}</option>
														    @endforeach
														   
														</select>
													</div>


													<div class="col-md-3">
														<label for="rte"> CBSE  Registration no </label>
														<input class="form-control" id="CBSC_reg" name="cbsc_reg" type="text" value="{{old('cbsc_reg')}}">	           
													</div>	

													<div class="col-md-3">
														<label for="bus_fee_allocate">Bus Fee Allocate</label>
														<select class="form-control" name="bus_fee_allocate" id="bus_fee_allocate" required="required">
														    <option value="0" {{old('bus_fee_allocate') == '0' ? 'selected' : ''}}>No</option>
														    <option value="1" {{old('bus_fee_allocate') == '1' ? 'selected' : ''}}>Yes</option>
														</select>
													           
													</div>	
	
													<div class="col-md-3" style="display: none" id="busFeeDIV">
														<label for="bus_fee_id" class="required"> Bus Fee Structure</label>
														<select class="form-control" name="bus_fee_id" id="bus_fee_id" >
														    <option value="" >Select Bus Fee Struture</option>
															@foreach($bus_fees as $bus_fee)
																<option value="{{$bus_fee->bus_fee_id}}" {{$bus_fee->bus_fee_id == old('bus_fee_id') ? 'selected' : ''}}>{{$bus_fee->bus_fee_title}}</option>
														    @endforeach
														</select>
													</div>
													<div class="col-md-3" style="display: none" id="busFeeAmount">
														<label for="bus_fee_amount" class="required"> Bus Fee Amount</label>
															<input type="text" class="form-control" name="bus_fee_amount" id="bus_fee_amount" readonly>
														 <!--<select>
														   <option value="" >Select Bus Fee Amount</option> 
															  @foreach($bus_fees as $bus_fee)
																<option value="{{$bus_fee->bus_fee_amount}}" {{$bus_fee->bus_fee_amount == old('bus_fee_amount') ? 'selected' : ''}}>{{$bus_fee->bus_fee_amount}}</option>
														    @endforeach -->
														</select>
													</div>
												 <div class="col-md-3 form-group pt-4"> 
							                        <input type="checkbox" value="1" name="is_fees_assign" id="is_fees_assign" checked=""> 
							                        Is Fees Assign 							                        
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
								        				<input type="text" name="prev_school" class="form-control " id="prev_school" value="{{old('prev_school')}}">
								        			</div>
								        			<div class="col-md-4 col-sm-6 form-group col-xs-6 ">
								        				<label class=""> Year (left from Previous School)</label>
							        					<input type="text" name="year_of_prev_school" class="form-control" id="year_of_prev_school" value="{{old('year_of_prev_school')}}">
						        					</div>
					        						<div class="col-md-4 col-sm-6 form-group col-xs-6 ">
							        					<label class="">Address 
							        					</label>
							        					<textarea class="form-control" name="address" id="acadmic_address">{{old('acadmic_address')}}</textarea>
							        				</div>								        					
						        				</div>
						        				<div class="row form-group">
						        					<div class="col-md-4 col-xs-6 col-sm-6 form-group ">
						        						<label class="">City</label>
						        						<input type="text" class="form-control" name="acadmic_city" value="{{old('acadmic_city')}}">

						        					</div>
						        					<div class="col-md-4 col-xs-6 col-sm-6 form-group ">
						        						<label class="">State</label>
						        						<input type="text" class="form-control" name="acadmic_state" value="{{old('acadmic_state') ?? 'Madhya Pradesh'}}">
						        						
						        					</div>
						        					<div class="col-md-4 col-xs-6 col-sm-6 form-group ">
						        						<label class="">Pin Code</label>
						        						<input type="text" name="acadmic_pin" class="form-control" id="acadmic_pin" value="{{old('acadmic_pin')}}">
					        						</div>
					        					</div>
					        					<div class="form-group row">
					        						<div class="col-md-4 col-xs-6 col-sm-6 form-group ">
					        							<label>Country</label>
					        							<input type="text" class="form-control" name="acadmic_country" value="{{old('acadmic_country') ?? 'India'}}">					
					        						</div>							
					        						<div class="col-md-4 col-xs-6 col-sm-6 form-group ">
					        							<label> Attendance Reg. No (In device) </label>
					        							<input type="text" name="acadmic_attendance_reg_no" class="form-control" id="acadmic_attendance_reg_no" value="{{old('acadmic_attendance_reg_no')}}">
					        						</div>
					        						<div class="col-md-4 col-sm-6 form-group col-xs-6 ">
							        					<label class="">Remark </label>
							        					<textarea class="form-control" name="acadmic_remark" id="acadmic_remark">{{old('acadmic_remark')}}</textarea>
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
																		<input type="text" class="form-control" name="p_address" id="p_address" value="{{old('p_address')}}">
																		@error('p_address')
																			<span class="text-danger">
																				<strong>{{$message}}</strong>
																			</span>
																		@enderror
																	</div>
																	<div class="col-md-4 ">
																		<label class="required">City Name</label>
																		<input type="text" class="form-control" id="p_city" name="p_city" value="{{old('p_city')}}">
																		@error('p_city')
																			<span class="text-danger">
																				<strong>{{$message}}</strong>
																			</span>
																		@enderror		
																	</div>
																	
																	<div class="col-md-4 ">
																		<label class="required">State Name</label>
																		<input type="text" class="form-control" name="p_state" id="p_state" value="{{old('p_state') ?? 'Madhya Pradesh'}}" >
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
																	<input type="text" name="p_zip_code" class="form-control" id="p_zip_code" value="{{old('p_zip_code')}}" >
																	@error('p_zip_code')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>
																<div class="col-md-4 ">
																	<label class="required">Country Name</label>
																	<input type="text" class="form-control" name="p_country" id="p_country" value="{{old('p_country') ?? 'India'}}">
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
																	<label><input type="checkbox" name="same_as" id="p_l_same" {{old('same_as') == 'on' ? 'checked' : ''}} />
																	</label>
																	<label>Same as Permanent Address</label><span class="text-muted">(Click to copy permanent address data)</span>
																</div>
															</div>
															<div class="row form-group">
																<div class="col-md-4 ">
																	<label class="required">Address Line</label>
																	<input type="text" class="form-control loc_addr" name="l_address" id="l_address" value="{{old('l_address')}}" >
																	@error('l_address')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>												
																<div class="col-md-4 ">
																	<label class="required">City Name</label>
																	<input type="text" class="form-control loc_addr" name="l_city" id="l_city" value="{{old('l_city')}}">
																	@error('l_city')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>				
																<div class="col-md-4 ">
																	<label class="required">State Name</label>
																	<input type="text" class="form-control loc_addr" name="l_state" id="l_state"  value="{{old('l_state') ?? 'Madhya Pradesh'}}">
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
																	<input type="text" name="l_zip_code" class="form-control loc_addr" id="l_zip_code" value="{{old('l_zip_code')}}">
																	@error('l_zip_code')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>
																<div class="col-md-4 ">
																	<label class="required">Country Name</label>
																	<input type="text" class="form-control loc_addr" name="l_country" id="l_country" value="{{old('l_country') ?? 'India'}}">
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
									        			<input type="text" name="bank_name" class="form-control" value="{{old('bank_name')}}"> 
									        			@error('bank_name')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror

									        		</div>
									        		<div class="col-md-6 col-sm-6 form-group col-xs-6">
									        			<label>Branch</label>
									        			<input type="text" name="bank_branch" class="form-control" value="{{old('bank_branch')}}">
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
									        			<input type="text" name="account_name" class="form-control" value="{{old('account_name')}}">
									        			@error('account_name')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
									        		</div>
									        		<div class="col-md-4 col-sm-6 form-group col-xs-6">
									        			<label>Account Number</label>
									        			<input type="text" name="account_no" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{old('account_no')}}">
									        			@error('account_no')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
									        		</div>
									        		<div class="col-md-4 col-sm-6 form-group col-xs-6">
									        			<label>IFSC CODE</label>
									        			<input type="text" name="ifsc_code" class="form-control" id="ifsc_code" value="{{old('ifsc_code')}}">
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
																	<th>SNo.</th>
																	<th>Document Title  </th>
																	<th>Document Description </th>
																	<th>File </th>
																	<th >Add More</th>
																</tr>
															</thead>
															<tbody>
																<tr id="1">
																	<td id="sr_no">1</td>
																	<td> 
																		<input id="doc_title" name="doc_title[]" class="form-control" type="text" placeholder="Enter doc title" value="{{ old('doc_title[]') }}" >
																		@error('doc_title')
																			<span class="text-danger" role="alert">
																				<strong>{{ $message }}</strong>
																			</span>
																		@enderror
																	</td>
																	<td> 
																		<textarea id="doc_description" name="doc_description[]" class="form-control doc_description" placeholder="Enter doc description" value="{{ old('doc_description[]') }}" rows="2" cols="2"></textarea> 
																	</td>
																	<td> 
																		<input id="file_name" name="student_doc[]" class="form-control" type="file" placeholder="file" value="{{ old('student_doc[]') }}" >
																		@error('student_doc')
																			<span class="text-danger" role="alert">
																				<strong>{{ $message }}</strong>
																			</span>
																		@enderror
																	</td>
																	<td>
																		<button type="button" name="add_more_std_doc" id="add_more_std_doc" class="btn btn-success btn-xs">+</button>
																	</td>
																</tr>
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


	$('.dob').on('blur',function(e){
	e.preventDefault();
		var c_d = new Date();
		year = c_d.getFullYear() - 8;
		date = new Date($(this).val());

			age = Math.floor((c_d.getTime() - date.getTime()) / (365.25 * 24 * 60 * 60 * 1000));
			
			$('.age').val(age).attr('readonly','true');
	});

	$('label.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');
	$('th.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');

});


$(document).ready(function(){
	$('#l_name').on('blur',function(e){
		e.preventDefault();
		var f_name = $('#f_name').val();
		var l_name = $(this).val();

		var random_no = Math.floor((Math.random() * 100) + 1);
		var username = f_name+l_name;

		if(username !=null){
			$('#username').val(username.toLowerCase()+random_no);
			$('#password').val(username.toLowerCase()+random_no);
		}else{
			$('#username').val('');
			$('#password').val('');
		}
		
		// console.log($(this).val());
	});


	$(document).on('change','#staff_ward',function(e){
		e.preventDefault();
		var staff_ward = $(this).val();
		staff_ward_div(staff_ward);
	})

	var staff_ward = "{{old('staff_ward')}}";
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

	var bus_fee_allocate = "{{old('bus_fee_allocate')}}";
	if(bus_fee_allocate !=''){
		 bus_fee_show(bus_fee_allocate);
	}

	function bus_fee_show(bus_fee_allocate){
		if(bus_fee_allocate == '1'){
			$('#busFeeDIV').show();
			// $('#busFeeAmount').show();
		}else{
			$('#busFeeDIV').hide();
			// $('#busFeeAmount').hide();
		}
	}


	$('.status').on('change',function(e){
		e.preventDefault();
		var status = $(this).val();
		// console.log(status);
		 passout_date(status);
		
	});

	var status = "{{old('status')}}";
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


	var guard_info  = 0;
	@if(old('relation') !=null)
		@if(count(old('relation')) !=0)
			var guard_info = {{count(old('relation')) }};
			
		
		@endif
	@endif
	
	var k =0;

	var html_div ='<div class="form-group row relation"><div class="col-sm-6 form-group col-md-4 col-xs-6 "><label class="">Relation <strong class="text-danger">*</strong></label><select name="relation[]" class="form-control "><option value="">Select Relation</option>@foreach(GUARDIAN_RELATION as $key =>$val)<option value="{{$key}}">{{$val}}</option>@endforeach</select></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="">Name <strong class="text-danger">*</strong></label><input type="text" name="g_name[]" class="form-control " value=""></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="required">Mobile <strong class="text-danger">*</strong></label><input type="text" name="g_mobile[]" class="form-control "></div></div><div class="row form-group"><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label class="">Work Status</label><select name="work_status[]" class="form-control"><option value="">Select Work Status</option>@foreach(WORK_STATUS as $key =>$val)<option value="{{$key}}">{{$val}}</option>@endforeach</select></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label class="">Employment Type</label><select name="employment_type[]" class="form-control"><option value="">Select Employment Type</option> @foreach(EMPLOYMENT_TYPE as $key =>$val)<option value="{{$key}}">{{$val}}</option>@endforeach </select></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label class="">Proesstion Type</label><select name="profession_status[]" class="form-control"><option value="">Select Profession type</option>">@foreach($professionType as $key =>$professionTypes)<option value="{{$professionTypes->id}}">{{$professionTypes->name}}</option>@endforeach ></select></div></div><div class="form-group row"><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label>Employer</label><input type="text" name="employer[]" class="form-control"></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label>Designation</label><select class="form-control" name="designation_id[]"><option value="">Select Designation Name</option> @foreach($guardianDesignation as $key =>$guardianDesignations)<option value="{{$guardianDesignations->id}}">{{$guardianDesignations->name}}</option>@endforeach </option></select></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label >Photo</label><input type="file" name="g_photo[]" id="g_photo" accept="image/*"><input type="hidden" name="g_check[]" class="g_photo" value=""><input type="hidden" name="g_id[]" value=""></div><hr></div>';


	// for(var z = 0; z < guard_info; z++){
		$('#guard_info').append('<div id="row'+k+'"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-success " style="margin:10px 10px 0px 0px" id="add_guar"><i class="fa fa-plus"></i> Add More</a></div></div>'+html_div+'</div>');

	// }
		

			        		
	k++;
	function guard_info_fn(){
		$('#guard_info').append('<div id="row'+k+'"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-danger btn_remove" style="margin:10px 10px 0px 0px" id="'+k+'"><i class="fa fa-minus"></i></a></div></div>'+html_div+'</div>');
		k++;
	}


    $('#add_guar').click(function(e){
    	e.preventDefault();
    	guard_info_fn();
    	
    });

    if(guard_info !=0){

    	for(var z=1; z<guard_info ; z++){
			guard_info_fn();
    	}
	}	




   
    $(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id");
		//alert(button_id); 
		$('#row'+button_id+'').remove();
	});

});

    $(document).ready(function(){
	    var count = 1;
	    $(document).on('click', '#add_more_std_doc', function(){
	       count++;
	       var html_code = '';
	       html_code += '<tr id="'+count+'">';
	       html_code += '<td><span id="sr_no">'+count+'</span></td>';
	       html_code += '<td><input type="text" name="doc_title[]" id="doc_title'+count+'" data-srno="'+count+'" class="form-control input-sm timepicker"  placeholder="Enter doc titleti"/></td>';
	       html_code += '<td ><textarea name="doc_description[]"  id="doc_description'+count+'" data-srno="'+count+'" class="form-control input-sm"  placeholder="Enter mode of Conveyance"/></textarea></td>';
	        html_code += '<td><input type="file" name="student_doc[]" id="file_name'+count+'" data-srno="'+count+'" class="form-control input-sm"/></td>';

	       html_code += '<td><button type="button" name="add_more_std_doc" id="'+count+'" class="btn btn-danger btn-xs add_more_std_doc">X</button></td>';
	       html_code += '</tr>';
	       $('#student_doc').append(html_code);
	    
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

 	$(document).on('click', '.add_more_std_doc', function(){
       var row_id = $(this).attr("id");

       $('#'+row_id).remove();
     });


 	$(document).on('change', '#bus_fee_id', function(){
       var bus_fee_id = $(this).val();

      	$.ajax({
              type: "POST",
              url: "{{route('get_bus_fee_amt')}}",
              data: {bus_fee_id:bus_fee_id,"_token": "{{ csrf_token() }}"},
              success: function(data){
                  $("#busFeeAmount").show();
                  $("#bus_fee_amount").empty();
                  $("#bus_fee_amount").val(data.bus_fee_amount);
              }
          })
    });


</script>

 @endsection
