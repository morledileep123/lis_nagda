@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class=" mb-0 text-gray-800 bread-text" >Dashboard</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Students</div>
                      <div class="mb-0 font-weight-bold text-gray-800">{{$students}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-graduation-cap fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
            </div>
        </div>

            <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Teachers</div>
                      <div class="mb-0 font-weight-bold text-gray-800">{{count($teachers)}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-language sidebar-nav-icon fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
            </div>
        </div>

            <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Batches</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                              {{-- <div class="mb-0 mr-3 font-weight-bold text-gray-800">50%</div> --}}
                                <div class="mb-0 font-weight-bold text-gray-800">{{count($studentBatch)}}</div>

                            </div>
                           {{--  <div class="col">
                              <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div> --}}
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Fees Details</div>
                      <div class="mb-0 font-weight-bold text-gray-800"><i class="fa fa-inr"></i> 0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-money fa-2x text-gray-300"></i>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class="row mb-4">
     {{--    <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="myAreaChart" style="display: block; width: 623px; height: 320px;" width="623" height="320" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}
      {{--   <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Academic Details</h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="myPieChart" style="display: block; width: 279px; height: 245px;" width="279" height="245" class="chartjs-render-monitor"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Referral
                        </span>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
   {{--  <div class="row mb-4">
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Notice & Circular &nbsp; </h6>
                </div>   
                <div class="card-body">
                    <marquee direction="up" scrollamount="4" onmouseover="this.stop();" onmouseout="this.start();">
                        @php $count = 1; @endphp
                        @foreach($getNotication as $getNotications)
                            @if(date("Y-m-d") >= $getNotications->date_to_display)

                                {{$count++}}.Notice Title:- {{$getNotications->circular_title}} <br>
                                &nbsp;&nbsp;Notice Description:- {{$getNotications->circular_description}} <br>
                                &nbsp;&nbsp;Notice File:- <br><a href=""><img src="{{asset($getNotications->file !=null ? 'storage/'.$getNotications->file : 'img/student_demo.png')}}" style="width: 100px; height: 100px;"></a> <br><hr><hr>
                                <a href="">Wishes</a>
                            @endif
                        @endforeach
                    </marquee>    
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Notice & Circular &nbsp; </h6>   
    
          </div>
          <!-- Card Body -->
        @role('students')
           <div class="card-body">
             <div class="chart-pie pt-4 pb-2">
                <marquee direction="up" scrollamount="4" onmouseover="this.stop();" onmouseout="this.start();">
                    @php $count = 1; @endphp
                    @foreach($getNotication as $getNotications)
                        @if(date("Y-m-d") >= $getNotications->date_to_display)

                            {{$count++}}.Notice Title:- {{$getNotications->circular_title}} <br>
                            &nbsp;&nbsp;Notice Description:- {{$getNotications->circular_description}} <br>
                            &nbsp;&nbsp;Notice File:- <br><a href=""><img src="{{asset($getNotications->file !=null ? 'storage/'.$getNotications->file : 'img/student_demo.png')}}" style="width: 100px; height: 100px;"></a> <br><hr><hr>
                            {{-- <a href="">Wishes</a> --}}
                        @endif
                    @endforeach
                </marquee>    
                </div>
            </div>
          @endrole
          @role('superadmin')
           <div class="card-body">
             <div class="chart-pie pt-4 pb-2">
                    <marquee direction="up" scrollamount="4" onmouseover="this.stop();" onmouseout="this.start();">
                        @php $count = 1; @endphp
                        @foreach($getNotication as $getNotications)
                            @if(date("Y-m-d") >= $getNotications->date_to_display)

                                {{$count++}}.Notice Title:- {{$getNotications->circular_title}} <br>
                                &nbsp;&nbsp;Notice Description:- {{$getNotications->circular_description}} <br>
                                &nbsp;&nbsp;Notice File:- <br><a href=""><img src="{{asset($getNotications->file !=null ? 'storage/'.$getNotications->file : 'img/student_demo.png')}}" style="width: 100px; height: 100px;"></a> <br><hr><hr>
                                {{-- <a href="">Wishes</a> --}}
                            @endif
                        @endforeach
                    </marquee>    
                </div>
            </div>
          @endrole
          @role('teachers')
          <div class="card-body">
             {{--  <div class="chart-pie pt-4 pb-2">
                <marquee direction="up" scrollamount="4" onmouseover="this.stop();" onmouseout="this.start();">
                  <?php $count = 1; ?>
                  @foreach($getNotication as $getNotications)
                    @if(date("Y-m-d") <= $getNotications->date_to_display && $getNotications->date_to_display == 'S')
                      {{$count++}}.Notice Title:- {{$getNotications->circular_title}} <br>
                      &nbsp;&nbsp;Notice Description:- {{$getNotications->circular_description}} <br>
                      &nbsp;&nbsp;Notice File:- <br><a href=""><img src="{{asset($getNotications->file !=null ? 'storage/'.$getNotications->file : 'img/student_demo.png')}}" style="width: 100px; height: 100px;"></a> <br><hr><hr>
                      <a href="">Wishes</a>
                      @endif
                  @endforeach
                  </marquee>    
              </div>         --}}
                <div class="chart-pie pt-4 pb-2">
                    <marquee direction="up" scrollamount="4" onmouseover="this.stop();" onmouseout="this.start();">
                        @php $count = 1; @endphp
                        @foreach($getNotication as $getNotications)
                            @if(date("Y-m-d") >= $getNotications->date_to_display)

                                {{$count++}}.Notice Title:- {{$getNotications->circular_title}} <br>
                                &nbsp;&nbsp;Notice Description:- {{$getNotications->circular_description}} <br>
                                &nbsp;&nbsp;Notice File:- <br><a href=""><img src="{{asset($getNotications->file !=null ? 'storage/'.$getNotications->file : 'img/student_demo.png')}}" style="width: 100px; height: 100px;"></a> <br><hr><hr>
                                {{-- <a href="">Wishes</a> --}}
                            @endif
                        @endforeach
                    </marquee>    
                </div>
          </div>
          @endrole
        </div>
      </div> 
       <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Today's Birthday</h6>           
          </div>
          <!-- Card Body -->
           <div class="card-body">
              <div class="chart-pie pt-4 pb-2">
                <marquee direction="up" scrollamount="4" onmouseover="this.stop();" onmouseout="this.start();">
                @foreach($birthUsers as $birthUser)
                    Name:- {{$birthUser->f_name. ' ' .$birthUser->l_name}} ({{date('d-M-Y',strtotime($birthUser->dob))}})<br><hr><hr>
                    {{-- <a href="">Wishes</a> --}}
                @endforeach
                </marquee>
              </div>              
          </div>
        </div>
      </div>
   @role('superadmin')

      <div class="col-md-4 col-lg-4">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">  Transport Details  </h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
              <canvas id="myPieChart1"></canvas>
            </div>
          </div>
        </div>
      </div> 
      @endrole 
   </div>
   <div class="row">
     <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Calendar</h6>
            </div>
            <div class="card-body">
              <div id="calendar"></div>
                <br>
            </div>
          </div>
     </div>
   </div>
</div>
{{-- <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.css">
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.print.css">
 --}}
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.js"></script>

<script src="{{asset("vendor/chart.js/Chart.min.js")}}"></script>
<script src="{{asset("js/demo/chart-area-demo.js")}}"></script>
<script src="{{asset("js/demo/chart-pie-demo.js")}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
  $('#calendar').fullCalendar({
    left: 'prev,next today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay'
  });
});
</script>
@endsection