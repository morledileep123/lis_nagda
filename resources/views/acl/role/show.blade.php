@extends('layouts.main')
@section('title','Welcome: To Admin Panel')

@section('content')

  <main class="app-content">
	  <div class="app-title">
	    <ul class="app-breadcrumb breadcrumb">
	      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ URL::previous() }}"><i class="fa fa-arrow-left fa-lg "></i></a>&nbsp;&nbsp;<a href="#">ACL/{{request()->segment(1)}}</a></li>

	    </ul>
	  </div>
	 <div class="container">
	 	 <div class="row">
		<div class="col-md-12 m-auto">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-3 col-sm-3">
							<label>Name</label><br>
							<span>{{$role->name}}</span>
							<input id="id" type="hidden" name="id" value="{{$role->id}}">
						</div>
						<div class="col-sm-9 col-md-9">
							<label>Permissions</label>
							<form>
								@foreach($permissions as $permission)
							    <label class="checkbox-inline">
							      <input class="taskchecker" <?php if(in_array($permission->id,$permission_ids)){echo 'checked'; }?>
							    	type="checkbox" value="{{$permission->id}}" readonly disabled>{{$permission->name}}
							   	</label>
							   	@endforeach
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	 </div>
</main>			
<script>
	$(document).ready(function(){
	
		$(".taskchecker").on("change", function() {
   			var id  = $('#id').val();
   			var val = [];
        	$(':checkbox:checked').each(function(i){
        		  val[i] = $(this).val();
       		 });
        	$.ajax({
				type:'POST',
				url: "{{route('save_changes')}}",
				data: {'roleId':id, 'permissionId':val, "_token": "{{ csrf_token() }}",},
				   success:function(res){
					if(res == 'success'){
						$.notify("Permissions Save successfully",'success');
						
					}
				}
			});
		})
	})
</script>

@endsection
