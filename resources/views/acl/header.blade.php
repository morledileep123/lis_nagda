<div class="row">
	<a class="col-md-2 btn btn-outline-primary  text-center {{request()->url() == route('admin.index') ? 'active' : '' }}" href="{{route('admin.index')}}">
	Roles & Permissions</a>

	<a class="col-md-2 text-center btn btn-outline-primary  {{request()->url() == route('users.index') ? 'active' : '' }}" href="{{route('users.index')}}" href="{{route('users.index')}}">
	Users</a>
</div>	