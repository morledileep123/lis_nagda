 @extends('layouts.main')
 @section('content')

<div class="container">
	<div class="row mb-4">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Your Id Card <button onclick="printResult()" class="btn bt-sm  btn-primary pull-right">Print</button></h5>
				</div>
				<div class="card-body" id="id_card"> 
				 <style type="text/css">
				 	.span-text{
				 		font-size: 13px;
				 	}
				 </style>
				<div class="row mb-4">
				<div class="col-md-6 col-xs-12 col-sm-12 mr-auto ml-auto mt-5 shadow " style="border:2px solid #136D40">
				<div class="row mt-3">
					<div class="col-md-2 col-xl-3 col-sm-2 col-xs-2">
						<img class="pl-1" src="{{ asset('frontend-logos/LIS_Logo-1.png')}}" style="width: 100%" alt="image" width="100px;" />
					</div>
					<div class="col-md-9 col-xl-9 col-sm-9 col-xs- text-center">
						<u class="text-center mt-3" style="font-size: 15px;color: #136D40;"><strong>LAKSHYA INTERNATIONAL SCHOOL, NAGDA</strong></u>
						<span style="font-size: 13px;">(Affiliation to CBSE, Nagda, School Code: 50992)</span><br>
						<span style="font-size: 11px;"><b>Email : </b> hr@lisnagda.org &nbsp; <b>Website : </b> lisnagda.org</span><br>
						<span style="font-size: 11px"><b>Phone : </b> +91-78798-22222</span>
					</div>

				</div>
				<div class="row mt-3">
					<div class="col-md-11 m-auto text-white " style="background-color: #136D40"><h6 class="pt-1">STUDENT IDENTITY CARD<span class="pull-right">{{isset($student) ? $student->student_batch->batch_name : '2020-2021'}}</span></h6></div>
				</div>
				<div class="row mt-3">
					<div class="col-md-4 pl-3">

						<img class="pl-1" src="{{asset($student->photo !=null ? 'storage/'.$student->photo : 'storage/admin/student_demo.png')}}" style="width: 100px; height: 100px;">
						
					</div>
					<div class="col-md-8 col-lg-8">
						<div class="row">
							<div class="col-md-5 text-right m-0">
								<span class="span-text">Student ID :</span>
							</div>
							<div class="col-md-7 pl-0 m-0 pl-0">
								<span class="span-text">{{isset($student) ? $student->admision_no : '123456'}}</span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5 text-right m-0">
								<span class="span-text">Student Name :</span>
							</div>
							<div class="col-md-7 pl-0 m-0">
								<span class="span-text">{{isset($student) ? student_name($student) : 'Rahul Panchal'}}</span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5 text-right">
								<span class="span-text">Father/Guardian :</span>
							</div>
							<div class="col-md-7 pl-0">
								<span class="span-text">John Deo</span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5 text-right">
								<span class="span-text">Class :</span>
							</div>
							<div class="col-md-7 pl-0">
								<span class="span-text">{{isset($student) ? $student->student_class->class_name : '10th'}}</span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5 text-right">
								<span class="span-text">Emergency Call :</span>
							</div>
							<div class="col-md-7 pl-0">
								<span class="span-text">{{isset($student) ? $student->s_mobile : '+91-7879822222'}}</span>
							</div>
						</div>
						 
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-md-11 m-auto">
						<span class="span-text pull-right">Signature</span>
					</div>
				</div>
				<div class="row p-0 mt-2">
					<div class="col-md-12 text-center text-white p-0" style="background-color: #136D40">
						<span class="span-text">You Slogan Here You Slogan Here</span>
					</div>
				</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
</div>
<script> 
   function printResult() {
    var DocumentContainer = document.getElementById('id_card');
    var WindowObject = window.open('', "PrintWindow", "width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes");
    WindowObject.document.writeln(DocumentContainer.innerHTML);
    WindowObject.document.close();
    WindowObject.focus();
    WindowObject.print();
    WindowObject.close();
}
</script> 
@endsection