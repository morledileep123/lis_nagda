 <style type="text/css">
 	.span-text{
 		font-size: 13px;
 	}
 </style>


<button onclick="printDiv()" class="btn btn-success fa fa-print"></button>  

<div class="row mb-4" id="printable">
	<div class="col-md-6 col-xs-12 col-sm-12 mr-auto ml-auto mt-5 shadow " style="border:2px solid #136D40">
		<div class="row mt-3">
			<div class="col-md-2 col-xl-3 col-sm-2 col-xs-2">
				<img class="pl-1" src="{{ asset('frontend-logos/LIS_Logo-1.png')}}" style="width: 100%" alt="image" width="100px;" />
			</div>
			<div class="col-md-9 col-xl-9 col-sm-9 col-xs- text-center">
				<u class="text-center mt-3" style="font-size: 18px;color: #136D40;"><strong>{{SCHOOLNAME}}</strong></u><br>
				<span style="font-size: 12px;">{{SCHOOL_ADDRESS}}</span><br>
				<span style="font-size: 11px;"><b>Email : </b> {{SCHOOL_EMAIL}} &nbsp; <b>Website : </b> {{SCHOOL_WEBSITE}}</span><br>
				<span style="font-size: 11px"><b>Phone : </b> {{SCHOOL_PHONE}}</span>
			</div>

		</div>
		<div class="row mt-3">
			<div class="col-md-11 m-auto text-white " style="background-color: #136D40"><h6 class="pt-1">STUDENT IDENTITY CARD<span class="pull-right">{{isset($student) ? $student->student_batch->batch_name : '2020-2021'}}</span></h6></div>
		</div>
		<div class="row mt-3">
			<div class="col-md-4 pl-3">

				<img class="pl-1" src="{{asset((isset($student) ? ($student->photo !=null ? $student->photo : 'img/student_demo.png') : 'img/student_demo.png' ))}}" style="width: 100px; height: 100px;">
				
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
						<span class="span-text">{{isset($student) ? student_name($student) : 'John Deo'}}</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5 text-right">
						<span class="span-text">{{isset($student) ? student_first_guardian($student)['relation'] : 'Father Name'}}</span>
					</div>
					<div class="col-md-7 pl-0">
						<span class="span-text">{{isset($student) ? student_first_guardian($student)['name'] : 'Johan Doe'}}</span>
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
						<span class="span-text">Contact No. :</span>
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


<script type='text/javascript'>
    function printDiv() { 
        var divContents = document.getElementById("printable").innerHTML; 
        var a = window.open('', '', 'height=500, width=500'); 
        a.document.write('<html>'); 
        a.document.write('<body > <h1>Div contents are <br>'); 
        a.document.write(divContents); 
        a.document.write('</body></html>'); 
        a.document.close(); 
        a.print(); 
    } 
</script> 
	</script>

