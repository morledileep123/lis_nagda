 @extends('layouts.main')
 @section('content')

<div class="container">
	 <div class="col-lg-12">
@include('admin.teachers.header')

<div class="container">
	<div class="row mt-2">
    <div class="col-lg-12">

      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          <div class="panel-heading">
      	
				{{-- <h4 class="panel-title">Teachers List			
					<a href="{{route('teacher_create')}}" class="btn btn-md btn-primary pull-right">Teacher Create</a><a href="" class="btn btn-md btn-info pull-right">Create Team</a></h4> --}}
				{{-- <h4>List</h4> --}}
				<button class="btn btn-md btn-primary" id="membBtn"><i style="color: red;">Teachers</i></button>
				<button class="btn btn-md btn-default" id="teamBtn" ><i style="color: red;">Teams</i></button>
				</div>
        </div>
    <div class="card-body">
      <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">				
				<div class="row"><br>
					<div class="hide_table">
						<h4>Teachers ({{count($teachers)}})	</h4>	
						<a href="{{route('teachers.create')}}" class="btn btn-md btn-primary pull-right">Create Teacher</a>
					</div>
				<div class="container">
				<div class="row">
					<div class="col-md-12">
						@if($message = Session::get('success'))
							<div class="alert bg-success">
								{{$message}}
							</div>
						@endif
					</div>
				</div>
				<div class="row hide_table" style="margin-top: 20px;">
					<div class="col-md-12 table-responsive ">
						<table  class="table table-striped table-bordered myTable hide_table">
							<thead>
								<tr>
									<td>#</td>
									<td>Name</td>
									<td>Email</td>
									<td>Mobile Number</td>
									<td>Status</td>						
									<td>Action</td>						
								</tr>
							</thead>
							<tbody>
							@php $count = 1; @endphp
							@foreach($teachers as $teacher)
							<tr>
								<td>{{$count++}}</td>
								<td>{{$teacher->teacher->name}}</td>
								<td>{{$teacher->teacher->email}}</td>
								<td>{{$teacher->teacher->mobile_no}}</td>						
								<td>{{$teacher->status == 'A' ? 'Verified by Email' : 'Pending'}}</td>
								<td>
									<form action="{{route('teachers.destroy',$teacher->teacher->id)}}" method="POST" id="delform_{{ $teacher->id}}">
									@method('DELETE')
									{{-- @role(['lawcompany','lawyer']) --}}
									<a href="javascript:void(0)" onclick="cases('{{ $teacher->teacher->id }}')" title="cases"><i class="fa fa-briefcase btn btn-sm" title="cases"></i></a>
									{{-- @endrole --}}
									<a href="javascript:void(0)" onclick="loginhistory('{{ $teacher->teacher->id }}')" title="teacher login history" data-id="modal" id="loginbtn"><i class="fa fa-clock-o btn btn-sm" style="font-size: 16px"></i></a>

									<a href="{{route('teachers.edit',$teacher->teacher->id)}}" title="edit"><i class="fa fa-edit btn btn-sm" style="font-size: 16px"></i></a>

									<a href="javascript:$('#delform_{{ $teacher->teacher->id}}').submit();"  onclick="return confirm('Are you sure want to delete teacher permanetly?')" title="delete"><i class="fa fa-trash btn btn-sm text-red"></i></a>
									@csrf
									</form>
								</td>
							</tr>
							@endforeach						
							</tbody>
						</table>
					</div>
				</div>
				<div style="display: none;" class="show_table">
					{{-- @include('admin.teachers-team.show') --}}
					
				</div>
				</div>
				</div>
			</div>
		</div>
	</div>
        </div>
      </div>

  </div>
</div>
</div>
 <script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script> 

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"> 

{{-- {{route('teams.show', Auth::user()->id)}}
{{route('users.show', Auth::user()->id)}} --}}

{{-- @include('models.login_history') --}}
{{-- @include('models.teacher_case') --}}
{{-- {{ route('login_history')}} --}}
{{-- {{ route('member_cases')}} --}}
<script type="text/javascript">
	$(document).ready(function(){
	$('.myTable').DataTable();
	$('#teamBtn').on('click',function(e){
		e.preventDefault();

 		$.ajax({
			type:'GET',
			url: '',
			success:function(data){
				$('#mainDiv').empty().html(data);
			}
		});
		$('#teamBtn').addClass('btn-primary');
		$('#membBtn').removeClass('btn-primary');

	});
	$('#membBtn').on('click',function(e){
		e.preventDefault();
		$.ajax({
			type:'get',
			url: '{{route('teachers.show', Auth::user()->id)}}',
			success:function(data){
		
				$('#mainDiv').empty().html(data);
			}
		});
		$('#membBtn').removeClass('btn-default');
		$('#membBtn').addClass('btn-primary');
		$('#teamBtn').removeClass('btn-primary');
	});

	});

	function loginhistory($id){
		var id = $id;
		$.ajax({
			type:'POST',
			url: "",
			data: {id:id},
			success:function(res){

				$('#login_time').empty();
				$('#login_time').append("<td>"+(res.last_login_in_at !=null ? res.last_login_in_at : '')+"</td>");
				$('#login_time').append("<td>"+(res.last_logout_in_at != null ? res.last_logout_in_at : '-' )+"</td>");
				$('#login').modal('show');
				// console.log(res.last_login_in_at);
			}
		});
	}
	function cases($id){
		var id = $id;
		$.ajax({
			type:'POST',
			url: "",
			data: {id:id},
			success:function(res){			
				if(res.length != '0'){
					$('#case-body').empty();
					$.each(res,function(index,value){
						$('#case-body').append('<a href="/case_mast/'+value.case_id+',case_diary"><div class="panel panel-default"><div class="panel-body " style="padding: 8px;"><h4 class="text-primary">'+value.case.case_title+'  <span class="pull-right">Reg. Date : '+value.case.case_reg_date+' </span> </h4><span>Client Name: '+value.case.client.cust_name+'</span><span class="pull-right">Court Name : '+value.case.court.court_type_desc+'</span></div></div></a>')
					});
				}
				else{
					$('#case-body').empty();
					$('#case-body').html('<h4 class="text-center">No Records Found</h4>')					
				}		
				$('#cases_modal').modal('show');
			}
		});
	}

	$('#teamBtn').on('click',function(e){
		e.preventDefault();

 		$.ajax({
			type:'GET',
			url: '{{route('teams.show', Auth::user()->id)}}',
			success:function(data){
				$('.show_table').empty().html(data);
				$('.show_table').show(data);
				$('.hide_table').hide();
			}
		});
		$('#teamBtn').addClass('btn-primary');
		$('#membBtn').removeClass('btn-primary');

	});
</script>
 @endsection
