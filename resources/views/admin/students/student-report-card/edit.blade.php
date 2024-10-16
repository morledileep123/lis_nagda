@extends('layouts.main')
@section('content')
<div class="container">
  <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
    <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Edit Report Card<h4 class="panel-title"> {{--  <a href="{{route('time-table.create')}}" class="btn btn-success pull-right btn-sm border-radius">AddReport Card</a> --}}<a href="{{ URL::previous('student-report-card.index') }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a></h4></h6>
    </div>
    @if($message = Session::get('success'))   
          <div class="alert alert-success">{{ $message }}</div>
    @endif
    <div class="all_content" style="border: solid;">
       @if($reportCardHeaders->header_name != 'Nursery(A)_to_KG-II(A)') 
        <div class="school_name" align="center" style="font-weight: bold;">
          <div class="row"> 
            <div class="col-md-12">
                <div class="col-md-10 " > 
                   <div class="school-title" >
                     <h2 style=" margin-right: : 55px; font-weight: bold;"><u>{{$settings->title}}</u></h2><br>
                   </div>
                   <div class="logos" style="float: right;" >
                    <img src="{{asset($settings->logo !=null ? 'storage/'.$settings->logo : 'storage/admin/student_demo.png')}}" style="width: 70px; height: 70px; " >
                  </div>
                  <div class="logos1" style="float: left;" >
                     <img src="{{asset('/cbse-logo.jpeg' !=null ? '/cbse-logo.jpeg' : 'storage/admin/student_demo.png')}}" style="width: 70px; height: 70px;" >
                  </div>  
                </div>
                <div class="cbse-content">
                  <div class="col-md-6">
                    <span style="font-size: 20px;"><strong>( CBSE AFF. No.{{$settings->cbse_aff_no }} )</strong></span> 
                  </div>
                  <div class="col-md-6">
                    <span style="font-size: 20px;"><strong>Academic Session : 2020-2021 </strong></span> 
                  </div>
                   <div class="col-md-6">
                    <h2><strong>Report Card </strong>  </h2> 
                  </div>
                  
                </div>
            </div>
          </div>
        </div>
        @endif

        <div class="row " > 
          <div class="col-md-12">
              <div class="reoprt_card" align="center">
                  <div class="report_cart_table" style="font-weight: bold;">
                    Roll No. – {{$students->roll_no}} <br>
                    Student’s Name-  {{$students->f_name}} <br>
                    {{isset($students) ? student_first_guardian($students)['relation'] : ''}} {{isset($students) ? student_first_guardian($students)['name'] : ''}} <br>

                    {{isset($students) ? student_first_guardian($students)['relation1'] : ''}} {{isset($students) ? student_first_guardian($students)['name1'] : ''}}<br>
                    {{-- Father’s Name: {{$students->students_guardiant_masts[0]}}<br>
                    Mother’s Name:  {{$students->students_guardiant_masts[1]}}<br> --}}
                    Date of Birth: {{$students->dob}} <br>
                    Class/ Section: {{$students->student_class->class_name}} ({{$students->student_section->section_name}})<br>
                    @if($reportCardHeaders->header_name == '9th_to_9th')
           
                      <span class="rgs_no" align="center"> Registration No-</span>
                      
                    @endif
                </div>
              </div>
            </div>
          </div>
 <!-- Card Body -->
        <div class="card-body" style="overflow-x:auto;">
        <form action="{{route('student-report-card.update',$reportCardHeaders->id)}}" method="post" id="form_submit" autocomplete="off">
          @csrf
          @method('patch')              
              @if($reportCardHeaders->header_name == '6th(A)_to_8th(A)' OR $reportCardHeaders->header_name == '1st(A)_to_5th(A)')

                <div class="row">
                  <div class="col-md-12">
                     <div class="std_table1 mt-2">
                        <table border="1" width="100%;" style="table-layout: fixed; width: 1060px;">
                          <tr>
                              <th >Scholastic Areas:</th>
                              <th colspan="6">Term-I (100 Marks)</th>
                              <th  colspan="6">Term-2 (100 Marks)</th>
                          </tr>
                          <tr>
                              <th>Subject Name</th>
                              {{-- {{$reportCardHeaders->report_card_headre}} --}}
                                @foreach($reportCardHeaders->report_card_headre as $reportCardHeader)
                                  <td >{{$reportCardHeader->header_title}}</td>
                                @endforeach 
                                <?php $count = count($reportCardHeaders->report_card_headre);
                           ?>  
                            @foreach($getClasses->assignsubject as $getClass)
                              @foreach($getClass->assign_subjectId as $getClassesss)
                                <tr>
                                  <td>{{$getClassesss->subject->subject_name}}</td>
                                    {{-- @for($i=1; $i <= $count ; $i++) --}}
                                     @foreach($reportCardMasts->report_card as $report_cards)
                                     @if($getClassesss->subject->id == $report_cards->subject_id)
                                      <td><input type="text"  name="marks_grade[]" placeholder="Mask/Grd" maxlength="4" size="4" value="{{$report_cards->marks_grade}}" >  
                                      <input type="hidden" name="subject_id[]"  value="{{$getClassesss->subject->id}}"></td>
                                      <input type="hidden" name="report_cards_title_id[]"  value="{{$report_cards->id}}"></td>
                                      @endif
                                     @endforeach
                                    {{-- @endfor --}}
                                </tr>
                              @endforeach
                            @endforeach
                          </tr>
                        </table>
                      </div><br>
                      <div class="std_table2">
                        <table border="1">
                          <tr>
                            <th colspan="12">Co-Scholastic Areas: Term-I [ on  a 3 – point (A-C) grading scale]</th>
                            <th colspan="12">Co-Scholastic Areas: Term-I [ on  a 3 – point (A-C) grading scale]</th>
                          </tr>
                          <tr>
                            <th colspan="6"> </th>
                            <th colspan="6">Grade </th>
                            <th colspan="6"> </th>
                            <th colspan="6">Grade </th>
                          </tr>
                          <tr>
                            <th colspan="6">Work Education ( or Pre-vocational Education) </th>
                            <th colspan="6"><input type="text"  name="work_education" value="{{$reportCardMasts->work_education}}"> </th>
                            <th colspan="6">Work Education ( or Pre-vocational Education) </th>
                            <th colspan="6"><input type="text"  name="work_education2" value="{{$reportCardMasts->work_education2}}"> </th>
                          </tr>
                          <tr>
                            <th colspan="6">Art Education </th>
                            <th colspan="6"><input type="text"  name="art_education"  value="{{$reportCardMasts->art_education}}"> </th>

                            <th colspan="6">Art Education </th>
                            <th colspan="6"><input type="text"  name="art_education2" value="{{$reportCardMasts->art_education2}}"> </th>
                          </tr>
                          <tr>
                            <th colspan="6">Health and Physical Education </th>
                            <th colspan="6"><input type="text"  name="health_phsl" value="{{$reportCardMasts->health_phsl}}"></th>

                            <th colspan="6">Health and Physical Education </th>
                            <th colspan="6"><input type="text"  name="health_phsl2" value="{{$reportCardMasts->health_phsl2}}"></th>
                          </tr>
                        </table><br>
                        <table border="1">
                          <tr class="height">
                            <th colspan="3">  Attendance :- </th>
                            <th colspan="2">  <input type="text"  name="attendance" value="{{$reportCardMasts->attendance}}" maxlength="2" size="2"> </th>
                            <th colspan="2">Total Working Days - </th>
                            <th colspan="2">  <input type="text"  name="total_working_day" maxlength="2" size="2" value="{{$reportCardMasts->total_working_day}}"> </th>
                            <th colspan="2">Total Present Days -  </th>
                            <th colspan="2">  <input type="text"  name="total_presentd_days" maxlength="2" size="2" value="{{$reportCardMasts->total_presentd_days}}"> </th>
                            <th colspan="2">  Attendance :- </th>
                            <th colspan="2">  <input type="text"  name="attendance2" maxlength="2" size="2" value="{{$reportCardMasts->attendance2}}" > </th>
                            <th colspan="2">Total Working Days - </th>
                            <th colspan="2">  <input type="text"  name="total_working_day2" maxlength="2" size="2" value="{{$reportCardMasts->total_working_day2}}"> </th>
                            <th colspan="2">Total Present Days -  </th>
                            <th colspan="2">  <input type="text"  name="total_presentd_ays2" maxlength="2" size="2" value="{{$reportCardMasts->total_presentd_ays2}}"> </th>
                          </tr>
                          <tr>
                            <th colspan="8" align="right"> </th>
                            <th colspan="4"  align="right">Grade </th> 
                            <th colspan="8" align="right"> </th>
                            <th colspan="4"  align="right">Grade </th>
                          </tr>
                          <tr>
                            <th colspan="8">Discipline: Term –I ( on a 3 – point (A-C) grading scale </th>
                            <th colspan="4"><input type="text"  name="grading_scale" maxlength="6" size="6" value="{{$reportCardMasts->grading_scale}}"> </th>
                            <th colspan="8">Discipline: Term –I ( on a 3 – point (A-C) grading scale</th>
                            <th colspan="4"> <input type="text"  name="grading_scale2" maxlength="6" size="6" value="{{$reportCardMasts->grading_scale2}}"></th>
                          </tr>
                        </table>
                        <br>
                          <div class="row">
                            <div class="col-md-4">
                              <label>Remark</label>
                              <input type="text"  name="remark" value="{{$reportCardMasts->remark}}" class="form-control" >
                            </div>
                            <div class="col-md-4">
                              <label>Promoted to class</label>
                              <input type="text"  name="prd_to_class" value="{{$reportCardMasts->prd_to_class}}" class="form-control">
                            </div>
                            <div class="col-md-4">
                              <label>Place</label>
                              <input type="text"  name="Place" value="{{$reportCardMasts->Place}}" class="form-control">
                            </div>
                            <div class="col-md-4">
                              <label>Date</label>
                              <input type="text"  name="date" value="{{$reportCardMasts->date}}" class="form-control datepicker">
                            </div>
                          </div>
                         
                      </div>
                    </div>
                </div>
               @elseif($reportCardHeaders->header_name == '9th(A)_to_10th(A)')
                <div class="row">
                  <div class="col-md-12">
                    <div class="std_table">
                      <table border="1" width="100%;">
                        <tr>
                          <th >Scholastic Areas:</th>
                          <th colspan="7" style="text-align: center;">Academic Year (100 Marks)</th>
                          {{-- <th  colspan="6">Term-2 (100 Marks)</th> --}}
                        </tr>
                        <tr>
                          <th>Subject Name</th>
                          {{-- {{$reportCardHeaders->report_card_headre}} --}}
                          @foreach($reportCardHeaders->report_card_headre as $reportCardHeader)
                            <td >{{$reportCardHeader->header_title}}</td>
                          @endforeach 
                          <?php $count = count($reportCardHeaders->report_card_headre); 
                          ?>  
                          @foreach($getClasses->assignsubject as $getClass)
                            @foreach($getClass->assign_subjectId as $getClassesss)
                              <tr>
                                <td>{{$getClassesss->subject->subject_name}}</td>
                                  {{-- @for($i=1; $i <= $count ; $i++) --}}
                                   @foreach($reportCardMasts->report_card as $report_cards)
                                   @if($getClassesss->subject->id == $report_cards->subject_id)
                                    <td><input type="text"  name="marks_grade[]" placeholder="Mask/Grd" maxlength="4" size="4" value="{{$report_cards->marks_grade}}" >  
                                    <input type="hidden" name="subject_id[]"  value="{{$getClassesss->subject->id}}">
                                     <input type="hidden" name="report_cards_title_id[]"  value="{{$report_cards->id}}"></td>
                                  </td>
                                    @endif
                                   @endforeach
                                  {{-- @endfor --}}
                              </tr>
                            @endforeach
                          @endforeach
                        </tr>
                        <tr>
                          <th colspan="0"></th>
                          <th  colspan="5" style="text-align: center;">Grand Total <input type="text" name="grand_total" ></th>
                          <th colspan="5"></th>
                        </tr>
                      </table>
                    </div><br><br>
                  </div>
                </div>
                <div class="std_table2">
                  <div class="row">
                    <div class="col-md-6">
                      <table border="1">
                        <tr>
                          <th colspan="12">Co-Scholastic Areas: Term-I [ on  a 3 – point (A-C) grading scale]</th>
                        </tr>
                        <tr>
                          <th colspan="4"> </th>
                          <th colspan="4">Grade </th>
                        </tr>
                        <tr>
                          <th colspan="4">Work Education ( or Pre-vocational Education) </th>
                          <th colspan="4"><input type="text" name="work_education" maxlength="4" size="4" class="form-control" value="{{$reportCardMasts->work_education}}" > </th>
                        </tr>
                        <tr>
                          <th colspan="4">Art Education </th>
                          <th colspan="4"><input type="text" name="art_education" maxlength="4" size="4" class="form-control" value="{{$reportCardMasts->art_education}}" > </th>
                        </tr>
                        <tr>
                          <th colspan="4">Health and Physical Education </th>
                          <th colspan="4"><input type="text" name="health_phsl" maxlength="4" size="4" class="form-control" value="{{$reportCardMasts->health_phsl}}" ></th>
                        </tr>
                      </table><br>
                    </div>
                    <div class="col-md-4" style="border: solid;">
                      <span><u>Attendance : -</u></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="attendance" maxlength="3" size="3" value="{{$reportCardMasts->attendance}}" ><br><br>
                      <span>1. Total Working Days -</span> &nbsp;&nbsp; <input type="text" name="total_working_day" maxlength="3" size="3" value="{{$reportCardMasts->total_working_day}}"  ><br><br>
                      <span>2. Total Present   Days - –</span>&nbsp;&nbsp; <input type="text" name="total_presentd_days" maxlength="3" size="3" value="{{$reportCardMasts->total_presentd_days}}" ><br><br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <table border="1">
                        <tr>
                          <th colspan="8" align="right"> </th>
                          <th colspan="8" align="right">Grade </th>
                        </tr>
                        <tr>
                          <th colspan="8">Discipline: Term –I ( on a 3 – point (A-C) grading scale </th>
                          <th colspan="4"><input type="text" name="grading_scale" maxlength="3" size="3" class="form-control" value="{{$reportCardMasts->grading_scale}}" ></th>           
                        </tr>
                      </table><br>
                    </div>
                    <div class="col-md-6 mt-2">
                        <h2> Class Teacher’s remark: {{$reportCardMasts->remark}}</h2>
                      <br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <span><strong>Promoted to class:  {{$reportCardMasts->prd_to_class}}</span><br>
                      <span><strong>Place: {{$reportCardMasts->Place}}</strong></span><br>
                      <span><strong>Date: {{$reportCardMasts->date}}</strong></span><br>
                    </div>
                  </div>
                </div>
              </div> 
              @elseif($reportCardHeaders->header_name == '11th(Sci-Math + PE)_to_11th(Sci-Math + PE)' OR $reportCardHeaders->header_name == '11th(Sci-Bio + PE)_to_11th(Sci-Bio + PE)' OR $reportCardHeaders->header_name == '11th(Commerce + PE)_to_11th(Commerce + PE)'OR $reportCardHeaders->header_name == '11th(Maths-IP)_to_11th(Maths-IP)')
                  <div class="report_cart_table">
                   
                   Registration NO.: {{$students->student_class->class_name}} ({{$students->student_section->section_name}})<br>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="std_table">
                          <table border="1" width="100%;">
                            <tr>
                              <th >Scholastic Areas:</th>
                              <th colspan="7" style="text-align: center;">Academic Year (100 Marks)</th>
                              {{-- <th  colspan="6">Term-2 (100 Marks)</th> --}}
                            </tr>
                            <tr>
                              <th>Subject Name</th>
                              {{-- {{$reportCardHeaders->report_card_headre}} --}}
                              @foreach($reportCardHeaders->report_card_headre as $reportCardHeader)
                                <td >{{$reportCardHeader->header_title}}</td>
                              @endforeach 
                              <?php $count = count($reportCardHeaders->report_card_headre); 
                              ?>
                              @foreach($getClasses->assignsubject as $getClass)
                                @foreach($getClass->assign_subjectId as $getClassesss)
                                  <tr>
                                    <td>{{$getClassesss->subject->subject_name}}</td>
                                      @foreach($reportCardMasts->report_card as $report_cards)
                                       @if($getClassesss->subject->id == $report_cards->subject_id)
                                        <td><input type="text"  name="marks_grade[]" placeholder="Mask/Grd" maxlength="4" size="4" value="{{$report_cards->marks_grade}}" >  
                                        <input type="hidden" name="subject_id[]"  value="{{$getClassesss->subject->id}}">
                                        <input type="hidden" name="report_cards_title_id[]"  value="{{$report_cards->id}}"></td>  
                                      </td>
                                        @endif
                                       @endforeach
                                  </tr>
                                @endforeach
                              @endforeach
                            </tr>
                            
                          </table>
                          <div class="row mt-4">
                            <div class="col-md-6">
                              <table border="1">
                                <tr>
                                  <th colspan="0"></th>
                                  <th  colspan="5" style="text-align: center;">Overall  Grade <input type="text" name="grand_total" value="{{$reportCardMasts->grand_total}}" ></th>
                                  <th colspan="5"></th>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div><br><br>
                      </div>
                    </div>
                    <div class="std_table2">
                      <div class="row">
                        <div class="col-md-12">
                          <table border="1" width="100%;">
                            <tr>
                              <th colspan="12">Grading of Internal Assessment  </th>
                            </tr>
                            <tr>
                              <th colspan="12"> </th>
                              <th colspan="12">Grade </th>
                            </tr>
                            <tr>
                              <th colspan="12">500- Work Experience </th>
                              <th colspan="12"><input type="text" name="work_education" maxlength="4" size="4" class="form-control" value="{{$reportCardMasts->work_education}}" > </th>
                            </tr>
                            <tr>
                              <th colspan="12">502-Health and Physical Education </th>
                              <th colspan="12"><input type="text" name="health_phsl" maxlength="4" size="4" class="form-control" value="{{$reportCardMasts->health_phsl}}" > </th>
                            </tr>
                            <tr>
                              <th colspan="12">503- General Studies </th>
                              <th colspan="12"><input type="text" name="art_education" maxlength="4" size="4" class="form-control" value="{{$reportCardMasts->art_education}}" ></th>
                            </tr>
                          </table><br>
                        </div>
                        <div class="col-md-6" >
                          <span><u>Attendance : -</u>&nbsp;&nbsp;
                          Total Working Days -</span> &nbsp;&nbsp; <input type="text" name="total_working_day"   value="{{$reportCardMasts->total_working_day}}" ><br><br>

                          <span>Total Present Days:</span> &nbsp;&nbsp; <input type="text" name="total_presentd_days"  value="{{$reportCardMasts->total_presentd_days}}" ><br><br>

                          <span>Class Teacher’s remark:</span>&nbsp;&nbsp; <input type="text" name="remark"  value="{{$reportCardMasts->remark}}" ><br><br>

                          <span>Promoted to class:</span>&nbsp;&nbsp; <input type="text" name="prd_to_class"  value="{{$reportCardMasts->prd_to_class}}" ><br><br>

                          <span>Place:</span>&nbsp;&nbsp; <input type="text" name="place"  value="{{$reportCardMasts->place}}" ><br><br>

                          <span>Date:</span>&nbsp;&nbsp; <input type="text" name="date"  class="" value="{{$reportCardMasts->date}}" ><br><br>
                        </div>
                      </div>
                  </div>


              @elseif($reportCardHeaders->header_name == 'Nursery(A)_to_KG-II(A)')
                <style type="text/css">
                  table {
                  margin: auto;
                  width: 80% !important;
              }
                </style>
                 <div class="container">
                    <div class="row mt-4">
                    <div class="col-md-12">
                      <div class="row">
                        @foreach($getClasses->assignsubject as $getClass)
                            @foreach($getClass->assign_subjectId  as $key => $getClassesss)
                              @if($getClassesss->subject->subject_name == 'ENGLISH' OR $getClassesss->subject->subject_name == 'HINDI' OR $getClassesss->subject->subject_name == 'MATHEMATICS' OR $getClassesss->subject->subject_name == 'EVS' OR $getClassesss->subject->subject_name == 'Co-Curricular Activities' OR $getClassesss->subject->subject_name == 'Personal Development' OR $getClassesss->subject->subject_name == 'COMPUTER' OR $getClassesss->subject->subject_name == 'Health' )
                              <div class="col-md-6" >
                              <table border="1" id="table{{$key}}">
                                <tr>
                                  <br>
                                  <td ></td>
                                  <td style="background-color: #005826;color: #fff;"><strong>{{$getClassesss->subject->subject_name}}</strong></td> 
                                  @foreach($reportCardHeaders->report_card_headre as $reportCardHeader)
                                  <td style="background-color: #005826;color: #fff;">{{$reportCardHeader->header_title}}</td>
                                  @endforeach 
                                  <?php $count = count($reportCardHeaders->report_card_headre);?>
                                  <tr>
                                  <?php $count1 = 1; ?>
                                  @foreach($getClassesss->subject->subsubjects as $subsubjects) 
                                    <tr>
                                      <td>&nbsp;&nbsp;{{$count1++}}.&nbsp;&nbsp;</td>
                                      <td>{{$subsubjects->subject_name}}</td>

                                        @foreach($reportCardMasts->report_card as $report_cards)
                                           @if($subsubjects->id == $report_cards->subject_id)

                                            <td class="sub_field{{$subsubjects->id}}"> <input type="text"  name="marks_grade[]" placeholder="Mask/Grd" maxlength="4" size="4" value="{{$report_cards->marks_grade}}" >  
                                            <input type="hidden" name="report_cards_title_id[]"  value="{{$report_cards->id}}">
                                          <input type="hidden" name="subject_id[]"  value="{{ $report_cards->subject_id}}">
                                        </td>
                                            @endif
                                          @endforeach
                                          @foreach($subsubjects->subsubjects as $subsubject)
                                            <tr>
                                              <td></td>
                                              <td>{{$subsubject->subject_name}}</td>
                                              @foreach($reportCardMasts->report_card as $report_cards)
                                                 @if($subsubject->id == $report_cards->subject_id)
                                                    <td><input type="text"  name="marks_grade[]" placeholder="Mask/Grd" maxlength="4" size="4" value="{{$report_cards->marks_grade}}" >  
                                                    <input type="hidden" name="report_cards_title_id[]"  value="{{$report_cards->id}}">
                                                   <input type="hidden" name="subject_id[]"  value="{{$report_cards->subject_id}}"></td>
                                                  @endif
                                               @endforeach
                                            </tr> 
                                          @endforeach
                                    </tr>
                                  @endforeach
                                </tr>   
                              </table>
                            </div> 
                            @endif
                          @endforeach
                        @endforeach
                      </div> 
                  </div> 
                </div>
              @endif   
            <div class="row mt-5">
            <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-sm" name="" value="Update">
            </div>
          </div>  
        </form>
      </div>
    </div>
  </div>
</div> 

 @endsection
