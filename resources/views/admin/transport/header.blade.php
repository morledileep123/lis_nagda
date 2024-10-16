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
          <a href="{{route('transport.index')}}" class="">
              <div class="card {{Request::url() == Route('transport.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
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
          <a href="{{route('bus_fee_index')}}" class="">
              <div class="card {{Request::url() == Route('bus_fee_index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Bus Fee Structure</div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-trucks fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
{{-- 
          <div class="col-xl-3 col-md-6 mb-4">
          <a href="{{route('fees-heads.index')}}" class="">
              <div class="card {{Request::url() == Route('fees-heads.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Heads</div>
                     
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
          <a href="#" class="">
              <div class="card {{Request::url() == Route('previous-record') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Settings</div>
                     
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
          <a href="#" class="">
              <div class="card {{Request::url() == Route('student_import_export') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Upload</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-upload fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>  --}}
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

    {{--   <div class="col-xl-3 col-md-6 mb-4">
      <a href="#" class="">
          <div class="card {{Request::url() == route('id_card') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold  text-uppercase mb-1">FEES TRACK REPORT</div>
                </div>
                <div class="col-auto">
                  <i class="fa fa-id-card fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>    --}}
    </div>
  </div>
</div>