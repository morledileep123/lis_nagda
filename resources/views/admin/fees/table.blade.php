<table class="table table-striped table-bordered mytable">
	<thead>
		<tr>
		
			<th><input type="checkbox" name="selectAll" class="selectAll"></th>
		
			{{-- <th>#</th> --}}
			<th>Admission Number</th>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>Last Name</th>
			<th>Admission Mode</th>
			
		</tr>
	</thead>
	<tbody>
		@php $count = 0; @endphp
		@foreach($students as $student)
		<tr>
			<td><input type="checkbox" name="students_id[]" class="check" value="{{$student->id}}"></td>
			{{-- <td>{{++$count}}</td>				 --}}
			<td>{{ $student->admision_no }}</td>
			
			<td>{{ $student->f_name }}</td>
			<td>{{ $student->m_name }}</td>
			<td>{{ $student->l_name }}</td>
			
			<td></td>
			
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
	$('.mytable').DataTable({
		lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
		searching:true,
		scrolling:true,
	});

	$('.selectAll').click(function () {
		$(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
		findIfChecked();
	});
</script>