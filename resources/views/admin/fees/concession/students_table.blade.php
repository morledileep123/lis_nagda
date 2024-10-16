<table class="table table-hover table-bordered mytable">
	<thead>
		<tr>
			<th><input type="checkbox" name="s_id" class="selectAll" id="s_id"></th>
			<th>Admission Number</th>
			<th>Student Name</th>
			<th>Father Name</th>
		</tr>
	</thead>
	<tbody>
		@php $count = 0; @endphp
		@foreach($students as $student)
		<tr>
			<th><input type="checkbox" name="s_id[]" class="selectAll" value="{{$student->id}}" {{count($student_ids) != 0 ? (!empty(collect($student_ids)->where('s_id',$student->id)->first()) ? 'checked="checked" disabled="disabled"' : '') : ''}} ></th>

			<td>{{ $student->admision_no }}</td>
			<td>{{ student_name($student) }}</td>
			<td>{{student_first_guardian($student)['relation'] .' '.student_first_guardian($student)['name'] }}</td>
			
		</tr>
		@endforeach
	</tbody>
</table>
 <div class="row mb-2">
 	<div class="col-md-12">
 		<button type="submit" class="btn btn-sm btn-success" id="submit">Apply</button>
 	</div>
 </div> 
<style >
	.mr{
		margin-right: 10px;
	}
</style>
<script >
	$(document).ready(function(){
		$('.mytable').DataTable();
		$("#s_id").on('click',function () {
            $(".selectAll").attr('checked', this.checked);
        });
  	

	})
</script>