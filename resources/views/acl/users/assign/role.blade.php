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
					<div class="row form-group">
						<div class="col-md-12 col-sm-12">
							<a href="{{route('users.index')}}"><i class="fa fa-arrow-left fa-lg "></i></a> <label class="ml-2">Assign roles to user:</label> 
							<span class="font-weight-bold">{{$user->name}}</span>
							<input id="user_id" type="hidden" name="user_id" value="{{$user->id}}">
							<a href="{{route('users.assign_permission',$user->id)}}" class="btn btn-sm btn-primary pull-right">Assign Permission</a>
						<hr>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-6">
							@foreach($roles as $role)
								<input type="checkbox" name="check_role[]" class="inputCheckBox" value="{{$role->id}}"
								{{in_array($role->id,collect($user->roles)->pluck('id')->toArray()) ? 'checked' : ''}}
								autocomplete="off"> {{$role->name}} </br>	
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
			var role_id = [];
			var user_id = $('#user_id').val();
			$('.inputCheckBox:checked').each(function(e){
				role_id.push($(this).val());
			});

			$.ajax({
				type:'post',
				url:'{{route('changesRole')}}',
				data:{user_id:user_id,role_id:role_id},
				success:function(res){
					// console.log(res);
					$.notify('Role assign to user successfully','success');

				}
			})
			// console.log(role_id);
		});
	});
</script>
@endsection