@extends('layouts.main')
@section('content')
<style>
	.fees-page p{
		font-size: 14px;
	}
	.fees-page h6{
		font-size: 15px !important;
	}
</style>
<div class="container fees-page">
 	<div class="row mb-4">
 		<div class="col-md-12">
 			<div class="card">
 				<div class="card-header bg-white text-center p-3">
 					{{-- <div class="row">
 						<div class="col-md-6 m-auto "> --}}
 							<img src="{{ asset('frontend-logos/LIS_Logo-1.png')}}" width="100">
 							<h5 class="font-weight-bold mt-2">{{SCHOOLNAME}}</h5>
 				{{-- 		</div>
 					</div> --}}
 				</div>
 				<div class="card-body">
 					<div class="row form-group">
 						<div class="col-md-6 text-right">
 							<h6 class="">Transaction Id :</h6>
 						</div>
 						<div class="col-md-6">
 							<h6>{{$fee_receipt->transcation_id}}</h6> 							
 						</div> 						
 					</div>
 					<div class="row form-group">
 						<div class="col-md-6 text-right">
 							<h6 class="">Transaction Status :</h6>
 						</div>
 						<div class="col-md-6">
 							<h6 class="font-weight-bold text-success">SUCESS</h6>
 						</div>
 					</div>
 					<div class="row form-group">
 						<div class="col-md-6 text-right">
 							<h6 class="">Reciept Bill No :</h6>
 						</div>
 						<div class="col-md-6">
 							<h6 class="">{{$fee_receipt->receipt_bill_no}}</h6>
 						</div>
 					</div>
 					<div class="row form-group">
 						<div class="col-md-6 text-right">
 							<h6 class="">Payment Mode :</h6>
 						</div>
 						<div class="col-md-6">
 							<h6 class="">{{Arr::get(PAYMENTMODE,$fee_receipt->payment_mode)}}</h6>
 						</div>
 					</div>
 					<div class="row form-group">
 						<div class="col-md-6 text-right">
 							<h6 class="">Total Fee Paid :</h6>
 						</div>
 						<div class="col-md-6">
 							<h6 class=""><i class="fa fa-rupee"></i> {{$fee_receipt->total_amnt}}</h6>
 						</div>
 					</div>
 					<div class="row form-group">
 						<div class="col-md-6 text-right">
 							<h6 class="">Charges Amount :</h6>
 						</div>
 						<div class="col-md-6">
 							<h6 class=""><i class="fa fa-rupee"></i> {{$fee_receipt->charges_amnt}}</h6>
 						</div>
 					</div>
 					{{-- <div class="row form-group">
 						<div class="col-md-6 text-right">
 							<h6 class="">Concession Amount :</h6>
 						</div>
 						<div class="col-md-6">
 							<h6 class=""><i class="fa fa-rupee"></i> {{$fee_receipt->concession_amnt}}</h6>
 						</div>
 					</div>
 					<div class="row form-group">
 						<div class="col-md-6 text-right">
 							<h6 class="">Discount Amount :</h6>
 						</div>
 						<div class="col-md-6">
 							<h6 class=""><i class="fa fa-rupee"></i> {{$fee_receipt->discount_amnt}}</h6>
 						</div>
 					</div> --}}
 					<div class="row form-group">
 						<div class="col-md-6 text-right">
 							<h6 class="font-weight-bold">Total Paid :</h6>
 						</div>
 						<div class="col-md-6">
 							<h6 class=""><i class="fa fa-rupee"></i> {{$fee_receipt->payable_amnt}}</h6>
 						</div>
 					</div>


 					<div class="row">
 						<div class="col-md-12 text-center">
 							<a href="{{route('pay_regular_fee_show',$fee_receipt->std_fees_mast_id)}}" class="btn btn-sm btn-primary"> Back</a>
 							<a href="{{route('reciept_download',$fee_receipt->receipt_bill_no)}}" class="btn btn-sm btn-success" target="__blank"><i class="fa fa-download"></i> Download</a>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
</div>
@endsection
