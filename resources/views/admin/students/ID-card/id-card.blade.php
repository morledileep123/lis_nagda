	<?php 	 echo $data = '<div class="col-sm-12"><div class="row " id="printarea"><br><br><div class="col-md-6"  style="border: solid;"><div class="card1"><div class="col-sm-12"><div class="row"><div class="col-md-4 mt-3"><img src="asset("frontend-logos/LIS_Logo-1.png")" alt="image" width="100px;" />
								</div>
								<div class="col-md-8 school_heading" >
									<u style="text-align: center;font-size: 13px;margin-top: 17px; color: #136D40;"><strong>LAKSHYA INTERNATION SCHOOL</strong></u>
									<div class="school_address" style="text-align: center;font-size: 10px;">
									<span>(Lakshit Shiksha Evam Unnati Samiti)</span><br>

										<span><strong>School</strong>:&nbsp;&nbsp;Khachrod Jaora Road Junction, Nagda, (M.P.)</span><br>
									
									<span><strong>Email</strong>:&nbsp;&nbsp;hr@lisnagda.org</span><br>
									<span><strong>Website</strong>:&nbsp;&nbsp;lisnagda.org</span><br>
									<span><strong>Phone </strong>:&nbsp;&nbsp; +91-78798-22222</span></div>
									
								</div>
							</div>
						</div>
						<div style="background: #136D40; margin-top: 17px;"><h3 style="color: #ffff;" align="center"> <b>IDENTITY CARD</b></h3></div>
						<div class="col-md-6 full-center">
							<div class="row " align="center" >
								<span class="student_image" style="border: 5px solid black; margin-right: 15px;margin-left: 142px;margin-top: 13px;" >
									<img src="{{asset($getData->photo !=null ? "storage/".$getData->photo : "storage/admin/student_demo.png")}}" style="width: 100px; height: 100px;">
								</span>	
							</div>
						</div>
						<h1 align="center">{{$getData->f_name}}{{$getData->l_name}}</h1>
						<div class="designation" style="margin-left: 20px;">
							@foreach($getData->studentsGuardiantMast as $value)
								<h5>
									@foreach($studentsGuardiant as $value2)
										@if($value->relation_id == $value2->guardiant_relation->id)
											@if($value2->guardiant_relation->religion_name== "Father")
												Father Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$value->g_name}}
											@elseif($value2->guardiant_relation->religion_name== "Mother")
											Mother Name &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$value->g_name}}	
											@elseif($value2->guardiant_relation->religion_name != "Mother" && $value2->guardiant_relation->religion_name != "Father")
											 Guardiant Name &nbsp;&nbsp;&nbsp;&nbsp;: {{$value->g_name}}	
											@endif
										@endif
									@endforeach</h5>
							@endforeach
							<h5>Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$getData->age}}</h5>
							<h5>Blood Group &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$getData->stdBloodGroup->blood_group_name}}</h5>
							<h5>Class Teacher &nbsp;&nbsp;&nbsp;:&nbsp;XYZ</h5>
							<h5>Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$getData->p_address}} , {{$getData->p_city->city_name}}, {{$getData->p_state->state_name}}, {{$getData->p_country->country_name}}, {{$getData->p_zip_code}}</h5>
							<h5>Emergency Contact No. &nbsp;&nbsp;:
								<?php $count = 1; ?>
								@foreach($getData->studentsGuardiantMast as $value)
								 {{$count++}}.&nbsp;{{$value->mobile}} <br>
								@endforeach
							</h5>
						</div>
						{{-- <div class="social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						</div> --}}
				</div>
			</div>
		{{-- <div class="col-md-1 " >
		</div> --}}
				<div class="col-md-6 id_card" style="border: solid;">
					{{-- <h3 style="text-align:center">Identity Card</h3> --}}
						<div class="card1">
							<div class="card_back" style="width: 100px;align-self: center; margin-top: 10px;">
								<img src="{{ asset("frontend-logos/LIS_Logo-1.png")}}" alt="image" style="width: 100px;align-items: center; margin-left: 190px;" />
							</div>
						<div class="school_heading" style="text-align: center;font-size: 20px;margin-top: 20px; color: #136D40; align-self: center;">
							<strong>LAKSHYA INTERNATION SCHOOL</strong>
							<div style="background: #136D40; "><h5 style="color: #ffff; height: 5px;" align="center"  > <b>&nbsp;</b></h5></div>
						</div>
						<hr><h4 align="center"><strong>-NAGDA-</strong></h4>
					<div class="designation">
						<div class="designation" style="margin-left: 20px;">
							<h5><strong>School</strong>:&nbsp;&nbsp;Khachrod Jaora Road Junction, Nagda, (M.P.)</h5><br>
							<h5><strong>City Office</strong>:&nbsp;&nbsp;Lakshya Internation School, Adjacent to Petrol Pump, Opp. Nagar Palika Nagda Bus Stand, Nagda (M.P.)</h5><br>
							<h5><strong>Email</strong>:&nbsp;&nbsp;hr@lisnagda.org</h5><br>
							<h5><strong>Website</strong>:&nbsp;&nbsp;lisnagda.org</h5>
						{{-- <br><br><br><br><br> --}}<br>
						<h3 align="right"><strong>Principal</strong></h3>
						</div>
					</div>
				</div>
		</div>
	</div>
<div>';
?>
