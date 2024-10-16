 @extends('layouts.main')
 @section('content')

<div class="container">
	<div class="row mb-4">
		<div class="col-md-12">@include('admin.students.header')</div>
	</div>
	<div class="row mb-4">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">ID Card Format <a href="{{route('id_card')}}" class="btn bt-sm  btn-primary pull-right fa fa-arrow-left">Back</a></h5>
				</div>
				<div class="card-body">
					@include('admin.students.ID-card.format.id_card')
				</div>
			</div>
		</div>
	</div>
</div>

@endsection