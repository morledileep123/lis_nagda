@extends('layouts.main')
@section('content')

<style type="text/css">
    .text-danger{
        font-size: 12px;
    }
</style>

<div class="container">
    <div class="row mb-4">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
               <div class="card-header">
                    <h6 class="card-title">Edit Employee
                        <a href="{{route('employees.index')}}" class="btn btn-sm btn-primary pull-right"> Back</a>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                            <div class="tabs">
                                <ul class="nav nav-tabs tab-links">
                                    <li class="nav-item active">
                                        <a class="nav-link active" href="#basic_details">Basic Details</a>
                                    </li>
                                    <li class="nav-item"> 
                                        <a class="nav-link" href="#academic_dtl" >Academic Details</a>
                                    </li>
                                    {{-- <li class="nav-item"> 
                                        <a class="nav-link" href="#guardian_info" >Guardian Info</a>
                                    </li> --}}
                                    <li class="nav-item"> 
                                        <a class="nav-link" href="#employee_address" > Address</a>
                                    </li>
                                    <li class="nav-item"> 
                                        <a class="nav-link" href="#bank_details">Bank Details</a>
                                    </li>
                                    <li class="nav-item"> 
                                        <a class="nav-link" href="#emp_documentument" > Document</a>
                                    </li>
                                </ul>
                    
                                <form action="{{route('employees.update',$editEmp->id)}}" method="post" enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    @method('PUT')

                                    <div class="tab-content mt-4 p-2" style="font-size: 15px !important; background-color: whitesmoke !important;" >
                                        <div class="tab-pane tab  active" id="basic_details" >
                                            <section>
                                                <h3 class="mb-3">Basic Details</h3>
                                                <hr/>
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label >Employee Photo</label>
                                                        <input type="file" name="photo" id="photo" accept="image/*" value="{{old('photo')}}">
                                                        <img src="{{asset($editEmp->photo !=null ? 'storage/'.$editEmp->photo : 'img/student_demo.png')}}" style="width: 30px; height: 30px;">
                                                        @error('photo')
                                                            <span class="text-danger">
                                                            <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label >Employee Signature</label>
                                                        <input type="file" name="signature" id="signature" accept="image/*" value="{{old('signature')}}">
                                                         <img src="{{asset($editEmp->signature !=null ? 'storage/'.$editEmp->signature : 'img/student_demo.png')}}" style="width: 30px; height: 30px;">
                                                        @error('signature')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label class="required">Full Name</label>
                                                        <input type="text" name="name" id="name" value="{{$editEmp->name}}" class="form-control required" required="required">
                                                        @error('name')
                                                        <span class="text-danger">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>  
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label class="required">Mobile Number</label>
                                                        <input type="text" name="mobile" class="form-control required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{$editEmp->mobile}}" required="required"> 
                                                        @error('mobile')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label class="required">Mobile Number2</label>
                                                        <input type="text" name="mobile1" class="form-control required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{$editEmp->mobile1}}" > 
                                                        @error('mobile1')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Email Address</label>
                                                        <input type="text" name="email" class="form-control required" value="{{$editEmp->email}}"> 
                                                        
                                                        @error('email')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 form-group col-xs-6">
                                                        <label class="required">Date of Birth</label>
                                                        <input type="text" name="dob" class="form-control datepicker required dob" data-date-format="yyyy-mm-dd" placeholder="{{date('Y-m-d')}}" value="{{$editEmp->dob}}" required="required">
                                                        @error('dob')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="col-md-3 col-sm-3 form-group col-xs-6">
                                                        <label class="required">Gender</label>
                                                        <select name="gender" class="form-control required" required="required">
                                                            <option value="">Select Gender</option>
                                                            @foreach(GENDER as $key =>$value)
                                                                <option value="{{$key}}" {{$editEmp->gender == $key ? 'selected' : ''}}>{{$value}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('gender')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 form-group col-xs-6">
                                                        <label>Religion</label>
                                                        <select class="form-control" name="religion_id">
                                                            <option value="">Select Religion</option>
                                                            @foreach(RELIGION as $key => $value)
                                                                <option value="{{$key}}" {{$editEmp->religion_id == $key ? 'selected' : ''}}>{{$value}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('religion_id')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Blood Group</label>
                                                        <select class="form-control" name="blood_group">
                                                        <option value="">Select Blood Group</option>
                                                        @foreach(BLOODGROUP as $key => $value)
                                                            <option value="{{$key}}" {{$editEmp->blood_group == $key ? 'selected' : ''}}>{{$value}}</option>
                                                        @endforeach
                                                        </select>
                                                        @error('blood_group')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Age</label>
                                                        <input type="text" value="{{$editEmp->age}}" name="age" class="form-control age" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                        @error('age')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 col-xs-6 col-sm-6 form-group">
                                                        <label class="required">Joining Date</label>
                                                        <input type="text" name="joining_date" class="form-control datepicker required joining_date"  data-date-format="yyyy-mm-dd"  value="{{$editEmp->joining_date}}" placeholder="{{date('Y-m-d')}}" >
                                                        @error('joining_date')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 col-xs-6 col-sm-6 form-group">
                                                        <label class="required">Year Of Experience</label>
                                                        <input type="text" name="year_of_experince" value="{{$editEmp->addhar_card}}" class="form-control" >
                                                        @error('year_of_experince')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 col-xs-6 col-sm-6 form-group">
                                                        <label class="required">Employee Type</label>
                                                        <select class="form-control required" name="emp_type" id="emp_type" >
                                                        <option value="">Select employee type</option>
                                                        @foreach(EMP_TYPE as $key => $value)
                                                            <option value="{{$key}}" {{$editEmp->emp_type == $key ? 'selected' : ''}}>{{$value}}</option>
                                                        @endforeach
                                                        </select>
                                                        @error('emp_type')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                    
                                                <div class="form-group row">
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Aadhar Card Number</label>
                                                        <input type="text" name="addhar_card" value="{{$editEmp->addhar_card}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                        @error('addhar_card')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Pan Card Number</label>
                                                        <input type="text" name="pan_card" value="{{$editEmp->pan_card}}" class="form-control" >
                                                        @error('pan_card')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Voter ID Number</label>
                                                        <input type="text" name="voter_id" value="{{$editEmp->voter_id}}" class="form-control" >
                                                        @error('voter_id')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Driving Licence</label>
                                                        <input type="text" name="driving_licence" value="{{$editEmp->driving_licence}}" class="form-control" >
                                                        @error('driving_licence')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Passport ID</label>
                                                        <input type="text" name="passport_id" value="{{$editEmp->passport_id}}" class="form-control" >
                                                        @error('passport_id')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Old PF Number</label>
                                                        <input type="text" name="old_pf_number" value="{{$editEmp->old_pf_number}}" class="form-control" >
                                                        @error('old_pf_number')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>New PF Number</label>
                                                        <input type="text" name="new_pf_number" value="{{$editEmp->new_pf_number}}" class="form-control" >
                                                        @error('new_pf_number')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>New Uan Number</label>
                                                        <input type="text" name="old_uan_number" value="{{$editEmp->old_uan_number}}" class="form-control" >
                                                        @error('old_uan_number')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Old Uan Number</label>
                                                        <input type="text" name="new_uan_number" value="{{$editEmp->new_uan_number}}" class="form-control" >
                                                        @error('new_uan_number')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Old Esi Number</label>
                                                        <input type="text" name="old_esi_number" value="{{$editEmp->old_esi_number}}" class="form-control" >
                                                        @error('old_esi_number')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>New Esi Number</label>
                                                        <input type="text" name="new_esi_number" value="{{$editEmp->new_esi_number}}" class="form-control" >
                                                        @error('new_esi_number')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                            </section>
                                            <ul class="tab-links nav nav-tabs pull-right mt-3">
                                                <li class="nav-item">
                                                    <a href="#next_tab2" class="nav-link btn btn-sm bg-success text-white nextButton">Next</a>
                                                </li>
                                            </ul>
                                        </div>
                                       <div class="tab-pane tab" id="academic_dtl">
                                            <h3 class="mb-3">Academic Details</h3>
                                            <hr>
                                            <section>
                                              <div class="row" >
                                                    <div class="col-md-12 col-xl-12 col-sm-12" style="border:1px solid #eee9e9; " id="acadmic_dtl" >

                                                    </div>
                                              </div>
                                            </section>
                                            <ul class="tab-links nav nav-tabs pull-right mt-3">
                                                <li class="nav-item">
                                                    <a href="#back_tab1" class="nav-link btn btn-sm bg-primary text-white  prevButton">Prev</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#next_tab2" class="nav-link btn btn-sm bg-success  text-white nextButton">Next</a>
                                                </li>
                                            </ul>
                                        </div>   
                                        <div class="tab-pane tab" id="employee_address">
                                            <h3 class="mb-3">Employee Address</h3>
                                            <hr/>
                                            <section>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Permanent Address:</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row form-group">
                                                        <div class="col-md-4 ">
                                                            <label class="required">Address Line</label> 
                                                            <input type="text" class="form-control" name="p_address" id="p_address" value="{{$editEmp->p_address}}">
                                                            @error('p_address')
                                                                <span class="text-danger">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4 ">
                                                            <label class="required">City Name</label>
                                                            <input type="text" class="form-control" id="p_city" name="p_city" value="{{$editEmp->p_city}}">
                                                            @error('p_city')
                                                                <span class="text-danger">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror       
                                                        </div>
                                                        
                                                        <div class="col-md-4 ">
                                                            <label class="required">State Name</label>
                                                            <input type="text" class="form-control" name="p_state" id="p_state" value="{{$editEmp->p_state ?? 'Madhya Pradesh'}}" >
                                                            @error('p_state')
                                                                <span class="text-danger">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">       
                                                        <div class="col-md-4 ">
                                                            <label class="required">Zip Code</label>
                                                            <input type="text" name="p_zip_code" class="form-control" id="p_zip_code" value="{{$editEmp->p_zip_code}}" >
                                                            @error('p_zip_code')
                                                                <span class="text-danger">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4 ">
                                                            <label class="required">Country Name</label>
                                                            <input type="text" class="form-control" name="p_country" id="p_country" value="{{$editEmp->p_country ?? 'India'}}">
                                                            @error('p_country')
                                                                <span class="text-danger">
                                                                    <strong>{{$message}}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title">Local Address:</h5>                                      
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row form-group">
                                                            <div class="col-md-12 ">
                                                                <label><input type="checkbox" name="same_as" id="p_l_same" {{$editEmp->same_as == 1 ? 'checked' : ''}} />
                                                                </label>
                                                                <label>Same as Permanent Address</label><span class="text-muted">(Click to copy permanent address data)</span>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4 ">
                                                                <label class="required">Address Line</label>
                                                                <input type="text" class="form-control loc_addr" name="l_address" id="l_address" value="{{$editEmp->l_address}}" >
                                                                @error('l_address')
                                                                    <span class="text-danger">
                                                                        <strong>{{$message}}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>                                              
                                                            <div class="col-md-4 ">
                                                                <label class="required">City Name</label>
                                                                <input type="text" class="form-control loc_addr" name="l_city" id="l_city" value="{{$editEmp->l_city}}">
                                                                @error('l_city')
                                                                    <span class="text-danger">
                                                                        <strong>{{$message}}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>              
                                                            <div class="col-md-4 ">
                                                                <label class="required">State Name</label>
                                                                <input type="text" class="form-control loc_addr" name="l_state" id="l_state"  value="{{$editEmp->l_state ?? 'Madhya Pradesh'}}">
                                                                @error('l_state')
                                                                    <span class="text-danger">
                                                                        <strong>{{$message}}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 ">
                                                                <label class="required">Zip Code</label>
                                                                <input type="text" name="l_zip_code" class="form-control loc_addr" id="l_zip_code" value="{{$editEmp->l_zip_code}}">
                                                                @error('l_zip_code')
                                                                    <span class="text-danger">
                                                                        <strong>{{$message}}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4 ">
                                                                <label class="required">Country Name</label>
                                                                <input type="text" class="form-control loc_addr" name="l_country" id="l_country" value="{{$editEmp->l_country ?? 'India'}}">
                                                                @error('l_country')
                                                                    <span class="text-danger">
                                                                        <strong>{{$message}}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                             
                                            </section>
                                           <ul class="tab-links nav nav-tabs pull-right mt-3">
                                                <li class="nav-item">
                                                    <a href="#back_tab1" class="nav-link btn btn-sm bg-primary text-white  prevButton">Prev</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#next_tab2" class="nav-link btn btn-sm bg-success  text-white nextButton">Next</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane tab" id="bank_details">
                                            <h3 class="mb-3">Bank Details</h3>
                                            <hr>
                                            <section>
                                                <div class="row form-group">
                                                    <div class="col-md-6 col-sm-6 form-group col-xs-6">
                                                        <label>Bank Name</label>
                                                        <input type="text" name="bank_name" class="form-control" value="{{$editEmp->bank_name}}"> 
                                                        @error('bank_name')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror

                                                    </div>
                                                    <div class="col-md-6 col-sm-6 form-group col-xs-6">
                                                        <label>Branch</label>
                                                        <input type="text" name="bank_branch" class="form-control" value="{{$editEmp->bank_branch}}">
                                                        @error('bank_branch')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-4 col-sm-6 form-group col-xs-6">
                                                        <label>Account Name</label>
                                                        <input type="text" name="account_name" class="form-control" value="{{$editEmp->account_name}}">
                                                        @error('account_name')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 form-group col-xs-6">
                                                        <label>Account Number</label>
                                                        <input type="text" name="account_no" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{$editEmp->account_no}}">
                                                        @error('account_no')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 form-group col-xs-6">
                                                        <label>IFSC CODE</label>
                                                        <input type="text" name="ifsc_code" class="form-control" id="ifsc_code" value="{{$editEmp->ifsc_code}}">
                                                        @error('ifsc_code')
                                                            <span class="text-danger">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </section>
                                            <ul class="tab-links nav nav-tabs pull-right mt-3">
                                                <li class="nav-item">
                                                    <a href="#back_tab1" class="nav-link btn btn-sm bg-primary text-white  prevButton">Prev</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#next_tab2" class="nav-link btn btn-sm bg-success  text-white nextButton">Next</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane tab" id="emp_documentument">
                                            <h3 class="mb-3">Employee Documents</h3>
                                            <hr/>
                                            <section>
                                                <div class="row">
                                                    <div class="col-md-12">                  
                                                        <input type="hidden" name="employeeId" id="employeeId" value="">        
                                                        <table class="table table-bordered" style="" id="emp_document">
                                                            <thead>
                                                                <tr style="background-color: #e3f2fd;">
                                                                    <th>Document Title  </th>
                                                                    <th>Document Description </th>
                                                                    <th>File </th>
                                                                    <th >Add More</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="docTBody">
                                                            </tbody>
                                                        </table>           
                                                    </div>           
                                                </div>                                        
                                            </section>      
                                            <ul class="tab-links nav nav-tabs pull-right mt-3">
                                                <li class="nav-item">
                                                    <a href="#back_tab1" class="nav-link btn btn-sm text-white bg-primary prevButton">Prev</a>
                                                </li>
                                                <li class="nav-item">
                                                    <input type="submit" name="submit" value="Submit"  class="btn bg-success text-white">
                                                </li>
                                            </ul>                               
                                        </div>
                                    </div>
                                </form>     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($message = Session::get('success'))
    <script >
    $(document).ready(function(){   
        swal({
          text: "{{$message}}",
          icon : 'success',
        });
       });
    </script>   
@endif

@include('layouts.common')
<script type="text/javascript">

// For tabing ..........    
$(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');

        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });


    jQuery('.nextButton').on('click', function() {
        var $activeTab = $('.tab-links li.active');
        var $wrapper = jQuery(this).closest('.tabs');
        var indexActive = $wrapper.find('li.active').index();
        $wrapper.find('li').eq(indexActive + 1).find('a').click();
    });

    jQuery('.prevButton').on('click', function() {
        var $activeTab = $('.tab-links li.active');
        var $wrapper = jQuery(this).closest('.tabs');
        var indexActive = $wrapper.find('li.active').index();
        $wrapper.find('li').eq(indexActive - 1).find('a').click();
    });
});

$('.dob').on('blur',function(e){
    e.preventDefault();
        var c_d = new Date();
        year = c_d.getFullYear() - 8;
        date = new Date($(this).val());

        age = Math.floor((c_d.getTime() - date.getTime()) / (365.25 * 24 * 60 * 60 * 1000));
        
        $('.age').val(age).attr('readonly','true');
});

$('label.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');
$('th.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');

$(document).ready(function(){

    $('#bus_fee_allocate').on('change',function(e){
        e.preventDefault();
        var bus_fee_allocate = $(this).val();
        bus_fee_show(bus_fee_allocate);
    })

    var bus_fee_allocate = "{{old('bus_fee_allocate')}}";
    if(bus_fee_allocate !=''){
         bus_fee_show(bus_fee_allocate);
    }

    function bus_fee_show(bus_fee_allocate){
        if(bus_fee_allocate == '1'){
            $('#busFeeDIV').show();
        }else{
            $('#busFeeDIV').hide();
        }
    }


    $('.status').on('change',function(e){
        e.preventDefault();
        var status = $(this).val();
        // console.log(status);
         passout_date(status);
        
    });

    var status = "{{old('status')}}";
    if(status !=''){
         passout_date(status);
    }

    function passout_date(status){
        if(status == 'P'){
            $('.passout_date').show();
        }else{
            $('.passout_date').hide();
        }
    } 


    var acadmic_dtl  = 0;
    @if(old('qual_name') !=null)
        @if(count(old('qual_name')) !=0)
            var acadmic_dtl = {{count(old('qual_name')) }};
            
        
        @endif
    @endif
    

   var k =0;
    @php 
        $k =0;
        $count_acadmic_dtl = count($editEmp->emp_qaul);
    @endphp


    $('#acadmic_dtl').append('<div id="row'+k+'"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-success " style="margin:10px 10px 0px 0px" id="add_acadmic_dtl"><i class="fa fa-plus"></i> Add More</a></div></div><div class="form-group row qual_name"><div class="col-sm-6 form-group col-md-4 col-xs-6 "><label class="">Qualification Name <strong class="text-danger">*</strong></label><select name="qual_name[]" class="form-control "><option value="">Select Relation</option>@foreach(QUALIFICATION_NAMES as $key =>$val)<option value="{{$key}}" {{$editEmp->emp_qaul[$k]->qual_name == $key ? 'selected' : ''}}>{{$val}}</option>@endforeach</select></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="">Percent <strong class="text-danger">*</strong></label><input type="text" name="percent[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->percent}}"></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="required">Grade <strong class="text-danger">*</strong></label><input type="text" name="grade[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->grade}}"></div><div class="col-sm-6 form-group col-md-4 col-xs-6 "><label class="">Year Of Passing <strong class="text-danger">*</strong></label></label><input type="text" name="year_of_passing[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->grade}}"></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label >Qualification Doc</label><input type="file" name="qual_doc[]" id="qual_doc" accept="image/*"><img src="{{asset($editEmp->photo !=null ? 'storage/'.$editEmp->photo : 'img/student_demo.png')}}" style="width: 30px; height: 30px;"></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="required">Qualification Description<strong class="text-danger">*</strong></label><textarea type="text" name="qual_desc[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->qual_desc}}">{{$editEmp->emp_qaul[$k]->qual_desc}}</textarea><input type="hidden" name="qual_id[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->qual_id}}"></div><hr></div></div>');


    // for(var z = 0; z < acadmic_dtl; z++){
        // $('#acadmic_dtl').append('<div id="row'+k+'"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-success " style="margin:10px 10px 0px 0px" id="add_acadmic_dtl"><i class="fa fa-plus"></i> Add More</a></div></div>'+html_div+'</div>');

    // }
        

                            
    k++;

    @php
    $k++;
    while ($k < $count_acadmic_dtl) {
    @endphp

    $('#acadmic_dtl').append('<div id="row{{$k}}"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-danger btn_remove" style="margin:10px 10px 0px 0px" id="{{$k}}"><i class="fa fa-minus"></i></a></div></div><div class="form-group row qual_name"><div class="col-sm-6 form-group col-md-4 col-xs-6 "><label class="">Qualification Name <strong class="text-danger">*</strong></label><select name="qual_name[]" class="form-control "><option value="">Select Relation</option>@foreach(QUALIFICATION_NAMES as $key =>$val)<option value="{{$key}}" {{$editEmp->emp_qaul[$k]->qual_name == $key ? 'selected' : ''}}>{{$val}}</option>@endforeach</select></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="">Percent <strong class="text-danger">*</strong></label><input type="text" name="percent[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->percent}}"></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="required">Grade <strong class="text-danger">*</strong></label><input type="text" name="grade[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->grade}}"></div><div class="col-sm-6 form-group col-md-4 col-xs-6 "><label class="">Year Of Passing <strong class="text-danger">*</strong></label></label><input type="text" name="year_of_passing[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->grade}}"></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label >Qualification Doc</label><input type="file" name="qual_doc[]" id="qual_doc" accept="image/*"><img src="{{asset($editEmp->photo !=null ? 'storage/'.$editEmp->photo : 'img/student_demo.png')}}" style="width: 30px; height: 30px;"></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="required">Qualification Description<strong class="text-danger">*</strong></label><textarea type="text" name="qual_desc[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->qual_desc}}">{{$editEmp->emp_qaul[$k]->qual_desc}}</textarea><input type="hidden" name="qual_id[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->qual_id}}"></div><hr></div></div>');

    @php
    $k++;
    }
    @endphp
    k = "{{$k}}";



    function acadmic_dtl_fn(){
        $('#acadmic_dtl').append('<div id="row'+k+'"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-danger btn_remove" style="margin:10px 10px 0px 0px" id="'+k+'"><i class="fa fa-minus"></i></a></div></div><div class="form-group row qual_name"><div class="col-sm-6 form-group col-md-4 col-xs-6 "><label class="">Qualification Name <strong class="text-danger">*</strong></label><select name="qual_name[]" class="form-control "><option value="">Select Qualification</option>@foreach(QUALIFICATION_NAMES as $key =>$val)<option value="{{$key}}">{{$val}}</option>@endforeach</select></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="">Percent <strong class="text-danger">*</strong></label><input type="text" name="percent[]" class="form-control " value="{{$editEmp->percent}}"></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="required">Grade <strong class="text-danger">*</strong></label><input type="text" name="grade[]" class="form-control "></div><div class="col-sm-6 form-group col-md-4 col-xs-6 "><label class="">Year Of Passing <strong class="text-danger">*</strong></label></label><input type="text" name="year_of_passing[]" class="form-control " value=""></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label >Qualification Doc</label><input type="file" name="qual_doc[]" id="qual_doc" accept="image/*"></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="required">Qualification Description<strong class="text-danger">*</strong></label><textarea type="text" name="qual_desc[]" class="form-control "></textarea><input type="hidden" name="qual_id[]" class="form-control " value=""></div><hr></div></div>');
        k++;
    }


    $('#add_acadmic_dtl').click(function(e){
        e.preventDefault();
        acadmic_dtl_fn();
        
    });

   
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id");
        //alert(button_id); 
        $('#row'+button_id+'').remove();
    });

});

$(document).ready(function(){    
    $('#p_l_same').on('change',function(){
        var check = $("[name='same_as']:checked").val();
        if(check == 'on'){
            var address = $('#p_address').val();
            var city = $('#p_city').val();      
            var state = $('#p_state').val();
            var zip_code = $('#p_zip_code').val();
            var country = $('#p_country').val();
        
            $('#l_address').val(address);
            $('#l_city').val(city);
            $('#l_state').val(state);
            $('#l_country').val(country);
            $('#l_zip_code').val(zip_code);

            $('.loc_addr').attr('readonly','true');
        
        }else{
            $('#l_address').val('');
            $('#l_city').val('');
            $('#l_state').val('');
            $('#l_country').val('');
            $('#l_zip_code').val('');
                    
            $('.loc_addr').removeAttr('readonly');
        }
    });


    });

var j = 0;
@php
        $j = 0;
        $count_docs = count($editEmp->emp_doc);
@endphp

$('#docTBody').append('<tr id="doc_row_'+j+'"><td><input id="doc_name" name="doc_name[]" class="form-control" type="text" placeholder="Enter doc title" value="{{$editEmp->emp_doc[$j]->doc_name}}" ></td><td><textarea id="doc_desc" name="doc_desc[]" class="form-control doc_desc" placeholder="Enter doc description" value="" rows="2" cols="2">{{$editEmp->emp_doc[$j]->doc_desc}}</textarea></td><td><input id="file_name" name="doc_file[]" class="form-control" type="file" placeholder="file" value="" > @if($editEmp->emp_doc[$j]->doc_file !=null)<a href="{{asset('storage/'.$editEmp->emp_doc[$j]->doc_file)}}" target="_blank">{{file_name($editEmp->emp_doc[$j]->doc_file)}}</a>@else <p>Not Uploaded</p> @endif</td><td><input type="hidden" name="emp_doc_id[]" value="{{$editEmp->emp_doc[$j]->emp_doc_id}}"><button type="button" name="add_more_std_doc" id="add_doc" class="btn btn-success btn-sm" id="'+j+'"><i class="fa fa-plus"></i></button></td></tr>');

@php
    $j++;
    while ($j < $count_docs) {
@endphp
     $('#docTBody').append('<tr id="doc_row_{{$j}}"><td><input id="doc_name" name="doc_name[]" class="form-control" type="text" placeholder="Enter doc title" value="{{$editEmp->emp_doc[$j]->doc_name}}" ></td><td><textarea id="doc_desc" name="doc_desc[]" class="form-control doc_desc" placeholder="Enter doc description" value="" rows="2" cols="2">{{$editEmp->emp_doc[$j]->doc_desc}}</textarea></td><td><input id="file_name" name="doc_file[]" class="form-control" type="file" placeholder="file" value="" >@if($editEmp->emp_doc[$j]->doc_file !=null)<a href="{{asset('storage/'.$editEmp->emp_doc[$j]->doc_file)}}" target="_blank">{{file_name($editEmp->emp_doc[$j]->doc_file)}}</a>@else <p>Not Uploaded</p> @endif</td><td><input type="hidden" name="emp_doc_id[]" value="{{$editEmp->emp_doc[$j]->emp_doc_id}}"><button type="button"  class="btn btn-danger btn-sm remove_doc" id="{{$j}}"><i class="fa fa-minus"></i></button></td></tr>');
@php
    $j++;
}
@endphp
j = "{{$j}}";


$(document).on('click', '#add_doc', function(){
  $('#docTBody').append('<tr id="doc_row_'+j+'"><td><input id="doc_name" name="doc_name[]" class="form-control" type="text" placeholder="Enter doc title" value="" ></td><td><textarea id="doc_desc" name="doc_desc[]" class="form-control doc_desc" placeholder="Enter doc description" value="" rows="2" cols="2"></textarea></td><td><input id="file_name" name="doc_file[]" class="form-control" type="file" placeholder="file" value="" ></td><td><input type="hidden" value="" name="emp_doc_id[]"><button type="button" class="btn btn-danger btn-sm remove_doc" id="'+j+'"><i class="fa fa-minus" ></i></button></td></tr>');
  j++
});
    $(document).on('click', '.remove_doc', function(){
       var row_id = $(this).attr("id");
       $('#doc_row_'+row_id).remove();
     });


</script>

 @endsection