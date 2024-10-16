
<div class="card shadow mb-4">
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
  </div>
  <!-- Card Body -->
  <div class="card-body"  align="center">
    <div class="row pull-center">
      <!-- Earnings (Monthly) Card Example -->
   
      <div class="col-md-3 col-sm-3 col-xs-11  col-div-mar col-div-nav active-li">
       <a href="{{route('notice-circular.create')}}">
        <div class="card shadow h-100 py-2 {{ Request::url('notice-circular/create') == url('notice-circular/create') ? 'text-white border-left-primary bg-primary' : 'border-left-success' }} ">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
              <div class="content-header">
                  {{-- <a href="index.php?plugin=circularv2&amp;action=addcircular" onclick="showhide('Div1');"> --}}<i class="fa fa-plus-circle"> Add Notice/Circular</i>

              </div>
            </div>
          </div>
        </div>
      </div>
  </a>
  </div>
     <div class="col-md-3 col-sm-3 col-xs-11  col-div-mar col-div-nav active-li">
       <a href="{{route('notice-circular.index')}}">
        <div class="card  shadow h-100 py-2 {{ Request::url('notice-circular') == url('notice-circular') ? 'text-white border-left-primary bg-primary' : 'border-left-success' }}">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                {{-- <a href="index.php?plugin=circularv2&amp;action=index" onclick="showhide('Div2');"> --}}<i class="fa fa-clipboard"> Manage Notice/Circular</i>
              </div>
            </div>
          </div>
        </div>
          </a>
      </div>
    </div>
</div>
</div>
