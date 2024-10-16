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
                    <h6 class="card-title">Show Personal Information</h6>
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
                                    <li class="nav-item"> 
                                      <a class="nav-link" href="#guardian_info" >Guardian Info</a>
                                    </li>
                                    <li class="nav-item"> 
                                      <a class="nav-link" href="#student_address" >Student Address</a>
                                    </li>
                                    <li class="nav-item"> 
                                      <a class="nav-link" href="#bank_details">Bank Details</a>
                                    </li>
                                    <li class="nav-item"> 
                                      <a class="nav-link" href="#student_document" >Student Document</a>
                                    </li>
                                </ul>
                            <div class="tab-content mt-4 p-2" style="font-size: 15px !important; background-color: whitesmoke !important;" >
                                <div class="tab-pane tab  active" id="basic_details" >
                                    <section>
                                        <h3 class="mb-3">Basic Details</h3>
                                        <hr>
                                        <div class="row form-group">
                                            <div class="col-md-2">
                                                <label class="">Student Photo</label>
                                                <img src="{{asset($student->photo !=null ? 'storage/'.$student->photo : 'img/student_demo.png')}}" style="width: 100px; height: 100px;">
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row form-group">
                                                    <div class="col-md-4 col-xs-6 col-sm-6 form-group">
                                                        <label for="std_class" class="required">Class</label>
                                                        <input type="text" readonly  name="" readonly="" value="{{$student->student_class->class_name}}" class="form-control">
                                                    </div>
                                                    <div class="col-md-4 col-xs-6 col-sm-6 form-group">
                                                        <label class="required"> Batch</label>
                                                        <input type="text" readonly  name="" readonly="" value="{{$student->student_batch->batch_name}}" class="form-control">
                                                    </div>
                                                    <div class="col-md-4 col-xs-6 col-sm-6 form-group">
                                                        <label class="required">Section</label>
                                                        <input type="text" readonly  name="" readonly="" value="{{$student->student_section->section_name}}" class="form-control">
                                                    </div>
                                                    <div class="col-md-4 col-xs-6 col-sm-6 form-group">
                                                        <label class="required">Select Medium</label>
                                                        <input type="text" readonly="" name="" value="{{$student->medium !=null ? Arr::get(MEDIUM,$student->medium) : ''}} " class="form-control">           
                                                    </div>

                                                    <div class="col-md-4 col-xs-6 col-sm-6 form-group">
                                                        <label class="required">Admision No</label>
                                                        <input type="text" readonly name="admision_no" class="form-control" value="{{$student->admision_no}}" >

                                                    </div>  
                                                    <div class="col-md-4 col-xs-6 col-sm-6 form-group">
                                                        <label class="required">Admission Date</label>
                                                        <input type="text" readonly name="addm_date" class="form-control  required addm_date"  data-date-format="yyyy-mm-dd"  value="{{$student->addm_date}}" >

                                                    </div>                                                  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">                                         
                                            <div class="col-md-4 col-sm-6 form-group col-xs-6">
                                                <label class="">Class Roll Number</label>
                                                <input type="text" readonly name="roll_no" value="{{$student->roll_no}}"class="form-control" >
                                            </div>   
                                      
                                            <div class="col-md-4 col-sm-6 form-group col-xs-6 has-success">
                                                <label class="required">Student Status</label>
                                                <input type="text" readonly name="roll_no" value="{{Arr::get(STUDENTSTATUS,$student->status)}}"class="form-control" >
                                            </div>

                                            <div class="col-md-4 col-sm-6 form-group col-xs-6">
                                                <label class="required">First Name</label>
                                                <input type="text" readonly name="f_name" id="f_name" value="{{$student->f_name}}" class="form-control" required="required">

                                            </div>                
                                            <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                <label>Middle Name</label>
                                                <input type="text" readonly name="m_name" id="m_name" value="{{$student->m_name}}" class="form-control">

                                            </div>                  
                                            <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                <label class="required">Last Name</label>
                                                <input type="text" readonly name="l_name" id="l_name" value="{{$student->l_name}}" class="form-control required" required="required">

                                            </div>

                                            <div class="col-md-3 col-sm-6 form-group col-xs-6 passout_date" style="display: none;">
                                                <label class="required">Passout Date</label>
                                                <input type="text"  name="passout_date" class="form-control" readonly="true" data-date-format="yyyy-mm-dd" value="{{date('d-m-Y',strtotime($student->passout_date))}}"  >
                                            </div>

                                            <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                <label class="required">Mobile Number</label>
                                                <input type="text" readonly name="s_mobile" class="form-control required"  value="{{$student->s_mobile}}" required="required"> 

                                            </div>
                                            <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                <label class="required">Date of Birth</label>
                                                <input type="text"  name="dob" class="form-control" data-date-format="yyyy-mm-dd" value="{{date('d-m-Y', strtotime($student->dob))}}" readonly>

                                            </div>
                                            <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                <label class="">Birth Place</label>
                                                <input type="text" readonly name="birth_place" class="form-control birth_place required" placeholder="" id="birth_place" value="{{$student->birth_place}}">

                                            </div>
                                            <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                <label>Email Address</label>
                                                <input type="text" readonly name="email" class="form-control required" value="{{$student->email}}">
                                            </div>
                                        </div>  
                                        <div class="row form-group">
                                            <div class="col-md-4 col-sm-6 form-group col-xs-6">
                                            <label class="required">Gender</label>
                                            <input type="text" readonly="" name="" value="{{Arr::get(GENDER,$student->gender)}}" class="form-control">
                                            </div>
                                            <div class="col-md-4 col-sm-6 form-group col-xs-6">
                                            <label class="required">Cast Category</label>
                                            <input type="" name="" value="{{Arr::get(CASTCATEGORY,$student->reservation_class_id)}}" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-4 col-sm-6 form-group col-xs-6">
                                            <label>Religion</label>
                                            <input type="text" readonly="" name="" value="{{$student->religion_id !=null ? Arr::get(RELIGION,$student->religion_id) : ''}} " class="form-control">
                                            </div>
                                        </div>  
                                        <div class="row form-group">
                                            <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                            <label>Blood Group</label>
                                            <input type="" name="" value="{{$student->blood_id !=null ? Arr::get(BLOODGROUP,$student->blood_id) : ''}}" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                            <label>Specific Ailment</label>
                                            <input type="text" readonly name="spec_ailment" class="form-control" placeholder="Mole on nose. etc" value="{{$student->spec_ailment}}">

                                            </div>
                                            <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                            <label>Age</label>
                                            <input type="text" readonly  value="{{$student->age}}" name="age" class="form-control age">

                                            </div>
                                            <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                            <label>Nationality</label>
                                            <input type="text" readonly  name="" readonly="" value="{{$student->stdNationality !=null ? $student->stdNationality->nationality_name : ''}}" class="form-control">

                                            </div>
                                        </div>
                                        <div class="row form-group" >
                                            <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                            <label>Taluka(Tehsil)</label>
                                            <input type="text" readonly name="taluka" value="{{$student->taluka}}" class="form-control">

                                            </div>
                                            <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                            <label>Mother tongue</label>

                                            <input type="" name="" class="form-control" value="{{$student->mothetongueMast !=null ? $student->mothetongueMast->mothetongue_name : ''}}" readonly>

                                            </div>
                                            <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                            <label>Student SSMID</label>
                                            <input type="text" name="s_ssmid" class="form-control"  value="{{$student->s_ssmid}}" readonly>
                                            </div>
                                            <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                            <label>Family SSMID</label>
                                            <input type="text" name="f_ssmid" class="form-control" value="{{$student->f_ssmid}}" readonly="">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                            <label>Aadhar Card Number</label>
                                            <input type="text" name="aadhar_card" class="form-control" value="{{$student->aadhar_card}}" readonly="">
                                            </div>

                                            <div class="col-md-3 col-xs-6 col-sm-6 form-group ">
                                            <label>Family Income</label>
                                            <input type="text" name="family_income" class="form-control" id="family_income" value="{{$student->family_income}}" readonly="readonly">
                                            </div>

                                            <div class="col-md-6 col-sm-6 form-group col-xs-6">
                                            <label>Siblings </label>
                                            <textarea name="siblings" class="form-control" id="siblings" readonly="readonly">{{$sibling_name}}</textarea>

                                            </div>
                                        </div>               
                                        <div class="row form-group">
                                            <div class="col-md-3">
                                            <label for="rte" class="required"> Teacher Ward </label>
                                            <input type="" name="" class="form-control" value="{{$student->teacher_ward == '1' ? 'Yes' :'No'}}" readonly="">
                                            </div>
                                            <div class="col-md-3">
                                            <label for="rte"> CBSE  Registration no </label>
                                            <input class="form-control" id="CBSC_reg" name="cbsc_reg" type="text" value="{{$student->cbsc_reg}}" readonly="">
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
                            <div class="form-group row relation">
                              <div class="col-sm-4 col-md-4 col-xs-6 ">
                                <label >Previous School (last studied)</label>
                                <input type="text" name="prev_school" class="form-control " id="prev_school" value="{{$student->prev_school}}" readonly>
                              </div>
                              <div class="col-md-4 col-sm-6 form-group col-xs-6 ">
                                <label class=""> Year (left from Previous School)</label>
                               <input type="text" name="year_of_prev_school" class="form-control " id="year_of_prev_school" value="{{$student->year_of_prev_school}}" readonly>
                              </div>
                              <div class="col-md-4 col-sm-6 form-group col-xs-6 ">
                                <label class="">Address 
                                </label>
                                <textarea class="form-control" name="prev_school_address" id="acadmic_address" readonly> {{$student->prev_school_address}}
                          </textarea>
                              </div>                                  
                            </div>
                            <div class="row form-group">
                              <div class="col-md-4 col-xs-6 col-sm-6 form-group ">
                                <label class="">City</label>
                               <input type="" name="" class="form-control" value="{{$student->acadmic_city}}" readonly="">

                              </div>
                              <div class="col-md-4 col-xs-6 col-sm-6 form-group ">
                                <label class="">State</label>
                                <input type="" name="" class="form-control" value="{{$student->acadmic_state}}" readonly="">
                                
                              </div>
                              <div class="col-md-4 col-xs-6 col-sm-6 form-group ">
                                <label class="">Pin Code</label>
                                <input type="text" name="acadmic_pin" class="form-control" id="acadmic_pin" value="{{$student->acadmic_pin}}" readonly>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-4 col-xs-6 col-sm-6 form-group ">
                                <label>Country</label>
                                <input type="" name="" class="form-control" value="{{$student->acadmic_country}}" readonly>
                            </div>
                              <div class="col-md-4 col-xs-6 col-sm-6 form-group "><label>Cast</label>
                                <input type="text" name="acadmic_cast" class="form-control" id="acadmic_cast" value="{{$student->acadmic_cast}}" readonly>
                              </div>
                              <div class="col-md-4 col-xs-6 col-sm-6 form-group ">
                                <label> Attendance Reg. No (In device) </label>
                                <input type="text" name="acadmic_attendance_reg_no" class="form-control" id="acadmic_attendance_reg_no" value="{{$student->acadmic_attendance_reg_no}}" readonly>
                              </div>
                              <div class="col-md-4 col-sm-6 form-group col-xs-6 ">
                                <label class="">Remark </label>
                                 <textarea class="form-control" name="acadmic_remark" id="acadmic_remark" readonly>{{$student->acadmic_remark}}</textarea>
                              </div>
                                <hr>
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
                     <div class="tab-pane tab" id="guardian_info">
                        <h3 class="mb-3">Guardian Info</h3>
                        <hr>
                        <section>
                          {{-- @if($student->studentsGuardiantMast !=null) --}}
                          @foreach($student->studentsGuardiantMast as $guard_info)
                              <div class="row" style="margin-top: 10px;">
                                <div class="col-md-2">
                                 {{--  <label>{{Arr::get(GUARDIAN_RELATION,$guard_info->relation_id)}} Photo</label>
                                  <img src="{{asset($guard_info->photo !=null ? $guard_info->photo : 'img/student_demo.png')}}" style="width: 100px; height: 100px;"> --}}
                                </div>
                                <div class="col-md-10">
                                  <div class="row form-group">
                                    <div class="col-md-3">
                                      <label>Relation Name</label>
                                      {{-- <input readonly="" class="form-control" value="{{Arr::get(GUARDIAN_RELATION,$guard_info->relation_id)}}"> --}}
                                    </div>
                                    <div class="col-md-3">
                                      <label>Name</label>
                                      <input readonly=""  class="form-control" value="{{$guard_info->g_mobile}}">
                                    </div>
                                    <div class="col-md-3">
                                      <label>Mobile</label>
                                      <input readonly="" class="form-control" value="{{$guard_info->g_mobile}}">
                                    </div>
                                    <div class="col-md-3">
                                      <label>Work Status</label>
                                      <input readonly="" class="form-control" value="{{$guard_info->work_status !=null ? Arr::get(WORK_STATUS,$guard_info->work_status) : ''}}">
                                    </div>
                                  </div>

                                  <div class="row form-group">
                                    <div class="col-md-3">
                                      <label>Employment Type</label>
                                      <input value="{{$guard_info->employment_type !=null ? (Arr::get(EMPLOYMENT_TYPE,$guard_info->employment_type)) : ''}}" readonly="" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                      <label>Profession Type</label>
                                      <input readonly="" value="{{$guard_info->profession_type !=null ?  $guard_info->profession_type->name :''}}" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                      <label>Employer</label>
                                      <input readonly="" value="" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                      <label>Designation</label>
                                      <input readonly="" value="{{$guard_info->guardian_designation !=null ?  $guard_info->guardian_designation->name :''}}" class="form-control">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <hr>
                          @endforeach
                              {{-- @endif --}}
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
                      <div class="tab-pane tab" id="student_address">
                          <h3 class="mb-3">Student Address</h3>
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
                                     <input type="text" class="form-control" name="p_address" id="p_address" value="{{$student->p_address}}">
                                   
                                  </div>
                                  <div class="col-md-4 ">
                                    <label class="required">City Name</label>
                                    <input type="text" readonly class="form-control" id="p_city" name="p_city" value="{{$student->p_city}}">
                                 
                                  </div>
                                  
                                  <div class="col-md-4 ">
                                    <label class="required">State Name</label>
                                    <input type="text" readonly class="form-control" name="p_state" id="p_state" value="{{$student->p_state}}" >
                                   
                                  </div>
                              </div>
                              <div class="row">   
                                <div class="col-md-4 ">
                                  <label class="required">Zip Code</label>
                                  <input type="text" readonly name="p_zip_code" class="form-control" id="p_zip_code" value="{{$student->p_zip_code}}" >
                                 
                                </div>
                                <div class="col-md-4 ">
                                  <label class="required">Country Name</label>
                                  <input type="text" readonly class="form-control" name="p_country" id="p_country" value="{{$student->p_country}}">
                                 
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header">
                              <h5 class="card-title">Local Address:</h5>                    
                            </div>
                            <div class="card-body">
                             {{--  <div class="row form-group">
                                <div class="col-md-12 ">
                                  <label><input type="checkbox" name="same_as" id="p_l_same" {{old('same_as') == '1' ? 'checked' : ''}} />
                                  </label>
                                  <label>Same as Permanent Address</label><span class="text- readonlymuted">(Click to copy permanent address data)</span>
                                </div>
                              </div> --}}
                              <div class="row form-group">
                                <div class="col-md-4 ">
                                  <label class="required">Address Line</label>
                                  <input type="text" readonly class="form-control loc_addr" name="l_address" id="l_address" value="{{$student->l_address}}" >
                                  
                                </div>                        
                                <div class="col-md-4 ">
                                  <label class="required">City Name</label>
                                  <input type="text" readonly class="form-control loc_addr" name="l_city" id="l_city" value="{{$student->l_city}}">
                                  
                                </div>        
                                <div class="col-md-4 ">
                                  <label class="required">State Name</label>
                                  <input type="text" readonly class="form-control loc_addr" name="l_state" id="l_state"  value="{{$student->l_state}}">
                                 
                                </div>

                              </div>
                              <div class="row">
                                <div class="col-md-4 ">
                                  <label class="required">Zip Code</label>
                                  <input type="text" readonly name="l_zip_code" class="form-control loc_addr" id="l_zip_code" value="{{$student->l_zip_code}}">
                                 
                                </div>
                                <div class="col-md-4 ">
                                  <label class="required">Country Name</label>
                                  <input type="text" readonly class="form-control loc_addr" name="l_country" id="l_country" value="{{$student->l_country}}">
                                 
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
                                <input type="text" readonly name="bank_name" class="form-control" value="{{$student->bank_name}}"> 
                               
                              </div>
                              <div class="col-md-6 col-sm-6 form-group col-xs-6">
                                <label>Branch</label>
                                <input type="text" readonly name="bank_branch" class="form-control" value="{{$student->bank_branch}}">
                                
                              </div>

                            </div>
                            <div class="row form-group">
                              <div class="col-md-4 col-sm-6 form-group col-xs-6">
                                <label>Account Name</label>
                                <input type="text" readonly name="account_name" class="form-control" value="{{$student->account_name}}">
                              
                              </div>
                              <div class="col-md-4 col-sm-6 form-group col-xs-6">
                                <label>Account Number</label>
                                <input type="text" readonly name="account_no" class="form-control" value="{{$student->account_no}}">
                               
                              </div>
                              <div class="col-md-4 col-sm-6 form-group col-xs-6">
                                <label>IFSC CODE</label>
                                <input type="text" readonly name="ifsc_code" class="form-control" id="ifsc_code" value="{{$student->ifsc_code}}">
                               
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
                    <div class="tab-pane tab" id="student_document">
                      <h3 class="mb-3">Student Documents</h3>
                      <hr/>
                      <section>
                        <div class="row">
                          <div class="col-md-12">                       
                            <input type="hidden" name="studentid" id="studentid" value="">    
                            <table class="table table-bordered" style="" id="student_doc"m>
                              <thead>
                                <tr style="background-color: #e3f2fd;">
                                  <th>Document Title  </th>
                                  <th>Document Description </th>
                                  <th>File </th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                @foreach($student->student_doc as $docs)
                                <tr>
                                  <td>
                                    <input value="{{$docs->doc_title}}" readonly class="form-control">
                                  </td>
                                  <td>
                                    <input value="{{$docs->doc_description}}" readonly class="form-control">
                                  </td>
                                  
                                  <td>
                                    @if($docs->student_doc !=null)
                                      <a href="{{asset($docs->student_doc !=null ? 'storage/'.$docs->student_doc : 'images/student_demo.png')}}" target="_blank">{{file_name($docs->student_doc)}}</a>
                                    @else 
                                      Not Uploaded
                                    @endif  
                              
                                  </td>
                                </tr>
                                @endforeach
                             
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
                          {{-- <input type="submit" name="submit" value="Submit"  class="btn bg-success text-white"> --}}
                        </li>
                      </ul>               
                    </div>
                        </div>
                     
              </div>
            </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</div>

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


  var status = "{{$student->status}}";
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

});


</script>

 @endsection
