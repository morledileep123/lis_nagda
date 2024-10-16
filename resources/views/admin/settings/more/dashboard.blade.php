@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
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
		      			<a href="{{url('settings-more-dashboard')}}" class="">
			              <div class="card {{Request::url() == url('settings-more-dashboard') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
			                <div class="card-body">
			                  <div class="row no-gutters align-items-center">
			                    <div class="col mr-2">
			                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Dashbboard</div>
			                     
			                    </div>
			                    <div class="col-auto">
			                      <i class="fa fa-dashboard-cap fa-2x text-gray-300"></i>
			                    </div>
			                  </div>
			                </div>
			              </div>
		          		</a>
		            </div>
		            <div class="col-xl-3 col-md-6 mb-4">
		      			<a href="{{route('settings-openings.index')}}" class="">
			              <div class="card {{Request::url() == Route('settings-openings.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
			                <div class="card-body">
			                  <div class="row no-gutters align-items-center">
			                    <div class="col mr-2">
			                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Openings</div>
			                     
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
		      			<a href="{{route('settings-principal-messages.index')}}" class="">
			              <div class="card {{Request::url() == Route('settings-principal-messages.index') ? 'border-left-success bg-primary text-white' : 'border-left-primary'}} shadow h-100 py-2">
			                <div class="card-body">
			                  <div class="row no-gutters align-items-center">
			                    <div class="col mr-2">
			                      <div class="text-xs font-weight-bold  text-uppercase mb-1">Principal`s Messages</div>
			                     
			                    </div>
			                    <div class="col-auto">
			                      <i class="fa fa-envelope fa-2x text-gray-300"></i>
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
  </div>
@endsection