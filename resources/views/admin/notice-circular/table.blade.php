<?php if ($page != 'Teachers') { ?>	
<table class="table table-striped table-bordered mytable">
	<thead>
		<tr>
			<th><input type="checkbox" name="selectAll" class="selectAll"></th>
			<th>Admission No</th>
			<th>Student Name</th>
			<th>Mobile</th>
		</tr>
	</thead>
	<tbody>
		@php $count = 0; @endphp
		@foreach($studentsMast as $student)
			@foreach($student as $students)
				<tr>
					<td><input type="checkbox" name="s_id[]" class="check" value="{{$students->id}}"></td>
					<td>{{ $students->admission_no }}</td>
					<td>{{ $students->f_name  }} {{ $students->l_name }}</td>
					<td>
						{{ $students->s_mobile }} 
					</td>
					
				</tr>
			@endforeach
		@endforeach
	</tbody>
</table> 
	
<?php }else{ ?>
	<table class="table table-striped table-bordered mytable">
		<thead>
		<tr>
			<th><input type="checkbox" name="selectAll" class="selectAll"></th>
			<th>User Name</th>
			<th>Faculty Name</th>
			<th>Mobile</th>
		</tr>
		</thead>
		<tbody>
		@php $count = 0; @endphp
		@foreach($facultyData as $facultyDatas)
		<tr>
			<td><input type="checkbox" name="faculty_id[]" class="check" value="{{$facultyDatas->id}}"></td>
			<td>{{ $facultyDatas->username }}</td>
			<td>{{ $facultyDatas->name  }}</td>
			<td>
				{{ $facultyDatas->mobile }} 
			</td>
			
		</tr>
		@endforeach
		<?php } ?>
	</tbody>
</table> 
<style >
	.mr{
		margin-right: 10px;
	}
</style>
<script >
	$('.mytable').DataTable({
		lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
		searching:true,
		scrolling:true,
	});
</script>