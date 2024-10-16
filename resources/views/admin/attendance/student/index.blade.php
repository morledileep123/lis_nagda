@extends('layouts.main')
@section('content')

<div class="container">
	<div class="row mb-4">
		<div class="col-md-12">
			@include('admin.attendance.header')
		</div>
	</div>
	<div class="row mb-4">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Student Attendance  <span class="pull-right">Today Date :- {{date('d-m-Y')}} | Time: {{date('h:i A')}}</span></h5>
				</div>
				<div class="card-body">
					@include('layouts.filter_common')
					
					<div class="row">
						<div class="col-md-12" id="tableBody">
				
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
		$(document).on('click','.selectAll' ,function(){	
			 // console.log('select');
			 if ($(this).is( ":checked" )) {
				$('body .check').prop('checked',true);

			 }else{
				$('body .check').prop('checked',false);
			 }
		});

		$('#btnFilter').on('click',function(e){
			e.preventDefault();
			filter_students();
		});

		$(document).on('click','#btnSubmit',function(e){
			e.preventDefault();
			var present_student = [];
			var i = 0;
			$('input[name="s_id[]"]:checked').each(function() {
				present_student[i++] = $(this).val();
			});
			// console.log(present_student)
			var j =0;
			var total_student = [];
			$('input[name="s_id[]"]').each(function() {
				total_student[j++] = $(this).val();
			});
			
			// console.log(s_ids1);
			// if(present_student.length !=0){
			$.ajax({
				type:'post',
				url:'{{route('attendance.submit')}}',

				data:{present_student:present_student,total_student:total_student, "_token": "{{ csrf_token() }}"},
				success:function(res){
					// console.log(res)
					if(res == 'success'){
						$.notify("Students attendance successfully submitted",'success');
						
					}else if(res =='warning'){
						$.notify("Student attendance already submitted");
					}else{
						$.notify("You can't submit weekend day attendance");
					}
					filter_students();
				}
			});

		});
		function filter_students(){
		
			var batch_id = $('select[name="batch_id"] option:selected').val();
			var std_class_id = $('select[name="std_class_id"] option:selected').val();
			var section_id = $('select[name="section_id"] option:selected').val();
			var medium = $('select[name="medium"] option:selected').val();
			var status = 'R';
			var user_id = 'user_id';

			var page = 'student_detail';
			 if(section_id !=''  && batch_id !='' && std_class_id != '' ){
				$.ajax({
					type:'POST',

					url: "{{route('attendance.student_fetch')}}",
					data: {batch_id:batch_id,std_class_id: std_class_id, section_id:section_id,medium:medium,user_id:user_id,page:page,status:status, "_token": "{{ csrf_token() }}",},
					   success:function(res){
						// $('#tableFilter').empty().html(res);
						$('#btn-show').show();
						$('#tableBody').empty().html(res);


					}
				});
			}else{
				$.notify("All select field are mandatory.");
			}
		}
	})

	
</script>
@endsection

