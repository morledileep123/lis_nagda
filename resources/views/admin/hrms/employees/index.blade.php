@extends('layouts.main')
@section('content')
<div class="container">

	<div class="row mb-4">
		<div class="col-md-12 col-sm-12 col-lg-12">
			 <div class="card">
		        <div class="card-header">
					<h4 class="card-title">Employees List <a href="{{route('employees.create')}}" class="btn btn-success fa fa-plus pull-right btn-sm"> Add Employee</a></h4>
		        </div>
       			<div class="card-body">         			
					<div class="row mt-3 mb-5">
						<div class="col-md-12 table-responsive" id="tableFilter">
							<table class="table table-striped table-bordered mytable" >
								<thead>
									<tr role="row">
										<th class="sorting_asc">#</th>
										<th class="sorting" >Employee Name</th>
										<th class="sorting" >Photo</th>
										<th class="sorting">Designation</th>
										<th class="sorting" >Status</th>
										<th class="sorting" >Action</th>
									</tr>
								</thead>
								<tbody>									
									@if(empty($employees))
										<td colspan="10" class="dataTables_empty" valign="top">No data available in table</td>
									@endif
									<?php $count = 1; ?>
									@foreach($employees as $employee)
									<tr class="odd text-center" >
										<td>{{$count++}}</td>
										<td>{{$employee->name}}</td>
										<td><img src="{{asset($employee->photo !=null ? 'storage/'.$employee->photo : 'img/student_demo.png')}}" style="width: 30px; height: 30px;"></td>
										<td>{{$employee->emp_type !=null ? Arr::get(EMP_TYPE,$employee->emp_type) : ''}}</td>
										<td><form action="{{route('employees.destroy', $employee->id)}}" method="POST" id="delform_{{$employee->id}}">
										@method('DELETE')
										@csrf
										<?php if ($employee->status == '1') { ?>
											<input type="hidden" name="status" value="active">
											<button class="btn-outline-success btn-sm" onclick="return confirm('Are you sure you want to deactive this employee?');" style="width:60px;"> Active</button>
										<?php }elseif($employee->status == '0'){ ?>
											<input type="hidden" name="status" value="deactive">
											<button class="btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to active this employee?');">Deactive</button>
										<?php } ?> 
										</form>
										</td>
										<td><span class="mr">
											<a href="{{route('employees.edit', $employee->id)}}" class="btn-outline-info"><i class="  fa fa-edit " ></i></a></span>
											<span class="mr">
												<a href="{{route('employees.show', $employee->id )}}" class="btn-outline-primary "><i class=" fa fa-eye" ></i></a>
											</span>
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
