<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  {{-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> --}}
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <meta name="google-site-verification" content="XBv1MHrT5EWBKwT-T3nANUbNh3eKn2INarhC6EVjd9c" />
    <script src="{{asset("vendor/jquery/jquery.min.js")}}"></script>
    <title>Lakshya International School, Nagda &#8211; CBSE Affiliation No. 1031030</title>
    <link rel="icon" href="{{ asset('frontend-logos/cropped-LIS_Logo-9-270x270.png')}}"/>

  {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> --}}

  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

{{--   <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css"> --}}

{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"> --}}

 <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />


<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
{{-- <link href="{{asset('css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet"> --}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{asset('js/time-picker-mouse-keyboard-interactions/src/theme/jquery.timeselector.css')}}" rel="stylesheet" />
<style type="text/css">

html {
  box-sizing: border-box;
  font-weight: 300;
}

*,
*:before,
*:after {
  box-sizing: border-box;
  position: relative;
  box-sizing: inherit;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
p {
  min-height: 120px;
}

.input-group {
  justify-content: flex-end;
  margin-bottom: .5em !important;
}
.siderbar1{
  font-size: 12px !important;
}
.btn {
  border-radius: 0;
  margin-right: .5em;
  /*color: #fff !important;*/
  /*width: 100px;*/
}
.bread-text{
  font-size:  20px !important;
}
/*.nav-tabs,
.tab-content {
  max-width: 50%;
}*/

.nav-tabs .nav-item a {
  border-radius: 0;
  background-color: #fff;
  border: none;
}

.nav-tabs .nav-item .active {
  border-radius: 0;
  background-color: #4e73df;
  color: #fff;
  border: none;
}
.nav-tabs li a:hover {
  /*background-color: #ddd;*/
    background: #4e73df;
  color: #fff;
  cursor: default;
}
/*.tab-content .tab-pane {
  padding: 1em;
  background-color: #eee;
}*/
.help-inline {
  color: #a94442;
  font-size: 15px;
}
/*.col-auto {
    display: inline-block;
    line-height: 60px;
    text-align: center;
    font-size: 30px;
    color: #ffffff;
    border-radius: 35px;
    background-color: #27ae60 !important;
    
}*/
/*.fa.fa-graduation-cap.fa-2x.text-gray-300{
  line-height: 64px;
    text-align: center;
    font-size: 28px;
    color: #ffffff;
    border-radius: 32px;
    background-color: #27ae60 !important;
}*/
 </style>
 <style type="text/css">
  .blink {
  animation: blink 1s steps(1, end) infinite;
}

@keyframes blink {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
</style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="" style="font-size: 15px">LIS</i>
        </div>
        <div class="sidebar-brand-text mx-3">LIS, Nagda <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('home')}}">
          <i class="fas fa-fw fa-tachometer-alt  fa-sm fa-fw mr-2 text-green-400" style="color:#7F00FF;"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->

      {{-- <div class="sidebar-heading">
        Interface
      </div>
 --}}
 @role('superadmin')
     <li class="nav-item ">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
      <i class="fas fa-fw fa-users"></i>
      <span>Manage Student</span>
    </a>
    <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded siderbar1">
            <a class="collapse-item " href="{{url('student')}}" >Student Dashboard</a>
            <a class="collapse-item" href="{{url('student_detail')}}" >Student Details</a>
            <a class="collapse-item" href="{{route('previous-record')}}">Previous Record</a>
            <a class="collapse-item" href="{{route('student_manage')}}">Manage Students</a>
            <a class="collapse-item" href="{{route('student_import_export')}}">Upload Students</a>
            <a class="collapse-item" href="{{route('id_card')}}">ID Card</a>
            <a class="collapse-item" href="{{route('student-report-card.index')}}">Results (Report card)</a>
            <a class="collapse-item" href="{{route('student-report-card-generate')}}">View Report Card</a>

          </div>
    </div>
  </li>

   <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
      <i class="fas fa-fw fa-users"></i>
      <span>Manage Teachers</span>
    </a>
    <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded siderbar1">
          <a class="collapse-item" href="{{url('teachers')}}">Teacher Dashboard</a>
          <a class="collapse-item" href="{{route('assign_subject')}}">Subject Assign </a>
        </div>
    </div>
  </li>

  @endrole

  @role(['teachers','superadmin'])
     <li class="nav-item">
      <a class="nav-link collapsed {{Request()->segment(2) == 'attendance.student' ? 'active-li' : ''}}" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
        <i class="fas fa-fw fa-clock-o"></i>
        <span>Manage Attendance</span>
      </a>
      <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded siderbar1">
              <a class="collapse-item" href="{{route('dashboard')}}">Dashboard</a>
              <a class="collapse-item" href="{{route('attendance.student')}}">Student Attendance</a>
  @endrole
  @role('superadmin')
              <a class="collapse-item" href="{{route('attendance.teacher')}}">Teachers Attendance</a>
  @endrole
  @role(['teachers','superadmin'])
              {{-- <a class="collapse-item" href="{{route('attendance.upload')}}">Upload Attendance</a> --}}
              <a class="collapse-item" href="{{route('attendance.manage_student')}}">Manage Attendance</a>
              <a class="collapse-item" href="{{route('attendance.student_report')}}">Reports Attendance</a>
          </div>
      </div>
    </li>
  @endrole
  
  @role('superadmin')

  <li class="nav-item">
    <a class="nav-link collapsed {{Request()->segment(2) == 'attendance.student' ? 'active-li' : ''}}" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
      <i class="fas fa-fw fa-cogs"></i>
      <span>Manage</span>
    </a>
    <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded siderbar1">
           <a class="collapse-item" href="{{route('classes')}}">Manage Class</a>
            <a class="collapse-item" href="{{route('batch')}}">Manage Batch</a>
            <a class="collapse-item" href="{{route('section')}}">Manage Section</a>
            <a class="collapse-item" href="{{route('subject.index')}}">Subject Details</a>

            {{-- <a class="collapse-item" href="{{url('subject_assign')}}">Assign Subject</a> --}}
            {{-- <a class="collapse-item" href="{{route('subject_assign_to_student')}}">Subject Assign to Student</a>   --}}
            {{-- <a class="collapse-item" href="{{route('batch')}}">Report</a> --}}
            {{-- <a class="collapse-item" href="{{route('batch')}}">Co Subject</a> --}}

        </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed {{Request()->segment(2) == 'attendance.student' ? 'active-li' : ''}}" href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
      <i class="fas fa-fw fa-cogs"></i>
      <span>Master</span>
    </a>
    <div id="collapse5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded siderbar1">
            {{-- <a class="collapse-item" href="{{route('classes')}}">Manage Class</a> --}}
            {{-- <a class="collapse-item" href="{{route('batch')}}">Manage Batch</a> --}}
            {{-- <a class="collapse-item" href="{{route('section')}}">Manage Section</a> --}}
            {{-- <a class="collapse-item" href="{{route('cast-category')}}">Category</a> --}}
            {{-- <a class="collapse-item" href="{{route('religions')}}">Religion </a> --}}
            {{-- <a class="collapse-item" href="{{route('blood-group')}}">Blood Group  </a> --}}
            {{-- <a class="collapse-item" href="{{route('nationality')}}">Nationality</a> --}}
            {{-- <a class="collapse-item" href="{{route('countries')}}">Country</a> --}}
            {{-- <a class="collapse-item" href="{{route('state')}}">State</a> --}}
            {{-- <a class="collapse-item" href="{{route('cities')}}">City</a> --}}
            {{-- <a class="collapse-item" href="{{route('mothetongue')}}">Mothetongue</a> --}}
            <a class="collapse-item" href="{{route('professiontype')}}">Profession Type</a>
            <a class="collapse-item" href="{{route('gaurdian_designation')}}">Designation</a>
            <a class="collapse-item" href="{{route('discount.index')}}">Discount</a>
            <a class="collapse-item" href="{{route('discount_type.index')}}">Discount Type</a>
            <a class="collapse-item" href="{{route('student-report-card-header.index')}}">Report card headers</a>
        </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed {{Request()->segment(2) == 'attendance.student' ? 'active-li' : ''}}" href="#" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
      <i class="fas fa-fw fa-money"></i>
      <span>Fees</span>
    </a>
    <div id="collapse6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded siderbar1">
           <a class="collapse-item" href="{{route('fees_dashboard')}}">Dashboard </a>
        </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed {{Request()->segment(2) == 'attendance.student' ? 'active-li' : ''}}" href="#" data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
      <i class="fas fa-fw fa-envelope"></i>
      <span>Compose</span>
    </a>
    <div id="collapse7" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded siderbar1">
           <a class="collapse-item" href="{{route('sms_compoe')}}">Compose SMS </a>
           <a class="collapse-item" href="{{route('email_compose')}}"> Compose Email</a>
        </div>
    </div>
  </li>
 <li class="nav-item">
    <a class="nav-link collapsed {{Request()->segment(2) == 'attendance.student' ? 'active-li' : ''}}" href="#" data-toggle="collapse" data-target="#collapseTimeTable" aria-expanded="true" aria-controls="collapseTimeTable">
      <i class="fas fa-fw fa-clock"></i>
      <span>Time Table</span>
    </a>
    <div id="collapseTimeTable" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded siderbar1">
           <a class="collapse-item" href="{{route('time-table.index')}}">Exams Time Table </a>
           <a class="collapse-item" href="{{route('class-wise-time-table.index')}}">Classes Time Table</a>
        </div>
    </div>
  </li>
 {{-- <li class="nav-item">
    <a class="nav-link" href="{{route('time-table.index')}}">
      <i class="fas fa-fw fa-clock"></i>
      <span>Time Table</span></a>
  </li> --}}

   <li class="nav-item">
    <a class="nav-link" href="{{route('admission_inquiry_data')}}">
      <i class="fas fa-fw fa-question-circle"></i>
      <span>Admission Inquiry</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('notice-circular.index')}}">
      <i class="fas fa-fw fa-bell"></i>
      <span>Notice & Circular</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('admin')}}">
      <i class="fas fa-fw fa-cog"></i>
      <span>ACL</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('gallery')}}">
      <i class="fas fa-fw fa-picture-o"></i>
      <span>Gallery</span></a>
  </li>

  
   <li class="nav-item">
    <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#Certificate" aria-expanded="true" aria-controls="Certificate">
      <i class="fas fa-fw fa-certificate"></i>
      <span>Certificate</span>
    </a>
    <div id="Certificate" class="collapse" aria-labelledby="headingTwo" data-parent="#Certificate">
        <div class="bg-white py-2 collapse-inner rounded siderbar1">
           <a class="collapse-item" href="{{route('certificates.index')}}">Certificate Issue </a>
           <a class="collapse-item" href="{{route('certificate_stud_req')}}"> Certificate Request</a>
        </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#Transport" aria-expanded="true" aria-controls="Transport">
      <i class="fas fa-fw fa-truck"></i>
      <span>Transport</span>
    </a>
    <div id="Transport" class="collapse" aria-labelledby="headingTwo" data-parent="#Transport">
        <div class="bg-white py-2 collapse-inner rounded siderbar1">
           <a class="collapse-item" href="{{route('transport.index')}}">Dashboard </a>
           <a class="collapse-item" href="{{route('bus_fee_index')}}">Bus Fee Slots</a>
        </div>
    </div>
  </li>
   <li class="nav-item">
    <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#hrms" aria-expanded="true" aria-controls="hrms">
      <i class="fas fa-fw fa-truck"></i>
      <span>HRMS</span>
    </a>
    <div id="hrms" class="collapse" aria-labelledby="headingTwo" data-parent="#hrms">
        <div class="bg-white py-2 collapse-inner rounded siderbar1">
           {{-- <a class="collapse-item" href="{{route('employees.index')}}">Dashboard </a> --}}
           <a class="collapse-item" href="{{route('employees.index')}}">Employee</a>
        </div>
    </div>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="{{url('career-request')}}">
      <i class="fas fa-graduation-cap"></i>
      <span>Career</span></a>
  </li>
   <li class="nav-item">
    <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#settings" aria-expanded="true" aria-controls="settings">
      <i class="fas fa-fw fa-cogs"></i>
      <span>Settings</span>
    </a>
    <div id="settings" class="collapse" aria-labelledby="headingTwo" data-parent="#settings">
        <div class="bg-white py-2 collapse-inner rounded siderbar1">
           {{-- <a class="collapse-item" href="{{route('employees.index')}}">Dashboard </a> --}}
           <a class="collapse-item" href="{{route('settings.dasboard')}}">Dashboard</a>
        </div>
    </div>
  </li>
@endrole
@ability('teachers','superadmin')
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed {{Request()->segment(2) == 'attendance.student' ? 'active-li' : ''}}" href="#" data-toggle="collapse" data-target="#manage_attendance" aria-expanded="true" aria-controls="manage_attendance">
      <i class="fa fa-clock-o sidebar-nav-icon" style="color: #4B0082;"></i>
      <span>Manage Attendance</span>
    </a>
    <div id="manage_attendance" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
        <a class="collapse-item" href="{{route('dashboard')}}">Dashboard</a>
        <a class="collapse-item" href="{{route('attendance.student')}}">Student Attendance</a>
        {{-- <a class="collapse-item" href="{{route('attendance.staff')}}">Staff Attendance</a> --}}
        <a class="collapse-item" href="{{route('attendance.upload')}}">Upload Attendance</a>
        <a class="collapse-item" href="{{route('attendance.manage_student')}}">Manage Attendance</a>
        <a class="collapse-item" href="{{route('attendance.student_report')}}">Reports Attendance</a>
      </div>
    </div>
  </li>
<li class="nav-item active">
<a class="nav-link" href="{{route('notice-circular.index')}}">
  <i class="fa fa-dashboard sidebar-nav-icon fa-sm fa-fw mr-2 text-green-400" style="color: #E0B0FF;"></i>
   <span>Notice & Circular</span></a>

</li>
<li class="nav-item active">
  <a class="nav-link" href="{{url('profile')}}">
  <i class="fas fa-fw fa-user fa-sm fa-fw mr-2 text-green-400" style="color: green;"></i>
  <span>Profile</span></a>
</li>
@endability

@role('students')

   
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#profile" aria-expanded="true" aria-controls="profile">
      <i class="fa fa-clock-o sidebar-nav-icon" ></i>
      <span> Profile</span>
    </a>
    <div id="profile" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('profile.index')}}">Manage Profile</a>
        <a class="collapse-item" href="{{route('show_student_profile')}}">Show Personal Info</a>
      </div>
    </div>
  </li>
   <li class="nav-item active">
    <a class="nav-link" href="{{route('student_id_card')}}">
      <i class="fas fa-fw fa-certificate fa-sm fa-fw mr-2 " ></i>
      <span>ID-Card</span></a>
    </li>
    <li class="nav-item active">
    <a class="nav-link" href="{{route('certificate-request.index')}}">
      <i class="fas fa-fw fa-certificate fa-sm fa-fw mr-2 text-green-400" ></i>
      <span>Certificate</span></a>
    </li>  
   
    <li class="nav-item active">
    <a class="nav-link" href="{{route('attendence')}}">
      <i class="fas fa-fw fa-bars fa-sm fa-fw mr-2 text-green-400" ></i>
      <span>Show Attendance</span></a>
    </li>    
        
@endrole
@role('students','teachers')
<li class="nav-item active">
  <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-red-400" style="color: red;"></i>
    <span>Logout</span></a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>              
</li>
</li>
@endrole

 
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
        {{--   <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> --}}
          

         

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <li class="nav-item mr-5">
              <select name="session_batch" class="mt-3 form-control" id="session_batch">
                  @foreach(batches() as $batch)
                      <option value="{{$batch->id}}" {{$batch->id == session('current_batch') ? 'selected' : ''}}>{{$batch->batch_name}}</option>
                  @endforeach            
              </select>
            </li>

           




      {{--   <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
 --}}
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                {{-- <span class="badge badge-danger badge-counter blink">3+</span> --}}
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">Admission Iquiry</span>
                  </div>
                </a>
                {{-- <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a> --}}
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
          {{--   <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>
 --}}
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                 @role('superadmin','teachers')
                  <img src="{{asset(Auth::user()->photo !=null ? 'storage/'.Auth::user()->photo : 'img/student_demo.png')}}"  class="img-profile rounded-circle ">
                 @endrole
                 @role('students')
                  <img src="{{asset(Auth::user()->photo !=null ? 'storage/'.Auth::user()->photo : 'img/student_demo.png')}}"  class="img-profile rounded-circle ">
                 @endrole
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              @role('students')
                 <a class="dropdown-item" href="{{url('your-profile')}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-green-400" style="color: green;"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
              @endrole
              @role('superadmin')
                 <a class="dropdown-item" href="{{url('profile')}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-green-400" style="color: green;"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
                <a class="dropdown-item" href="{{route('settings.index')}}">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> 
                <a class="dropdown-item" href="{{route('sms_compoe')}}">
                  <i class="fas fa-commenting fa-sm fa-fw mr-2 text-gray-400"></i>
                  Compose SMS
                </a>
                <a class="dropdown-item" href="{{route('email_compose')}}">
                  <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
                  Compose Email
                </a>


                @endrole
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-red-400" style="color: red;"></i>Logout</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
<style type="text/css">
  #menunew:active {background-color: #07c;color: #fff;}
</style>
{{-- <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.css">
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.print.css"> --}}