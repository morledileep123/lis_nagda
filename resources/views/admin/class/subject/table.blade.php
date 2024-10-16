<div class="row mb-2">
	<div class="col-md-12">
    <b class="pull-left" id="disMsg" style="color: red; display: block;">Subjects are showing selected, but you have to click on "Assign Subjects" button to assign it.</b>
    <div class="pull-right">
        <button class="btn btn-primary" id="assignSubject" >Assign Subjects</button>
        <input class="btn btn-primary" id="resetButton" type="button" value="Refresh List">
    </div>
</div>
</div>
<table class="table table-striped table-bordered mytable">
	<thead>
		<tr>
			@if($page == 'student_detail')
				<th><input type="checkbox" name="selectAll" class="selectAll"></th>
			@else
				<th>#</th>
			@endif
			<th>Admission Number</th>
			<th>Student Name</th>
			<th>Father Name</th>
			<th>Subjects Group</th>
		</tr>
	</thead>
	<tbody>
		@php $count = 0; @endphp
		@foreach($students as $student)
		<tr>
			@if($page == 'student_detail')
			<td>
				<input type="checkbox" name="checked[]" class="check" value="{{$student->id}}">
			</td>
			@else
				<td>{{++$count}}</td>				
			@endif
			<td>{{ $student->admision_no }}</td>
			<td>{{ $student->f_name .' '. $student->l_name }}</td>
			<td>
				{{ $student->father_name }} 
			</td>
			{{-- <td>{{$student->batch->name}}</td> --}}
			<td> <input type="hidden" name="subject_group" id="subject_group_id" value="{{$assignSubject->id}}">
			<input type="text" name="subject_group_name" readonly="" value="" class="subject_group_name"> 
				{{-- <form action="{{route('student_detail.destroy', $student->id)}}" method="POST" id="delform_{{$student->id}}"> --}}
				{{-- <select name="mendatory_subject_id[]" class="form-control select2" multiple="multiple" id="mendatory_subject_id">
					@foreach($subject as $subjects)
						<option value="{{$subjects->id}}">{{$subjects->subject_name}}</option>
					@endforeach
					<option value="1">test</option>
					<option value="2">test2</option>
				</select> --}}
				{{-- @csrf
			</form> --}}

			</td>
		</tr>
		@endforeach
	</tbody>
</table>

 
</div>
<style >
	.mr{
		margin-right: 10px;
	}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script >
	$('.mytable').DataTable({
		lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
		searching:true,
		scrolling:true,
	});

	 $('body').on('click','.selectAll' ,function(){	
			// console.log('select');
			 if ($(this).is( ":checked" )) {
				$('body .check').prop('checked',true);

			 }else{
				$('body .check').prop('checked',false);
			 }
		});

		$('#assignSubject').on('click',function(){
			
			var subject_group_id = $('#subject_group_id').val();
	        var subject_group_name = $('.subject_group_name').val();
			var s_id = [];
	        $('body .check:checked').each(function(i){
	          s_id[i] = $(this).val();
	          

	        });
			if(s_id != ''){
				console.log(subject_group_id);
				swal({
				  title: "Are you sure?",
				  text: "Make Sure you assig subject group to student. If you are not sure then close this pop up window",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((isConfirm) => {
				  if (isConfirm) {
				   	$.ajax({
				   		type:'post',
				   		url: "{{route('student_add_to_assign_subject')}}",
				   		data:{subject_group_id:subject_group_id,s_id:s_id,subject_group_name:subject_group_name,"_token": "{{ csrf_token() }}"},
				   		success:function(res){
				   			// console.log(res);
				   			swal({
				   				icon:'success',
				   				title: res,
				   				button: true,
				   			}).then((ok)=> {
				   				if(ok){
				   					location.reload();
				   				}
				   			});
				   		}
				   	});
				  } 
				});
			}else{
	        	alert('Please check at least one checkbox');
				
			}
		});
</script>


