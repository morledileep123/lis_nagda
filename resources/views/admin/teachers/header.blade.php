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
    <div class="card-body">
      <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
  			<a href="{{route('teachers.index')}}" class="">
              <div class="card {{Request::url() == Route('teachers.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Teachers Details</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>		                     
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
  			<a href="{{route('assign_subject')}}" class="">
              <div class="card {{Request::url() == Route('assign_subject') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Assign Subject</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-graduation-cap fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
      		</a>
        </div>

        {{-- <div class="col-xl-3 col-md-6 mb-4">
    			<a href="{{route('teachers.index')}}" class="">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold  text-uppercase mb-1">Total Teacher</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
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
  			 <a href="{{route('teachers.index')}}" class="">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Total Teams</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-graduation-cap fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
      		</a>
        </div>		 --}}        
	</div>
  </div>
</div>
