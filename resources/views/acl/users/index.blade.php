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
					
					<div class="row">
						<div class="col-sm-12 col-md-12 col-xl-12  table-responsive " id="mytable3">
		
							<a href="{{route('users.create')}}" id="add" type="button" class="btn btn-outline-primary fa fa-plus mb-4">Add User</a>

							<table class="table table-stripped table-bordered" id="role_table2" style="width: 100%">
								<thead>
									<tr>
										<th>SNo.</th>
										<th>User</th>
										<th>Email</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@php  $count =0;	@endphp 
									@foreach($users as $user)
										<tr>
											<td >{{ ++$count}}</td>
											<td>{{$user->name}}</td>
											<td>{{$user->email}}</td>
											<td >
												<a class="ml-3" href="{{route('users.edit',$user->id)}}"><i class="fa-lg fa fa-pencil-square-o" aria-hidden="true"></i></a>
												{{-- <a href="{{route('destroy',$users->id)}}"><i class="fa-lg fa fa-trash" aria-hidden="true"></i></a> --}}
												<a class="ml-3" href="{{route('users.show',$user->id)}}"><i class="fa fa-eye  fa-lg" aria-hidden="true"></i></a>	

												<div class="dropdown" style="float: left">
													<a class="dropdown-toggle" type="button" id="actionPerform" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fa fa-cog"></i>
													</a>
													<div class="dropdown-menu" aria-labelledby="actionPerform">
														<a class="dropdown-item" href="{{route('users.assign_role',$user->id)}}">Assign Role</a>
														<a class="dropdown-item" href="{{route('users.assign_permission',$user->id)}}">Assign Permission</a>
													</div>
												</div>

												{{-- <buttum class="text-default fa fa-user assign_role_permission" data="{{$users->id}}" id="buttun{{$users->id}}" ></buttum>
												<select style="display: none;" id="role_permission_show{{$users->id}}" data = "{{$users->id}}" class="role_permission_change" autocomplete="off">
													<option value="0">Select</option>
													<option value="role">Assign Role</option>
													<option value="permission">Assign Permission</option>
												</select> --}}
												{{-- <a href="{{route('users.show',$users->id)}}"><i class="fa fa-eye    fa-lg" aria-hidden="true"></i></a>	 --}}

											</td>
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
@endsection