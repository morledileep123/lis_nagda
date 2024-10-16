<hr>

<table class="table table-hover table-bordered mytable">
	<thead>
		<tr>
			<th><input type="checkbox" name="selectAll" class="selectAll"></th>		
			<th>Admission Number</th>
			<th>Student Name</th>
			<th>Admission Date</th>
			<th>Mobile Number</th>
		</tr>
	</thead>
	<tbody>
		@foreach($students as $student)
		<tr>
			<td><input type="checkbox" name="s_id[]" class="check" value="{{$student->id}}"></td>
			<td>{{ $student->admision_no }}</td>
			<td>{{ student_name($student) }}</td>
			
			<td>
				{{date('d-m-Y',strtotime($student->addm_date))}} 
			</td>
			<td>{{ $student->s_mobile }}</td>			
		</tr>
		@endforeach
	</tbody>
</table> 
<style >
	.mr{
		margin-right: 10px;
	}
</style>
<script >
	$(document).ready(function(){
		$('.mytable').DataTable();

	})
</script>