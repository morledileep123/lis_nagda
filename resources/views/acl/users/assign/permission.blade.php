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
						<div class="col-md-12 col-sm-12">
							<a href="{{route('users.index')}}"><i class="fa fa-arrow-left fa-lg "></i></a> <label class="ml-2">Assign permission to user:</label> 
							<span class="font-weight-bold">{{$user->name}}</span>
							<input id="user_id" type="hidden" name="user_id" value="{{$user->id}}">
							<a href="{{route('users.assign_role',$user->id)}}" class="btn btn-sm btn-primary pull-right">Assign Role</a>
						<hr>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-6">
							@foreach($permissions as $permission)
								<input type="checkbox" name="check_role[]" class="inputCheckBox" value="{{$permission->id}}"
								{{in_array($permission->id,collect($user->permissions)->pluck('id')->toArray()) ? 'checked' : ''}}
								autocomplete="off"> {{$permission->name}} </br>	
							@endforeach
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.inputCheckBox').on('change',function(e){
			e.preventDefault();
			var permission_id = [];
			var user_id = $('#user_id').val();
			$('.inputCheckBox:checked').each(function(e){
				permission_id.push($(this).val());
			});

			$.ajax({
				type:'post',
				url:'{{route('changePermission')}}',
				data:{user_id:user_id,permission_id:permission_id},
				success:function(res){
					//console.log(res);
					$.notify('Permission assign to user successfully','success');

				}
			})
			// console.log(role_id);
		});
	});
</script>
@endsection