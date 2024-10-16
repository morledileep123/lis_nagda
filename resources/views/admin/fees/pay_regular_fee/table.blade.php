<table class="table table-hover table-bordered myTable">
	<thead>
		<tr>
			<th>#</th>
			<th>Admission Number</th>
			<th>Student Name</th>
			<th>Guardian Name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@php $count =  0 ; @endphp
		@foreach($fee_students as $fee_student)
			<tr>
				<th>{{++$count}}</th>
				<th>{{$fee_student->student->admision_no}}</th>
				<th>{{student_name($fee_student->student)}}</th>
				<th>{{student_first_guardian($fee_student->student)['relation'] .' '.student_first_guardian($fee_student->student)['name'] }}</th>
				<th><a href="{{route('pay_regular_fee_show', $fee_student->std_fees_mast_id)}}" class="btn btn-sm btn-primary">View Fees</a></th>
			</tr>
		@endforeach
	</tbody>
</table>
<script>
	$(document).ready(function(){
		$('.myTable').DataTable();
	})
</script>