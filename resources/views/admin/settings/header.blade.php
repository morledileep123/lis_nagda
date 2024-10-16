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
      			<a href="{{route('settings_cbscsection_dashboard')}}" class="">
	              <div class="card {{Request::url() == Route('settings_cbscsection_dashboard') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
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
      			<a href="{{route('settings.index')}}" class="">
	              <div class="card {{Request::url() == Route('settings.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Settings</div>
	                     
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
      			<a href="{{route('settings-header.index')}}" class="">
	              <div class="card {{Request::url() == Route('settings-header.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Header</div>
	                     
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-header fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div>  
            <div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{route('settings-slidebar.index')}}" class="">
	              <div class="card {{Request::url() == Route('settings-slidebar.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Slidebar</div>
	                     
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-header fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div> 
            <div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{url('settings-footer')}}" class="">
	              <div class="card {{Request::url() == url('settings-footer') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Footer</div>
	                     
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-header fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div>  
            <div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{route('settings-home.index')}}" class="">
	              <div class="card {{Request::url() == Route('settings-home.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Home</div>
	                     
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-home fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{route('settings-aboutus.index')}}" class="">
	              <div class="card {{Request::url() == Route('settings-aboutus.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Aboutus</div>
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
      			<a href="{{route('settings-academics.index')}}" class="">
	              <div class="card {{Request::url() == Route('settings-academics.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Academics</div>
	                    </div>
	                    <div class="col-auto">
	                      <i class="fa fa-education fa-2x text-gray-300"></i>
	                    </div>
	                  </div>
	                </div>
	              </div>
          		</a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
      			<a href="{{route('settings-ext-culr-activities.index')}}" class="">
	              <div class="card {{Request::url() == route('settings-ext-culr-activities.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Extra-Curricular-Activities</div>
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
      			<a href="{{route('settings-admission.index')}}" class="">
	              <div class="card {{Request::url() == route('settings-admission.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Admissions Form</div>
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
      			<a href="{{route('settings_cbscsection_dashboard')}}" class="">
	              <div class="card {{Request::url() == route('settings_cbscsection_dashboard') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">CBSC Section</div>
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
      			<a href="{{route('settings-contactus.index')}}" class="">
	              <div class="card {{Request::url() == route('settings-contactus.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Contact-us</div>
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
      			<a href="{{url('settings-more-dashboard')}}" class="">
	              <div class="card {{Request::url() == url('settings-more-dashboard') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">More</div>
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
      			<a href="{{route('settings-pages.index')}}" class="">
	              <div class="card {{Request::url() == route('settings-pages.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
	                <div class="card-body">
	                  <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Pages</div>
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
