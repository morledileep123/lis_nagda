 @extends('layouts.main')
 @section('content')

<div class="container">
<div class="col-lg-12">
{{-- @include('layouts.comman') --}}
@include('admin.class.header')

 
<div class="container">
	<div class="row mt-2">
    <div class="col-lg-12">

      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          <div class="panel-heading">
				<h4 class="panel-title"> Subject Assign to Students  </h4>
				<div class="app-title full-right">
	               @if($message = Session::get('success'))
	                      
	                <div class="alert alert-success">
	                  {{ $message }}
	                </div>
	                @endif
              </div>
			</div>
        </div>
       <div class="col-md-12">
		<div class="panel panel-default">
			<div class="card-body">
			<div class="panel-body">				
				<div class="row">
				  <div class="col-md-3">
						<label>Course</label> 
						<select class="form-control" name="std_class_id" id="std_class_id">
							<option value="">Select Class</option>
								@foreach($classes as $key=>$class)
									<option value="{{$class->id}}">{{$class->class_name}}</option>
								@endforeach
							</select>
					</div>								
					<div class="col-md-3">
						<label>Batch</label> 
						<select class="form-control" name="batch_id" id="batch_id">
							<option value="">Select Batch</option>
							@foreach($batches as $key=>$batch)
								<option value="{{$batch->id}}">{{$batch->batch_name}}</option>
							@endforeach
							 
						</select>
					</div>
					
					<div class="col-md-3">
						<label>Section</label> 
						<select class="form-control" name="section_id" id="section_id"> 
							<option value="">Select Section</option>
							@foreach($sections as $key=>$section)
								<option value="{{$section->id}}">{{$section->section_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-2 show_result" >
						<button class="btn btn-sm btn-primary" id="btnFilter" style="margin-top: 33px;">Search</button>
						<a href="{{ URL::previous() }}" class="btn btn-sm btn-success pull-right" style="margin-top: 33px;">Back</a>
					</div>

				</div>
				<br>
				
				<div class="row">
					<div class="col-md-12 table-responsive" id="tableFilter">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">

					<table class="table table-striped table-bordered mytable dataTable no-footer" id="mytable" role="grid" aria-describedby="sampleTable">
						<thead>
							<tr role="row">
								<th class="sorting_asc">#</th>
								<th>Admission<br> Number</th>
								<th>Student Name</th>
								<th>Father Name</th>
								<th>Subjects Group</th>
							</tr>
						</thead>
					<tbody>
						
						<tr class="odd">
							<td colspan="10" class="dataTables_empty" valign="top">No data available in table</td>
						</tr>
					</tbody>
					</table>
				    </div> 					
				  </div>
				</div>
			 </div>
			</div>
		</div>
	</div>
</div>
<script>
	
	$(document).ready(function(){
		$('#btnFilter').on('click',function(e){
			e.preventDefault();
			var batch_id = $('select[name="batch_id"] option:selected').val();
			var std_class_id = $('select[name="std_class_id"] option:selected').val();
			var section_id = $('select[name="section_id"] option:selected').val();
			var std_class_name =  $('select[name="std_class_id"] option:selected').text();
			var std_batch_name =  $('select[name="batch_id"] option:selected').text();
			var std_section_name =  $('select[name="section_id"] option:selected').text();
			var page = 'student_detail';
			 if(section_id !=''  && batch_id !='' && std_class_id != '' ){
				$.ajax({
					type:'POST',
					url: "{{route('student_get_for_assign_subject')}}",
					data: {batch_id:batch_id,std_class_id: std_class_id, section_id:section_id,page:page,"_token": "{{ csrf_token() }}",},
					success:function(res){
						// alert();
						$('#tableFilter').empty().html(res);
						$('#tableFooter').show();
						$('.subject_group_name').val(std_class_name+ '-'+std_batch_name+ '-'+std_section_name);

					}
				});
			}else{
				alert('please select all field');
			}

		});
		$('body').on('click','.selectAll' ,function(){	
			// console.log('select');
			 if ($(this).is( ":checked" )) {
				$('body .check').prop('checked',true);

			 }else{
				$('body .check').prop('checked',false);
			 }
		});
		
	});
</script>
 @endsection
