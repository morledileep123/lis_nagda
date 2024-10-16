@extends('layouts.main')
@section('content')
<div class="container">
 	<div class="row mb-4">
 		<div class="col-md-12">
 			@include('admin.fees.header')
 		</div>
 	</div>
 	<div class="row mb-4">
 		<div class="col-md-12">
 			<div class="card">
 				<div class="card-header">
 					<h5 class="card-title">Fees Details
 						<a href="{{route('fees.index')}}" class="btn btn-sm btn-primary pull-right">Back</a>
 					</h5>
 				</div>
 				<div class="card-body table-responsive">
 					<div class="row">       
						<div class="col-md-3 form-group">
							<label class="required">Fees Name</label>
							<input class="form-control" value="{{$fee->fees_name}}" readonly="readonly">
							@error('fees_name')
							   <span class="text-danger error">
							      <strong>{{$message}}</strong>
							   </span>
							@enderror
						</div>
						<div class="col-md-3 form-group">
							<label class="required">Fees Amount</label>
							<div class="input-group mb-0" style="margin-bottom: 0px !important">
							   <div class="input-group-prepend">
							   <span class="input-group-text" id="basic-addon1"><i class="fa fa-rupee"></i></span>
							   </div>
							   <input class="form-control" readonly="readonly" value="{{$fee->fees_amnt}}">
							</div>
							@error('fees_amnt')
							   <span class="text-danger error">
							      <strong>{{$message}}</strong>
							   </span>
							@enderror
						</div>
						<div class="col-md-4 form-group">
							<label class="required">Header To Be Displayed On Reciept</label>
							<input type="text" class="form-control" readonly="readonly" name="" value="{{Arr::get(RECIEPT_HEADER_NAME,$fee->receipt_head_id)}}">
						</div>
						<div class="col-md-2 form-group">
							<label class="required"> Select Currency </label>
							<input type="text" class="form-control" readonly="readonly" name="" value="{{Arr::get(CURRENCY,$fee->currency_code)}}">						 	
						</div>
					</div> 
					<hr> 
					<div class="row">
						<div class="mb-2 col-md-12">
							<h6 class="font-weight-bold">Fees - Head</h6>
						</div>
						<div class="col-md-12">
							<table class="table table-bordered ">
								<thead>
									<tr >										
										<th>Head Title</th>
										<th>Installable</th>
										<th>Amount</th>
									</tr>
								</thead>
							<tbody>
								@foreach($fee->fees_heads as $fee_head)
								<tr>
									
									<td>{{$fee_head->fees_head->head_name}}</td>
									<td>{{$fee_head->fees_head->is_installable =='1' ? 'Yes' :'No'}}</td> 
									<td class="form-group"><input type="text" name="" class="form-control head_amnt" readonly="readonly" value="{{$fee_head->head_amnt}}" >                                      
									</td>
								</tr>
								@endforeach
								</tbody>
							</table>
							<input type="hidden" name="non_installable_amnt" value="" id="non_installable_amnt">
							<input type="hidden" name="installable_amnt" value="" id="installable_amnt">
						</div>
                 	</div>
                 	<hr>
                 	<div class="row" >
                 		@foreach($fee->fees_instalments as $key => $fees_instalment)
                 			{{-- <div class="col-md-12 form-group">
                 				<label>Instalment ({{$key+1}})</label>
                 			</div> --}}
							<div class="col-md-4 form-group" id="instal_one"> 
								<label class="required">Instalment Amount</label>
								<input type="text" readonly="readonly" class="form-control instalment_amt" value="{{$fees_instalment->instalment_amnt}}">
							</div>
							<div class="col-md-4">
								<label class="required">Start Date</label>
								<input type="text" readonly="readonly" class="form-control " value="{{$fees_instalment->start_dt}}">
							</div>
							<div class="col-md-4">
								<label class="required">Due Date</label>
								<input type="text" readonly="readonly" class="form-control "  value="{{$fees_instalment->end_dt}}">
							</div>
							
						@endforeach
                  	</div>
                  	<hr>
                  	@if($fee->courseselection == '1') 
	                  	<div class="row" >
							<div class="col-md-3 form-group">
								<label class="required">Class Name</label>									
								<input type="text" readonly="readonly" value="{{$fee->class->class_name}}" class="form-control">
							</div>
							<div class="col-md-3 form-group">
								<label class="required">Batch Name</label>
								<input type="text" readonly="readonly" value="{{$fee->batch->batch_name}}" class="form-control">
							</div>
							<div class="col-md-3 form-group">
								<label class="required">Section Name</label>
								<input type="text" readonly="readonly" value="{{$fee->section->section_name}}" class="form-control">
							</div>
							<div class="col-md-3 col-xs-6 col-sm-6 form-group">
								<label class="required">Medium Name</label>
								<input type="text" readonly="readonly" value="{{Arr::get(MEDIUM,$fee->medium)}}" class="form-control">
							</div>   
							<div class="col-md-3 form-group">
								<label class="required">Fee For</label>
								<input type="text" readonly="readonly" value="{{$fee->feesfor == '1' ?  'All Student' : 'Some Selected'}}" class="form-control">				
							</div>                     
	                  	</div>
                  	@endif
                  	<div class="row" id="gen_catg_inc_body">
						<div class="col-md-4 form-group">
							<label>Gender</label>
							<input type="text" readonly="readonly" value="{{$fee->gender != null ? Arr::get(GENDER,$fee->gender) : 'All'}}" class="form-control">
							
						</div>
						<div class="col-md-4 form-group">
							<label>Cast Category</label>
							<input type="text" readonly="readonly" value="{{$fee->reservation_class_id == '0' ? 'All' : Arr::get(CASTCATEGORY,$fee->reservation_class_id)}}" class="form-control">
						</div>
						<div class="col-md-4 form-group">
							<label>Include RTE</label>
							<input type="text" readonly="readonly" value="{{ Arr::get(INCLUDE_RTE,$fee->rte_status)}}" class="form-control">
						</div>
                  	</div>
                  	@if($fee->courseselection == '2')
                  		<div class="row">
	                     	<div class="col-md-6 form-group">
	                        <label class="required">Class - Batch - Section - Medium </label>
	                        <select class="form-control" multiple="multiple" readonly="readonly">
                              	@foreach($section_manages as $section_manage)
                                 	<option value="{{$section_manage->class_name->id.'-'.$section_manage->batch_name->id.'-'.$section_manage->section_names->id.'-'.$section_manage->medium}}">{{$section_manage->class_name->class_name.'---'.$section_manage->batch_name->batch_name.'---'.$section_manage->section_names->section_name.'---'.$section_manage->medium}}</option>
                              	@endforeach	                           
	                        </select>	                       
	                     	</div>
	                  	</div>
                  	@endif
                  	<hr>
                  	<div class="row">
						<div class="col-md-4 form-group">
							<label class="">Online Payment Discount (%)</label>
							<div class="input-group mb-3">
							   <div class="input-group-prepend">
							   <span class="input-group-text" id="basic-addon1"><i class="fa fa-rupee"></i></span>
							   </div>
							   <input class="form-control" id="online_discount" name="online_discount" type="text" value="{{$fee->online_discount}}" readonly="readonly">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 form-group pt-4">  
							<input type="checkbox"  disabled="disabled" {{$fee->refundable =='1' ? 'checked="checked"' : ''}}> 
							Is Fees Refundable 
						</div>
						<div class="col-md-3 form-group pt-4"> 
							<input type="checkbox" {{$fee->is_fees_student_assign =='1' ? 'checked="checked"' : ''}}  disabled="disabled"> 
							Is Fees Student Assign 

						</div>
						 <div class="col-md-3 form-group pt-4"> 
	                        <input type="checkbox" value="1" name="is_fee_discount" id="is_fee_discount" {{$fee->is_fee_discount =='1' ? 'checked="checked"' : ''}} disabled="disabled"> 
	                        Is Fees Discount Assign 
	                     </div>
                  	</div>
 				</div>
 			</div>
 		</div>
 	</div>
</div>
@endsection