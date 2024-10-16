@extends('layouts.main')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			@include('admin.students.header')
		</div>
	</div>
	<div class="row mb-4">
		<div class="col-md-12 col-sm-12 col-lg-12">
			 <div class="card">
		        <div class="card-header">
					<h4 class="card-title">Student List <a href="{{route('student_detail.create')}}" class="btn btn-outline-primary pull-right fa fa-plus">Add Student</a></h4>
		        </div>
       			<div class="card-body">         			
					@include('layouts.filter_common')
				
					<div class="row mt-3 mb-5">
						<div class="col-md-12 table-responsive" id="tableFilter">
							<table class="table table-striped table-bordered" >
								<thead>
									<tr role="row">
										<th class="sorting_asc">#</th>
										<th class="sorting" >Roll Number</th>
										<th class="sorting" >Photo</th>
										<th>Student Name</th>
										<th class="sorting">Student Name</th>
										<th class="sorting" >Qualification</th>
										<th class="sorting" >Year of Admission</th>
										<th class="sorting" >Batch</th>
										<th class="sorting" >Action</th>
									</tr>
								</thead>
								<tbody>									
									<tr class="odd text-center" >
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
@include('layouts.common')
<script>
	$(document).ready(function(){

		$('#btnFilter').on('click',function(e){
			e.preventDefault();
			var batch_id 	 = $('select[name="batch_id"] option:selected').val();
			var std_class_id = $('select[name="std_class_id"] option:selected').val();
			var section_id 	 = $('select[name="section_id"] option:selected').val();
			var medium		 = $('select[name="medium"] option:selected').val();
			var status = 'R';
			var user_id = 'user_id';

			var page = 'student_detail';
			 if(section_id !=''  && batch_id !='' && std_class_id != '' ){
				$.ajax({
					type:'POST',
					url: "{{route('student_filter')}}",
					data: {batch_id:batch_id,std_class_id: std_class_id, section_id:section_id,user_id:user_id,page:page,medium:medium,status:status, "_token": "{{ csrf_token() }}"},
					success:function(res){
						$('#tableFilter').empty().html(res);
					}
				});
			}else{
				alert('please select all field');
			}

		});

	});
</script>
 @endsection
