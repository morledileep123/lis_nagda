@extends('layouts.main')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">
			@include('admin.teachers.header')
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">
			<div class="card mb-4">
				<div class="card-header">
					<h5 class="card-title">Teachers <a href="{{route('teachers.create')}}" class="btn btn-sm btn-primary pull-right">Create  Teacher</a></h5>

					{{-- <button class="btn btn-md btn-primary" id="membBtn"><i style="">Teachers</i></button> --}}
					{{-- <button class="btn btn-md btn-default" id="teamBtn" ><i style="">Teams</i></button> --}}
			
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12 table-responsive">
							@include('admin.teachers.table')							
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>
@if($message = Session::get('success'))
	<script >
	$(document).ready(function(){	
		swal({
          text: "{{$message}}",
          icon : 'success',
        });
       });
	</script>	
@endif

{{-- <script type="text/javascript">
	$(document).ready(function(){
		$('#membBtn').on('click',function(e){
			e.preventDefault();
			$.ajax({
				type:'get',
				url: '{{route('teachers.show', Auth::user()->id)}}',
				success:function(data){		
					$('.myTableBody').empty().html(data);
				}
			});
			$('#membBtn').removeClass('btn-default');
			$('#membBtn').addClass('btn-primary');
			$('#teamBtn').removeClass('btn-primary');
		});

	});

	

	$('#teamBtn').on('click',function(e){
		e.preventDefault();

 		$.ajax({
			type:'GET',
			url: '{{route('teams.show', Auth::user()->id)}}',
			success:function(data){
				$('.myTableBody').empty().html(data);
			}
		});
		$('#teamBtn').addClass('btn-primary');
		$('#membBtn').removeClass('btn-primary');

	});
</script> --}}
 @endsection
