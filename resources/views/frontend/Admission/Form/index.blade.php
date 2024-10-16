@include('frontend-layouts.main')

<style type="text/css">
	/******* CSS *********/
.previous-tab,
.next-tab{
	display: inline-block;
	border: 1px solid #444348;
	border-radius: 3px;
	margin: 5px;
	color: #444348;
	font-size: 14px;
	padding: 10px 15px;
	cursor: pointer;
}
</style>
<div class="rev-slider">
</div>
<div id="content" class="site-content">
	<div class="container">
		<div class="inner-wrapper">    

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="container">
					<div class="row mt-5">
						<div class="container">
							<div class="row mt-5" style="margin-top: 30px;">
								<h2 align="center" style="color: #FFAB1F;">ADMISSION FORM</h2>
							</div>
							
						</div>
						


				<div class="card-body">
                  <div class="row mt-5">
					<div class="col-md-12">
					 <div class="panel panel-default">
						{{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
						  <li class="nav-item">
						    <a class="nav-link active" id="Basic_details-tab" data-toggle="tab" href="#Basic_details" role="tab" aria-controls="Basic_details" aria-selected="true">Basic Details</a>
						  </li>
						  
						  <li class="nav-item">
						    <a class="nav-link" id="guardian_info-tab" data-toggle="tab" href="#guardian_info" role="tab" aria-controls="guardian_info" aria-selected="false">Guardian Info</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="acadmic_details-tab" data-toggle="tab" href="#acadmic_details" role="tab" aria-controls="acadmic_details" aria-selected="false">Academic Details</a>
						  </li>
						
						  <li class="nav-item">
						    <a class="nav-link" id="student_document-tab" data-toggle="tab" href="#student_document" role="tab" aria-controls="student_document" aria-selected="false">Student Document</a>
						  </li>
						</ul> --}}
						<ul class="nav nav-tabs" id="myTabs" role="tablist">
					    	<li role="presentation" class="active"><a href="#Basic_details" aria-controls="Basic_details" role="tab" data-toggle="tab">Basic Details</a></li>
					    	<li role="presentation"><a href="#guardian_info" aria-controls="guardian_info" role="tab" data-toggle="tab">Guardian Info</a></li>
					    	<li role="presentation"><a href="#acadmic_details" aria-controls="acadmic_details" role="tab" data-toggle="tab">Academic Details</a></li>
					    	<li role="presentation"><a href="#student_document" aria-controls="student_document" role="tab" data-toggle="tab">Student Document</a></li>
						</ul>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
					{{-- <form id="example-form" action="{{route('student_detail.store')}}" method="post" enctype="multipart/form-data"> --}}
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="Basic_details">
					     <section>

				        	<h3>Basic Details</h3>
							<div class="row form-group">
							<div class="col-md-4 col-sm-6 col-xs-6 error-div">
								<label class="required">First Name</label>
								<input type="text" name="f_name" id="f_name" class="form-control required">
								@error('f_name')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>								
							<div class="col-md-4 col-sm-6 col-xs-6 error-div">
								<label>Middle Name</label>
								<input type="text" name="m_name" id="m_name" class="form-control">
								@error('m_name')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>									
							<div class="col-md-4 col-sm-6 col-xs-6 error-div">
								<label class="required">Last Name</label>
								<input type="text" name="l_name" id="l_name" class="form-control required">
								@error('l_name')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 error-div">
								<label class="required">Gender</label>
								<select name="gender" class="form-control required" id="gender">
									<option value="">Select Gender</option>
										@foreach($studentGenders[0] as $key =>$studentGender)
											<option value="{{$key}}">{{$studentGender}}</option>
									@endforeach
								</select>
								@error('gender')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 error-div">
								<label class="required">Date of Birth</label>
								<input type="text" name="dob" class="form-control datepicker required" data-date-format="yyyy-mm-dd" placeholder="{{date('Y-m-d')}}" id="dob">
								@error('dob')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 error-div">
								<label class="required">Birth Place</label>
								<input type="text" name="birth_place" class="form-control birth_place required " placeholder="" id="birth_place">
								@error('birth_place')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 error-div">
								<label>Blood Group</label>
								<select class="form-control" name="blood_id" id="blood_id">
									<option value="">Select Blood Group</option>
									@foreach($studentBloodGroups as$studentBloodGroup)
										<option value="{{$studentBloodGroup->id}}">{{$studentBloodGroup->blood_group_name}}</option>
									@endforeach
								</select>
								@error('blood_group')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6">
								<label>Nationality</label>
								<select name="nationality_id" class="form-control" id="nationality_id">
									<option value="">Select Nationality</option>
									@foreach($stdNationality as $key =>$studentNationalite)
											<option value="{{$studentNationalite->id}}">{{$studentNationalite->nationality_name}}</option>
									@endforeach
								</select>
								@error('nationality_name')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6">
								<label>Mother tongue</label>
								<select name="language_id" class="form-control" id="language_id">
								<option value="">Select Mother Tongue</option>
								 	@foreach($mothetongueMast as $studentMothertongue)<option value="{{$studentMothertongue->id}}">{{$studentMothertongue->mothetongue_name}}</option>@endforeach >
								</select>
								@error('language_id')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6">
								<label>Other Language Known</label>
								
								<input type="text" name="other_languages" class="form-control" id="other_languages">
								@error('other_languages')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6">
								<label>Cast</label>
								
								<input type="text" name="cast" class="form-control" id="cast">
								@error('cast')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 error-div">
								<label class="required">Cast Category</label>
								<select class="form-control required" name="reservation_class_id" id="reservation_class_id">
									<option value="">Select Category</option>
									@foreach($castCategory as $castCategories)
										<option value="{{$castCategories->id}}">{{$castCategories->caste_category_name}}</option>
									@endforeach
								</select>
								@error('reservation_class_id')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6">
								<label>Age</label>
								
								<input type="text" name="age" class="form-control" id="age">
								@error('age')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6">
								<label> Aadhar Card Number</label>
								
								<input type="text" name="aadhar_card" class="form-control" id="aadhar_card">
								@error('aadhar_card')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6">
								<label>  Family SSMID  </label>
								
								<input type="text" name="s_ssmid" class="form-control" id="s_ssmid">
								@error('s_ssmid')
									<span class="text-danger">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-4 col-xs-6 col-sm-6 error-di">
	        						<label class="">City</label>
	        						<select name="p_city_id" class="form-control" id="p_city_id">
	        						<option value="">Select City</option>
        							@foreach($city as $cities)
										<option value="{{$cities->state_id}}" >{{$cities->city_name}}</option>
									@endforeach
	        						</select>
	        				</div>
        					<div class="col-md-4 col-xs-6 col-sm-6 error-di">
        						<label class="" id="">State</label>
        						<select name="p_state_id" class="form-control" id="p_state_id">
        						<option value="">Select State</option>
        						<option value="0"></option></select>
        					</div>
    						<div class="col-md-4 col-xs-6 col-sm-6 error-di"><label>Country</label>
							<select name="p_country_id" class="form-control" id="p_country_id">
								<option value="">Select Country</option>
								<option value="0"></option></select>
    						</div>
    						<div class="col-md-4 col-xs-6 col-sm-6 error-di">
        						<label class="">Pin</label>
        						<input type="text" name="p_pin" class="form-control" id="p_pin">
        					</div>

        					<div class="col-md-4 col-sm-6 col-xs-6 error-di mt-2">
	        					<label class="">Address <strong class="text-danger">*</strong>
	        					</label>
	        					<textarea class="form-control" name="address" id="p_address">
	        					</textarea>
        					</div>
        					<div class="col-md-4 col-xs-6 col-sm-6 error-di">
        						<label class="">Photo</label>
        						<input type="file" name="s_poho" class="form-control" id="s_poho">
        					</div>	
						</div>
						<input type="hidden" name="basic_info" id="b_info">
				        </section>
						{{-- <span class="previous-tab">previous</span> --}}
						{{-- <span class="next-tab btn-success">Save&Continue</span> --}}
						<button class="next-tab text-white" id="basic_info" value="basic_info">Save&Continue</button>

					    </div>

					    <div role="tabpanel" class="tab-pane" id="guardian_info">
							<h3>Guardian Info</h3>
						        <section>
					        	<div class="row" >
					        		<div class="col-md-12" style="border:1px solid #cacaca; " id="guard_info" >

					        		</div>
					        	</div>
					        	<div class="row">
					        		<div class="col-md-12" style="border:1px solid #cacaca; " id="sibling_info" >
					        			<h2>Other Sivling Staying With the Student</h2>
					        		</div>
					        	</div>
						        </section>
							<span class="previous-tab">previous</span>
							<span ></span>
							<button class="next-tab">Save&Continue</button>
						</div>
						<div role="tabpanel" class="tab-pane" id="acadmic_details">
							<h3>Academic Details</h3>
					     <section>
					        	
		        			<div class="form-group row relation">
		        			<div class="col-sm-12 col-md-4 col-xs-6 error-di">
		        				<label >Previous School (Institution) <strong class="text-danger">*</strong></label>
		        				<input type="text" name="prev_school" class="form-control " id="prev_school">
		        				</div>
		        				<div class="col-md-4 col-sm-6 col-xs-6 error-di">
		        					<label class="required"> Year of completion (left from Previous School)  <strong class="text-danger">*</strong>
		        					</label>
		        				<input type="text" name="year_of_prev_school" class="form-control " id="year_of_prev_school">
		        				</div>
		        				<div class="col-md-4 col-sm-6 col-xs-6 error-di">
		        					<label class="required"> Standard  <strong class="text-danger">*</strong>
		        					</label>
		        				<input type="text" name="prev_school_standard" class="form-control " id="prev_school_standard">
		        				</div>
		        				
		        					
		        				</div>
		        				<div class="row form-group">
		        					<div class="col-md-3 col-xs-6 col-sm-6 error-di">
		        						<label class="">City</label>
		        						<select name="acadmic_city_id" class="form-control" id="acadmic_city_id">
		        						<option value="">Select City</option>
	        							@foreach($city as $cities)
											<option value="{{$cities->state_id}}" >{{$cities->city_name}}</option>
										@endforeach
		        						</select>
		        					</div>
		        					<div class="col-md-3 col-xs-6 col-sm-6 error-di">
		        						<label class="" id="">State</label>
		        						<select name="acadmic_state_id" class="form-control" id="acadmic_state_id">
		        						<option value="">Select State</option>
		        						<option value="0"></option></select>
		        					</div>
	        						<div class="col-md-3 col-xs-6 col-sm-6 error-di"><label>Country</label>
        							<select name="acadmic_country_id" class="form-control" id="acadmic_country_id">
        								<option value="">Select Country</option>
        								<option value="0"></option></select>
	        						</div>
	        						<div class="col-md-3 col-xs-6 col-sm-6 error-di">
		        						<label class="">Pin</label>
		        						<input type="text" name="acadmic_pin" class="form-control" id="acadmic_pin">
		        					</div>

		        					<div class="col-md-6 col-sm-6 col-xs-6 error-di mt-2">
			        					<label class="">Address <strong class="text-danger">*</strong>
			        					</label>
			        					<textarea class="form-control" name="address" id="acadmic_address">
			        					</textarea>
		        					</div>	
	        						<div class="col-md-6 col-sm-6 col-xs-6 error-di mt-2">
			        					<label class="">Reason for withdrawal from the present School <strong class="text-danger">*</strong></label>
			        					<textarea class="form-control" name="acadmic_remark" id="acadmic_remark">
			        					</textarea>
			        				</div>
	        							<hr>
	        						</div>
					          
					        	</section>	
							<span class="previous-tab">previous</span>
							{{-- <span class="next-tab btn-success">Save&Continue</span> --}}
							<button class="next-tab">Save&Continue</button>

						</div>
						<div role="tabpanel" class="tab-pane" id="student_document">
					  	<input type="hidden" name="studentid" id="studentid" value="">
                        <div class="card">
                              <table border="0" style="" id="student_doc">
                                <thead>
                                   <tr style="background-color: #e3f2fd;">
                                      {{-- <th rowspan="2">ID</th> --}}
                                      <th>SNo.</th>
                                      <th > Document Title  </th>
                                      <th > Document Description </th>
                                      <th > File </th>
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
                                         <textarea id="doc_description" name="doc_description[]" class="form-control doc_description" placeholder="Enter doc description" value="{{ old('doc_description[]') }}"></textarea> 
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
                                       <div class="form-group col-md-12 mt-5" align="left" >
                                          
                                      </div>
                                   </tr>
                                 </tbody>
                              </table>
                             {{--  <h2 align="right"> <strong> </strong><span class="total_local_fare_amount">0</span> </h2> --}}
                        </div>
                        <ul>
						<li>Proof of age (birth certificate).</li>
						<li>Proof of residential address- Electricity Bill/Telephone( landline) bill/Latest Bank Account Statement/- lease deed made within six months prior to the submission of the application form along with an affidavit on stamp paper should be submitted in case of rental accommodation.</li>
							
						</ul>
					    <div class="input-group mb-3 group-end mt-2">
					     {{--  <a class="btn btn-danger btnPrevious">Previous</a> --}}
					      <span class="previous-tab">previous</span>
					      {{-- <input type="submit" name="submit" value="Submit"  class="btn btn-success btnSubmit"> --}}
					      {{-- <span class="next-tab btn-success">Save&Continue</span> --}}
							<button class="next-tab">Save&Continue</button>

					    </div>
					</div>
							{{-- <span class="previous-tab">previous</span>
							<span class="next-tab">next</span> --}}
							
							    </div>
							    @csrf
							{{-- </form> --}}
							<input type="hidden" name="email_check" value="" id="email_check">
						</div>
								
						</div>
					</div>
					</div>
					</div>
				</div>
			</main>
		</div>
	</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>

$(document).ready(function() {
	var k =0;

	var html_div ='<div class="form-group row relation"><div class="col-sm-6 col-md-3 col-xs-6 error-di"><label >Relation <strong class="text-danger">*</strong></label><select name="relation[]" class="form-control "><option value="">Select Relation</option>@foreach($studentReligions as $key =>$studentReligion)<option value="{{$studentReligion->id}}">{{$studentReligion->religion_name}}</option>@endforeach ></select></div><div class="col-md-3 col-sm-6 col-xs-6 error-di"><label class="">Name <strong class="text-danger">*</strong></label><input type="text" name="g_name[]" class="form-control "></div><div class="col-md-3 col-sm-6 col-xs-6 error-di"><label class="required">Mobile <strong class="text-danger">*</strong></label><input type="text" name="g_mobile[]" class="form-control "></div><div class="col-md-3 col-xs-6 col-sm-6 error-di"><label>Emial</label><input type="text" name="g_email[]" class="form-control"></div></div><div class="row form-group"><div class="col-md-4 col-xs-6 col-sm-6 error-di"><label class="">Work Status</label><select name="work_status[]" class="form-control"><option value="">Select Work Status</option><option value="0">Self Employed</option><option value="1">Job</option><option value="4">Retired</option></select></div><div class="col-md-4 col-xs-6 col-sm-6 error-di"><label class="">Employment Type</label><select name="employment_type[]" class="form-control"><option value="">Select Employment Type</option><option value="0">Government</option><option value="1">Private</option></select></div><div class="col-md-4 col-xs-6 col-sm-6 error-di"><label class="">Profession Type</label><select name="profession_status[]" class="form-control"><option value="">Select Profession type</option>">@foreach($professionType as $key =>$professionTypes)<option value="{{$professionTypes->id}}">{{$professionTypes->name}}</option>@endforeach ></select></div></div><div class="form-group row"><div class="col-md-4 col-xs-6 col-sm-6 error-di"><label>Employer</label><input type="text" name="employer[]" class="form-control"></div><div class="col-md-4 col-xs-6 col-sm-6 error-di"><label>Designation</label><select class="form-control" name="designation_id[]"><option value="">Select Designation Name</option> @foreach($guardianDesignation as $key =>$guardianDesignations)<option value="{{$guardianDesignations->id}}">{{$guardianDesignations->name}}</option>@endforeach </option></select></div><div class="col-md-4 col-xs-6 col-sm-6 error-di"><label>Total Family Income (Rs)</label><input type="text" name="family_income[]" class="form-control"></div><div class="col-md-4 col-xs-6 col-sm-6 error-di"><label >Photo</label><input type="file" name="g_photo[]" id="g_photo" accept="image/*"><input type="hidden" name="g_check[]" class="g_photo" value=""><input type="hidden" name="g_id[]" value=""></div><hr></div>';


	$('#guard_info').append('<div id="row'+k+'"><div class="row form-group "><a href="#" class="pull-right btn btn-sm btn-success " style="margin:10px 10px 0px 0px" id="add_guar"><i class="fa fa-plus"></i> Add More</a></div>'+html_div+'</div>');
			        		
	k++;

    $('#add_guar').click(function(e){
    	e.preventDefault();
    	$('#guard_info').append('<div id="row'+k+'"><div class="row form-group "><a href="#" class="pull-right btn btn-sm btn-danger btn_remove" style="margin:10px 10px 0px 0px" id="'+k+'"><i class="fa fa-minus"></i></a></div>'+html_div+'</div>');
    	k++;
    });
    $(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id");
		//alert(button_id); 
		$('#row'+button_id+'').remove();
	});

	var l =0;
	var html_div1 ='<div class="form-group row sibling_relation mb-3"><div class="col-md-3 col-sm-6 col-xs-6 error-di"><label class="">Name <strong class="text-danger">*</strong></label><input type="text" name="sibling_name[]" class="form-control "></div><div class="col-sm-6 col-md-3 col-xs-6 error-di"><label >Relation <strong class="text-danger">*</strong></label><select name="sibling_relation[]" class="form-control "><option value="">Select Relation</option>@foreach($studentReligions as $key =>$studentReligion)<option value="{{$studentReligion->id}}">{{$studentReligion->religion_name}}</option>@endforeach ></select></div><div class="col-md-3 col-sm-6 col-xs-6 error-di"><label class="required">Age <strong class="text-danger">*</strong></label><input type="text" name="sibling_age[]" class="form-control "></div><div class="col-md-3 col-xs-6 col-sm-6 error-di"><label>Present (School/College)</label><input type="text" name="sigbling_present[]" class="form-control"></div></div></div></div>';


	$('#sibling_info').append('<div id="row'+l+'"><div class="row form-group "><a href="#" class="pull-right btn btn-sm btn-success " style="margin:10px 10px 0px 0px" id="add_sibling"><i class="fa fa-plus"></i> Add More</a></div>'+html_div1+'</div>');
			        		
	k++;
    $('#add_sibling').click(function(e){
    	e.preventDefault();
    	$('#sibling_info').append('<div id="row1'+l+'"><div class="row form-group "><a href="#" class="pull-right btn btn-sm btn-danger btn_remove1" style="margin:10px 10px 0px 0px" id="'+l+'"><i class="fa fa-minus"></i></a></div>'+html_div1+'</div>');
    	l++;
    });
    $(document).on('click', '.btn_remove1', function(){
		var button_id1 = $(this).attr("id");
		//alert(button_id); 
		$('#row1'+button_id1+'').remove();
	});

	// get State and country when select country code..........................
$('#acadmic_city_id').on('change',function(){
 var state_id = $(this).val();
	 if(state_id !='' ){
		$.ajax({
			type:'POST',

			url: "{{route('academic_state')}}",
			data: {state_id:state_id, "_token": "{{ csrf_token() }}",},
			success:function(res){
				// $('#p_state_id').empty().html(res);
				$("#acadmic_state_id").empty();
                $("#acadmic_state_id").append('<option>Select</option>');
                $("#p_state_id").empty();
                $("#p_state_id").append('<option>Select</option>');
                $.each(res,function(key,value){
            		$("#acadmic_state_id").append('<option value="'+value.country_id+'">'+value.state_name+'</option>');
            		$("#p_state_id").append('<option value="'+value.country_id+'">'+value.state_name+'</option>');
        		});
			}
		});
	}else{
		alert('please select state field');
	}
	});

$('#acadmic_state_id').on('change',function(){
 var country_id = $(this).val();
	 if(country_id !='' ){
		$.ajax({
			type:'POST',
			url: "{{route('academic_country')}}",
			data: {country_id:country_id, "_token": "{{ csrf_token() }}",},
			success:function(res){
				// $('#p_state_id').empty().html(res);
				$("#acadmic_country_id").empty();
                $("#acadmic_country_id").append('<option>Select</option>');
                $("#p_country_id").empty();
                $("#p_country_id").append('<option>Select</option>');
                $.each(res,function(key,value){
            		$("#acadmic_country_id").append('<option value="'+value.id+'">'+value.country_name+'</option>');
            		$("#p_country_id").append('<option value="'+value.id+'">'+value.country_name+'</option>');
        		});
			}
		});
	}else{
		alert('please select country field');
	}
	});
$('#p_city_id').on('change',function(){
 var state_id = $(this).val();
	 if(state_id !='' ){
		$.ajax({
			type:'POST',

			url: "{{route('academic_state')}}",
			data: {state_id:state_id, "_token": "{{ csrf_token() }}",},
			success:function(res){
				// $('#p_state_id').empty().html(res);
				
                $("#p_state_id").empty();
                $("#p_state_id").append('<option>Select</option>');
                $.each(res,function(key,value){
            		
            		$("#p_state_id").append('<option value="'+value.country_id+'">'+value.state_name+'</option>');
        		});
			}
		});
	}else{
		alert('please select state field');
	}
	});

$('#p_state_id').on('change',function(){
 var country_id = $(this).val();
	 if(country_id !='' ){
		$.ajax({
			type:'POST',
			url: "{{route('academic_country')}}",
			data: {country_id:country_id, "_token": "{{ csrf_token() }}",},
			success:function(res){
				
                $("#p_country_id").empty();
                $("#p_country_id").append('<option>Select</option>');
                $.each(res,function(key,value){
            		
            		$("#p_country_id").append('<option value="'+value.id+'">'+value.country_name+'</option>');
        		});
			}
		});
	}else{
		alert('please select country field');
	}
	});
/* add table row For student document..................................*/
/* add table row For student document..................................*/
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
    });

 	$(document).on('click', '.add_more_std_doc', function(){
       var row_id = $(this).attr("id");

       $('#'+row_id).remove();
     });
/* end add table row For student document..................................*/

//next and priview page..................
 	/*jQuery('body').on('click','.next-tab', function(){
      var next = jQuery('.nav-tabs > .active').next('li');
      if(next.length){
        next.find('a').trigger('click');
      }else{
        jQuery('#myTabs a:first').tab('show');
      }
	});*/

	jQuery('body').on('click','.previous-tab', function(){
	      var prev = jQuery('.nav-tabs > .active').prev('li')
	      if(prev.length){
	        prev.find('a').trigger('click');
	      }else{
	        jQuery('#myTabs a:last').tab('show');
	      }
	});
//end next and priview page..................

	$(document).on('click','#basic_info,.next-tab',function(){
		 alert($(this).val())
		var f_name = $('#f_name').val();
		var m_name = $('#m_name').val();
		var l_name = $('#l_name').val();
		var gender = $( "#gender option:selected" ).val();
		var dob = $('#dob').val();
		var birth_place = $('#birth_place').val();
		var blood_id = $( "#blood_id option:selected" ).val();
		var language_id = $( "#language_id option:selected" ).val();
		var other_languages = $('#other_languages').val();
		var cast = $('#cast').val();
		var reservation_class_id = $( "#reservation_class_id option:selected" ).val();
		var age = $('#age').val();
		var aadhar_card = $('#aadhar_card').val();
		var s_ssmid = $('#s_ssmid').val();
		var p_city_id = $( "#p_city_id option:selected" ).val();
		var p_state_id = $( "#p_state_id option:selected" ).val();
		var p_country_id = $( "#p_country_id option:selected" ).val();
		var p_pin = $( "#p_pin option:selected" ).val();
		var p_address = $('#p_address').val();
		var s_poho = $('#s_poho').val();

		// if (f_name !='' && l_name !='' && gender !='' && dob !='' && birth_place !='' && blood_id !='' && language_id !='' && cast !='' && reservation_class_id !='' && p_city_id !='' && age !='' && aadhar_card !='' && s_ssmid !='' && p_state_id !='' && reservation_class_id !='' && p_country_id !='' && p_pin !='' && p_address !='' && s_poho !='' ) {
			 //code for nex button..........
			 var next = jQuery('.nav-tabs > .active').next('li');
		      if(next.length){
		        next.find('a').trigger('click');
		      }else{
		        jQuery('#myTabs a:first').tab('show');
		      }
		 //end code for nex button..........


		$.ajax({
			type:'POST',
			url:'{{route('save_student_basic_info')}}',

			data: {
				f_name:f_name,
				m_name:m_name,
				l_name:l_name,
				gender:gender,
				dob:dob,
				birth_place:birth_place,
				blood_id:blood_id,
				language_id:language_id,
				other_languages:other_languages,
				cast:cast,
				reservation_class_id:reservation_class_id,
				age:age,
				aadhar_card:aadhar_card,
				s_ssmid:s_ssmid,
				p_city_id:p_city_id,
				p_state_id:p_state_id,
				p_country_id:p_country_id,
				p_pin:p_pin,
				p_address:p_address,
				s_poho:s_poho,
		    	contentType: 'multipart/form-data',

				"_token": "{{ csrf_token() }}"
				},
				success:function(res){

				}
		});
		// }else{
		// 	alert('please sele all field');
		// }

	});	

});

</script>

@include('frontend-layouts.footer')


<!--Generated by Endurance Page Cache-->