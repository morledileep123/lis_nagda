<table class="table table-hover table-bordered mytable">
	<thead>
		<tr>
			@if($page == 'student_manage')
				<th><input type="checkbox" name="selectAll" class="selectAll"></th>
			@else
				<th>#</th>
			@endif
			<th>Photo</th>
			<th>Admission Number</th>
			<th>Roll Number</th>
			<th>Student Name</th>
			<th>Class</th>
			<th>Admission Date</th>
			<th>Mobile Number</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@php $count = 0; @endphp
		@foreach($students as $student)
		<tr>
			@if($page == 'student_manage')
				<td><input type="checkbox" name="checked[]" class="check" value="{{$student->id}}"></td>
			@else
				<td>{{++$count}}</td>				
			@endif
			<td class="text-center sorting_1 odd">
				<img src="{{asset($student->photo !=null ? 'storage/'.$student->photo : 'img/student_demo.png')}}" style="width: 30px; height: 30px;">
			</td>
			<td>{{ $student->admision_no }}</td>
			<td>{{ $student->roll_no }}</td>
			<td>{{ student_name($student) }}</td>

			<td>{{ $student->student_class->class_name  }}</td>
			<td>
				{{date('d-m-Y',strtotime($student->addm_date))}} 
			</td>
			<td>{{ $student->s_mobile }}</td>

			<td>
				<form action="{{route('student_detail.destroy', $student->id)}}" method="POST" id="delform_{{$student->id}}">
				@method('DELETE')

				@if($page != 'student_record')
					<span class="mr">
					<a href="{{route('student_detail.edit', $student->id)}}" ><i class="  fa fa-edit text-green" style="font-size: 16px;"></i></a></span>
				@endif

				{{-- @if($page == 'student_detail') <span class="mr" >
					<a href="javascript:$('#delform_{{$student->id}}').submit();"  onclick="return confirm('Are you sure?')" ><i class=" fa fa-trash text-red" style="font-size: 16px;" ></i></a>
				</span>
				@endif --}}
				<span class="mr">
					<a href="{{route('student_detail.show', $student->id )}}" ><i class=" fa fa-eye text-primary" style="font-size: 16px;"></i></a>
				</span>
				<span class="mr">
					<a href="{{route('print_student_info', $student->id )}}" ><i class=" fa fa-print text-info" style="font-size: 16px;"></i></a>
				</span>

				@csrf

			</form>

			</td>
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