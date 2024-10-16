<?php 
	$days = ['monday','tuesday','wednesday','thursday','friday','saturday']; 
	$period = ['','I' ,'II','III','IV','LUNCH','V','VI','VII','VIII','IX','X'];
?>
<table class="table">
	<thead>
		<tr colspan="2">
			<th>Period</th>
			<th>Assembly</th>
			@for($i=1; $i <= $nod ; $i++)
			<th>{{$period[$i]}}</th>
			@endfor
		</tr>
		<tr>
			<th>Time</th>
			<th>
				<input type="text" name="from_time[]" placeholder="From time" class="form-control timepicker"  size="2">
				<input type="text" name="to_time[]" placeholder="To time" class="form-control timepicker"  size="2">
			</th>
			@for($j=1; $j <= $nod ; $j++)
				@if($period == 'LUNCH')
					<th>
					<input type="text" name="from_time[]" placeholder="From time" class="form-control timepicker"  size="2">
					<input type="text" name="to_time[]" placeholder="To time" class="form-control timepicker"  size="2">
				</th>
				@else
				<th>
					<input type="text" name="from_time[]" placeholder="1From time" class="form-control timepicker"  size="2">
					<input type="text" name="to_time[]" placeholder="1To time" class="form-control timepicker"  size="2">
				</th>
				@endif
			@endfor
		</tr>
		<tr>
			<th >Day</th>
		</tr>

	</thead>
	<tbody>
		<?php
		$count = 0; ?>
		@foreach ($days as $key => $day)
			@foreach($getClasses as $class)
			<?php
			$option = '<option value="">Select Subject..</option>';
				foreach ($class->assignsubject as $subjects) {
					foreach($subjects->assign_subjectId as $subject_name){
						$id = $subject_name->subject !=null ? $subject_name->subject->id : '';
						$name = $subject_name->subject != null ? $subject_name->subject->subject_name : '' ;
						$option .='<option value="'.$id.'" >'.$name.' </option>';
					}
				}	
				$option2 = '<option value="">Select Teachers..</option>';
				foreach ($teachers as $teacher) {
					$teachers_id = $teacher->id !=null ? $teacher->id : '';
					$teacher_name = $teacher->username != null ? $teacher->username : '' ;
					$option2 .='<option value="'.$teachers_id.'" >'.$teacher_name.' </option>';
				}		
			 ?>
				<tr>
					<td>{{strtoupper($day)}}</td>
					<td></td>
					@for($j=1; $j <= $nod ; $j++)
						@if($period[$j] == 'LUNCH')
							<td>LUNCH</td>
						@else
						@if( $class->id==14 OR $class->id==15 )
						<td>
							<select name="subjects_id[]" value="{{$id}}" class="form-control sub_teacher" multiple="" >
								{!!$option!!}
							</select>
							<select name="teachers_id[]" value="{{$teachers_id}}" class="form-control sub_teacher" multiple="">
								{!!$option2!!}
							</select>
						</td>
						@else
						<td>
						<?php   $count++; ?>
							<select name="subjects_{{$j}}_{{$key+1}}"  class="form-control "  required="required">
								{!!$option!!}
							</select>
							<select name="teachers_{{$j}}_{{$key+1}}"  class="form-control" required="required">
								{!!$option2!!}
							</select>
						</td>
						@endif	
						@endif	
					@endfor
				</tr>
			@endforeach	
		@endforeach
	</tbody>
</table>
<script >
	
$(document).ready(function(){
    $('.sub_teacher').select2();
    $(function () {
      // $(".timepicker").timepicker();
	  $('.timepicker').timeselector();

    });
  })

</script>