
<div class="row mb-2">
	<input type="button" value="Print this page" onClick="printReport()"  class="bt btn-success">
</div>
<script type="text/javascript">
    function printReport()
    {
        var prtContent = document.getElementById("reportPrinting");
        var WinPrint = window.open();
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
        document.write( "<link rel='stylesheet' href='style.css' type='text/css' media='print'/>" );
    }
</script>
 
<div class="container" id="reportPrinting"	>
		<div class="col-sm-12">
			<div class="row " >
				<br><br>

				<div class="col-md-6 m-auto" {{-- style="border: solid black; " --}} style="border: solid;">
					{{-- <h3 style="text-align:center">Identity Card</h3> --}}
						<div class="card1">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-md-4 mt-3">
									<img src="{{ asset('frontend-logos/LIS_Logo-1.png')}}" alt="image" width="100px;" />
								</div>
								<div class="col-md-8 school_heading text-center" >
									<u style="text-align: center;font-size: 13px;margin-top: 17px; color: #136D40;"><strong>LAKSHYA INTERNATION SCHOOL</strong></u>
									<div class="school_address" style="text-align: center;font-size: 10px;">
									<span>(Lakshit Shiksha Evam Unnati Samiti)</span><br>

										<span><strong>School</strong>:&nbsp;&nbsp;Khachrod Jaora Road Junction, Nagda, (M.P.)</span><br>
									
									<span><strong>Email</strong>:&nbsp;&nbsp;hr@lisnagda.org <strong>Website</strong>:&nbsp;&nbsp;lisnagda.org</span><br>
									<span><strong>Phone </strong>:&nbsp;+91-78798-22222</span></div>
									
								</div>
							</div>
						</div>
						<div style="background: #136D40; margin-top: 17px;"><h3 style="color: #ffff;" align="center"> <b>IDENTITY CARD</b></h3></div>
						<div class="col-md-6 full-center">
							<div class="row " align="center" >
								<span class="student_image" style="border:2px solid black; margin-right: 15px;margin-left: 142px;margin-top: 13px;" >
									<img src="{{asset('img/student_demo.png')}}" style="width: 100px; height: 100px;">
								</span>	
							</div>
						</div>
						<h3 align="center">{{student_name($student)}}</h3>
						<div class="designation" style="margin-left: 20px;">
							{{-- @foreach($student->studentsGuardiantMast as $value)
								<h5>
									@foreach($studentsGuardiant as $value2)
										@if($value->relation_id == $value2->guardiant_relation->id)
											@if($value2->guardiant_relation->religion_name== 'Father')
												Father Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$value->g_name}}
											@elseif($value2->guardiant_relation->religion_name== 'Mother')
											Mother Name &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$value->g_name}}	
											@elseif($value2->guardiant_relation->religion_name != 'Mother' && $value2->guardiant_relation->religion_name != 'Father')
											 Guardiant Name &nbsp;&nbsp;&nbsp;&nbsp;: {{$value->g_name}}	
											@endif
										@endif
									@endforeach</h5>
							@endforeach --}}
							<h5>Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$student->age}}</h5>
							<h5>Blood Group &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$student->blood_id !=null ? Arr::get(BLOODGROUP,$student->blood_id) : ''}}</h5>
							<h5>Class Teacher &nbsp;&nbsp;&nbsp;:&nbsp;XYZ</h5>
							<h5>Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$student->p_address}} , {{$student->p_city}}, {{$student->p_state}}, {{$student->p_country}}, {{$student->p_zip_code}}</h5>
							<h5>Emergency Contact No. &nbsp;&nbsp;:
							{{-- 	<?php $count = 1; ?> --}}
								{{-- @foreach($student->studentsGuardiantMast as $value)
								 {{$count++}}.&nbsp;{{$value->mobile}} <br>
								@endforeach --}}
							</h5>
						</div>
					
				</div>
			</div>

		{{-- 	<div class="col-md-6 id_card" style="border: solid;">
					<div class="card1">
						<div class="card_back" style="width: 100px;align-self: center; margin-top: 10px;">
							<img src="{{ asset('frontend-logos/LIS_Logo-1.png')}}" alt="image" style="width: 100px;align-items: center; margin-left: 190px;" />
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
					<br>
					<h3 align="right"><strong>Principal</strong></h3>
					</div>
				</div>
			</div>
		</div>
 --}}
		</div>
		</div>
</div>
 {{-- <a href="{{ url('pdf') }}" class="btn btn-success mb-2">Export PDF</a> --}}
   