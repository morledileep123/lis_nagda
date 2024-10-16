@extends('layouts.main')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('admin.students.header')
			</div>
		</div>
		<div class="row mb-4">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">
							Students Manage
						</h5>
					</div>
					<div class="card-body">
						@include('layouts.filter_common')
							<hr>
						<div class="row mt-4 mb-4">
							<div class="col-md-12 table-responsive tableBody" >
								<table class="table table-hover table-bordered" >
									<thead>
										<tr>
										<th>#</th>
										<th>Roll Number</th>
										<th>Photo</th>
										<th>Student Name</th>
										<th>Class</th>
										<th>Year of Admission</th>
										<th>Batch</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
										<tr class="text-center">
											<td colspan="10" class="dataTables_empty" valign="top">No data available in table</td>						
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="row"  style="margin-top: 10px; display: none"  id="tableFooter">
							<div class="col-md-12" >
								<button class="btn btn-sm btn-info pull-right mr-2" id="btnTransfer">Transfer to Next Class</button>
								<button class="btn btn-sm btn-info pull-right mr-2" id="btnDropOut">Drop Out</button>
								<button class="btn btn-sm btn-info pull-right mr-2" id="btnForward">Forward</button>
							</div>
						</div>

						<div class="row" style="margin-top: 10px; display: none" id="forwardDiv">
							<div class="col-md-3">
								<select class="form-control" name="std_class_id" id="forwardClass"> 
									<option value="">Select Class</option>
										@foreach($classes as $key=>$class)
											<option value="{{$class->id}}">{{$class->class_name}}</option>
										@endforeach
									</select>
							</div>								
							<div class="col-md-3">
								<select class="form-control" name="batch_id" id="forwardBatch">
									
								</select>
							</div>
							
							<div class="col-md-3">
								<select class="form-control" name="section_id" id="forwardSection"> 
									
								</select>
							</div>

							<div class="col-md-3 pt-1"  id="forwardSuccess" style="display: none">
								<button class="btn btn-sm btn-success mr-2" id="forwardNow">Forward Now</button>
								<button class="btn btn-sm btn-danger mr-2" id="forwardCancel">Cancel</button>
							</div>
						</div>


						<div class="row" id="dropoutDiv" style="display: none;">
							<div class="col-md-4">
								<label>Students Dropout Date:</label>
								<input type="text" name="dropout_date" class="form-control datepicker" readonly="true" data-date-format="yyyy-mm-dd" placeholder="Enter Dropout Date Here..." id="dropoutDate" >
							</div>		
							<div class="col-md-8 pt-4" id="dropoutSuccess">
								<button class="btn btn-sm btn-success mt-2" id="dropoutNow"
								>Drop Out Now</button>
								<button class="btn btn-sm btn-danger mt-2 mr-2" id="dropoutCancel">Cancel</button>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@include('layouts.common')
<script >
	$(document).ready(function(){
		$('#btnFilter').on('click',function(e){
			e.preventDefault();
			var batch_id = $('select[name="batch_id"] option:selected').val();
			var std_class_id = $('select[name="std_class_id"] option:selected').val();
			var section_id = $('select[name="section_id"] option:selected').val();
			var medium		 = $('select[name="medium"] option:selected').val();
			var status = 'R';
			var user_id = 'user_id';

			var page = 'student_detail';
			 if(section_id !=''  && batch_id !='' && std_class_id != '' ){
				$.ajax({
					type:'POST',

					url: "{{route('student_filter')}}",
					data: {batch_id:batch_id,std_class_id: std_class_id, section_id:section_id,user_id:user_id,page:page,medium:medium,status:status, "_token": "{{ csrf_token() }}",page:'student_manage'},
					success:function(res){
						// alert();
						$('.tableBody').empty().html(res);
						$('#tableFooter').show();

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

		$('#btnForward').on('click',function(){
			var id = [];
	        $('body .check:checked').each(function(i){
	          id[i] = $(this).val();
	        });
	        if(id.length != '0'){
	        	$('#tableFooter').hide();	        	
	        	$('#forwardDiv').show();
	        	// console.log(id);
	        }else{
	        	alert('Please check at least one checkbox');
	        }
		});


		$('#forwardClass').on('change',function(e){
			e.preventDefault();
			var std_class_id = $(this).val();
			var select_batch_id = '#forwardBatch';
			if(std_class_id !=''){
				batch_fetch(std_class_id,select_batch_id);
			}
		});
	

		$('#forwardBatch').on('change',function(e){
			e.preventDefault();
			var batch_id = $(this).val();
			var select_section_id = '#forwardSection';
			var std_class_id = $('#forwardClass').val();
			section_fetch(std_class_id,batch_id,select_section_id);
		});

		
		$('#forwardSection').on('change',function(){
			var forwardClass = $('#forwardClass').val();
			var forwardBatch = $('#forwardBatch').val() ;
			var forwardSection = $('#forwardSection').val() ;
			if(forwardClass != '' && forwardBatch != ''&& forwardSection != ''){
				$('#forwardSuccess').show();			
			}else{
				$('#forwardSuccess').hide();
			}
		});

		$('#forwardCancel').on('click',function(){
			$('#tableFooter').show();
			$('#forwardClass').val('');	 
			$('#forwardBatch').val('');      	
			$('#forwardSection').val('');      	
			$('#forwardSuccess').hide();
	        $('#forwardDiv').hide();
		});	

		$('#btnDropOut').on('click',function(){
			var stud_id = [];
	        $('body .check:checked').each(function(i){
	          stud_id[i] = $(this).val();
	        });
	        if(stud_id.length !='0'){
	        	$('#tableFooter').hide();	 
	        	$('#dropoutDiv').show();
	        	$('#dropoutSuccess').show();
	        }else{
	        	alert('Please check at least one checkbox');
	        }
			
		});

		$('#dropoutCancel').on('click',function(){
			$('#tableFooter').show();
			$('#dropoutDate').val('');	      	
			$('#dropoutSuccess').hide();
	        $('#dropoutDiv').hide();
		});



		$('#forwardNow').on('click',function(){
			var stud_id = [];
			var batch_id = $('#batch_id').val();

			var forwardClass = $('#forwardClass').val();	     
			var forwardBatch = $('#forwardBatch').val() ;
			var forwardSection = $('#forwardSection').val();


	        $('body .check:checked').each(function(i){
	          stud_id[i] = $(this).val();
	        });

			if(stud_id.length != '0'){
	        	if(batch_id == forwardBatch){
					alert('Students batch and forward batch are same');
				}else{
					studentUpdate(stud_id,forwardClass,forwardSection,forwardBatch,'F');
				}	
	        }else{
	        	alert('Please check at least one checkbox');
	        }
		});

		$('#btnTransfer').on('click',function(){
			var stud_id = [];

			var forwardClass   = $('#std_class_id').val();
			var forwardBatch   = $('#batch_id').val();
			var forwardSection = $('#section_id').val();

	        $('body .check:checked').each(function(i){
	          stud_id[i] = $(this).val();
	        });
			
	
			if(stud_id.length != '0'){	        
				studentUpdate(stud_id,forwardClass,forwardSection,forwardBatch,'T');				
	        }else{
	        	alert('Please check at least one checkbox');
	        }
		});




		function studentUpdate(stud_id,forwardClass,forwardSection,forwardBatch,status){

			swal({
				  title: "Are you sure?",
				  text: "Make Sure you choose correct student to"+(status == "F" ? 'forward' : 'transfer')+". If you are not sure then close this pop up window sfsf",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((isConfirm) => {
				  if (isConfirm) {
				   	$.ajax({
				   		type:'post',
				   		url: "{{route('forward_transfer_student')}}",
				   		data:{status:status,stud_id:stud_id,forwardClass:forwardClass,forwardSection:forwardSection,forwardBatch:forwardBatch,"_token": "{{ csrf_token() }}"},
				   		success:function(res){
				   			console.log(res);

				   			if(res.status == 'success'){
				   				swal({
					   				icon:'success',
					   				title: res.message,
					   				button: true,
					   			}).then((ok)=> {
					   				if(ok){
					   					location.reload();
					   				}
					   			});
				   			}else{
				   				swal({
					   				icon:'error',
					   				title: res.message
					   			});
				   			}
					   			
				   		}
				   	});
				  } 
				});
		}



		$('#dropoutNow').on('click',function(){
			var dropout_date = $('#dropoutDate').val();
			var stud_id = [];
	        $('body .check:checked').each(function(i){
	          stud_id[i] = $(this).val();
	        });
			// console.log(passout_date);
			if(dropout_date != ''){
				swal({
				  title: "Are you sure?",
				  text: "Make Sure you choose correct student transfer to Drop Out list. If you are not sure then close this pop up window",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((isConfirm) => {
				  if (isConfirm) {
				   	$.ajax({
				   		type:'post',
				   		url: "{{route('dropout_student')}}",
				   		data:{dropout_date:dropout_date,stud_id:stud_id,"_token": "{{ csrf_token() }}"},
				   		success:function(res){
				   			 //console.log(res);
				   			// swal({
				   			// 	icon:'success',
				   			// 	title: res,
				   			// 	button: true,
				   			// }).then((ok)=> {
				   			// 	if(ok){
				   			// 		location.reload();
				   			// 	}
				   			// });
				   		}
				   	});
				  } 
				});
			}else{
				alert('The dropout date field is required');
			}
		});






	})
</script>
@endsection
