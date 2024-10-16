<style>
	.bg-color:hover {
	  background-color: #4e73df;
	  color:white;
	}
	.btn.btn-info.btn-lg{
		background:  #4e73df;
	}
</style>

<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mb-4 mb-4">
         <a href="{{route('batch')}}" class="shadow h-100 py-2">
          <div class="card shadow h-100 py-2 bg-color {{Request::url() == Route('batch') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} ">
            <div class="card-body ">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text text-uppercase mb-1">Batch</div>
                  {{-- <div class="h5 mb-0 font-weight-bold ">{{count(session('studentBatch')) ? count(session('studentBatch')) : '0'}}</div> --}}
                  {{-- <div class="h5 mb-0 font-weight-bold "></div> --}}
                </div>
                <div class="col-auto">
                  <i class="fas fa-fw fa-tachometer-alt fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
            </a>
        </div>

        
        <div class="col-md-3 col-sm-4 col-xs-11  col-div-mar col-div-nav active-li mb-4">
        <a href="{{route('classes')}}">
          <div class="card {{Request::url() == Route('classes') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2 bg-color ">
            
	            <div class="card-body">
	              	<div class="row no-gutters align-items-center">
	                <div class="col mr-2">
	                  <div class="text-xs font-weight-bold  text-uppercase mb-1">Classes</div>
	                  {{-- <div class="h5 mb-0 font-weight-bold ">{{count(session('studentclass')) ? count(session('studentclass')) : '0'}}</div> --}}
	                </div>
	                <div class="col-auto">
	                  <i class="fa fa-graduation-cap fa-2x text-gray-300"></i>
	                </div>
	              </div>
	            </div>
          </div>
          </a>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-3 col-sm-4 col-xs-11  col-div-mar col-div-nav active-li mb-4">
        <a href="{{route('section')}}">
          <div class="card {{Request::url() == Route('section') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2 bg-color">
            
	            <div class="card-body">
	              	<div class="row no-gutters align-items-center">
	                <div class="col mr-2">
	                  <div class="text-xs font-weight-bold text-uppercase mb-1">Section</div>
	                  {{-- <div class="h5 mb-0 font-weight-bold ">{{count(session('studentSection')) ? count(session('studentSection')) : '0'}}</div> --}}
	                </div>
	                <div class="col-auto">
	                  <i class="fa fa-graduation-cap fa-2x text-gray-300"></i>
	                </div>
	              </div>
	            </div>
          </div>
          </a>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-11  col-div-mar col-div-nav active-li mb-4">
        <a href="{{route('subject.index')}}">
          <div class="card {{Request::url() == Route('subject.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2 bg-color">
            <div class="card-body">
              	<div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold  text-uppercase mb-1">Subject</div>
                  {{-- <div class="h5 mb-0 font-weight-bold ">{{count(session('studentSubjects')) ? count(session('studentSubjects')) : '0'}}</div> --}}
                </div>
                <div class="col-auto">
                  <i class="fa fa-graduation-cap fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>
  </div>
</div>
