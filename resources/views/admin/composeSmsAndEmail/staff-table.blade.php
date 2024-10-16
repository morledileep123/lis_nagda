	<table class="table table-bordered table-striped" id="facultiestable">
	<thead>
		<tr>
			<th>
			<input type="checkbox" name="all" class="selectAll" checked="">
			</th>
			<th>Name</th>
			<th>Email/Mobile No</th>
			<th>Job Role</th>
		</tr>
	</thead>
	<tbody>
		@foreach($getData as $getFaculties)
			<tr>
				@if(empty($getData))
				<td colspan="10">No Data found</td>
				@endif
				<td>
					<input type="checkbox" name="reciver_id[]"  class="check" value="{{$getFaculties->id}}" 
						@if(!empty($attendance_students))
						@foreach($attendance_students as $attendance_student)
							@if($attendance_student->s_id == $getFaculties->id)
								checked="checked" 
							@endif
						@endforeach
					@endif checked="">
				</td>
				<td>{{$getFaculties->name }}</td>
				<td>{{$composeType == 'E' ? $getFaculties->email : $getFaculties->mobile_no}}</td>
				<td >{{'Teacher'}}</td>
				
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
	$('#facultiestable').DataTable({
		lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
		searching:true,
		scrolling:true,
	});

</script>
