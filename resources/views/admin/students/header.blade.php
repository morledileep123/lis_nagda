<style>
	.bg-color:hover {
	  background-color: #4e73df;
	  color:white;
	}
	
</style>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <div class="row">
      		<div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{route('mystudent')}}" class="">
	              <div class="card {{Request::url() == Route('mystudent') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
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
      			<a href="{{route('student_detail.index')}}" class="">
	              <div class="card {{Request::url() == Route('student_detail.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Student Details</div>
	                     
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-users fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{route('student_manage')}}" class="">
	              <div class="card {{Request::url() == Route('student_manage') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Manage Students</div>
	                     
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-cogs fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div>  
            <div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{route('previous-record')}}" class="">
	              <div class="card {{Request::url() == Route('previous-record') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Previous Record</div>
	                     
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-history fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{route('student_import_export')}}" class="">
	              <div class="card {{Request::url() == Route('student_import_export') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Upload Students</div>
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-upload fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div> 
            {{-- <div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{route('home')}}" class="">
	              <div class="card {{Request::url() == Route('home') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Records</div>
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
      			<a href="{{route('id_card')}}" class="">
	              <div class="card {{Request::url() == route('id_card') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">ID Card</div>
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-id-card fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div>	 
            <div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{route('student-report-card.index')}}" class="">
	              <div class="card {{Request::url() == route('student-report-card.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Results (Report Card)</div>
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-id-card fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div>	
              <div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{route('student-report-card-generate')}}" class="">
	              <div class="card {{Request::url() == route('student-report-card-generate') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">View Report Card</div>
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-id-card fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div>		          
	</div>
  </div>
</div>
