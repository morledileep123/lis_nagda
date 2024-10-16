@extends('layouts.main')
 @section('content')
 <div class="container">
 	<div class="row mb-4">
 		<div class="col-md-12">
 			@include('admin.fees.header')
 		</div>
 	</div>
 	<div class="app-title col-md-4">
	    @if($message = Session::get('success'))   
	      <div class="alert alert-success">
	       {{ $message }}
	      </div>
	    @endif
  	</div>
 	<div class="row mb-4">
 		<div class="col-md-12">
 			<div class="card">
 				<div class="card-header">
 					<h5 class="card-title">Fees Concession
 						<a href="{{route('concession.index')}}" class="btn btn-sm btn-success pull-right ">Back</a>
 					</h5>
 				</div>
 				<div class="card-body">
 					<table class="table table-striped table-bordered mytable">
						<thead>
							<tr>
								<th>#</th>
								<th>Admission No</th>
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $count = 1; ?>
							@foreach($showConcessionStd as $showConcessionStds)
								@foreach($showConcessionStds->concession_apply as $concessionsStd)
									<tr>
										<td>{{$count++}}</td>
										<td>{{$concessionsStd->student_consession->admision_no}}</td>
										<td>{{$concessionsStd->student_consession->f_name}}</td>
										<td>{{$concessionsStd->student_consession->m_name}}</td>
										<td>{{$concessionsStd->student_consession->l_name}}</td>
										<td>
											<form method="post" action="{{route('concession.destroy',$concessionsStd->student_consession->id)}}">
												@csrf
												@method('DELETE')
												<input type="submit" class="btn btn-danger btn-sm fa fa-trash" value="Delete" />
											</form>
										</td> 
									</tr>
								@endforeach
							@endforeach
						</tbody>
				</table> 
 				</div>
 			</div>
 		</div>
 	</div>
 </div>

@endsection