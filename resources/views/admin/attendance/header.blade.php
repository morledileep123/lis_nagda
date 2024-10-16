<style>
	.bg-color:hover {
	  background-color: #4e73df;
	  color:white;
	}
	
</style>

<div class="card  mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      	<div class="row">
      		<div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{route('dashboard')}}" class="">
	              <div class="card {{Request::url() == Route('dashboard') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Dashbboard</div>
	                     
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-graduation-cap fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{route('attendance.student')}}" class="">
	              <div class="card {{Request::url() == Route('attendance.student') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Student Attendance</div>
	                     
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-users fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div>
            @role('superadmin')
            <div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{route('attendance.teacher')}}" class="">
	              <div class="card {{Request::url() == Route('attendance.teacher') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Teacher Attendance</div>
	                     
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-cogs fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div>  
            @endrole
            {{-- <div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{route('attendance.upload')}}" class="">
	              <div class="card {{Request::url() == Route('attendance.upload') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Upload Attendance</div>
	                     
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-history fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div> --}}
            <div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{route('attendance.manage_student')}}" class="">
	              <div class="card {{Request::url() == Route('attendance.manage_student') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Manage Attendance</div>
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-upload fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div> 
            <div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{route('attendance.student_report')}}" class="">
	              <div class="card {{Request::url() == Route('attendance.student_report') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Reports</div>
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-history fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div>
		</div>
  	</div>
</div>