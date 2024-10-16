<table class="table table-hover table-bordered mytable">
	<thead>
		<tr>	
			<th>#</th>
			<th>Photo</th>
			<th>Admission Number</th>
			<th>Roll Number</th>
			<th>Student Name</th>
			<th>Class</th>
			<th>Admission Date</th>
			<th>Mobile Number</th>
			{{-- <th>Action</th> --}}
		</tr>
	</thead>
	<tbody>
		@if(isset($students))
		@php  $count = 1 ;@endphp 
			@foreach($students as $student)
				<tr>
					<td>{{$count++}}</td>
					<td><img src="{{asset($student->student_detail->photo !=null ? 'storage/'.$student->student_detail->photo : 'img/student_demo.png')}}" style="width: 30px; height: 30px;"></td>
						<td>{{ $student->student_detail->admision_no }}</td>
					<td>{{ $student->student_detail->roll_no }}</td>
					<td>{{ student_name($student->student_detail) }}</td>

					<td>{{ $student->student_detail->student_class->class_name  }}</td>
					<td>
						{{date('d-m-Y',strtotime($student->student_detail->addm_date))}} 
					</td>
					<td>{{ $student->student_detail->s_mobile }}</td>

				{{-- 	<td>
						<form action="{{route('student_detail.destroy', $student->s_id)}}" method="POST" id="delform_{{$student->s_id}}">
						@method('DELETE')

						@if($page != 'student_record')
							<span class="mr">
							<a href="{{route('student_detail.edit', $student->s_id)}}" ><i class="  fa fa-edit text-green" style="font-size: 16px;"></i></a></span>
						@endif

						@if($page == 'student_detail') <span class="mr" >
							<a href="javascript:$('#delform_{{$student->id}}').submit();"  onclick="return confirm('Are you sure?')" ><i class=" fa fa-trash text-red" style="font-size: 16px;" ></i></a>
						</span>
						@endif
						<span class="mr">
							<a href="{{route('student_detail.show', $student->s_id )}}" ><i class=" fa fa-eye text-primary" style="font-size: 16px;"></i></a>
							
						</span>

						@csrf

					</form>

					</td> --}}
				</tr>
			@endforeach
		@else
			<tr class="odd text-center" >
				<td colspan="10" class="dataTables_empty" valign="top">No data available in table</td>
			</tr>
		@endif
	</tbody>
</table>
