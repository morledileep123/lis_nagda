@extends('layouts.main')
@section('content')

<div class="container">
  <div class="row mb-4">
    <div class="col-md-12">
        @include('admin.fees.header')
    </div>
  </div>
  <div class="row mb-4">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h5 class="card-title">FEES DASHBOARD</h5>
              </div>
              <div class="card-body">
                <div class="row">                 
                    <div class="col-md-3 col-sm-3 col-xs-11 mb-3 text-center">
                      <a href="{{route('fees.index')}}">
                        <div class="card shadow  ">
                          <div class="card-body">
                              <i class="fa fa-money fa-3x text-gray-200"></i><br>
                              <span class="text-xs font-weight-bold text-success text-uppercase mt-1">Fees</span>                             
                          </div>
                        </div>
                        </a>
                      </div>

                      <div class="col-md-3 col-sm-3 col-xs-11 mb-3 text-center">
                      <a href="{{route('fees-heads.index')}}">
                        <div class="card shadow  ">
                          <div class="card-body">
                              <i class="fa fa-header fa-3x text-gray-200"></i><br>
                              <span class="text-xs font-weight-bold text-success text-uppercase mt-1">Heads</span>                             
                          </div>
                        </div>
                        </a>
                      </div>

                      <div class="col-md-3 col-sm-3 col-xs-11 mb-3 text-center">
                      <a href="{{route('fees.index')}}">
                        <div class="card shadow  ">
                          <div class="card-body">
                              <i class="fa fa-money fa-3x text-gray-200"></i><br>
                              <span class="text-xs font-weight-bold text-success text-uppercase mt-1">Draft Fees</span>                             
                          </div>
                        </div>
                        </a>
                      </div>

                      <div class="col-md-3 col-sm-3 col-xs-11 mb-3 text-center">
                      <a href="{{route('fees.index')}}">
                        <div class="card shadow  ">
                          <div class="card-body">
                              <i class="fa fa-money fa-3x text-gray-200"></i><br>
                              <span class="text-xs font-weight-bold text-success text-uppercase mt-1">Fees Setting</span>                             
                          </div>
                        </div>
                        </a>
                      </div>

                      <div class="col-md-3 col-sm-3 col-xs-11 mb-3 text-center">
                      <a href="{{route('fees.index')}}">
                        <div class="card shadow  ">
                          <div class="card-body">
                              <i class="fa fa-money fa-3x text-gray-200"></i><br>
                              <span class="text-xs font-weight-bold text-success text-uppercase mt-1">New Admission Fees</span>                             
                          </div>
                        </div>
                        </a>
                      </div>

                      <div class="col-md-3 col-sm-3 col-xs-11 mb-3 text-center">
                      <a href="{{route('fees.index')}}">
                        <div class="card shadow  ">
                          <div class="card-body">
                              <i class="fa fa-money fa-3x text-gray-200"></i><br>
                              <span class="text-xs font-weight-bold text-success text-uppercase mt-1">Dynamic Fees</span>                             
                          </div>
                        </div>
                        </a>
                      </div>

                      <div class="col-md-3 col-sm-3 col-xs-11 mb-3 text-center">
                      <a href="{{route('pay_regular_fee_index')}}">
                        <div class="card shadow  ">
                          <div class="card-body">
                              <i class="fa fa-money fa-3x text-gray-200"></i><br>
                              <span class="text-xs font-weight-bold text-success text-uppercase mt-1">Pay Regular Fees</span>                             
                          </div>
                        </div>
                        </a>
                      </div>

                    <div class="col-md-3 col-sm-3 col-xs-11 mb-3 text-center">
                      <a href="{{route('concession.index')}}">
                        <div class="card shadow  ">
                          <div class="card-body">
                              <i class="fa fa-money fa-3x text-gray-200"></i><br>
                              <span class="text-xs font-weight-bold text-success text-uppercase mt-1">Concession</span>                             
                          </div>
                        </div>
                        </a>
                      </div>

                    <div class="col-md-3 col-sm-3 col-xs-11 mb-3 text-center">
                      <a href="{{route('fees.index')}}">
                      <div class="card shadow  ">
                        <div class="card-body">
                            <i class="fa fa-money fa-3x text-gray-200"></i><br>
                            <span class="text-xs font-weight-bold text-success text-uppercase mt-1">Paid History</span>                             
                        </div>
                      </div>
                      </a>
                    </div>

                 {{--    <div class="col-md-3 col-sm-3 col-xs-11 mb-3 text-center">
                      <a href="{{route('fees.index')}}">
                      <div class="card shadow  ">
                        <div class="card-body">
                            <i class="fa fa-money fa-3x text-gray-200"></i><br>
                            <span class="text-xs font-weight-bold text-success text-uppercase mt-1">Bus Fees</span>                             
                        </div>
                      </div>
                      </a>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-11 mb-3 text-center">
                      <a href="{{route('fees.index')}}">
                      <div class="card shadow  ">
                        <div class="card-body">
                            <i class="fa fa-money fa-3x text-gray-200"></i><br>
                            <span class="text-xs font-weight-bold text-success text-uppercase mt-1">Hostel Fees</span>                             
                        </div>
                      </div>
                      </a>
                    </div>

 --}}
                 </div>
              </div>
          </div>
      </div>
  </div>
</div>


{{-- <div id="content">
  <div class="container">
    <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Fees</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-3 col-sm-3 col-xs-11  col-div-mar col-div-nav active-li ">
            <a href="{{route('fees.index')}}">
              <div class="card  shadow h-100 py-2 bg-color">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Fees</div>
                      <i class="fa fa-money fa-2x text-gray-300"></i>
                  </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
             <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="{{route('fees-heads.index')}}">
              <div class="card shadow h-100 py-2 bg-color">
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
            <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
            <a href="http://127.0.0.1:8000/student_manage">
              <div class="card  shadow h-100 py-2 bg-color ">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Draft Fees</div>
                      <div class="row no-gutters align-items-center">
                      <i class="fa fa-money fa-2x text-gray-300"></i>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
            <a href="http://127.0.0.1:8000/student_previous-detail">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Fees Setting</div>
                      <div class="row no-gutters align-items-center">
                      <i class="fa fa-money fa-2x text-gray-300"></i>

                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
          </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
            <a href="http://127.0.0.1:8000/student-import-export">
            <div class="card  shadow h-100 py-2 bg-color">
            <div class="card-body">
              
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">New Admission Fees</div>
                    
                    <i class="fa fa-database fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div> 
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/student-import-export">
            <div class="card  shadow h-100 py-2 bg-color">
            <div class="card-body">
              
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dynamic Fees</div>
                    
                    <i class="fa fa-database fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
                <a href="http://127.0.0.1:8000/home">
                <div class="card shadow h-100 py-2 bg-color">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pay Regular Fees</div>
                        
                        <i class="fa fa-money fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
            </a>
          </div>   
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Concession</div>
                      
                      <i class="fa fa-cube fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Paid History</div>
                      
                      <i class="fa fa-history fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div> 
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 10px;">Payment Gateway Setting</div>
                      
                      <i class="fa fa-credit-card fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>   
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 10px;">Bulk Fees Upload By Fee Name</div>
                      
                      <i class="fa fa-cloud-upload fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>   
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 10px;">Pay Fine Due</div>
                      
                      <i class="fa fa-usd fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>  
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 10px;">Achive Folder</div>
                      
                      <i class="fa fa-file-archive-o fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div> 
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 10px;">Check Payment</div>
                      
                      <i class="fa fa-money fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>  
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 10px;">Edit Fess</div>
                      
                      <i class="fa fa-money fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 10px;">Bank Wise Cheque Upload</div>
                      
                      <i class="fa fa-bank fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>   
      </div>
    </div>
  </div>
</div> --}}

@endsection