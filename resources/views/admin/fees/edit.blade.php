

@extends('layouts.main')
@section('content')
<div id="content">
@include('admin.fees.header')
<div class="card shadow mb-4">
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Fees</h6>
  </div>
  <!-- Card Body -->
  {{-- <div class="card-body"> --}}
    <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-md-12 col-sm-6 col-xs-11 ">
      <div class="card shadow h-100 py-2">
        {{-- <div class="card-body "> --}}
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="row1">
              	<form action="{{route('fees.store')}}" id="fees-form1" method="post" >
            	{{-- @csrf
            	<input type="submit" name="submit" value="Su">
            </form> --}}
               <div class="col-lg-12">
                  <div class="widget-container fluid-height">
                     <div class="widget-content padded">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="widget-container">
                                 <div class="widget-content padded">
          {{--   <form action="{{route('fees.store')}}" id="fees-form1" method="post" > --}}
            	@csrf
               {{-- <input type="hidden" name="student_ids" id="student_ids"> --}}
               <fieldset>
              <div class="col-md-12">
                <div class="row">								
        				<div class="col-md-3">
        				  <label class="red"> *</label>
        		           <label for="name">
        		           Fees Name
        		           </label>
        		           <input class="form-control" id="name" name="name" type="text" value="{{$data->fees_name}}">
        		            <div class="has-error" id="errmsg" style="display: none;">
        		              <label class="control-label" for="inputError">Fees Name Already Exist !!!</label>
        		           </div>
        				</div>

        				<div class="col-md-3">
        					 <label class="red"> *</label>
		                <label for="amount">
		                Amount
		                </label>						  	
		                <div class="input-group">
		                   <span class="input-group-addon"><i class="fa fa-rupee"></i></span>
		                   <input class="form-control onlyDigit" id="amount" name="amount" type="text" readonly="" value="{{$data->fees_amt}}">
		                </div>
		             </div>
		             <div class="col-md-6">
		                <div class="">
		                   <label for="name">
		                   Header Name To Be Displayed On Reciept
		                   </label>
		                   <select class="form-control" name="tmpinst_name" id="tmpinst_name">
                          <option value="{{$data->header_name_to_be_display_reci}}">{{$data->header_name_to_be_display_reci}}</option>

		                   	@foreach($headerName as $headerNames)
		                      <option value="{{ $headerNames}}">{{ $headerNames}}</option>
		                    @endforeach
		                   </select>
		                </div>
				</div>
				
		        </div>
                                            
             <div class="row">
                <div class="col-md-12">
                   <label for="details">
                   Fees - Heads
                   </label>
                   <table id="course-datatable" class="table table-vcenter  table-bordered">
                      <thead>
                         <tr>
                            <th class="check-header hidden-xs">
                               <label>
                               	<input id="checkAll" name="checkAll" type="checkbox" checked="" disabled=""><span></span></label>
                            </th>
                            <th>Head Title</th>
                            <th> Installable </th>
                            <th>Amount</th>
                         </tr>
                      </thead>
                      <tbody>
                         <tr>

                         	@foreach($FeesHead as $feesHeadMasts)
                         	<tr>
                            <td class="check hidden-xs">
                               <label>
                               	<input name="fees_heads[]" type="checkbox" value="{{$feesHeadMasts->id}}" class="display_checkbox" onclick="findIfChecked()" checked="" disabled=""><span></span>	
                               	<input name="fees_amount[]" type="hidden" value="{{$feesHeadMasts->amount}}" class="fees_amount" onclick="findIfChecked()" ><span></span>
                               </label>
                            </td>
                         		<td>{{$feesHeadMasts->name}}</td>
                           		 <input type="hidden" name="{{$feesHeadMasts->name}}" id="{{$feesHeadMasts->name}}" value="{{$feesHeadMasts->amount}}" class="onlyDigit">
                            	<td><strong>{{$feesHeadMasts->instalment_applicable_status == 'on' ? 'Yes' : 'No'}}</strong></td>
                            	<td>
                            	<input type="text" name="headAmt_{{$feesHeadMasts->id}}" id="headAmt_{{$feesHeadMasts->id}}" value="{{$feesHeadMasts->amount}}" onchange="findIfChecked()" class="onlyDigit" readonly=""></td>
                         	</tr>
                         	@endforeach
                         </tr>
                         {{-- <tr>
                            <td class="check hidden-xs">
                               <label>
                               	<input name="fees_heads[]" type="checkbox" value="26197" class="display_checkbox" onclick="findIfChecked()"><span></span>
                               </label>
                            </td>
                            <td>Activity fee </td>
                            <input type="hidden" name="activity_fee" id="activity_fee" value="0" class="onlyDigit">
                            <td><strong>No</strong></td>
                            <td>
                            	<input type="text" name="headAmt_26197" id="headAmt_26197" value="0" onchange="findIfChecked()" class="onlyDigit"></td>
                         </tr>
                         <tr>
                            <td class="check hidden-xs">
                               <label>
                               	<input name="fees_heads[]" type="checkbox" value="26198" class="display_checkbox" onclick="findIfChecked()"><span></span>
                               </label>
                            </td>
                            <td>Tuition fee </td>
                            <input type="hidden" name="tuition_fee" id="tuition_fee" value="1" class="onlyDigit">
                            <td><strong>Yes</strong></td>
                            <td>
                            	<input type="text" name="headAmt_26198" id="headAmt_26198" value="0" onchange="findIfChecked()" class="onlyDigit"></td>
                         </tr>
                         <tr>
                            <td class="check hidden-xs">
                               <label>
                               	<input name="fees_heads[]" type="checkbox" value="26199" class="display_checkbox" onclick="findIfChecked()"><span></span>
                               </label>
                            </td>
                            <td>Science fee </td>
                            <input type="hidden" name="science_fee" id="science_fee" value="0" class="onlyDigit">
                            <td><strong>No</strong></td>
                            <td>
                            	<input type="text" name="headAmt_26199" id="headAmt_26199" value="0" onchange="findIfChecked()" class="onlyDigit"></td>
                         </tr>
                         <tr>
                            <td class="check hidden-xs">
                               <label>
                               	<input name="fees_heads[]" type="checkbox" value="33085" class="display_checkbox" onclick="findIfChecked()"><span></span>
                               </label>
                            </td>
                            <td>Tuition Fees </td>
                            <input type="hidden" name="tuition_fees" id="tuition_fees" value="1" class="onlyDigit">
                            <td><strong>Yes</strong></td>
                            <td>
                            	<input type="text" name="headAmt_33085" id="headAmt_33085" value="500" onchange="findIfChecked()" class="onlyDigit"></td>
                         </tr> --}}
                      </tbody>
                   </table>
                </div>
             </div>
          </div>
          <div class="col-md-12">
          	<div class="row">								
				<div class="col-md-3">
				<label class="red"> *</label>
                <label for="feesfor">Payment Mode</label>					
                <select class="form-control" name="paymentselection" id="paymentselection">
                   <option value="1">One Time</option>
                   <option value="2">2 Instalments</option>
                   <option value="3">3 Instalments</option>
                   <option value="4">4 Instalments</option>
                   <option value="5">5 Instalments</option>
                   <option value="6">6 Instalments</option>
                   <option value="7">7 Instalments</option>
                   <option value="8">8 Instalments</option>
                   <option value="9">9 Instalments</option>
                   <option value="10">10 Instalments</option>
                   <option value="11">11 Instalments</option>
                   <option value="12">12 Instalments</option>
                </select>
				</div>
				<div class="col-md-3">
					<label class="red">*</label>
	                <label for="Course Selection">
	                Course Selection
	                </label>
	                <select class="form-control" name="courseselection" id="courseselection">
	                   <option value="0">Select</option>
	                   {{-- @foreach($courseSelection as $key => $courseSelections)
		                   <option value="{{$key+1}}">{{$courseSelections}}</option>
	                   @endforeach --}}
	                </select>
				</div>
				<div class="col-md-3" id="insth1" style="display: none;">
               		<label class="red">* </label>
		            <label for="instalment">
		            instalment 1
		            </label>
		            <input class="form-control" id="instalment1" name="instalment1" type="text">
             	</div>
             	 <div class="col-md-3" id="sdate1" style="display: block;">
	                <label class="red">
	                *
	                </label>
	                <label for="sdate">
	                Start Date
	                </label>
	                <div class="input-icon datetime-pick date-only">
	                   <input onblur="checkdate()" class="form-control input-datepicker instalment-date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="startdate1" name="startdate1" placeholder="Start date" type="text" readonly="">
	                   <span class="add-on">
	                   <i class="icon-calendar"></i>
	                   </span>
	                </div>
	             </div>
	             <div class="col-md-3" id="dudate1" style="display: block;">
	                <label class="red">
	                *
	                </label>
	                <label for="dudate">
	                Due Date
	                </label>
	                <div class="input-icon datetime-pick date-only">
	                   <input onblur="checkdate()" class="form-control input-datepicker instalment-date datepicker" data-date-autoclose="true" id="duedate1" name="duedate1" data-date-format="dd-mm-yyyy" placeholder="Due date" type="text" readonly="">
	                   <span class="add-on">
	                   <i class="icon-calendar"></i>
	                   </span>
	                </div>
	               {{-- <br> --}}
	             </div>
	              
				</div>
				<div class="row">
					<div class="col-md-4" id="insth2" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="instalment">
                    instalment 2
                    </label>
                    <input class="form-control" id="instalment2" name="instalment2" type="text">
                 </div>
                 <div class="col-md-4" id="sdate2" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="sdate">
                    Start Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="startdate2" name="startdate2" placeholder="Start date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                 </div>
                 <div class="col-md-4" id="dudate2" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="dudate">
                    Due Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" id="duedate2" name="duedate2" data-date-format="dd-mm-yyyy" placeholder="Due date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
	            
                 </div>

                 <div class="col-md-4" id="insth3" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="instalment">
                    instalment 3
                    </label>
                    <input class="form-control" id="instalment3" name="instalment3" type="text">
                 </div>
                 <div class="col-md-4" id="sdate3" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="sdate">
                    Start Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="startdate3" name="startdate3" placeholder="Start date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                 </div>
                 <!--<div class="col-md-4 form-group" id="edate3">
                    <label class="red">
                    *
                    </label>
                    <label for="edate">
                    End Date
                    </label>
                    <div class="input-icon datetime-pick date-only" >
                    <input class="form-control input-datepicker" data-date-autoclose="true" id="enddate3" name="enddate3" data-date-format="dd-mm-yyyy"  placeholder="End date" type="text">
                    <span class="add-on">
                    <i class="icon-calendar"></i>
                    </span>
                    </div>
                    </div>-->	
                 <div class="col-md-4" id="dudate3" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="dudate">
                    Due Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" id="duedate3" name="duedate3" data-date-format="dd-mm-yyyy" placeholder="Due date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
	            
                 </div>

                 <div class="col-md-4" id="insth4" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="instalment">
                    instalment 4
                    </label>
                    <input class="form-control" id="instalment4" name="instalment4" type="text">
                 </div>
                 <div class="col-md-4" id="sdate4" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="sdate">
                    Start Date
                    </label>
                    <div class="input-icon datetime-pick date-only ">
                       <input class="form-control input-datepicker datepicker"  data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="startdate4" name="startdate4" placeholder="Start date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                 </div>
                 <!-- <div class="col-md-4 form-group" id="edate4">
                    <label class="red">
                    *
                    </label>
                    <label for="edate">
                    End Date
                    </label>
                    <div class="input-icon datetime-pick date-only" >
                    <input class="form-control input-datepicker" data-date-autoclose="true" id="enddate4" name="enddate4" data-date-format="dd-mm-yyyy"  placeholder="End date" type="text">
                    <span class="add-on">
                    <i class="icon-calendar"></i>
                    </span>
                    </div>
                    </div>-->	
                 <div class="col-md-4" id="dudate4" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="dudate">
                    Due Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" id="duedate4" name="duedate4" data-date-format="dd-mm-yyyy" placeholder="Due date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
	            
                 </div>

                  <div class="col-md-4" id="insth5" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="instalment">
                    instalment 5
                    </label>
                    <input class="form-control" id="instalment5" name="instalment5" type="text">
                 </div>
                 <div class="col-md-4" id="sdate5" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="sdate">
                    Start Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="startdate5" name="startdate5" placeholder="Start date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                 </div>
                 <!--<div class="col-md-4 form-group" id="edate5">
                    <label class="red">
                    *
                    </label>
                    <label for="edate">
                    End Date
                    </label>
                    <div class="input-icon datetime-pick date-only" >
                    <input class="form-control input-datepicker" data-date-autoclose="true" id="enddate5" name="enddate5" data-date-format="dd-mm-yyyy"  placeholder="End date" type="text">
                    <span class="add-on">
                    <i class="icon-calendar"></i>
                    </span>
                    </div>
                    </div>-->	
                 <div class="col-md-4" id="dudate5" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="dudate">
                    Due Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" id="duedate5" name="duedate5" data-date-format="dd-mm-yyyy" placeholder="Due date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
	             
                 </div>

                 <div class="col-md-4" id="insth6" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="instalment">
                    instalment 6
                    </label>
                    <input class="form-control" id="instalment6" name="instalment6" type="text">
                 </div>
                 <div class="col-md-4" id="sdate6" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="sdate">
                    Start Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="startdate6" name="startdate6" placeholder="Start date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                 </div>
                 <!-- <div class="col-md-4 form-group" id="edate6">
                    <label class="red">
                    *
                    </label>
                    <label for="edate">
                    End Date
                    </label>
                    <div class="input-icon datetime-pick date-only" >
                    <input class="form-control input-datepicker" data-date-autoclose="true" id="enddate6" name="enddate6" data-date-format="dd-mm-yyyy"  placeholder="End date" type="text">
                    <span class="add-on">
                    <i class="icon-calendar"></i>
                    </span>
                    </div>
                    </div>-->	
                 <div class="col-md-4" id="dudate6" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="dudate">
                    Due Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" id="duedate6" name="duedate6" data-date-format="dd-mm-yyyy" placeholder="Due date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                 </div>
                 
                 <div class="col-md-4" id="insth7" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="instalment">
                    instalment 7
                    </label>
                    <input class="form-control" id="instalment7" name="instalment7" type="text">
                 </div>
                 <div class="col-md-4" id="sdate7" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="sdate">
                    Start Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="startdate7" name="startdate7" placeholder="Start date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                 </div>
                 <!--<div class="col-md-4 form-group" id="edate7">
                    <label class="red">
                    *
                    </label>
                    <label for="edate">
                    End Date
                    </label>
                    <div class="input-icon datetime-pick date-only" >
                    <input class="form-control input-datepicker" data-date-autoclose="true" id="enddate7" name="enddate7" data-date-format="dd-mm-yyyy"  placeholder="End date" type="text">
                    <span class="add-on">
                    <i class="icon-calendar"></i>
                    </span>
                    </div>
                    </div>	-->
                 <div class="col-md-4" id="dudate7" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="dudate">
                    Due Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" id="duedate7" name="duedate7" data-date-format="dd-mm-yyyy" placeholder="Due date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                
                 </div>
                 <div class="col-md-4" id="insth8" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="instalment">
                    instalment 8
                    </label>
                    <input class="form-control" id="instalment8" name="instalment8" type="text">
                 </div>
                 <div class="col-md-4" id="sdate8" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="sdate">
                    Start Date
                    </label>
                    <div class="input-icon datetime-pick date-only ">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="startdate8" name="startdate8" placeholder="Start date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                 </div>
                 <!-- <div class="col-md-4 form-group" id="edate8">
                    <label class="red">
                    *
                    </label>
                    <label for="edate">
                    End Date
                    </label>
                    <div class="input-icon datetime-pick date-only" >
                    <input class="form-control input-datepicker" data-date-autoclose="true" id="enddate8" name="enddate8" data-date-format="dd-mm-yyyy"  placeholder="End date" type="text">
                    <span class="add-on">
                    <i class="icon-calendar"></i>
                    </span>
                    </div>
                    </div> -->	
                 <div class="col-md-4" id="dudate8" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="dudate">
                    Due Date
                    </label>
                    <div class="input-icon datetime-pick date-only " >
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" id="duedate8" name="duedate8" data-date-format="dd-mm-yyyy" placeholder="Due date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                 <br>
                 <br>
                 </div>
                  <div class="col-md-4" id="insth9" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="instalment">
                    instalment 9
                    </label>
                    <input class="form-control" id="instalment9" name="instalment9" type="text">
                 </div>
                 <div class="col-md-4" id="sdate9" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="sdate">
                    Start Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="startdate9" name="startdate9" placeholder="Start date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                 </div>
                 <!-- <div class="col-md-4 form-group" id="edate9">
                    <label class="red">
                    *
                    </label>
                    <label for="edate">
                    End Date
                    </label>
                    <div class="input-icon datetime-pick date-only" >
                    <input class="form-control input-datepicker" data-date-autoclose="true" id="enddate9" name="enddate9" data-date-format="dd-mm-yyyy"  placeholder="End date" type="text">
                    <span class="add-on">
                    <i class="icon-calendar"></i>
                    </span>
                    </div>
                    </div> -->	
                 <div class="col-md-4" id="dudate9" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="dudate">
                    Due Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" id="duedate9" name="duedate9" data-date-format="dd-mm-yyyy" placeholder="Due date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                 
                 </div>
                 <div class="col-md-4" id="insth10" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="instalment">
                    instalment 10
                    </label>
                    <input class="form-control" id="instalment10" name="instalment10" type="text">
                 </div>
                 <div class="col-md-4" id="sdate10" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="sdate">
                    Start Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="startdate10" name="startdate10" placeholder="Start date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                 </div>
                 <!-- <div class="col-md-4 form-group" id="edate10">
                    <label class="red">
                    *
                    </label>
                    <label for="edate">
                    End Date
                    </label>
                    <div class="input-icon datetime-pick date-only" >
                    <input class="form-control input-datepicker" data-date-autoclose="true" id="enddate10" name="enddate10" data-date-format="dd-mm-yyyy"  placeholder="End date" type="text">
                    <span class="add-on">
                    <i class="icon-calendar"></i>
                    </span>
                    </div>
                    </div> -->	
                 <div class="col-md-4" id="dudate10" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="dudate">
                    Due Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" id="duedate10" name="duedate10" data-date-format="dd-mm-yyyy" placeholder="Due date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                 
                 </div>
                 <div class="col-md-4" id="insth11" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="instalment">
                    instalment 11
                    </label>
                    <input class="form-control" id="instalment11" name="instalment11" type="text">
                 </div>
                 <div class="col-md-4" id="sdate11" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="sdate">
                    Start Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="startdate11" name="startdate11" placeholder="Start date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                 </div>
                 <!-- <div class="col-md-4 form-group" id="edate11">
                    <label class="red">
                    *
                    </label>
                    <label for="edate">
                    End Date
                    </label>
                    <div class="input-icon datetime-pick date-only" >
                    <input class="form-control input-datepicker" data-date-autoclose="true" id="enddate11" name="enddate11" data-date-format="dd-mm-yyyy"  placeholder="End date" type="text">
                    <span class="add-on">
                    <i class="icon-calendar"></i>
                    </span>
                    </div>
                    </div> -->	
                 <div class="col-md-4" id="dudate11" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="dudate">
                    Due Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" id="duedate11" name="duedate11" data-date-format="dd-mm-yyyy" placeholder="Due date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                 
                 </div>
                 <div class="col-md-4" id="insth12" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="instalment">
                    instalment 12
                    </label>
                    <input class="form-control" id="instalment12" name="instalment12" type="text">
                 </div>
                 <div class="col-md-4" id="sdate12" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="sdate">
                    Start Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="startdate12" name="startdate12" placeholder="Start date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                 </div>
                 <!--<div class="col-md-4 form-group" id="edate12">
                    <label class="red">
                    *
                    </label>
                    <label for="edate">
                    End Date
                    </label>
                    <div class="input-icon datetime-pick date-only" >
                    <input class="form-control input-datepicker" data-date-autoclose="true" id="enddate12" name="enddate12" data-date-format="dd-mm-yyyy"  placeholder="End date" type="text">
                    <span class="add-on">
                    <i class="icon-calendar"></i>
                    </span>
                    </div>
                    </div>-->	
                 <div class="col-md-4" id="dudate12" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="dudate">
                    Due Date
                    </label>
                    <div class="input-icon datetime-pick date-only">
                       <input class="form-control input-datepicker datepicker" data-date-autoclose="true" id="duedate12" name="duedate12" data-date-format="dd-mm-yyyy" placeholder="Due date" type="text" readonly="">
                       <span class="add-on">
                       <i class="icon-calendar"></i>
                       </span>
                    </div>
                 </div>
                 
				</div>
            
            
             <!--<div class="col-md-3 form-group" id="edate1">
                <label class="red">
                *
                </label>
                <label for="edate">
                End Date
                </label>
                <div class="input-icon datetime-pick date-only" >
                <input class="form-control input-datepicker" data-date-autoclose="true" id="enddate1" name="enddate1" data-date-format="dd-mm-yyyy"  placeholder="End date" type="text">
                <span class="add-on">
                <i class="icon-calendar"></i>
                </span>
                </div>
                </div>-->	
             
          </div>
           
            <div class="container">
            	  <div class="row">
                 <div class="col-md-4" id="course_div" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="course">
                    Class
                    </label>
                    <select class="form-control" name="course" id="course">
                       <option value="0">Select Class</option>
                       <option value="-1">All Classes</option>
                       {{-- @foreach($classes as $class)
                       	<option value="{{$class->id}}">{{$class->class_name}} </option>
                       @endforeach --}}
                    </select>
                 </div>
                 <div class="col-md-4" id="batch_div" style="display: none;">
                    <label class="red">
                    *
                    </label>
                    <label for="batch">
                    Batch
                    </label>
                    <select class="form-control" name="batch" id="batch">
                       <option value="0">Select Batch</option>
                       <option value="-1">All Batch</option>
                        {{-- @foreach($batches as $batch)
                       	<option value="{{$batch->id}}">{{$batch->batch_name}} </option>
                       @endforeach --}}
                    </select>
                 </div>
                 <div class="col-md-4" id="section_div" style="display: none;">
                    <label for="section">
                    Section
                    </label>
                    <select class="form-control" name="section" id="section">
                       <option value="0">Select Section</option>
                       <option value="-1">All Section</option>
                       {{-- @foreach($sections as $section)
                       	<option value="{{$section->id}}">{{$section->section_name}} </option>
                       @endforeach --}}
                    </select>
                 </div>
                 <div class="col-md-4" id="fees_for_div" style="display: none;">
                    <label for="feesfor">
                    Fees for
                    </label>
                    <select class="form-control" name="feesfor" id="feesfor">
                       <option value="0">Select</option>
                       <option value="1">All Student</option>
                       <option value="2">Some Selected</option>
                    </select>
                 </div>
              </div>
              <div class="row" id="row1" style="display: none;">
                 <div class="col-md-4">
                    <label for="subcat">
                    Gender
                    </label>
                    <select class="form-control" name="gender" id="gender">
                       <option value="0">All</option>
	                   {{-- @foreach($studentGender as $key => $studentGenders)
		                   <option value="{{$key}}">{{$studentGenders}}</option>
	                   @endforeach --}}
                    </select>
                 </div>
                 <div class="col-md-4">
                    <label for="subcat">
                    Category
                    </label>
                    <select class="form-control" name="caste" id="caste">
                       <option value="">Select Category </option>
                       <option value="0" selected="">All</option>
                      {{--  @foreach($castCategory as $key => $castCategories)
		                   <option value="{{$key+1}}">{{$castCategories}}</option>
	                   @endforeach --}}
                    </select>
                 </div>
                 <div class="col-md-4">
                    <label for="rte">
                    Include
                    </label>
                    <select class="form-control" name="rte" id="rte">
                       <option value="0">All</option>
                      {{--  @foreach($Include as $key => $Includes)
		                   <option value="{{$key+1}}">{{$Includes}}</option>
	                   @endforeach --}}
                    </select>
                 </div>
              </div>
              <div class="row" id="row2" style="margin-top: 30px; display: none;">
                 <div class="col-md-12">
                    <div class="widget-content padded" id="datadiv"></div>
                 </div>
              </div>
              <div class="row" id="row2" style="margin-top: 30px;">
                 <div class="col-md-12">
                    <div class="widget-content padded" id="datadiv2"></div>
                 </div>
              </div>
              <div class="row">
                 <div class="col-md-6" id="course_batches_div" style="display: none;">
                    <label for="details">
                    Class - Batch - Section
                    </label>
                    <select class="form-control" multiple="" id="course_batches" name="course_batches[]">
                       {{-- <option value="4179_8999_1703">Nursery----2019-20----EM</option> --}}
                       
                    </select>
                 </div>
               <div class="col-md-12" id="all_data" style="display: none;">
                      
                      {{-- Show student Data................. --}}
                </div>
              </div>
              <div class="row">
                 <div class="col-md-4">
                    <label for="amount">
                    Online Payment Discount (%)
                    </label>
                    <div class="input-group">
                       <span class="input-group-addon"><i class="fa fa-rupee"></i></span>
                       <input class="form-control" id="discount" name="discount" value="0" type="text">
                    </div>
                 </div>
                 <div class="col-md-3">
                    <label class="red">
                    </label>
                    <div class="input-group">
                       <label class="checkbox-inline">
                       <input type="checkbox" value="1" name="refundable" id="inlineCheckbox1"> 
                       Is Fees Refundable 
                       </label>
                    </div>
                 </div>
                 <div class="col-md-3">
                    <label class="red">
                    </label>
                    <div class="input-group">
                       <label class="checkbox-inline">
                       <input type="checkbox" value="1" name="is_fees_student_assign" id="is_fees_student_assign" checked=""> 
                       Is Fees Student Assign 
                       </label>
                    </div>
                 </div>
              </div>
              <div class="row">
                 <div class="">
                    <label class="red">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <div class="has-error col-md-12">
                       <label class="control-label text-danger" for="inputError" >
                       All Fields marked * are mandatory
                       </label>
                    </div>
                    <div class="pull-right" id="fees_submit1">
                      {{--  <input class="btn btn-primary" id="fees_button1" type="button" value="Submit"> --}}
                      <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </div>
            {{-- </form> --}}
                      {{--  <input class="btn btn-default-outline" onclick="javascript: window.location.replace('index.php?plugin=Fees&amp;action=listFees');" type="button" value="Cancel"> --}}
                    </div>
                 </div>
              </div>
           </fieldset>
        </form>
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
</div>
</div>
</div>   
		</div>
    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#paymentselection').on('change',function(){
			var paymentselection = $(this).val();
			// alert(paymentselection);
			var amount = $('#amount').val();
			if(paymentselection == 2 && amount > 0){
				$('#insth2').show();
				$('#sdate2').show();
				$('#dudate2').show();
				$('#insth1').show();
				var instalment1 = $('#amount').val();
				var instalment1Amt =  parseFloat(instalment1 /paymentselection);
				$('#instalment1').val(instalment1Amt)
				$('#instalment2').val(instalment1Amt)
				

			}else if(paymentselection == 3 && amount > 0){
				$('#insth3').show();
				$('#sdate3').show();
				$('#dudate3').show();
				$('#insth1').show();

				var instalment1 = $('#amount').val();
				var instalment1Amt =  parseFloat(instalment1 /paymentselection);
				$('#instalment1').val(instalment1Amt)
				$('#instalment3').val(instalment1Amt)
			}else if(paymentselection == 4 && amount > 0){
				$('#insth4').show();
				$('#sdate4').show();
				$('#dudate4').show();
				$('#insth1').show();

				var instalment1 = $('#amount').val();
				var instalment1Amt =  parseFloat(instalment1 /paymentselection);
				$('#instalment1').val(instalment1Amt)
				$('#instalment4').val(instalment1Amt)
			}else if(paymentselection == 5 && amount > 0){
				$('#insth5').show();
				$('#sdate5').show();
				$('#dudate5').show();
				$('#insth1').show();

				var instalment1 = $('#amount').val();
				var instalment1Amt =  parseFloat(instalment1 /paymentselection);
				$('#instalment1').val(instalment1Amt)
				$('#instalment5').val(instalment1Amt)
			}else if(paymentselection == 6 && amount > 0){
				$('#insth6').show();
				$('#sdate6').show();
				$('#dudate6').show();
				$('#insth1').show();

				var instalment1 = $('#amount').val();
				var instalment1Amt =  parseFloat(instalment1 /paymentselection);
				$('#instalment1').val(instalment1Amt)
				$('#instalment6').val(instalment1Amt)
			}else if(paymentselection == 7 && amount > 0){
				$('#insth7').show();
				$('#sdate7').show();
				$('#dudate7').show();
				$('#insth1').show();

				var instalment1 = $('#amount').val();
				var instalment1Amt =  parseFloat(instalment1 /paymentselection);
				$('#instalment1').val(instalment1Amt)
				$('#instalment7').val(instalment1Amt)
			}else if(paymentselection == 8 && amount > 0){
				$('#insth8').show();
				$('#sdate8').show();
				$('#dudate8').show();
				$('#insth1').show();

				var instalment1 = $('#amount').val();
				var instalment1Amt =  parseFloat(instalment1 /paymentselection);
				$('#instalment1').val(instalment1Amt)
				$('#instalment8').val(instalment1Amt)
			}else if(paymentselection == 9 && amount > 0){
				$('#insth9').show();
				$('#sdate9').show();
				$('#dudate9').show();
				$('#insth1').show();

				var instalment1 = $('#amount').val();
				var instalment1Amt =  parseFloat(instalment1 /paymentselection);
				$('#instalment1').val(instalment1Amt)
				$('#instalment9').val(instalment1Amt)
			}else if(paymentselection == 10 && amount > 0){
				$('#insth10').show();
				$('#sdate10').show();
				$('#dudate10').show();
				$('#insth1').show();

				var instalment1 = $('#amount').val();
				var instalment1Amt =  parseFloat(instalment1 /paymentselection);
				$('#instalment1').val(instalment1Amt)
				$('#instalment10').val(instalment1Amt)
			}else if(paymentselection == 11 && amount > 0){
				$('#insth11').show();
				$('#sdate11').show();
				$('#dudate11').show();
				$('#insth1').show();

				var instalment1 = $('#amount').val();
				var instalment1Amt =  parseFloat(instalment1 /paymentselection);
				$('#instalment1').val(instalment1Amt)
				$('#instalment11').val(instalment1Amt)
			}else if(paymentselection == 12 && amount > 0){
				$('#insth12').show();
				$('#sdate12').show();

				$('#dudate12').show();
				$('#insth1').show();
				
				var instalment1 = $('#amount').val();
				var instalment1Amt =  parseFloat(instalment1 /paymentselection);
				$('#instalment1').val(instalment1Amt)
				$('#instalment12').val(instalment1Amt)

			}else{
				alert('Please select Heads For Fees')

			}
			// 
		});




$('#courseselection').on('change', function(){
		var val=$(this).val();
		$('#row1').hide();
		$('#row2').hide();
		$('#course_div').hide();
		$('#batch_div').hide();
		$('#section_div').hide();
		$('#fees_for_div').hide();
		$('#course_batches_div').hide();
		$('#feesfor').val('0');
		$('#course').val('0');
		$('#batch').val('0');
		$('#fees_for_div').hide();
		if(val==1)
		{
			$.ajax({
			    type: "POST",
			    url: "{{route('get_course_batches')}}",
			    data: {
				 "_token": "{{ csrf_token() }}"
			    },
			    success: function(data){
			   	$('#course_batches_div').show();
				$('#row1').show();
				// $('#course_batches_div').empty();
                // $('#course_batches').append('<option>Select</option>');
                $.each(data,function(key,value){
            		$('#course_batches').append('<option value="'+value.student_class.id+'_'+value.student_batch.id+'_'+value.student_section.id+'">'+value.student_class.class_name+'--'+value.student_batch.batch_name+'--'+value.student_section.section_name+'</option>');
        		});

			    }
			})
			
		}
		else if(val==2)
		{
			$('#course_div').show();
			$('#batch_div').show();
			$('#section_div').show();
			$('#fees_for_div').show();
		}
		
	});
	$('#feesfor').on('change', function(){
		var val=$(this).val();
		if(val==0)
		{
		    $('#row1').hide();
		    $('#row2').hide();
		}
		else if(val==1)
		{
			$('#row2').hide();
			$('#all_data').hide();
			$('#row1').show();
			
		}
		else if(val==2)
		{
			$("#gender").val('0');
			$("#category").val('0');
			$("#rte").val(' ');
			$('#row1').hide();
			var course = $("#course").val();
			var batch = $("#batch").val();
			var section = $("#section").val();
			if (batch > 0) {
				$.ajax({
				    type: "POST",
				    url: "{{route('fees_student_list')}}",
				    data: {
					batch: batch,
					course: course,
					section: section,
					 "_token": "{{ csrf_token() }}"
				    },
				    success: function(data){
				   	// alert(data);
					// $("#datadiv").load("plugins/Fees/templates/feedStudentList.tpl");
					$('#all_data').html(data)
					$('#all_data').show(data)
					
					
				    }
				})
				$('#row2').show();
		       }
		       else
		       {
				$('#feesfor').val('0');
				alert('Please select course batch first');
		       }			
		}
	});

	 $('#course').on('change', function(){
		var course = $(this).val();
	   $("#gender").val('0');
	   $("#category").val('0');
	   $("#rte").val(' ');
	   $('#row1').hide();
	   $('#row2').hide();	
	   $("#datadiv2").hide();
        if (course > 0) {
                $.ajax({
                    type: "POST",
                    url: "{{'get_course_batches'}}",
                    data: {
                        courseId: course,
					 "_token": "{{ csrf_token() }}"
                    },
                    success: function(data){
		    			$('#batch option').remove();
                        var collaboration = '';
                        $.each($.parseJSON(data), function(item, val){
                            collaboration += "<option value=" + val.batch_id + ">" + val.batch_name + "</option>";
                        });
                        $("#batch").append("<option value='0'>Select Batch</option>");
                        $("#batch").append(collaboration);
                    }
                })
            }
          
           else if (course ==-1) {

                $.ajax({
                    type: "POST",
                    url: "index.php?plugin=Fees&action=feedStudentListAllCourses",
                    data: {
                        
                    },
                    success: function(data){
		    		
		    			$("#datadiv2").load("plugins/Fees/templates/feedStudentListAllCourses.tpl");
						$("#datadiv2").show();
		    			
                    }
                })
            }else {
				$('#feesfor').val('0');
                $('#batch option').remove();
                $("#batch").append("<option value='0'>Select Batch</option>");
            }
        });


	$('#batch').on('change', function(){
		 var batch = $(this).val();
	      $('#feesfor').val('0');
		if(batch==0)
		{
		  	
		   $("#gender").val('0');
		   $("#category").val('0');
		   $("#rte").val(' ');
		   $('#row1').hide();
		   $('#row2').hide();
		   $('#fees_for_div').hide();
		}
		/*else
		{
			var course = $("#course").val();
			var batch = $("#batch").val();
	
			$.ajax({
				type: "POST",
				url: "{{route('get_course_batches')}}",
				data: {
					course: course,
					batch: batch,
					 "_token": "{{ csrf_token() }}"
				   
				},
				success: function(data){
					//alert(data);
					$('#section option').remove();
					var collaboration = '';
					$.each($.parseJSON(data), function(item, val){
						collaboration += "<option value=" + val.section_id + ">" + val.section_name + "</option>";
					});
					$("#section").append("<option value='0'>Select Section</option>");
					$("#section").append(collaboration);
			   }
			})
			$('#fees_for_div').show();
		}*/

	 });


	 var error=0;
	 $('#name').on('change', function(){
		var name=$('#name').val();
		$.ajax({
			type: "POST",
			url: "index.php?plugin=Fees&action=checkIfFeesNameExist",
			data: { name: name, id : 0 },
			success: function(data){
				if(data>0){	
					//alert('fees name already exist');
					error=2;
					$('#errmsg').show();
					$('#errmsgnull').show();
				}else{
					error=0;
					$('#errmsg').hide();
					$('#errmsgnull').hide();
				}
				
			}
		});
	 });
	});
</script>
  <script type="text/javascript">
  	$(document).ready(function(){

       function checkdate() {
           var startdate1=$("#startdate1").val();
           var duedate1=$("#duedate1").val();
           if(startdate1==='30-11-0' || duedate1==='30-11-0') {
               alert("Please input valid date");
               $('#startdate1').val('');
               $('#duedate1').val('');
           }
       }
       $(function(){
	       $('#fees-form').validate({
	       rules: {
	       receipt_name: {
	       	required: true,
	       },
	       course: {
	       	selectcheck: true,
	       },
	       fee_cate_name: {
	       	selectcheck: true,
	       },
	       batch: {
	       	selectcheck: true,
	       },
	       sdate: {
	       	required: true,
	       },
	       edate: {
	       	required: true,
	       },
	       dudate: {
	       	required: true,
	       },
	       name: {
	       	required: true
	       },
	       amount:	{
	       	required: true
	       },
	       courseselection :
	       {
	       	selectcheck: true,
	       },
	       discount:	
	       {
	       	required: true
	       }
	       },
	       focusCleanup: true
	       });
       
       	jQuery.validator.addClassRules("instalment-date", {
           	required: true,
        });
       });
}); 


$(document).ready(function(){

$('#checkAll').click(function () {
		$(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
		findIfChecked();
	});

        $.validator.addMethod('selectcheck', function(value){
            return (value != '0');
        }, "This Field is required");

	$('#row1').hide();
	$('#row2').hide();
	$('#course_div').hide();
	$('#batch_div').hide();
	$('#section_div').hide();
	$('#fees_for_div').hide();
	$('#course_batches_div').hide();
	$('#errmsg').hide();
	$('#errmsgnull').hide();
	viewIstallments(0,0,0);
	$("#sdate1").show();
	$("#edate1").show();
	$("#dudate1").show();
	$('#courseselection').on('change', function(){
		var val=$(this).val();
		// alert(val);
		$('#row1').hide();
		$('#row2').hide();
		$('#course_div').hide();
		$('#batch_div').hide();
		$('#section_div').hide();
		$('#fees_for_div').hide();
		$('#course_batches_div').hide();
		$('#feesfor').val('0');
		$('#course').val('0');
		$('#batch').val('0');
		$('#fees_for_div').hide();
		if(val==1)
		{
			// $('#course_batches_div').show();
			$('#row1').show();
		}
		else if(val==2)
		{
			$('#course_div').show();
			$('#batch_div').show();
			$('#section_div').show();
			$('#fees_for_div').show();
		}
		
	});


	
	$('#paymentselection').on('change', function(){
		var val=$(this).val();
		var couserSelectionValue = $("#courseselection").val();
		alert(couserSelectionValue);
		var insth1 = $('#insth1').show();
		alert();
		if(couserSelectionValue == '0')
		{
			$('#course_batches_div').hide();
			$('#course_div').hide();
			$('#batch_div').hide();
			$('#section_div').hide();
			$('#fees_for_div').hide();
			$('#row1').hide();
			$('#row2').hide();
		}
		$('#feesfor').val('0');
		$('#course').val('0');
		$('#batch').val('0');
		var amount=$('#amount').val();
		var amount = 0;
		var remain_amount = 0;
		$('.display_checkbox').each(function()
		{
			if($(this).prop('checked')) 
			{
				alert(value);
				var value = $(this).val();
				
				var amtId = "#headAmt_"+value;
				var amt = $(amtId).val();
				var issuableid= "#headinstallable_"+value;
				var issuable = $(issuableid).val();
				if(issuable==1)
				{
					amount = parseFloat(amount)+parseFloat(amt);
				}
				else
				{
					remain_amount = parseFloat(remain_amount)+parseFloat(amt);
				}
			
			} 
		
		});
		if(amount>0 || remain_amount>0){
			callInstallmentDevide(val, amount,remain_amount);
		}else{
			alert("Select Heads For Fees");
			$(this).val(1);
			$("#amount").focus();
		}	
	});

	$('#feesfor').on('change', function(){
		var val=$(this).val();
		
		if(val==0)
		{
		    $('#row1').hide();
		    $('#row2').hide();
		}
		else if(val==1)
		{
			$('#row2').hide();
			$('#row1').show();
			
		}
		else if(val==2)
		{
			$("#gender").val('0');
			$("#category").val('0');
			$("#rte").val(' ');
			$('#row1').hide();
			var course = $("#course").val();
			var batch = $("#batch").val();
			var section = $("#section").val();
			alert(section);
			if (batch > 0) {
				$.ajax({
				    type: "POST",
				    url: "index.php?plugin=Fees&action=feedStudentList",
				    data: {
					batch: batch,
					course: course,
					section: section
				    },
				    success: function(data){
				   	//alert(data);
					$("#datadiv").load("plugins/Fees/templates/feedStudentList.tpl");
					$("#datadiv").show();
					
					
				    }
				})
				$('#row2').show();
		       }
		       else
		       {
				$('#feesfor').val('0');
				alert('Please select course batch first');
		       }			
		}
	});

	 $('#course').on('change', function(){
		var course = $(this).val();
	   $("#gender").val('0');
	   $("#category").val('0');
	   $("#rte").val(' ');
	   $('#row1').hide();
	   $('#row2').hide();	
	 $("#datadiv2").hide();
	    if (course > 0) {

	        $.ajax({
	            type: "POST",
	            url: "index.php?plugin=Finance&action=getCourseBatches",
	            data: {
	                courseId: course
	            },
	            success: function(data){
	    			$('#batch option').remove();
	                var collaboration = '';
	                $.each($.parseJSON(data), function(item, val){
	                    collaboration += "<option value=" + val.batch_id + ">" + val.batch_name + "</option>";
	                });
	                $("#batch").append("<option value='0'>Select Batch</option>");
	                $("#batch").append(collaboration);
	            }
	        })
	    }
          
           else if (course ==-1) {
                $.ajax({
                    type: "POST",
                    url: "index.php?plugin=Fees&action=feedStudentListAllCourses",
                    data: {
                        
                    },
                    success: function(data){
		    		
		    			$("#datadiv2").load("plugins/Fees/templates/feedStudentListAllCourses.tpl");
						$("#datadiv2").show();
		    			
                    }
                })
            }else {
		$('#feesfor').val('0');
		
                $('#batch option').remove();
                $("#batch").append("<option value='0'>Select Batch</option>");
                
                
            }
        });


	$('#batch').on('change', function(){
		 var batch = $(this).val();
	      $('#feesfor').val('0');
		if(batch==0)
		{
		  	
		   $("#gender").val('0');
		   $("#category").val('0');
		   $("#rte").val(' ');
		   $('#row1').hide();
		   $('#row2').hide();
		   $('#fees_for_div').hide();
		}
		else
		{
			var course = $("#course").val();
			var batch = $("#batch").val();
	
			$.ajax({
				type: "POST",
				url: "{{route('get_course_batches')}}",
				data: {
					course: course,
					batch: batch
				   
				},
				success: function(data){
					//alert(data);
					$('#section option').remove();
					var collaboration = '';
					$.each($.parseJSON(data), function(item, val){
						collaboration += "<option value=" + val.section_id + ">" + val.section_name + "</option>";
					});
					$("#section").append("<option value='0'>Select Section</option>");
					$("#section").append(collaboration);
			   }
			})
			$('#fees_for_div').show();
		}

	 });


	 var error=0;
	 $('#name').on('change', function(){
		var name=$('#name').val();
		$.ajax({
			type: "POST",
			url: "index.php?plugin=Fees&action=checkIfFeesNameExist",
			data: { name: name, id : 0 },
			success: function(data){
				
				
				if(data>0){				
					
					//alert('fees name already exist');
					error=2;
					$('#errmsg').show();
					$('#errmsgnull').show();
				}
				else
				{
					error=0;
					$('#errmsg').hide();
					$('#errmsgnull').hide();
				}
				
			}
		});
	 });

	function callInstallmentDevide(val, dividedValue,remaindividedValue){
		if(val==1){
			viewIstallments(1, dividedValue,remaindividedValue);
		}else
		if(val==2){
			dividedValue = dividedValue/2;
		}else
		if(val==3){
			dividedValue = dividedValue/3;
		}else
		if(val==4){
			dividedValue = dividedValue/4;
		}else
		if(val==5){
			dividedValue = dividedValue/5;
		}else
		if(val==6){
			dividedValue = dividedValue/6;
		}else
		if(val==7){
			dividedValue = dividedValue/7;
		}else
		if(val==8){
			dividedValue = dividedValue/8;
		}else
		if(val==9){
			dividedValue = dividedValue/9;
		}else
		if(val==10){
			dividedValue = dividedValue/10;
		}else
		if(val==11){
			dividedValue = dividedValue/11;
		}else
		if(val==12){
			dividedValue = dividedValue/12;
		}
		viewIstallments(val, dividedValue,remaindividedValue);
	}

	function viewIstallments(val, install,remaininstall){
		var val2 = 12-val;
		for(i=1; i<=val; i++){
			if(val>1){
				var insthId = "#insth"+i;
				$(insthId).show();
			}else{
				var insthId = "#insth"+i;
				$(insthId).hide();
			}

			var sdateId = "#sdate"+i;
			$(sdateId).show();
			$(sdateId).find("input[name=startdate"+i+"]").addClass("instalment-date");
			var edateId = "#edate"+i;
			$(edateId).show();
			var dudateId = "#dudate"+i;
			$(dudateId).show();
			$(dudateId).find("input[name=duedate"+i+"]").addClass("instalment-date");
			var instalmentId = "#instalment"+i;
			if(val>1){
				$(instalmentId).prop('readonly', true);
			}
			$(instalmentId).val(0);
			if(i>1)
			{
				$(instalmentId).val(install);
			}
			else
			{
					var total=parseFloat(install)+parseFloat(remaininstall);
					//alert("total:"+total);
					$(instalmentId).val(total);
			}
			
		}
		for(i=1; i<=val2; i++){
			var id2 = parseInt(i)+parseInt(val);
			var insthId = "#insth"+id2;
			$(insthId).hide();
			var sdateId = "#sdate"+id2;
			$(sdateId).hide();
			var edateId = "#edate"+id2;
			$(edateId).hide();
			var dudateId = "#dudate"+id2;
			$(dudateId).hide();
			var instalmentId = "#instalment"+id2;
			$(instalmentId).val(0);
			
		}
	}
	
	
	
	$("#fees-form").submit(function(){
		var val=$('#courseselection').val();
		var name=$('#name').val();
		var amt = $('#amount').val();
		if(val==1)
			{
				var course_batches = []; 
				$('#course_batches :selected').each(function(i, selected){ 
					course_batches[i] = $(selected).val(); 
				});
				if(course_batches.length==0)
				{
					alert('select a course batch ');
					error=1;
				}
						
			}
			if(amt>0){
				return true;
			}else{
				alert("Select Heads for Fees");
				return false;
			}
	
			if(error==0)
			{
				return true;
			}
			else
			{
				return false;
			}	
	
	});
	
      
        
        
        $('#fee_cate_name').on('change', function(){
            var fee_cate_name = $(this).val();
            if (fee_cate_name > 0) {}
            else {}
        });
        
        

	
	 $('#fee_cate_name').on('change', function(){
       
            var catId = $(this).val();
            if (catId > 0) {
                $.ajax({
                    type: "POST",
                    url: "index.php?plugin=Fees&action=getSubCategory",
                    data: {
                        cat_id: catId
                    },
                    success: function(data){
                    	//alert(data);
                        $('#subcat option').remove();
                        var collaboration = '';
                        $.each($.parseJSON(data), function(item, val){
                            collaboration += "<option value=" + val.sub_cat_id + ">" + val.subcategory_name + "</option>";
                        });
                        $("#subcat").append("<option value='0'>Select Sub Category</option>");
                        $("#subcat").append(collaboration);
                    }
                })
            }
            else {
                $('#subcat option').remove();
                $("#subcat").append("<option value='0'>Select Sub Category</option>");
            }
        });

	$("#fees_heads").on('click', function(){ 
	
	var feeAmt = 0;
	$("#fees_heads option:selected").each(function () {
		var $this = $(this);
		if ($this.length) {
			var selText = $this.text();
			var arr = selText.split('-');
			feeAmt += parseFloat(arr[1]);
			
		}
	 
	});
	$("#amount").val(feeAmt);
	});


	$("#fees_button").click(function(){    	 	
 		$("#fees_submit").hide();
 		$("#fees-form").submit();
 		$("#fees_button").submit();

    });


    });

   function findIfChecked(){
	var amount = 0;
	var remain_amount = 0;
	// alert('hii');
	$('.display_checkbox').each(function(){
		if($(this).prop('checked')) {
			var value = $(this).val();
			var amtId = "#headAmt_"+value;
			// alert(amtId);
			var amt = $(amtId).val();
			amount = parseFloat(amount)+parseFloat(amt);
			// alert(amt);
			
		} 
	});
	$("#amount").val(amount);
  } 
  /*function checkdate() {
        var startdate1=$("#startdate1").val();
        var duedate1=$("#duedate1").val();
        if(startdate1==='30-11-0' || duedate1==='30-11-0') {
            alert("Please input valid date");
            $('#startdate1').val('');
            $('#duedate1').val('');
        }
    }*/
	$(function(){
		$('#fees-form').validate({
			rules: {
				receipt_name: {
					required: true,
				},
				course: {
					selectcheck: true,
				},
				fee_cate_name: {
					selectcheck: true,
				},
				batch: {
					selectcheck: true,
				},
				sdate: {
					required: true,
				},
				edate: {
					required: true,
				},
				dudate: {
					required: true,
				},
				name: {
					required: true
				},
				amount:	{
					required: true
				},
				courseselection :
				{
					selectcheck: true,
				},
				discount:	
				{
					required: true
				}
			},
			focusCleanup: true
		});

   		jQuery.validator.addClassRules("instalment-date", {
	       	required: true,
	    });
	});

	/*$(document).ready(function()
	{
		 $("#wait").remove();
		$(document).ajaxStart(function()
		{
			$.overlay.show('ajax');

		});
   
		$(document).ajaxSuccess(function()
		{
			$.overlay.hide('ajax');
  
		});
	});*/
/* Code For Railway PNR Enquiry */
/*function loadPNRStatus(){
var searchN = $('#PNR_NUM').val();
	if(searchN !=''){
		$.ajax( {
				type: 'POST',
				url: 'index.php?plugin=Dashboard&action=getPNRStatus',
				data:{pnrQ: searchN },
				beforeSend: function() {
					$.blockUI({ css: {
								'border': 'none',
								'padding': '15px',
								'backgroundColor': '#000',
								'-webkit-border-radius': '10px',
								'-moz-border-radius': '10px',
								opacity: 0.5,
								color: '#fff'
							} });
				},
				success:function(htmlResp) {
					$('div.pnrStatusLoad').html(htmlResp);
					$("#pnrModal").modal("show");
					//$.unblockUI();
				}
		});
	}
}*/

/*$('#PNR_NUM').on('keypress', function (event) {
	if(event.which === 13){
	loadPNRStatus();
	}

	// return false if user enters other than numbers
	if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
		//display error message
		return false;
	}
});*/         
    </script>
    <style>
    	.red
    	{
    		color:red;
    	}
    </style>

    <script>
$(document).ready(function(){

	var myFuncCalls = 1;

	$('.edithead_name').on('click', function(){
		var id=$(this).data('id');
		
		var head_name = $("#head_name_pop").val($("#head_name_"+id).val());
		var head_name = $("#head_id_pop").val($("#head_id_"+id).val());
	
		});
		
	$('#add-row').on('click', function(){
	
		myFuncCalls++;
		var selectOption = "";
		
		selectOption += "<td><select class='form-control' name='fine_type[]' id='fine_type_"+ myFuncCalls +"'><option value=''>Select Fine Type</option><option value='Fixed'>Fixed</option><option value='Per Day'>Per Day</option></select></td><td><select class='form-control' name='fine[]' id='fine_"+ myFuncCalls +"'><option value=''>Select Fine</option><option value='Amount'>Amount</option><option value='Percentage'>Percentage</option></select></td><td><input type='text' name='fine_day[]' id='fine_day_"+ myFuncCalls +"' class='form-control' value='0'></td><td><input type='text' name='fine_amount[]' id='fine_amount_"+ myFuncCalls +"' class='form-control' value='0'></td>";
		
		document.getElementById("addNewRow").insertRow(-1).innerHTML = selectOption;
		
	});
	
	$('#remove').on("click", function(){
    $('#myTable tr:last').remove();
})

});
</script>
@endsection

