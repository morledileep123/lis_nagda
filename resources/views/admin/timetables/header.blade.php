      
<style type="text/css">
  #menunew:active {background-color: #07c;color: #fff;}
</style>
<script type="text/javascript">
   $('li a').click(function() {
        var $this = $(this);
        // e.preventDefault();
        $('a').removeClass('active');
        $(this).addClass('active');
    });
  
</script>


  <div class="container">
   <div class="col-lg-12">

<style>
  .bg-color:hover {
    background-color: #4e73df;
    color:white;
  },
  .text-xs.font-weight-bold.text-warning.text-uppercase.mb-1 {
    font-size: 10px;
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
            <div class="col-md-2 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
             <a href="{{route('fees_dashboard')}}" class="">
              <div class="card border-left-primary shadow h-100 py-2 bg-color">
                <div class="card-body btn-primary">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text text-uppercase mb-1">Dashboard</div>
                      
                      <i class="fas fa-fw fa-tachometer-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
                </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-2 col-sm-3 col-xs-11  col-div-mar col-div-nav active-li ">
            <a href="{{route('fees.index')}}">
              <div class="card border-left-success shadow h-100 py-2 bg-color">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Fees</div>
                      <i class="fas fa-fw fa-tachometer-alt fa-2x text-gray-300"></i>
                  </div>
                  </div>
                </div>
              </div>
              </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-2 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
            <a href="{{route('fees-heads.index')}}">
              <div class="card border-left-info shadow h-100 py-2 bg-color ">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Heads</div>
                       <i class="fa fa-header fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
          </a>
            </div>
             
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-2 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
            <a href="http://127.0.0.1:8000/student_previous-detail">
              <div class="card border-left-info shadow h-100 py-2 bg-color">
                <div class="card-body">
                
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Setting</div>
                      <div class="row no-gutters align-items-center">
                        
                      <i class="fa fa-gear fa-2x text-gray-300"></i>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
          </a>
            </div>

              <!-- Pending Requests Card Example -->
              <div class="col-md-2 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
                <a href="http://127.0.0.1:8000/student-import-export">
                <div class="card border-left-warning shadow h-100 py-2 bg-color">
                <div class="card-body">
                  
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Upload</div>
                        
                        <i class="fa fa-upload fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
            </a>
              </div>
               <!-- Pending Requests Card Example -->
              <div class="col-md-2 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
                <a href="http://127.0.0.1:8000/home">
                <div class="card border-left-warning shadow h-100 py-2 bg-color">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Fees Track Report</div>
                        
                        <i class="fa fa-cube fa-2x text-gray-300"></i>
                      </div>
                     
                    </div>
                  </div>
                </div>
            </a>
          </div>   
      </div>
        </div>
      </div>
    </div>