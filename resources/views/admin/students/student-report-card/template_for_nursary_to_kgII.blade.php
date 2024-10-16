<div class="report_cart_table">
	Roll No. – {{$students->roll_no}} <br>
	Student’s Name-  {{$students->f_name}} <br>
	{{isset($students) ? student_first_guardian($students)['relation'] : ''}} {{isset($students) ? student_first_guardian($students)['name'] : ''}} <br>

	{{isset($students) ? student_first_guardian($students)['relation1'] : ''}} {{isset($students) ? student_first_guardian($students)['name1'] : ''}}<br>
	
	Date of Birth: {{$students->dob}} <br>
	Class/ Section: {{$students->student_class->class_name}} ({{$students->student_section->section_name}})<br>
	<div class="row mt-4">
		<div class="col-md-12">
			{{-- <div class="std_table "> --}}
				{{-- <ul class="nav nav-tabs" > --}}
		    @foreach($getClasses->assignsubject as $getClass)

				<?php $alf = array(0=>'A',1=>'B',2=>'C',4=>'D',5=>'E',6=>'F',7=>'G',8=>'H'); ?>

					@foreach($getClass->assign_subjectId  as $key => $getClassesss)
						{{-- <div class="tab-content  con{{$key}}" style="overflow-x:auto;"> --}}
					<div  id="tab{{$key}}" >
								{{-- {{dd($getClass->assign_subjectId )}} --}}
						@if($getClassesss->subject->subject_name != 'GK')
						
						<table border="1" style="width: 100%;" id="table{{$key}}">
							<tr>
								<td ></td>
								<span ><strong></strong></span>
								<td><strong>{{$getClassesss->subject->subject_name}}</strong></td> 

						        @foreach($reportCardHeaders->report_card_headre as $reportCardHeader)
									<td >{{$reportCardHeader->header_title}}</td>
								@endforeach	
								
								<?php $count = count($reportCardHeaders->report_card_headre); ?>
								
								<tr>
								<?php $count1 = 1; ?>

								@foreach($getClassesss->subject->subsubjects as $subsubjects) 
								<tr>
									<td>&nbsp;&nbsp;{{$count1++}}.&nbsp;&nbsp;</td>
									<td>{{$subsubjects->subject_name}}</td>
										@for($i=1; $i <= $count ; $i++)
											@if($subsubjects->subject_name != 'Reading skill' && $subsubjects->subject_name != 'Writing Skills' && $subsubjects->subject_name != 'Speaking skill' && $subsubjects->subject_name != 'Understanding of Lessons1')
											<td class="sub_field{{$subsubjects->id}}">
											<input type="text" name="marks_grade[]" placeholder="Mask/Grd" maxlength="8" size="8"  class="form-control">

											<input type="hidden" name="subject_id[]"  value="{{$subsubjects->id}}">	
											</td>
											@endif
										@endfor
									@foreach($subsubjects->subsubjects as $subsubject)
										<tr>
											<td></td>
											<td>{{$subsubject->subject_name}}</td>
											@for($i=1; $i <= $count ; $i++)
												<td>
													<input type="text" name="marks_grade[]" placeholder="Mask/Grd" maxlength="8" size="8"  class="form-control">
													<input type="hidden" name="subject_id[]"  value="{{$subsubject->id}}">	
												</td>
											@endfor
										</tr>	
									@endforeach
								 </tr>
								@endforeach
							</tr>		
						</table>
						@else
						<table border="1" style="width: 100%;" id="table{{$key}}">
						@if(isset($getClassesss->subject->subject_name) != 'GK')
							<tr>
								<td ></td>
								<span ><strong>{{($getClassesss->subject->subject_name)}}</strong></span>
								<td><strong>{{$getClassesss->subject->subject_name}}</strong></td> 

						        @foreach($reportCardHeaders->report_card_headre as $reportCardHeader)
									<td >{{$reportCardHeader->header_title}}</td>
								@endforeach	
								
								<?php $count = count($reportCardHeaders->report_card_headre); ?>
								
								<tr>
								<?php $count1 = 1; ?>
								
								@foreach($getClassesss->subject->subsubjects as $subsubjects) 
								<tr>
									<td>&nbsp;&nbsp;{{$count1++}}.&nbsp;&nbsp;</td>
									<td>{{$subsubjects->subject_name}}</td>
										@for($i=1; $i <= $count ; $i++)
											<td class="sub_field{{$subsubjects->id}}">
											<input type="text" name="marks_grade[]" placeholder="Mask/Grd" maxlength="8" size="8"  class="form-control">

											<input type="hidden" name="subject_id[]"  value="{{$subsubjects->id}}">	
											</td>
										@endfor
									@foreach($subsubjects->subsubjects as $subsubject)
										<tr>
											<td></td>
											<td>{{$subsubject->subject_name}}</td>
											@for($i=1; $i <= $count ; $i++)
												<td>
													<input type="text" name="marks_grade[]" placeholder="Mask/Grd" maxlength="8" size="8"  class="form-control">
													<input type="hidden" name="subject_id[]"  value="{{$subsubject->id}}">	
												</td>
											@endfor
										</tr>	
									@endforeach
								 </tr>
								@endforeach
							</tr>		
						@endif
						</table>
					@endif
					    {{-- <a class="btn btn-primary btnNext" >Next</a> --}}
					  {{-- </div> --}}
				</div>
				@endforeach
			@endforeach
		{{-- </ul> --}}
		</div>
	{{-- </div> --}}
	</div>
</div>
<style type="text/css">
./*sub_field25,.sub_field29{
	display: none;
}
#tab2 ,#tab3,#tab4,#tab5,#tab6,#tab8,#tab7{
    margin-top: 10px;
}
#tab6{
    margin-left: 38px;
}
#tab8 {
    margin-left: 119px;
}
#tab1 {
    margin-left: 30px;
}
#con7 {
    margin-left: 30px;
}*/
</style>
<script type="text/javascript">
	 $('.btnNext').click(function(){
  	$('.nav-tabs > .active').next('li').find('a').trigger('click');
});

$('.btnPrevious').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});
</script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min. css">--}}

<!-- jQuery library -->

<!-- Latest compiled JavaScript -->
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}