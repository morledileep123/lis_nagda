@extends('layouts.main')
@section('content')
<div class="container">
	<div class="row mb-4">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="card">
				<div class="card-header">
					@include('acl.header')	
				</div>
				<div class="card-body">
					<div class="full-center" align="center">
						<a data-id='role' class=" text-center btn  btn-sm btn-outline-info  active_class role_permission get_table active"  id="roles_table" align="center">
							Roles</a>
						<a data-id='permission' class="text-center btn btn-outline-info btn-sm role_permission active_class get_table inactive" id="permissions_table">
							Permissions</a>
					</div>

					<div class="row mt-4" id="role_div" >
						<div class="col-sm-12 col-md-12 mb-3">
							<form class="form-block" method="post" action="{{route('admin.store')}}" >
							{{csrf_field()}}
							<div class="row">
								<div class="col-md-4 col-sm-4 form-group">
									<input  class="form-control" type="text" name="name" placeholder="Role Name" align="center">
									@error('name')
										<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $message }}</strong>
										</span>
									@enderror							
								</div>
								<div class="col-md-4 col-sm-4 form-group">
									<input  class="form-control" type="text" name="display_name" placeholder="Display Name" align="center">
									@error('display_name')
										<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $message }}</strong>
										</span>
									@enderror							
								</div>
								<div class="col-md-4 col-sm-4 form-group">
									<input  class="form-control" type="text" name="description" placeholder="Description" align="center">
									@error('description')
										<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $message }}</strong>
										</span>
									@enderror							
								</div>
								<div class="col-md-12 col-sm-12 text-center">
									<input  style="margin-top: 10px;" class="btn btn-outline-success" type="submit" name="submit" value="Submit">
								</div>
							</div>
							</form>	
						</div>						
						<div class="col-md-12 col-sm-12 table-responsive" >
							<table class="table table-stripped table-bordered mytable" >
								<thead>
									<tr>
										<th>SNo.</th>
										<th>Role</th>
										<th>Display Name</th>
										<th>Description</th>
										{{-- <th>Action</th> --}}
									</tr>
								</thead>
								<tbody>
									@php  $count =0;	@endphp 
									@foreach($roles as $role)
										<tr>
											<td  style="width: 16.66%">{{ ++$count}}</td>
											<td>{{$role->name}}</td>
											<td>{{$role->display_name}}</td>
											<td>{{$role->description}}</td>
											{{-- <td  style="width: 16.66%;text-align: center;"> --}}
												{{-- <a href="{{route('admin.edit',[$roles->id])}}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a> --}}
												{{-- <a href="{{route('delete',$roles->id)}}"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a> --}}
												{{-- <a href="{{route('admin.show',[$roles->id])}}"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a> --}}
											{{-- </td> --}}
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>

					<div class="row mt-4" id="permission_div" style="display: none">
						<div class="col-sm-12 col-md-12 mb-3">
							<form class="form-block" method="post" action="{{route('permissions.store')}}" >
							{{csrf_field()}}
							<div class="row">
								<div class="col-md-4 col-sm-4 form-group">
									<input  class="form-control" type="text" name="name" placeholder="Permission Name" align="center">
									@error('name')
										<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $message }}</strong>
										</span>
									@enderror							
								</div>
								<div class="col-md-4 col-sm-4 form-group">
									<input  class="form-control" type="text" name="display_name" placeholder="Display Name" align="center">
									@error('display_name')
										<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $message }}</strong>
										</span>
									@enderror							
								</div>
								<div class="col-md-4 col-sm-4 form-group">
									<input  class="form-control" type="text" name="description" placeholder="Description" align="center">
									@error('description')
										<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $message }}</strong>
										</span>
									@enderror							
								</div>
								<div class="col-md-12 col-sm-12 text-center">
									<input  style="margin-top: 10px;" class="btn btn-outline-success" type="submit" name="submit" value="Submit">
								</div>
							</div>
							</form>	
						</div>	
						
						<div class="col-sm-12 col-md-12 table-responsive">
							<table class="table table-stripped table-bordered mytable">
								<thead>
									<tr>
										<th>SNo.</th>
										<th>Permissions</th>
										<th>Display Name</th>
										<th>Description</th>
										{{-- <th>Action</th> --}}
									</tr>
								</thead>
								<tbody>
									@php  $count =0;	@endphp 
									@foreach($permissions as $permissionss)
										<tr>
											<td  style="width: 16.66%">{{ ++$count}}</td>
											<td>{{$permissionss->name}}</td>
											<td>{{$permissionss->display_name}}</td>
											<td>{{$permissionss->description}}</td>
											{{-- <td  style="width: 16.66%; text-align: center;"> --}}
												{{-- <a href="{{route('permissions.edit',$permissionss->id)}}"><i class="fa fa-pencil-square-o  fa-lg" aria-hidden="true"></i></a> --}}
												{{-- <a href="{{route('delete_permissions',$permissionss->id)}}"><i class="fa fa-trash  fa-lg" aria-hidden="true"></i></a> --}}
											{{-- </td> --}}
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.role_permission').on('click',function(){
			$('.role_permission').removeClass('active').addClass('inactive');
			$(this).removeClass('inactive').addClass('active');
			var btn_id  = $(this).data('id');
			console.log(btn_id);
			if(btn_id == 'role'){
				$('#role_div').show();
				$('#permission_div').hide();
			}else{
				$('#role_div').hide();
				$('#permission_div').show();
			}
		});
	})
</script>
@endsection