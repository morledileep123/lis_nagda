@extends('layouts.main')
@section('content')
<style>
	.fees-page p{
		font-size: 14px;
	}
	.fees-page h6{
		font-size: 15px !important;
	}

.overlay-loader{
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: rgba(255,255,255,0.8) url("{{url(asset('img/25.gif'))}}") center no-repeat;
    }


</style>
 {{-- <div class="loader"></div> --}}
     <div class="overlay-loader"></div>

<div class="container fees-page" >
 	<div class="row mb-4">
 		<div class="col-md-12">
 			<div class="card">
 				<div class="card-header bg-white">
 					<div class="row">
 						<div class="col-md-4  p-3">
 							<img src="{{ asset('frontend-logos/LIS_Logo-1.png')}}" width="100">
 						</div>
 						<div class="col-md-4 text-center p-3">
 							<h4 class="font-weight-bold">Pay Regular Fees</h4>	
 							<h6>Select Fees to Pay</h6>
 						</div>
 						<div class="col-md-4 text-right p-3">
 							<h6>Admission Number : {{$student->admision_no}}</h6>
 							<h6>Student Name : {{student_name($student)}}</h6>
 							<h6>{{student_first_guardian($student)['relation'] .' '.student_first_guardian($student)['name'] }}</h6>
 						</div>
 					</div>
 				</div>
 			
	 			<div class="card-header ">
	 				<div class="row">
	 					<div class="col-md-8">
	 						@foreach($student_fee_instalments as $key =>  $student_fee_instalment)
	 							<div class="accordion mb-4" id="accordionExample{{$key}}">
									<div class="card">
										<div class="card-header bg-white border-0" id="headingOne">
											<div class="row">
												<div class="col-md-1 p-2">
													<input type="checkbox" name="instalment[]" class="instalment_check" value="{{$student_fee_instalment->std_fee_inst_id}}" autocomplete="off">
												</div>
												<div class="col-md-6 p-2">
													<h6 class="font-weight-bold" style="color: #666" >{{$student_fee_instalment->inst_title}}</h6>
												</div>
												<div class="col-md-4 p-2">
													<label>New Due Amount</label>
													<h6 class="text-danger">{{round($student_fee_instalment->inst_due_amnt,2)}}</h6>
												</div>
												<div class="col-md-1 p-2">
													<a href="javascript:void(0)" data-toggle="collapse" data-target="#collapse_inst{{$key}}" aria-expanded="true" aria-controls="collapse_inst{{$key}}" class="btn btn-sm btn-primary"> <i class="fa fa-info-circle"></i></a>
												</div>
											</div>
										</div>

										<div id="collapse_inst{{$key}}" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample{{$key}}">
											<div class="card-body table-responsive">
												<table class="table table-bordered">
													<thead>
														<tr>
															<th>Head Name</th>
															<th>Head Amount</th>
															<th>Fine Amount</th>
															<th>Concession Amount</th>
															<th>Discount</th>
															<th>Due Amount</th>
															<th>Extra Fine</th>
															<th>Total Paid</th>
															<th>Pay Amount</th>
														</tr>
													</thead>	
													<tbody>
														@foreach($student_fee_instalment->fee_heads as  $fee_head)
															@php 
																$fee_head_fine_amnt = $fee_head->fee_head_paid_amnt == 0 ? $fee_head->fee_head_fine_amnt : 0; 
																$fee_head_concession_amnt = $fee_head->fee_head_paid_amnt == 0 ? $fee_head->fee_head_concession_amnt : 0; 
																$fee_head_discount = $fee_head->fee_head_paid_amnt == 0 ? $fee_head->fee_head_discount : 0; 


															@endphp
															<tr>
																<td>{{$fee_head->fee_head_name}}

																	<input type="hidden" name="std_fee_head_id[]" class="std_fee_head_id_{{$student_fee_instalment->std_fee_inst_id}}" id="{{$fee_head->std_fee_head_id}}">
																</td>
																<td>{{round($fee_head->fee_head_amnt,2)}}
																	<input type="hidden" name="total_amnt[]" value="{{$fee_head->fee_head_amnt}}" autocomplete="off" class="total_amnt_{{$student_fee_instalment->std_fee_inst_id}}">
																</td>
																<td>{{$fee_head->fee_head_fine_amnt}}
																	<input type="hidden" name="fine_amnt[]" value="{{$fee_head->fee_head_fine_amnt}}" autocomplete="off" class="fine_amnt_{{$student_fee_instalment->std_fee_inst_id}}">
																</td>
																<td>
																	{{round($fee_head->fee_head_concession_amnt,2)}}
																	<input type="hidden" name="concession_amnt[]" value="{{$fee_head->fee_head_concession_amnt}}" autocomplete="off" class="concession_amnt_{{$student_fee_instalment->std_fee_inst_id}}">
																</td>
																<td>{{round($fee_head->fee_head_discount,2)}}
																	<input type="hidden" name="discount_amnt[]" value="{{$fee_head->fee_head_discount}}" autocomplete="off" class="discount_amnt_{{$student_fee_instalment->std_fee_inst_id}}">

																</td>
																<td>
																	{{round($fee_head->fee_head_due_amnt,2)}}	

																</td>

																<td><input type="text" name="extra_fine[]" class="extra_fine_jq_{{$fee_head->std_fee_head_id}} form-control extra_fine_amnt_{{$student_fee_instalment->std_fee_inst_id}} extra_fine_change" autocomplete="off" value="0"  id="{{$fee_head->std_fee_head_id}}" onkeypress="return isNumberKey(this, event);"></td>

																<td>{{round($fee_head->fee_head_paid_amnt,2)}}
																	<input type="hidden" name="paid_amnt[]" value="{{$fee_head->fee_head_paid_amnt}}" id="paid_amnt_{{$fee_head->std_fee_head_id}}" class="paid_amnt_{{$student_fee_instalment->std_fee_inst_id}}">
																</td>

																<td>
																	<input type="text" readonly="readonly" name="" value="{{round($fee_head->fee_head_due_amnt,2)}}">
																	<input type="hidden" name="pay_amount[]" class="pay_amount_{{$student_fee_instalment->std_fee_inst_id}} pay_amount"   autocomplete="off" readonly="" value="{{$fee_head->fee_head_due_amnt}}" id="payable_id_{{$fee_head->std_fee_head_id}}" data-id="{{$fee_head->fee_head_due_amnt}}"></td>
															</tr>
														@endforeach
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
	 						@endforeach
	 					</div>
	 					<div class="col-md-4" style="min-height: 500px;">
	 						<div class="card mb-3">
	 							<div class="card-header">
	 								<h6>Transaction History <a href="{{route('pay_regular_fee_index')}}" class="btn btn-sm btn-primary pull-right">Back</a></h6>
	 							</div>
	 							<div class="card-body text-center">
	 								<a href="{{route('show_transaction_history',$std_fees_mast_id)}}" class="btn btn-sm btn-success">Show Transaction History</a>
	 							</div>
	 						</div>

	 						@if(count($student_fee_instalments) !=0)
		 						<div class="card mb-3">
		 							<div class="card-header">
		 								<h6>Payment History</h6>
		 							</div>
		 							<div class="card-body">
		 								<p class="text-info h-0" style="min-height: 0% !important"><i class="fa fa-check"></i> Total Amount: <span class="total_amnt">0</span></p>
		 								<p class="text-danger  h-0" style="min-height: 0% !important"><i class="fa fa-check"></i> Total Fine: <span class="total_fine_amnt">0</span></p>
		 								<p class="text-success  h-0" style="min-height: 0% !important"><i class="fa fa-check"></i> Total Concession: <span class="concession_amnt">0</span> </p>

		 								<p class="text-success  h-0" style="min-height: 0% !important"><i class="fa fa-check"></i> Total Discount: <span class="discount_amnt">0</span> </p>

		 								<p class="text-success  h-0" style="min-height: 0% !important"><i class="fa fa-check"></i> Total Paid Amount: <span class="paid_amnt">0</span> </p>

		 								<p class="h-0 text-danger" style="min-height: 0% !important"><i class="fa fa-check"></i> Total Charges: <span class="charges_amnt">0</span> </p>
		 								<hr>
		 								<p class=" font-weight-bold  h-0" style="min-height: 0% !important"> Payable Amount: <b class="text-muted">INR</b> <span class="payable_amnt"> 0.00</span> </p>
		 							</div>
		 						</div>

		 						<div class="card mb-3">
		 							<div class="card-header">
		 								<h6>Excess Amount</h6>
		 							</div>
		 							<div class="card-body text-center">
		 								
		 							</div>
		 						</div>

		 						<div class="card mb-3">
		 							<div class="card-header">
		 								<h6>Receipt Details</h6>
		 							</div>
		 							<div class="card-body text-center">
		 								<label> Receipt Date (Today Will be Default) </label>
		 								<input type="text" readonly="readonly" name="receipt_date" class="datepicker form-control" data-date-format="yyyy-mm-dd" value="{{date('Y-m-d')}}" autocomplete="off"> 
		 							</div>
		 						</div>
		 						
		 						<div class="card mb-3">
		 							<div class="card-header">
		 								<h6>Charges Amount</h6>
		 							</div>
		 							<div class="card-body text-center">
		 								<input type="text" onkeypress="return isNumberKey(this, event);"  name="charges_amnt" class="form-control" value="0" id="input_charges_amount" autocomplete="off">
		 							</div>
		 						</div>

		 						<div class="card mb-3">
		 							<div class="card-header">
		 								<h6>Payment Mode</h6>
		 							</div>
		 							<div class="card-body">
		 								<div class="row">
		 									<div class="col-md-12 form-group">
		 										<select name="payment_mode" class="form-control" id="payment_mode" autocomplete="off">
		 											<option value="">Select Payment Mode</option>
		 											@foreach(PAYMENTMODE as $key => $payment_mode)
		 												<option value="{{$key}}">{{$payment_mode}}</option>
		 											@endforeach
		 										</select>

		 									</div>
		 									<div class="col-md-12 form-group mt-3 d-none"  id="cashDiv">
		 										<h6 class="text-primary font-weight-bold"> Cash</h6>
		 										<hr>
		 										<label>Cash Amount</label>
		 										<input type="text" name="cash_amount" value="0" class="form-control" autocomplete="off" onkeypress="return isNumberKey(this, event);">
		 									<hr>
		 									</div>
		 									<div class="col-md-12 form-group mt-3 d-none"  id="cheque_dd_div">
		 										<h6 class="text-primary font-weight-bold"> Cheque/Demand Draft Details</h6>
		 										<hr>
		 										<div class="row">
		 											<div class="col-md-12 form-group">
		 												<label>No of Cheque/DD</label>
		 												<select class="form-control" name="no_of_cheque_dd" id="no_of_cheque_dd" autocomplete="off">
		 													<option value="1">One</option>
		 													<option value="2">Two</option>
		 													<option value="3">Three</option>
		 												</select>
		 											</div>
		 										</div>
		 										<hr>

		 									
		 										<div class="row" id="append_cheque_dd_1">
		 											<div class="col-md-12 form-group">
		 												<h6 class="font-weight-bold">Cheque/DD One</h6>
		 												<hr>
		 												<label>Bank Name</label>
		 												<select class="form-control cheque_dd_bank1" name="cheque_dd_bank[]" autocomplete="off">
		 													@include('layouts.bank_mast')
		 												</select>
		 											</div>
		 											<div class="col-md-12 form-group">
		 												<label>Cheque/ DD Number</label>
		 												<input type="text" class="form-control cheque_dd_no1" name="cheque_dd_no[]" autocomplete="off">
		 											</div>
		 										
		 											<div class="col-md-6 form-group">
		 												<label>Amount</label>
		 												<input type="text" class="form-control cheque_dd_amnt1" name="cheque_dd_amnt[]" onkeypress="return isNumberKey(this, event);" value="0" autocomplete="off" >
		 											</div>
		 											<div class="col-md-6 form-group">
		 												<label>Date</label>
		 												<input type="text" class="datepicker form-control cheque_dd_date1" data-date-format="yyyy-mm-dd" name="cheque_dd_date[]" readonly="readonly" placeholder="Cheque/DD date" autocomplete="off">
		 											</div>
		 											<div class="col-md-12">
		 												<label>Payee Name</label>
		 												<input type="text" name="payee_name[]" value="" placeholder="Enter Payee Name" class="form-control payee_name1" autocomplete="off">
		 											</div>
		 										</div>
		 										<div class="row  d-none mt-5" id="append_cheque_dd_2">
		 											<div class="col-md-12 form-group">
		 												<h6 class="font-weight-bold">Cheque/DD Two</h6>
		 												<hr>
		 												<label>Bank Name</label>
		 												<select class="form-control cheque_dd_bank2" name="cheque_dd_bank[]" autocomplete="off">
		 													@include('layouts.bank_mast')
		 												</select>
		 											</div>
		 											<div class="col-md-12 form-group">
		 												<label>Cheque/ DD Number</label>
		 												<input type="text" class="form-control cheque_dd_no2" name="cheque_dd_no[]" autocomplete="off">
		 											</div>
		 										
		 											<div class="col-md-6 form-group">
		 												<label>Amount</label>
		 												<input type="text" class="form-control cheque_dd_amnt2" name="cheque_dd_amnt[]" onkeypress="return isNumberKey(this, event);" value="0" autocomplete="off">
		 											</div>
		 											<div class="col-md-6 form-group">
		 												<label>Date</label>
		 												<input type="text" class="datepicker form-control cheque_dd_date2" data-date-format="yyyy-mm-dd" name="cheque_dd_date[]" readonly="readonly" placeholder="Cheque/DD date" autocomplete="off">
		 											</div>
		 											<div class="col-md-12">
		 												<label>Payee Name</label>
		 												<input type="text" name="payee_name[]" value="" placeholder="Enter Payee Name" class="form-control payee_name2" autocomplete="off">
		 											</div>
		 										</div>
		 										<div class="row  d-none mt-5" id="append_cheque_dd_3">
		 											<div class="col-md-12 form-group">
		 												<h6 class="font-weight-bold">Cheque/DD Three</h6>
		 												<hr>
		 												<label>Bank Name</label>
		 												<select class="form-control cheque_dd_bank3" name="cheque_dd_bank[]" autocomplete="off">
		 													@include('layouts.bank_mast')
		 												</select>
		 											</div>

		 											<div class="col-md-12 form-group">
		 												<label>Cheque/ DD Number</label>
		 												<input type="text" class="form-control cheque_dd_no3" name="cheque_dd_no[]" autocomplete="off">
		 											</div>
		 										
		 											<div class="col-md-6 form-group">
		 												<label>Amount</label>
		 												<input type="text" class="form-control cheque_dd_amnt3" name="cheque_dd_amnt[]" onkeypress="return isNumberKey(this, event);" value="0" autocomplete="off">
		 											</div>
		 											<div class="col-md-6 form-group">
		 												<label>Date</label>
		 												<input type="text" class="datepicker form-control cheque_dd_date3" data-date-format="yyyy-mm-dd" name="cheque_dd_date[]" readonly="readonly" placeholder="Cheque/DD date" autocomplete="off">
		 											</div>
		 											<div class="col-md-12">
		 												<label>Payee Name</label>
		 												<input type="text" name="payee_name[]" value="" placeholder="Enter Payee Name" class="form-control payee_name3" autocomplete="off">
		 											</div>
		 										</div>
		 										<hr>
		 									</div>
		 									<div class="col-md-12 form-group mt-3 d-none" id="neft_online_trans_div" >
		 										<h6 class="text-primary font-weight-bold" id="trans_title">NEFT/Bank/Online Transaction Details</h6>
		 										<hr>
		 										<label>Transcation Number</label>
		 										<input type="text" name="transcation_id" value="" class="form-control" placeholder="Enter Transcation ID" autocomplete="off">
		 									</div>
		 								</div>
		 							</div>
		 						</div> 			
		 						<div class="card mb-3">	 							
		 							<div class="card-body">
		 								<div class="row">
		 									<div class="col-md-12 form-group">
		 										<label>Remarks</label>
		 										<textarea name="remarks" id="remarks" class="form-control" placeholder="Enter remarks" autocomplete="off"></textarea>
		 									</div>
		 									<div class="col-md-12 mt-4 form-group">
		 									<hr>
		 										<button class="btn btn-sm btn-success form-control btnFormSubmit" >Submit <i class="fa fa-arrow-right "></i></button>
		 									</div>
		 								</div>
		 							</div>
		 						</div> 	

	 						@endif

	 					</div>
	 				</div>
	 			</div>
	 		</div> 			
 		</div>
 	</div>
</div>
<script>
$(document).ready(function(){


	$('#payment_mode').on('change',function(e){
		e.preventDefault();
		var payment_mode = $(this).val();
		var payable_amnt = $('.payable_amnt').text();

		if(payment_mode == '1'){
			$('#cashDiv').removeClass('d-none');
			$('input[name="cash_amount"]').val(payable_amnt);
			$('#cheque_dd_div').addClass('d-none');
			$('#neft_online_trans_div').addClass('d-none');
		}else if(payment_mode == '2' || payment_mode == '3'){
			$('#cashDiv').addClass('d-none');
			$('#neft_online_trans_div').addClass('d-none');

			$('#cheque_dd_div').removeClass('d-none');
		}else if(payment_mode =='4' || payment_mode =='7' || payment_mode =='8' || payment_mode =='9'){
			$('#cashDiv').addClass('d-none');
			$('#cheque_dd_div').addClass('d-none');
			
			var trans_title =  payment_mode == '7' ? 'POS Transaction Details' : (payment_mode == '9' ? 'IPOS Device Details' : 'NEFT/Bank/Online Transcation Details') ;

			$('#trans_title').empty().html(trans_title);
			$('#neft_online_trans_div').removeClass('d-none');
		
		}else if(payment_mode =='5' || payment_mode =='6'){
			$('#cashDiv').removeClass('d-none');
			// $('input[name="cash_amount"]').val(payable_amnt);		
			$('#cheque_dd_div').removeClass('d-none');
			$('#neft_online_trans_div').addClass('d-none');
		}else{
			$('#cashDiv').addClass('d-none');
			$('#cheque_dd_div').addClass('d-none');
			$('#neft_online_trans_div').addClass('d-none');
		}
	});

	$('#no_of_cheque_dd').on('change',function(e){
		e.preventDefault();
		var no_of_cheque_dd = $(this).val();
		if(no_of_cheque_dd == '1'){
			$('#append_cheque_dd_1').removeClass('d-none');
			$('#append_cheque_dd_2').addClass('d-none');
			$('#append_cheque_dd_3').addClass('d-none');
		}else if(no_of_cheque_dd == '2'){
			$('#append_cheque_dd_1').removeClass('d-none');
			$('#append_cheque_dd_2').removeClass('d-none');
			$('#append_cheque_dd_3').addClass('d-none');
		}else{
			$('#append_cheque_dd_1').removeClass('d-none');
			$('#append_cheque_dd_2').removeClass('d-none');
			$('#append_cheque_dd_3').removeClass('d-none');
		}
	});

	$('.instalment_check').on('change',function(e){
		e.preventDefault();
		// var instalment_check = $(this).val();
		amount_changes();

	});

	$('.extra_fine_change').on('blur',function(e){
		e.preventDefault();
		var this_extra_fine_amnt = $(this).val();
		var std_fee_head_id = $(this).attr('id');
		var this_payable_amnt =  $('#payable_id_'+std_fee_head_id).data('id');

		this_extra_fine_amnt = this_extra_fine_amnt.length == 0 ? 0 : this_extra_fine_amnt;

		$('#payable_id_'+std_fee_head_id).val(parseFloat(this_extra_fine_amnt) + parseFloat(this_payable_amnt));
		amount_changes();

	});


	function amount_changes(){
		var payable_amnt =0;
		var total_amnt =0;
		var pay_amount =0;
		var paid_amnt =0;
		var concession_amnt =0;
		var fine_amnt =0;
		var extra_fine_amnt =0;
		var discount_amnt =0;
		var instalment_id = '';
		var charges_amnt = $('#input_charges_amount').val();
		// charges_amnt = charges_amnt.length == 0 ? 0 : charges_amnt;
		var check_inst = [];

		$('.instalment_check:checked').each(function(i){
			check_inst.push($(this).val());

        	instalment_id = $(this).val();
    		
        	$('.total_amnt_'+instalment_id).each(function(j){
        		total_amnt += parseFloat($(this).val());
        	});
			$('.pay_amount_'+instalment_id).each(function(j){
				pay_amount += parseFloat($(this).val());
			});
			$('.paid_amnt_'+instalment_id).each(function(j){
				paid_amnt += parseFloat($(this).val());
			});

        	$('.concession_amnt_'+instalment_id).each(function(k){
        		concession_amnt += parseFloat($(this).val());
        	});

        	$('.fine_amnt_'+instalment_id).each(function(l){
        		fine_amnt += parseFloat($(this).val());
        	});

        	$('.extra_fine_amnt_'+instalment_id).each(function(m){
        		extra_fine_amnt += parseFloat($(this).val());
        	});
        	$('.discount_amnt_'+instalment_id).each(function(m){
        		discount_amnt += parseFloat($(this).val());
        	});
		});


		if(check_inst.length !=0){
			var total_fine_amnt = parseFloat(fine_amnt) + parseFloat(extra_fine_amnt);
			$('.total_amnt').empty().html(total_amnt.toFixed(2));
			$('.concession_amnt').empty().html(concession_amnt.toFixed(2));
			$('.total_fine_amnt').empty().html(total_fine_amnt.toFixed(2));
			$('.discount_amnt').empty().html(discount_amnt.toFixed(2));
			$('.charges_amnt').empty().html(charges_amnt);
			$('.paid_amnt').empty().html(paid_amnt.toFixed(2));

			// var payable_amnt = parseFloat(total_amnt) - parseFloat(pay_amount) + parseFloat(total_fine_amnt) - parseFloat(concession_amnt) - parseFloat(discount_amnt) + parseFloat(charges_amnt);
			var payable_amnt = parseFloat(pay_amount) + parseFloat(charges_amnt);

			$('.payable_amnt').empty().html(payable_amnt.toFixed(2));
			$('input[name="cash_amount"]').val(payable_amnt.toFixed(2));
			// $('input[name="cash_amount"]').attr('readonly','true');
		}
		

	}

	$('#input_charges_amount').on('blur',function(e){
		e.preventDefault();
		amount_changes();

	});

	$('.btnFormSubmit').on('click',function(e){
		e.preventDefault();

		var check_inst = [];
		var std_fees_mast_id = "{{$std_fees_mast_id}}";
		var s_id = "{{$student->id}}";
		var student_fee_instalments = [];
		var std_fee_inst_id = '';
		var std_fee_head_id = '';

		$('.instalment_check:checked').each(function(i){
			check_inst.push($(this).val());
			std_fee_inst_id = $(this).val();
			var fee_heads = [];

			$('.std_fee_head_id_'+std_fee_inst_id).each(function(j){
				std_fee_head_id =  $(this).attr('id');
				fee_heads.push({
					'std_fee_head_id' : std_fee_head_id,
					'fee_head_extra_fine': $('.extra_fine_jq_'+std_fee_head_id).val(),
					'fee_head_pay_amnt'  :  $('#payable_id_'+std_fee_head_id).val(),
					'fee_head_paid_amnt'  :  $('#paid_amnt_'+std_fee_head_id).val(),

				});

			});

			student_fee_instalments.push({
				'std_fee_inst_id' : std_fee_inst_id,
				'fee_heads' : fee_heads
			});

		});

		if(check_inst.length !='0'){
			var total_amnt 		= $('.total_amnt').text();
			var concession_amnt = $('.concession_amnt').text();
			var total_fine_amnt = $('.total_fine_amnt').text();
			var discount_amnt 	= $('.discount_amnt').text();
			var charges_amnt 	= $('.charges_amnt').text();
			var payable_amnt 	= $('.payable_amnt').text();
			var receipt_date    = $('input[name="receipt_date"]').val();
			var payment_mode 	= $('#payment_mode').val();
			
			var cash_amount = 0;
			var status = true;					
			var transcation_id = '';	
			var no_of_cheque_dd = 0;
			var cheque_dd_bank = [];
			var cheque_dd_no = [];
			var cheque_dd_amnt = [];
			var cheque_dd_date = [];
			var payee_name = [];

			if(payment_mode !=''){
			

				if(payment_mode == '1'){

					status = cash_amount_valdiation(status)['status'];
					if(status){
						cash_amount = cash_amount_valdiation(status)['cash_amount'];

						if(parseFloat(payable_amnt) < parseFloat(cash_amount)){
							$.notify('Cash amount in not greater than to payable amount.');
							status =false;
						}else{
							status = true;
						}


					}

				}else if(payment_mode == '2' || payment_mode == '3'){

					status = cheque_dd_validation(status)['status'];
					
					if(status){
						no_of_cheque_dd = cheque_dd_validation(status)['no_of_cheque_dd'];
						cheque_dd_bank  = cheque_dd_validation(status)['cheque_dd_bank'];
						cheque_dd_no    = cheque_dd_validation(status)['cheque_dd_no'];
						cheque_dd_amnt  = cheque_dd_validation(status)['cheque_dd_amnt'];
						cheque_dd_date  = cheque_dd_validation(status)['cheque_dd_date'];
						// console.log(cheque_dd_date)
						payee_name  = cheque_dd_validation(status)['payee_name'];
						var compare_amnt =0 ;
						$.each(cheque_dd_amnt,function(i,v){
							compare_amnt = parseFloat(compare_amnt) + parseFloat(v);
						});

						if(parseFloat(payable_amnt) < parseFloat(compare_amnt)){
							$.notify('Cheque/DD amount is not greater than payable amount.');
							status = false;
						}else{
							status = true;
						}
					}

				}else if(payment_mode =='4' || payment_mode =='7' || payment_mode =='8' || payment_mode =='9'){

					transcation_id = $('input[name="transcation_id"]').val();
					if(transcation_id == ''){
						$.notify('Transcation Number field is required.');
						status = false;
					}else{
						status = true;
					}

				}else if(payment_mode =='5' || payment_mode =='6'){

					status = cash_amount_valdiation(status)['status'];
					if(status){
						cash_amount = cash_amount_valdiation(status)['cash_amount'];
					}

					if(status){
						status = cheque_dd_validation(status)['status'];
						if(status){
							no_of_cheque_dd = cheque_dd_validation(status)['no_of_cheque_dd'];
							cheque_dd_bank  = cheque_dd_validation(status)['cheque_dd_bank'];
							cheque_dd_no    = cheque_dd_validation(status)['cheque_dd_no'];
							cheque_dd_amnt  = cheque_dd_validation(status)['cheque_dd_amnt'];
							cheque_dd_date  = cheque_dd_validation(status)['cheque_dd_date'];
							payee_name      = cheque_dd_validation(status)['payee_name'];

							var total_c_d_amnt =0 ;
							$.each(cheque_dd_amnt,function(i,v){
								total_c_d_amnt = parseFloat(total_c_d_amnt) + parseFloat(v);
							});
							var compare_amnt = parseFloat(total_c_d_amnt) + parseFloat(cash_amount);
							
							if(parseFloat(payable_amnt) < parseFloat(compare_amnt)){
								$.notify('Cheque/DD amount + Cash Amount is not greater than payable amount.');
								status = false;
							}else{
								status = true;
							}
						}
					}

				}

				if(status){
					var remarks = $('#remarks').val();
					// console.log(remarks);
					if(remarks !=''){
						$.ajax({
							type:'post',
							url:"{{route('pay_regular_fee_store')}}",
							data:{total_amnt:total_amnt,concession_amnt:concession_amnt,total_fine_amnt:total_fine_amnt,discount_amnt:discount_amnt,charges_amnt:charges_amnt,payable_amnt:payable_amnt,receipt_date:receipt_date,payment_mode:payment_mode,no_of_cheque_dd:no_of_cheque_dd,cash_amount:cash_amount,cheque_dd_bank:cheque_dd_bank,cheque_dd_no:cheque_dd_no,cheque_dd_amnt:cheque_dd_amnt,cheque_dd_date:cheque_dd_date,payee_name:payee_name,transcation_id:transcation_id,student_fee_instalments:student_fee_instalments,remarks:remarks,std_fees_mast_id:std_fees_mast_id,s_id:s_id},
							success:function(res){
								console.log(res)
									$.notify('Student Fee Instalement Pay','success');
									$('.overlay-loader').show();
									window.setTimeout(function() {
										window.location.href = "{{url('fee_success/')}}/"+res;
									}, 3000);

							}
						})
					}else{
						$.notify('Remarks Field is required.');
					}
				// 	alert('submit');
				}


			}else{
				$.notify('Please select payment mode');
			}	
		}else{
			$.notify('Please Select Instalment Checkbox');
		}
	});


	function cheque_dd_validation(status){
		var no_of_cheque_dd = $('#no_of_cheque_dd').val();
		var cheque_dd_bank = [];
		var cheque_dd_no = [];
		var cheque_dd_amnt = [];
		var cheque_dd_date = [];
		var payee_name = [];


		for(i= 1; i <=no_of_cheque_dd ; i++){
			var word = (i == 1 ? 'One' : (i == '2' ? 'Two' : 'Three '));
			var bank 		   = $('.cheque_dd_bank'+i).val();
			var c_d_number 	   = $('.cheque_dd_no'+i).val();
			var c_d_amnt 	   = $('.cheque_dd_amnt'+i).val();
			var c_d_date 	   = $('.cheque_dd_date'+i).val();
			var c_d_payee_name = $('.payee_name'+i).val();

			if(bank == '0'){
				$.notify('Cheque DD Bank '+word+' field is required.');
				status = false
			}else{
				cheque_dd_bank.push(bank);
				status = true;
			}

			if(c_d_number == ''){
				$.notify('Cheque DD Number '+word+' field is required.');
				status = false
			}else{
				cheque_dd_no.push(c_d_number);
				status = true;
			}

			if(c_d_amnt == '0'){
				$.notify('Cheque DD Amount '+word+' field is required.');
				status = false
			}else{
				cheque_dd_amnt.push(c_d_amnt);
				status = true;
			}


			if(c_d_date == ''){
				$.notify('Cheque DD Date '+word+' field is required.');
				status = false
			}else{
				cheque_dd_date.push(c_d_date);
				status = true;
			}

			if(c_d_payee_name == ''){
				$.notify('Cheque DD Payee Name '+word+' field is required.');
				status = false
			}else{
				payee_name.push(c_d_payee_name);
				status = true;
			}
		}						
		return {
			'status' : status,
			'no_of_cheque_dd' : no_of_cheque_dd,
			'cheque_dd_bank'  : cheque_dd_bank,
			'cheque_dd_no'	  : cheque_dd_no,
			'cheque_dd_amnt'  : cheque_dd_amnt,
			'cheque_dd_date'  : cheque_dd_date,
			'payee_name' 	  : payee_name
		}
	}

	function cash_amount_valdiation(status){
		var cash_amount = $('input[name="cash_amount"]').val();
		if(cash_amount == 0){
			$.notify('Cash Amount Field is required.');
			status = false;
		}else{
			status = true;
		}

		return {
			'status' : status,
			'cash_amount' :cash_amount
		};
	}

});
</script>
@endsection