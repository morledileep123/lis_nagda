@extends('layouts.main')
@section('content')
<div class="container">
	
	<div class="row mb-4">
		<div class="col-md-12 col-sm-12 col-lg-12">
			 <div class="card">
		        <div class="card-header">
					<h4 class="card-title">Attendance</h4>
		        </div>
       			<div class="card-body">         			
				
					<div class="row mt-3 mb-5">
						<div class="col-md-12 table-responsive" id="tableFilter">
							<div class="col-md-3">
								<input type="text" readonly="" name="attendance_date" value="{{date('Y-m-d')}}" class="datepicker form-control" data-date-format="yyyy-mm-dd">
								@error('attendance_date')
									<span class="invalid-feedback text-danger" role="alert">
									<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="col-md-3 mt-3">
								<button class="btn btn-sm btn-primary search">Search</button>
							</div>
							<div class="row mt-4">
								<div class="col-md-12" id="tableBody" ></div>
							</div>
						</div> 
					</div>					
		        </div>
		    </div>
		</div>
	</div>
</div>
<script >
	$(document).ready(function(){
		$(function () {
			$('.datepicker1').datepicker( {
			    format: "yyyy-mm",
			    viewMode: "months", 
			    minViewMode: "months"
			});
		});


		$(function () {
				$(".datepicker").datepicker({
					format: 'yyyy-mm-dd'
				});
			});

		$('.search').on('click',function(e){
			e.preventDefault();
			filter_students();
		});

		function filter_students(){
			var attendance_date = $('input[name="attendance_date"]').val();
			 if(attendance_date != '' ){
				$.ajax({
					type:'POST',
					url: "{{route('attendence_show')}}",
					data: {attendance_date:attendance_date, "_token": "{{ csrf_token() }}",},
					   success:function(res){
						$('#tableBody').empty().html(res);
					}
				});
			}else{
				$.notify("All select field are mandatory.");
			}
		}
	});
</script>
@endsection
