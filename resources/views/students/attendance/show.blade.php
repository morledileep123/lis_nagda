
<style type="text/css">     
    .red,
    .weekend {
     color:red
    }
    .green {
     color:green
    }
    .holiday {
     color:#983d8b
    }
    .blue {
     color:#00f
    }
    .text-bold {
     font-weight:700
    }
   
            
    @page {
      size: 5.5in 8.5in;
    }

    @page {
      size: A4;
    }

    @page :left {
      margin-left: 3cm;
    }

    @page :right {
      margin-left: 4cm;
    }
    @page { size: auto;  margin: 0mm; }

</style>
<div class="container">
	<div class="row mb-4">
		<div class="col-md-12 col-sm-12 col-lg-12">
			 <div class="card">
		        <div class="card-header">
					<h4 class="card-title">Attendance</h4>
		        </div>
       			<div class="card-body">         			
				
					<div class="row mt-3 mb-5">
						<div class="col-md-12 table-responsive" id="tableFilter">
							<!DOCTYPE html>

    			<title>Student Monthly Attendance</title>
   

				<div class="container-fluid">
				    <div class="row">
				            {{-- <div class="col-md-12">
				               <h4><p class="pull-right">Print Date: {{date('d-m-Y')}}</p></h4>
				            </div> --}}
				        <div class="col-md-12 text-center">
				            <h3>Lakshya International School, Nagda</h3>
				            <h4>Monthly Attendance</h4>
				            <h4>Month: {{$headerData['monthYear']}}</h4>
				        </div>
				        <div class="col-md-12">

				            {{-- <h5><b>Filter:</b> Class Name : {{$filter['class_name']}} || Batch Name : {{$filter['batch_name']}} || Section Name : {{$filter['section_name']}} || Medium : {{$filter['medium_name']}} </h5>
 --}}
				        </div>
				    </div>
				    <div class="row">
				        <div class="col-md-12 table-responsive">
				            <table class="classic table table-striped table-bordered">
				                <thead >
				                <tr>
				                    <th width="5%" rowspan="2" >SL</th>
				                    <th width="10%" rowspan="2">Name</th>
				                    <th width="5%" rowspan="2">Roll Number</th>
				                    <th width="55%" colspan="{{count($monthDates)}}" class="text-center">Day of Month</th>
				                    <th width="5%" rowspan="2">P</th>
				                    <th width="5%" rowspan="2">L.P</th>
				                    <th width="5%" rowspan="2">A</th>
				                    <th width="5%" rowspan="2">T.P</th>
				                </tr>
				                <tr>
				                    @foreach($monthDates as $date => $value)
				                        <th @if($value['weekend']) class="weekend" @endif style="width: 5%">{{$value['day']}}</th>
				                    @endforeach                  
				                </tr>
				                </thead>
				                <tbody>
				                    @php $count =1 ;@endphp
				                    @foreach($students as $student)
				                        <tr>
				                            <td>{{$count++}}</td>
				                            <td >{{student_name($student) }}</td>
				                            <td >{{$student->roll_no}}</td>
				                            @php
				                                $tPresent   = 0;
				                                $tlPresent  = 0;
				                                $tabsent    = 0;
				                            @endphp
				                            @foreach($monthDates as $date => $value)
				                                @php
				                                    $status = '';
				                                    $color = '';
				                                    foreach ($student->attendances as $attendance) {
				                                          $attendanceDate = date('Y-m-d',strtotime($attendance->attendance_date));
				                                        if($date == $attendanceDate && $attendance->present == 'P'){
				                                            
				                                                $status = 'P';
				                                                $tPresent++;
				                                                $color = 'green';
				                                            
				                                        }
				                                        elseif($date == $attendanceDate && $attendance->present == 'A' && !$value['weekend']){
				                                            $status = 'A';
				                                            $tabsent++;
				                                            $color = 'red';
				                                        }

				                                    }

				                                    if(isset($academic_dates[$date])) {
				                                    //if student has present in exam
				                                        if($academic_dates[$date] == 'E' && ($status == 'P' || $status == 'A')){
				                                            if($status == 'P'){
				                                                $status .= $academic_dates[$date];
				                                            }

				                                            if($status == 'A'){
				                                                 $tabsent--;
				                                                $status = $academic_dates[$date];
				                                                $color = 'holiday';
				                                            }

				                                        }
				                                        elseif($value['weekend'] != '1'){
				                                            $status = $academic_dates[$date];
				                                            $color = 'holiday';
				                                        }

				                                    }

				                                    if($value['weekend'] ){
				                                            $status .= 'W';
				                                            $color = 'weekend';
				                                    }
				                                @endphp
				                            <td class="{{$color}}" >{{$status}}</td>
				                            @endforeach
				                            <td>
				                                {{($tPresent-$tlPresent)}}
				                            </td>
				                            <td>
				                               {{$tlPresent}}
				                            </td>
				                            <td>
				                                {{$tabsent}}
				                            </td>
				                            <td>
				                                {{$tPresent}}
				                            </td>
				                        </tr>
				                    @endforeach
				                </tbody>
				            </table>
				        </div>
				       {{--  <div class="col-md-12">
				            <h5>Printed By: {{Auth::user()->name}}</h5>
				        </div> --}}
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
 window.print();
  window.onafterprint = function () {
         $('.printpage', window.parent.document).hide();
    }
    </script>
</body>
</html>

