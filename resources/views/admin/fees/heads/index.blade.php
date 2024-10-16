@extends('layouts.main')
@section('content')
<div class="container">
	<div  class="row mb-4">
		<div class="col-sm-12">@include('admin.fees.header')</div>
	</div>
	<div class="row mb-4"> 	
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Fees Head List
						<a href="{{route('fees-heads.create')}}" class="btn btn-sm btn-success pull-right">Add Fees Heads</a>
					</h5>
				</div>
				<div class="card-body table-responsive">
					<table class="table table-hover table-bordered mytable">
						<thead>
							<tr>
								<th>Heads Name</th>
								<th>Heads Amount</th>
								<th>Batch Name</th>
								<th>Head Type</th>
								<th>Applicable For</th>
								<th>Refundable</th>
								<th>Installement</th>
								{{-- <th>Action</th> --}}
							</tr>
						</thead>
						<tbody>
							@foreach($fees_heads as $fees_head)
							<tr>
								<td>{{$fees_head->head_name}}</td>
								<td>{{$fees_head->head_amnt}}</td>
								<td>{{$fees_head->batch->batch_name}}</td>
								
								<td>{{Arr::get(HEAD_TYPES,$fees_head->headtype)}}</td>
								<td>{{$fees_head->applicable_on =='0' ? 'General' : 'Admission'}}</td>
								<td>{{$fees_head->refundable == '1' ? 'Yes' :'No'}}</td>
								<td>{{$fees_head->is_installable == '1' ? 'Yes' : 'No'}}</td>
								{{-- <td><a href="" type="button" class="" ><i class="fa fa-edit text-success"></i></a></td> --}}
							<!-- Modal -->	
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>	
</div>


{{-- 
<div id="myModal{{$feesHeadMasts->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Fees Head</h4>
      </div>
      <div class="modal-body">
       <form method="post" action="{{route('fees-heads.update',$feesHeadMasts->id)}}">
       	@csrf
       	@method('PUT')
        	<label for="feeheader">Head Name</label>
			<input type="text" value="{{$feesHeadMasts->name}}" name="head_name" id="head_name_pop" class="form-control" >
      		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      	<input type="submit" name="submit" value="Update" class="btn btn-success">
        </form>
      </div>
    </div>

  </div>
</div>
 --}}

@endsection