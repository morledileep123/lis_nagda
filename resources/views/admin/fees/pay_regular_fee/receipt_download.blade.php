
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>FEES RECEIPT</title>
</head>
<style >
	body{
		font-size: 14px;
	}
	body h6{
		font-size: 14px;
	}
	@page { size: auto;  margin: 0mm; }
</style>
<body >
	<div class="container mb-5">
	 	<div class="row mt-5">
	 		<div class="col-md-11 m-auto">
	 			<div class="card">
	 				<div class="card-header bg-white p-3">
	 					<div class="row">
	 						<div class="col-md-2 text-center">
	 							<img src="{{ asset('frontend-logos/LIS_Logo-1.png')}}" width="100">
	 						</div>
	 						<div class="col-md-10 text-center"> 							
	 							<h5 class="font-weight-bold mt-2 text-uppercase">{{SCHOOLNAME}}</h5>

	 							<p class="mb-0" style="min-height: 0px !important; font-size: 13px">Address : {{SCHOOL_ADDRESS}} | Phone:- {{SCHOOL_PHONE}}</p>
	 							<p class="" style="min-height: 0px !important; font-size: 13px">CBSE Affiliation No. 1031030</p>

	 						</div>
	 					</div>
	 					<div class="row">
	 						<div class="col-md-12">
	 							<h5 class="font-weight-bold text-center">RECEIPT</h5>
	 						</div>
	 					</div>
	 				</div>
	 				<div class="card-body">
	 					<div class="row form-group">
	 						<div class="col-md-6 text-left">
	 							<h6>Receipt Number: {{$fee_receipt->receipt_bill_no}}</h6>
	 							<h6>Admission No: <span class="text-danger">{{$fee_receipt->student->admision_no}}</span></h6>
	 							<h6>Student Name : {{student_name($fee_receipt->student)}} </h6> 						
	 							<h6>{{student_first_guardian($fee_receipt->student)['relation'] .' '.student_first_guardian($fee_receipt->student)['name'] }}</h6>				

	 						</div>
	 						<div class="col-md-6 text-right" >
	 							<h6>Receipt Date: {{date('d-m-Y',strtotime($fee_receipt->receipt_date))}}</h6>
	 							<h6>Class Name : {{$fee_receipt->student->student_class->class_name}} </h6>
	 							<h6>Medium Name : {{Arr::get(MEDIUM,$fee_receipt->student->medium)}}</h6>
	 							<h6>Batch Name : {{$fee_receipt->student->student_batch->batch_name}} </h6> 						
	 						</div>
	 					</div>
	 					<hr>
	 					<div class="row form-group">
	 						<div class="col-md-12">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>PARTICULARS</th>
											<th>MONTHS</th>
											{{-- <th>TOTAL AMOUNT</th> --}}
											<th>PAID AMOUNT</th>
										</tr>
									</thead>
									<tbody>
										@php 
											$concession_amnt = 0 ;
											$discount_amnt =0;
											$total_head_amnt =0;
											$total_h_amnt = 0;
										@endphp
										@foreach($fee_receipt->receipt_heads as $receipt_head)
											@php 
												$concession_amnt = (float)$receipt_head->concession_amnt + (float)$concession_amnt ; 
												$discount_amnt = (float)$receipt_head->discount_amnt + (float)$discount_amnt  ;
												$total_head_amnt = (float)$receipt_head->payable_amnt + (float)$total_head_amnt;
												// $total_h_amnt = (float)$receipt_head->total_amnt + (float)$total_h_amnt;

											@endphp
										<tr>
											<td>{{$receipt_head->fee_head->fee_head_name}}</td>
											<td>{{date('M',strtotime($fee_receipt->receipt_date))}}</td>
											{{-- <td>{{round($receipt_head->total_amnt,2)}}</td> --}}
											<td>{{round($receipt_head->payable_amnt,2)}}</td>
										</tr>
										@endforeach
{{-- 										@if($concession_amnt !=0)
										<tr>
											<td>Concession Amount</td>
											<td>{{date('M',strtotime($fee_receipt->receipt_date))}}</td>
											<td>(-) {{round($concession_amnt,2)}}</td>
										</tr>
										@endif

										@if($discount_amnt !=0)
											<tr>
												<td>Discount Amount</td>
												<td>{{date('M',strtotime($fee_receipt->receipt_date))}}</td>
												<td>(-) {{round($discount_amnt,2)}}</td>
											</tr>
										@endif
 --}}									</tbody>
									<tfoot>
										<tr>
											{{-- <td></td> --}}
											{{-- <td></td> --}}
											{{-- <td  class="font-weight-bold">Total Amount: {{$total_h_amnt}}</td> --}}
											{{-- <td></td> --}}
											<td colspan="2" class="text-right font-weight-bold">Total Amount </td>
											@php 
											$total_amnt  = (float)$total_head_amnt ;
											@endphp
											<td class="font-weight-bold">{{round($total_amnt,2)}}</td>
										</tr>
									</tfoot>
								</table>	 							
	 						</div>
	 					</div>
	 					<div class="row form-group">
	 						<div class="col-md-12">
	 							<h6 class="text-capitalize"> In Words : {{displaywords($total_amnt)}}</h6>
	 						</div>
	 						<div class="col-md-6 mt-4">
	 							<h6>Transcation Id: {{$fee_receipt->payment_mode =='1' ? 'PORTAL' : $fee_receipt->transcation_id}} </h6>
	 						</div>
	 						<div class="col-md-6 mt-4 text-right">
	 							<h6 >Payment Mode : {{Arr::get(PAYMENTMODE,$fee_receipt->payment_mode)}} </h6>
	 						</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	</div>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>