<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>
				<input type="checkbox" name="all" class="selectAll">
			</th>
			<th>Name</th>
			<th>Roll Number</th>
			<th>Attendance Date</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		@foreach($attendances as $attendance)
			<tr>
				<td>
					<input type="checkbox" name="s_id[]"  class="check" value="{{$attendance->student->id}}" 
						{{$attendance->present == 'P' ? 'checked="checked"' : '' }}

					>
					{{-- <button class="btn btn-sm btn-success">P</i></button>	
					<button class="btn btn-sm btn-danger">A</i></button>	 --}}
				</td>
				<td>{{student_name($attendance->student)}}</td>
				<td>{{$attendance->student->roll_no}}</td>
				<td>{{$attendance->student->attendance_date}}</td>
				<td>
					{{$attendance->present}}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
<div class="row">
	<div class="col-md-12">
		<button class="btn btn-sm btn-success pull-right" id="updateBtn">Update</button>
	</div>
</div>