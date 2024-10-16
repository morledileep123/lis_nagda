<table class="table">
	<thead>
		<tr>
			<th>Class Name</th>
			@for($i=1; $i <= $nod ; $i++)
				<th><input type="text" name="date[]" placeholder="Enter Date" class="form-control datepicker" required=""></th>
			@endfor
		</tr>
	</thead>
	<tbody>
	
		@foreach($getClasses as $class)
		<?php
		$option = '<option value="">Select Subject..</option>';
			foreach ($class->assignsubject as $subjects) {
				foreach($subjects->assign_subjectId as $subject_name){
					$id = $subject_name->subject !=null ? $subject_name->subject->id : '';
					$name = $subject_name->subject != null ? $subject_name->subject->subject_name : '' ;
					$option .='<option value="'.$id.'">'.$name.' </option>';
				}
			}		
		 ?>
			<tr>
				<td>{{$class->class_name}}</td>
				@for($i=1; $i <= $nod ; $i++)
					<td>
						<select name="subject_{{$i}}_{{$class->id}}" class="form-control" >
							{!!$option!!}
						</select>
					</td>
				@endfor
			</tr>
		@endforeach	
	</tbody>
</table>
<script >
	
$(document).ready(function(){
    
    $(function () {
      $(".datepicker").datepicker();

    });
  })

</script>