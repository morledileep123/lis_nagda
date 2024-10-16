{{-- {{dd($reportCardHeaders->header_name)}} --}}
{{-- @if($reportCardHeaders->header_name == 'Nursery(A)_to_KG-II(A)') --}}
@if($reportCardHeaders->std_class_from_id == 1 OR $reportCardHeaders->std_class_to_id == 38)
	
<input type="hidden" name="class_section_name" value="Nursery(A)_to_KG-II(A)">
@include('admin.students.student-report-card.template_for_nursary_to_kgII')

{{-- for class 1st(A)_to_5th(A) and 6th(A)_to_8th(A) --}}
@elseif($reportCardHeaders->std_class_from_id == 4 OR $reportCardHeaders->std_class_to_id == 8 OR $reportCardHeaders->std_class_from_id == 9 OR $reportCardHeaders->std_class_to_id == 11  )
<style type="text/css">
/*table {
	
	table-layout: fixed;
	width: 1060px;
}*/
</style>

<div class="report_cart_table">
	Roll No. – {{$students->roll_no}} <br>
	Student’s Name-  {{$students->f_name}} <br>
	{{isset($students) ? student_first_guardian($students)['relation'] : ''}} {{isset($students) ? student_first_guardian($students)['name'] : ''}} <br>

	{{isset($students) ? student_first_guardian($students)['relation1'] : ''}} {{isset($students) ? student_first_guardian($students)['name1'] : ''}}<br>
	{{-- Father’s Name: {{$students->students_guardiant_masts[0]}}<br>
	Mother’s Name:  {{$students->students_guardiant_masts[1]}}<br> --}}
	Date of Birth: {{$students->dob}} <br>
	Class/ Section: {{$students->student_class->class_name}} ({{$students->student_section->section_name}})<br>
	<div class="row">
		<div class="col-md-12">
			{{-- <div class="std_table" style="overflow-x:auto;"> --}}
				<table border="1" width="1050px;">
					<tr>
						<th >Scholastic Areas:</th>
						<th colspan="6">Term-I (100 Marks)</th>
						<th  colspan="6">Term-2 (100 Marks)</th>
					</tr>
					<tr>
						<th>Subject Name</th>
						@foreach($reportCardHeaders->report_card_headre as $reportCardHeader)
							<td >{{$reportCardHeader->header_title}}</td>
						@endforeach	
						<?php $count = count($reportCardHeaders->report_card_headre); 
						?>	
						@foreach($getClasses->assignsubject as $getClass)
							@foreach($getClass->assign_subjectId as $getClassesss)
								<tr>
									<td>{{$getClassesss->subject->subject_name}}</td>
										@for($i=1; $i <= $count ; $i++)
											<td><input type="text" name="marks_grade[]" placeholder="Mask/Grd" maxlength="4" size="4">	
											<input type="hidden" name="subject_id[]"  value="{{$getClassesss->subject->id}}"></td>
										@endfor
								</tr>
							@endforeach
						@endforeach
					</tr>
				</table>
			{{-- </div> --}}
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-md-12">
			<div class="std_table2">
				<table border="1" >
					<tr>
						<th colspan="12">Co-Scholastic Areas: Term-I [ on  a 3 – point (A-C) grading scale]</th>
						<th colspan="12">Co-Scholastic Areas: Term-I [ on  a 3 – point (A-C) grading scale]</th>
					</tr>
					<tr>
						<th colspan="6"> </th>
						<th colspan="6">Grade </th>
						<th colspan="6"> </th>
						<th colspan="6">Grade </th>
					</tr>
					<tr>
						<th colspan="6">Work Education ( or Pre-vocational Education) </th>
						<th colspan="6"><input type="text" name="work_education"> </th>
						<th colspan="6">Work Education ( or Pre-vocational Education) </th>
						<th colspan="6"><input type="text" name="work_education2"> </th>
					</tr>
					<tr>
						<th colspan="6">Art Education </th>
						<th colspan="6"><input type="text" name="art_education"> </th>

						<th colspan="6">Art Education </th>
						<th colspan="6"><input type="text" name="art_education2"> </th>
					</tr>
					<tr>
						<th colspan="6">Health and Physical Education </th>
						<th colspan="6"><input type="text" name="health_phsl"></th>

						<th colspan="6">Health and Physical Education </th>
						<th colspan="6"><input type="text" name="health_phsl"></th>
					</tr>

				</table><br>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table border="1" width="100%;" style="font-size: 80%;">
				<tr class="height">
					<th colspan="4">Attendance :- </th>
					<th colspan="4"><input type="text" name="attendance" size="5"> </th>
					<th colspan="4">Total Working Days - </th>
					<th colspan="4"><input type="text" name="total_working_day" size="5"> </th>
					<th colspan="4">Total Present Days -  </th>
					<th colspan="4"><input type="text" name="total_presentd_ays" size="5"> </th>
					<th colspan="4">Attendance :- </th>
					<th colspan="4"><input type="text" name="attendance1" size="5"> </th>
					<th colspan="4">Total Working Days - </th>
					<th colspan="4"><input type="text" name="total_working_day2" size="5"> </th>
					<th colspan="4">Total Present Days -  </th>
					<th colspan="4"> <input type="text" name="total_presentd_days" size="5"> </th>
				</tr>
			</table>
			<table border="1" width="100%;"  style="font-size: 80%;">
				<tr>
					 <th colspan="8" align="right"> </th>
                      <th colspan="4"  align="right">Grade </th> 
                      <th colspan="8" align="right"> </th>
                      <th colspan="4"  align="right">Grade </th>	
				</tr>
				<tr>
					<th colspan="8">Discipline: Term –I ( on a 3 – point (A-C) grading scale </th>
					<th colspan="4"><input type="text" name="grading_scale" maxlength="5" size="6"> </th>
					<th colspan="8">Discipline: Term –I ( on a 3 – point (A-C) grading scale</th>
					<th colspan="4"> <input type="text" name="grading_scale2" maxlength="5" size="6"></th>
				</tr>
			</table><br>
		</div>
	</div>	
	<div class="row">
		<div class="col-md-4">
			<label>Remark</label>
			<input type="text" name="remark" class="form-control">
		</div>
		<div class="col-md-4">
			<label>Promoted to class</label>
				<select name="prd_to_class" class="form-control">
					<option value="" >Select promoted to class</option>
						@foreach($classes as $class)
							<option value="{{$class->id}}" >{{$class->class_name}}</option>
						@endforeach
				</select>
		</div>
		<div class="col-md-4">
			<label>Place</label>
			<input type="text" name="Place" class="form-control">
		</div>
		<div class="col-md-4">
			<label>Date</label>
			<input type="text" name="date" class="form-control datepicker">
		</div>
	</div>
	<hr >
</div>
</div>
{{-- for class '9th(A)_to_9th(A)' --}}
@elseif($reportCardHeaders->std_class_from_id == 12 OR $reportCardHeaders->std_class_to_id == 12)
<div class="report_cart_table">
	<div class="row">
		<div class="col-md-12">
			Roll No. – {{$students->roll_no}} <br>
			Student’s Name-  {{$students->f_name}} <br>
			{{isset($students) ? student_first_guardian($students)['relation'] : ''}} {{isset($students) ? student_first_guardian($students)['name'] : ''}} <br>

			{{isset($students) ? student_first_guardian($students)['relation1'] : ''}} {{isset($students) ? student_first_guardian($students)['name1'] : ''}}<br>
			{{-- Father’s Name: {{$students->students_guardiant_masts[0]}}<br>
			Mother’s Name:  {{$students->students_guardiant_masts[1]}}<br> --}}
			Date of Birth: {{$students->dob}} <br>
			Class/ Section: {{$students->student_class->class_name}} ({{$students->student_section->section_name}})<br>
		 </div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="std_table">
				<table border="1" width="100%;">
					<tr>
						<th >Scholastic Areas:</th>
						<th colspan="7" style="text-align: center;">Academic Year (100 Marks)</th>
						{{-- <th  colspan="6">Term-2 (100 Marks)</th> --}}
					</tr>
					<tr>
						<th>Subject Name</th>
						{{-- {{$reportCardHeaders->report_card_headre}} --}}
						@foreach($reportCardHeaders->report_card_headre as $reportCardHeader)
							<td >{{$reportCardHeader->header_title}}</td>
						@endforeach	
						<?php $count = count($reportCardHeaders->report_card_headre); 
						?>	
						@foreach($getClasses->assignsubject as $getClass)
							@foreach($getClass->assign_subjectId as $getClassesss)
								<tr>
									<td>{{$getClassesss->subject->subject_name}}</td>
										@for($i=1; $i <= $count ; $i++)
											<td><input type="text" name="marks_grade[]" placeholder="Mask/Grd" maxlength="8" size="8" required="" class="form-control">	
											<input type="hidden" name="subject_id[]"  value="{{$getClassesss->subject->id}}" required=""></td>
										@endfor
								</tr>
							@endforeach
						@endforeach
					</tr>
					<tr>
						<th colspan="0"></th>
						<th  colspan="5" style="text-align: center;">Grand Total <input type="text" name="grand_total" ></th>
						<th colspan="5"></th>
					</tr>
				</table>
			</div><br><br>
		</div>
	</div>
	<div class="std_table2">
		<div class="row">
			<div class="col-md-6">
				<table border="1">
					<tr>
						<th colspan="12">Co-Scholastic Areas: Term-I [ on  a 3 – point (A-C) grading scale]</th>
					</tr>
					<tr>
						<th colspan="4"> </th>
						<th colspan="4">Grade </th>
					</tr>
					<tr>
						<th colspan="4">Work Education ( or Pre-vocational Education) </th>
						<th colspan="4"><input type="text" name="work_education" maxlength="4" size="4" class="form-control"> </th>
					</tr>
					<tr>
						<th colspan="4">Art Education </th>
						<th colspan="4"><input type="text" name="art_education" maxlength="4" size="4" class="form-control"> </th>
					</tr>
					<tr>
						<th colspan="4">Health and Physical Education </th>
						<th colspan="4"><input type="text" name="health_phsl" maxlength="4" size="4" class="form-control"></th>
					</tr>
				</table><br>
			</div>
			<div class="col-md-4" style="border: solid;">
				<span><u>Attendance : -</u></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="attendance" maxlength="3" size="3" ><br><br>
				<span>1. Total Working Days -</span> &nbsp;&nbsp; <input type="text" name="total_working_day" maxlength="3" size="3" ><br><br>
				<span>2. Total Present   Days - –</span>&nbsp;&nbsp; <input type="text" name="total_presentd_days" maxlength="3" size="3" ><br><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<table border="1">
					<tr>
						<th colspan="8" align="right"> </th>
						<th colspan="8" align="right">Grade </th>
					</tr>
					<tr>
						<th colspan="8">Discipline: Term –I ( on a 3 – point (A-C) grading scale </th>
						<th colspan="4"><input type="text" name="grading_scale" maxlength="3" size="3" class="form-control"></th>						
					</tr>
				</table><br>
			</div>
			<div class="col-md-6 mt-2">
				<table border="1">
					<tr>
						<th> Class Teacher’s remark:</th>
						<th ><input type="text" name="remark" class="form-control"></th>
					</tr>
				</table><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<label>Promoted to class</label>
				<select name="prd_to_class" class="form-control">
					<option value="" >Select promoted to class</option>
						@foreach($classes as $class)
							<option value="{{$class->id}}" >{{$class->class_name}}</option>
						@endforeach
				</select>
			</div>
			<div class="col-md-4">
				<label>Place</label>
				<input type="text" name="Place" class="form-control">
			</div>
			<div class="col-md-4">
				<label>Date</label>
				<input type="text" name="date" class="form-control datepicker">
			</div>
		</div>
	</div>
</div>
{{-- @elseif($reportCardHeaders->header_name == '10th(A)_to_10th(A)') --}}
{{-- for class '10th(A)_to_10th(A)' --}}
@elseif($reportCardHeaders->std_class_from_id == 13 OR $reportCardHeaders->std_class_to_id == 13)
<div class="report_cart_table">
	<div class="row">
		<div class="col-md-12">
			Roll No. – {{$students->roll_no}} <br>
			Student’s Name-  {{$students->f_name}} <br>
			{{isset($students) ? student_first_guardian($students)['relation'] : ''}} {{isset($students) ? student_first_guardian($students)['name'] : ''}} <br>

			{{isset($students) ? student_first_guardian($students)['relation1'] : ''}} {{isset($students) ? student_first_guardian($students)['name1'] : ''}}<br>
			{{-- Father’s Name: {{$students->students_guardiant_masts[0]}}<br>
			Mother’s Name:  {{$students->students_guardiant_masts[1]}}<br> --}}
			Date of Birth: {{$students->dob}} <br>
			Class/ Section: {{$students->student_class->class_name}} ({{$students->student_section->section_name}})<br>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="std_table">
				<table border="1" width="100%;">
					<tr>
						<th >Scholastic Areas:</th>
						<th colspan="7" style="text-align: center;">Academic Year (100 Marks)</th>
						{{-- <th  colspan="6">Term-2 (100 Marks)</th> --}}
					</tr>
					<tr>
						<th>Subject Name</th>
						{{-- {{$reportCardHeaders->report_card_headre}} --}}
						@foreach($reportCardHeaders->report_card_headre as $reportCardHeader)
							<td >{{$reportCardHeader->header_title}}</td>
						@endforeach	
						<?php $count = count($reportCardHeaders->report_card_headre); 
						?>	
						@foreach($getClasses->assignsubject as $getClass)
							@foreach($getClass->assign_subjectId as $getClassesss)
								<tr>
									<td>{{$getClassesss->subject->subject_name}}</td>
										@for($i=1; $i <= $count ; $i++)
											<td><input type="text" name="marks_grade[]" placeholder="Mask/Grd" maxlength="8" size="8"  class="form-control">	
											<input type="hidden" name="subject_id[]"  value="{{$getClassesss->subject->id}}" required=""></td>
										@endfor
								</tr>
							@endforeach
						@endforeach
					</tr>
					<tr>
						<th colspan="0"></th>
						<th  colspan="5" style="text-align: center;">Grand Total <input type="text" name="grand_total" ></th>
						<th colspan="5"></th>
					</tr>
				</table>
			</div><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 test"  style="margin-left: 83px;"><br>
			<span ><u><b>Attendance : -</b></u></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="attendance"  ><br><br>
			<span>&nbsp;&nbsp;&nbsp;&nbsp;1. Total Working Days -</span> &nbsp;&nbsp; <input type="text" name="total_working_day" ><br><br>
			<span>&nbsp;&nbsp;&nbsp;&nbsp;2. Total Present   Days - –</span>&nbsp;&nbsp; <input type="text" name="total_presentd_days" size="3" ><br><br>
		</div>
	</div>
	<div class="col-md-4 mt-3">
		<span> Class Teacher’s remark:</span><input type="text" name="remark" class="form-control">
	</div>

	<div class="col-md-4">
		<label>Promoted to class </label>
			<select name="prd_to_class" class="form-control">
				<option value="" >Select promoted to class</option>
					@foreach($classes as $class)
						<option value="{{$class->id}}" >{{$class->class_name}}</option>
					@endforeach
			</select>
		
		<br>
		<label>Place </label>
		<input type="text" name="Place" class="form-control">
		<label>Date  </label>
		<input type="text" name="date" class="form-control datepicker">
	</div>


{{-- @elseif($reportCardHeaders->header_name == '11th(Sci-Math + PE)_to_11th(Sci-Math + PE)' OR $reportCardHeaders->header_name == '11th(Sci-Bio + PE)_to_11th(Sci-Bio + PE)' OR $reportCardHeaders->header_name == '11th(Commerce + PE)_to_11th(Commerce + PE)'OR $reportCardHeaders->header_name == '11th(Maths-IP)_to_11th(Maths-IP)') --}}
{{-- for class '11' using section wise--}}
@elseif($reportCardHeaders->std_class_from_id == 14 OR $reportCardHeaders->std_class_to_id == 14 AND $reportCardHeaders->section_id == 2 OR $reportCardHeaders->section_id == 3 OR $reportCardHeaders->section_id == 4 OR $reportCardHeaders->section_id == 5 )
	<div class="row">
		<div class="col-md-12">
			<div class="report_cart_table">
			Roll No. – {{$students->roll_no}} <br>
			Student’s Name-  {{$students->f_name}} <br>
			{{isset($students) ? student_first_guardian($students)['relation'] : ''}} {{isset($students) ? student_first_guardian($students)['name'] : ''}} <br>

			{{isset($students) ? student_first_guardian($students)['relation1'] : ''}} {{isset($students) ? student_first_guardian($students)['name1'] : ''}}<br>
			{{-- Father’s Name: {{$students->students_guardiant_masts[0]}}<br>
			Mother’s Name:  {{$students->students_guardiant_masts[1]}}<br> --}}
			Date of Birth: {{$students->dob}} <br>
			Class/ Section: {{$students->student_class->class_name}} ({{$students->student_section->section_name}})<br>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="std_table">
				<table border="1" width="100%;">
					<tr>
						<th >Scholastic Areas:</th>
						<th colspan="7" style="text-align: center;">Academic Year (100 Marks)</th>
						{{-- <th  colspan="6">Term-2 (100 Marks)</th> --}}
					</tr>
					<tr>
						<th>Subject Name</th>
						{{-- {{$reportCardHeaders->report_card_headre}} --}}
						@foreach($reportCardHeaders->report_card_headre as $reportCardHeader)
							<td >{{$reportCardHeader->header_title}}</td>
						@endforeach	
						<?php $count = count($reportCardHeaders->report_card_headre); 
						?>
						@foreach($getClasses->assignsubject as $getClass)
							@foreach($getClass->assign_subjectId as $getClassesss)
								<tr>
									<td>{{$getClassesss->subject->subject_name}}</td>
										@for($i=1; $i <= $count ; $i++)
											<td><input type="text" name="marks_grade[]" placeholder="Mask/Grd" maxlength="8" size="8" required="" class="form-control">	
											<input type="hidden" name="subject_id[]"  value="{{$getClassesss->subject->id}}" required=""></td>
										@endfor
								</tr>
							@endforeach
						@endforeach
					</tr>
					
				</table>
				<div class="row mt-4">
					<div class="col-md-6">
						<table border="1">
							<tr>
								<th colspan="0"></th>
								<th  colspan="5" style="text-align: center;">Overall  Grade <input type="text" name="grand_total" ></th>
								<th colspan="5"></th>
							</tr>
						</table>
					</div>
				</div>
			</div><br><br>
		</div>
	</div>
	<div class="std_table2">
		<div class="row">
			<div class="col-md-12">
				<table border="1" width="100%;">
					<tr>
						<th colspan="12">Grading of Internal Assessment  </th>
					</tr>
					<tr>
						<th colspan="12"> </th>
						<th colspan="12">Grade </th>
					</tr>
					<tr>
						<th colspan="12">500- Work Experience </th>
						<th colspan="12"><input type="text" name="work_education" maxlength="4" size="4" class="form-control"> </th>
					</tr>
					<tr>
						<th colspan="12">502-Health and Physical Education </th>
						<th colspan="12"><input type="text" name="health_phsl" maxlength="4" size="4" class="form-control"> </th>
					</tr>
					<tr>
						<th colspan="12">503- General Studies </th>
						<th colspan="12"><input type="text" name="art_education" maxlength="4" size="4" class="form-control"></th>
					</tr>
				</table><br>
			</div>
			<div class="col-md-6" >
				<span><u>Attendance : -</u>&nbsp;&nbsp;
				Total Working Days -</span> &nbsp;&nbsp; <input type="text" name="total_working_day"  ><br><br>

				<span>Total Present Days:</span> &nbsp;&nbsp; <input type="text" name="total_presentd_days" ><br><br>

				<span>Class Teacher’s remark:</span>&nbsp;&nbsp; <input type="text" name="remark" ><br><br>

				<span>Promoted to class:</span>&nbsp;&nbsp;
					<select name="prd_to_class" class="form-control">
						<option value="" >Select promoted to class</option>
							@foreach($classes as $class)
								<option value="{{$class->id}}" >{{$class->class_name}}</option>
							@endforeach
					</select>
				<br>

				<span>Place:</span>&nbsp;&nbsp; <input type="text" name="place" ><br><br>

				<span>Date:</span>&nbsp;&nbsp; <input type="text" name="date"  class="datepicker"><br><br>
			</div>
		</div>
</div>
@elseif($reportCardHeaders->std_class_from_id == 15)
<div class="report_cart_table">
	<div class="row">
		<div class="col-md-12">
			Roll No. – {{$students->roll_no}} <br>
			Student’s Name-  {{$students->f_name}} <br>
			{{isset($students) ? student_first_guardian($students)['relation'] : ''}} {{isset($students) ? student_first_guardian($students)['name'] : ''}} <br>

			{{isset($students) ? student_first_guardian($students)['relation1'] : ''}} {{isset($students) ? student_first_guardian($students)['name1'] : ''}}<br>
			{{-- Father’s Name: {{$students->students_guardiant_masts[0]}}<br>
			Mother’s Name:  {{$students->students_guardiant_masts[1]}}<br> --}}
			Date of Birth: {{$students->dob}} <br>
			Class/ Section: {{$students->student_class->class_name}} ({{$students->student_section->section_name}})<br>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="std_table">
				<table border="1" width="100%;">
					<tr>
						<th >Scholastic Areas:</th>
						<th colspan="7" style="text-align: center;">Academic Year (100 Marks)</th>
						{{-- <th  colspan="6">Term-2 (100 Marks)</th> --}}
					</tr>
					<tr>
						<th>Sub Name and Code</th>
						{{-- {{$reportCardHeaders->report_card_headre}} --}}
						@foreach($reportCardHeaders->report_card_headre as $reportCardHeader)
							<td >{{$reportCardHeader->header_title}}</td>
						@endforeach	
						<?php $count = count($reportCardHeaders->report_card_headre); 
						?>	
						@foreach($getClasses->assignsubject as $getClass)
							@foreach($getClass->assign_subjectId as $getClassesss)
								<tr>
									<td>{{$getClassesss->subject->subject_name}}</td>
										@for($i=1; $i <= $count ; $i++)
											<td><input type="text" name="marks_grade[]" placeholder="Mask/Grd" maxlength="8" size="8"  class="form-control">	
											<input type="hidden" name="subject_id[]"  value="{{$getClassesss->subject->id}}" required=""></td>
										@endfor
								</tr>
							@endforeach
						@endforeach
					</tr>
					<tr>
						<th colspan="0"></th>
						<th  colspan="5" style="text-align: center;">Grand Total <input type="text" name="grand_total" ></th>
						<th colspan="5"></th>
					</tr>
				</table>
			</div><br>
		</div>
	</div>
		<div class="row">
			<div class="col-md-6 form-group">
				<table border="1">
					<tr>
						<th colspan="12">Grading of Internal Assessment  (Don’t show to Student )</th>
					</tr>
					<tr>
						<th colspan="4">Subjct </th>
						<th colspan="4">Grade </th>
					</tr>
					<tr>
						<th colspan="4">Work Education (500) </th>
						<th colspan="4"><input type="text" name="work_education"  class="form-control"> </th>
					</tr>
					<tr>
						<th colspan="4">Health and Phy. Edu (502) </th>
						<th colspan="4"><input type="text" name="health_phsl"  class="form-control"></th>
					</tr>
					<tr>
						<th colspan="4">General Studies (503 </th>
						<th colspan="4"><input type="text" name="art_education"  class="form-control"> </th>
					</tr>
				</table><br>
			</div>
			<div class="col-md-4" style="border: solid;">
				<span><u>Attendance : -</u></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="attendance" maxlength="3" size="3" ><br><br>
				<span>1. Total Working Days -</span> &nbsp;&nbsp; <input type="text" name="total_working_day" maxlength="3" size="3" ><br><br>
				<span>2. Total Present   Days - –</span>&nbsp;&nbsp; <input type="text" name="total_presentd_days" maxlength="3" size="3" ><br><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 mt-2">
				<table border="1">
					<tr>
						<th> Class Teacher’s remark:</th>
						<th ><input type="text" name="remark" class="form-control"></th>
					</tr>
				</table><br>
			</div>
		</div>
		<div class="col-md-4">
			<label>Place</label>
			<input type="text" name="Place" class="form-control">
		</div>
		<div class="col-md-4">
			<label>Date</label>
			<input type="text" name="date" class="form-control datepicker">
		</div>
@endif
<div class="row mt-5">
  <div class="col-md-12">
      <input type="submit" class="btn btn-success btn-sm" name="" value="Submit">
  </div>
</div>

