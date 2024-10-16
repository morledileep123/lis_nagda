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
 					<h5 class="card-title">Student Paid Fees History
 						<a href="{{route('pay_regular_fee_show',$std_fees_mast_id)}}" class="btn btn-sm btn-primary pull-right">Back</a>
 					<h5>
 				</div>
 			
	 			<div class="card-body">
	 				<div class="row">
	 					<div class="col-md-6">
 							<h6>Admission No: <span class="text-danger">{{$student->admision_no}}</span></h6>
 							<h6>Student Name : {{student_name($student)}} </h6> 						
 							<h6>{{student_first_guardian($student)['relation'] .' '.student_first_guardian($student)['name'] }}</h6>	
	 					</div>
	 					<div class="col-md-6 text-right">
 							<h6>Mobile Number : {{$student->s_mobile}} </h6>
 							<h6>Date of Birth : {{date('d-m-Y',strtotime($student->dob))}}</h6>
 							<h6>Address: </h6>
	 					</div>
	 				</div>
	 				<hr>
	 				<div class="row">
	 					<div class="col-md-12 table-responsive">
	 						<table class="table table-bordered table-hover" >
	 							<thead>
	 								<tr>
	 									<th>Fees</th>
	 									<th>Total Amount</th>
	 									<th>Discount Amount</th>
	 									<th>Concession Amount</th>
	 									<th>Fine Amount</th>
	 									<th>Paid Amount</th>
	 									<th>Paid Date</th>
	 									<th>Bill Number</th>
	 								</tr>
	 							</thead>
	 							<tbody>
	 								@php  
	 									$paid_amount = 0;
	 									$total_amount = 0;
	 									$concession_amnt = 0;
	 									$discount_amnt = 0;
	 									$fine_amnt = 0;
	 								@endphp
	 								@foreach($fee_receipts as $fee_receipt)
		 								@foreach($fee_receipt->receipt_heads as $receipt_head)
		 									@php
		 										$total_amount = (float)$receipt_head->payable_amnt + $receipt_head->discount_amnt + $receipt_head->concession_amnt + (float)$total_amount;
		 										$concession_amnt = (float)$receipt_head->concession_amnt + (float)$concession_amnt;
		 										$discount_amnt = (float)$receipt_head->discount_amnt + (float)$discount_amnt;
		 										$fine_amnt = (float)$receipt_head->fine_amnt + (float)$fine_amnt;
		 										$paid_amount = (float)$receipt_head->payable_amnt + (float)$paid_amount;
		 									@endphp
		 									<tr>
			 									<td>{{str_replace(' ', '_', $receipt_head->receipt_head_title).'_'.$receipt_head->fee_head->fee_instalment->inst_title}}</td>
			 									<td>{{round(($receipt_head->payable_amnt + $receipt_head->discount_amnt + $receipt_head->concession_amnt),2)}}</td>
			 									<td>{{round($receipt_head->discount_amnt,2)}}</td>
			 									<td>{{round($receipt_head->concession_amnt,2)}}</td>
			 									<td>{{round($receipt_head->fine_amnt,2)}}</td>
			 									<td>{{round($receipt_head->payable_amnt,2)}}</td>
			 									<td>{{date('d-m-Y',strtotime($fee_receipt->receipt_date))}}</td>
			 									<td>{{$receipt_head->receipt_bill_no}}</td>
		 									</tr>
	 									@endforeach
	 								@endforeach
	 							</tbody>
	 							<tfoot>
	 								<tr>
	 									<td class="font-weight-bold">Total Amount</td>
	 									<td class="font-weight-bold">{{round($total_amount,2)}}</td>
	 									<td class="font-weight-bold">{{round($discount_amnt,2)}}</td>
	 									<td class="font-weight-bold">{{round($concession_amnt,2)}}</td>
	 									<td class="font-weight-bold">{{round($fine_amnt,2)}}</td>
	 									<td colspan="3" class="font-weight-bold">Net Amount : {{round($paid_amount,2)}}</td>
	 									
	 								</tr>
	 							</tfoot>
	 						</table>
	 					</div>
	 				</div>
	 			</div>
	 		</div> 			
 		</div>
 	</div>
</div>
@endsection