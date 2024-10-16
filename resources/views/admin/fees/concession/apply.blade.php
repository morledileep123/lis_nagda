	@extends('layouts.main')
@section('content')
<div class="container">
	<div  class="row mb-4">
		<div class="col-sm-12">@include('admin.fees.header')</div>
	</div>
 	
	<div class="row mb-4"> 
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Apply Fees Concession
						<a href="{{route('concession.index')}}" class="btn btn-sm btn-primary pull-right">Back</a>
					</h5>					
				</div>
				<div class="card-body">
					<form action="{{route('concession-apply.store')}}" method="post" autocomplete="off">
					@csrf
						<div class="row">								
							<div class="col-md-4 form-group">
								<select class="form-control" name="std_class_id" autocomplete="off" id="std_class_id"> 
									<option value="">Select Class</option>
									@foreach($classes as $key=>$class)
										<option value="{{$class->id}}">{{$class->class_name}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-4 form-group">
								<select class="form-control" name="batch_id" autocomplete="off" id="batch_id">
								    <option value="">Select Batch</option>
								</select>
							</div>
							<div class="col-md-4 form-group">
								<select class="form-control" name="head_id" autocomplete="off" id="head_id"> 
									<option value="">Select Heads</option>
										@foreach($fees_heads as $key=>$fees_head)
											<option value="{{$fees_head->fees_head_id}}">{{$fees_head->head_name}}</option>
										@endforeach
								</select>
							</div>
							<div class="col-md-6 col-xs-6 col-sm-6 form-group">
								<select class="form-control  " name="concession_id[]" id="concession"  multiple="" required="">
									<option value="0" disabled="disabled">Select Concession</option>
									@foreach($concession as $key=> $concessions)
										<option class="concession" value="{{$concessions->concession_id}}" >{{$concessions->name}}  | {{(int)$concessions->concession_amnt}} | {{$concessions->discount == 1 ? 'Flat'  :( $concessions->discount == 2 ? '%' : '')}}</option>
									@endforeach
								</select>
								{{-- <input type="hidden" name="concession_amnt" value="" id="concession_amnt"> --}}
							</div>	
						</div>
						<div class="row">
							<div class="card col-md-12">
								<div id="students_table"></div>
							</div>
						</div>
						
					</form>	
				</div>
			</div>
		</div>
	</div>	
</div>


 <script >



 	$(document).ready(function(){

 		@if($message = Session::get('error'))
	 		$.notify("{{$message}}");
	 	@endif
 		

 		$('label.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');

 		$('#std_class_id').on('change',function(){
 			var std_class_id = $(this).val();
 			$.ajax({
 				type:'GET',
 				url:'{{url('batch-fetch')}}/'+std_class_id,
 				data:{std_class_id:std_class_id,"_token": "{{ csrf_token() }}"},
 				success:function(res){
                    var html  = '';
			        $.each(res,function(key,value){
			          html += '<option value="'+value.batch_name.id+'">'+value.batch_name.batch_name+'</option>';
			        });
			        $("#batch_id").html(html)
                 }
 			});
 		});	 		
 		$('#head_id').on('change',function(){
 			var head_id = $(this).val();
 			var std_class_id = $('#std_class_id').val();
 			var batch_id = $('#batch_id').val();
 			$.ajax({
 				type:'POST',
 				url:'{{route('concession.student')}}',
 				data:{head_id:head_id,std_class_id:std_class_id,batch_id:batch_id,"_token": "{{ csrf_token() }}"},
 				success:function(res){
                    // console.log(res)
			        $("#students_table").html(res)
                 }
 			});
 		});
 		// $('.concession').on('click',function(){

			// var concession_amnt = [];
   //          var i = 0;
			// $('.concession:selected').each(function() {
			// 	concession_amnt[i++] = $(this).attr('data-concession_amnt');
			// });
			// $('#concession_amnt').val(concession_amnt)
			// alert(concession_amnt)		
 		// });


 	})	
 </script>

@endsection

