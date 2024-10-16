@extends('layouts.main')
@section('content')
<style type="text/css">
  .row.attendance {
    float: left;
    width: -11%;
    margin-top: -200px;
    width: -moz-available;
    margin-left: 532px;
    width: 100%;
}
/*.sub_field25,.sub_field29{
  display: none;
}*/
/*#tab2 ,#tab3,#tab4,#tab5,#tab6,#tab8,#tab7{
    margin-top: 10px;
}
#tab6{
    margin-left: 38px;
}
#tab8 {
    margin-left: 119px;
}
#tab1 {
    margin-left: 30px;
}*/
/*#tab0,#tab2,#tab5,#tab7 {
    margin-left: 50px;
}#tab1,#tab4,#tab6 {
    margin-left: 175px;
}#tab4 {
    margin-left: 143px;
}#tab8 {
    margin-left: 256px;
}*/
</style>
<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Show and print Report Card<h4 class="panel-title"> {{--  <a href="{{route('time-table.create')}}" class="btn btn-success pull-right btn-sm border-radius">AddReport Card</a> --}}<a href="{{ URL::previous('student-report-card.index') }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a> 
        <a class="btn btn-primary btn-sm border-radius fa fa-print" href="{{ URL::to('/employee/pdf',$reportCardMasts->id) }}">Export to PDF</a>
        </h4></h6>
    </div>
  <div class="col-md-12">
    <div class="all_content" style="border: solid;">

        @if($reportCardHeaders->header_name != 'Nursery(A)_to_KG-II(A)')
          <div class="school_name" align="center" style="font-weight: bold;">
            <div class="row"> 
              <div class="col-md-12">
                 <div class="school-title" style="margin-right: 7% margin-left: 7%;" >
                   <h3 style=" margin-right: : 55px; font-weight: bold; background: black;color: #fff; margin-top: 50px; width: 100%;">{{strtoupper($settings->title)}}</h3><br>
                 </div>

                 <div class="logos" style="float: right; margin-top: -27px; margin-right: 38px;" >
                  <img src="{{asset($settings->logo !=null ? 'storage/'.$settings->logo : 'storage/admin/student_demo.png')}}" style="width: 70px; height: 70px; " >
                </div>
                <div class="logos1" style="float: left; margin-top: -27px;  margin-left: 33px;" >
                   <img src="{{asset('/cbse-logo.jpeg' !=null ? '/cbse-logo.jpeg' : 'storage/admin/student_demo.png')}}" style="width: 70px; height: 70px;" >
                </div> 
                <div class="col-md-6 cbsc " style="margin-top: -30px;">
                  <span style="font-size: 20px;"><strong>( CBSE AFF. No.{{$settings->cbse_aff_no }} )</strong></span> <br> 
                  
                  <span style="font-size: 20px;"><strong>Academic Session : 2020-2021 </strong></span><br>  
                  
                  @if( $reportCardHeaders->header_name != '10th(A)_to_10th(A)')
                      <span style="font-size: 20px;"><strong><u>Report Card </u></strong>  </span> <br> 
                  @else
                      <span style="font-size: 15px;"><strong>PT/HALF Y/ PRE-BOARD Report Card  </strong>  </span> <br> 
                  @endif
              </div>
            </div>
          </div>
      </div>
         <!-- Card Body -->
          <div class="card-body">     
            <div class="row "> 
                <div class="col-md-12 report_cart_table" style="font-weight: bold; font-size: 15px;">
                    Roll No. – {{$students->roll_no}} <br>
                    Student’s Name-  {{$students->f_name}} {{$students->m_name}} {{$students->l_name}}<br>
                    {{isset($students) ? student_first_guardian($students)['relation'] : ''}} {{isset($students) ? student_first_guardian($students)['name'] : ''}} <br>

                    {{isset($students) ? student_first_guardian($students)['relation1'] : ''}} {{isset($students) ? student_first_guardian($students)['name1'] : ''}}<br>
                    {{-- Father’s Name: {{$students->students_guardiant_masts[0]}}<br>
                    Mother’s Name:  {{$students->students_guardiant_masts[1]}}<br> --}}
                    Date of Birth: {{$students->dob}} <br>
                    Class/ Section: {{$students->student_class->class_name}} ({{$students->student_section->section_name}})<br>
                    @if($reportCardHeaders->header_name == '9th_to_9th')
           
                      <span class="rgs_no" align="center">Scholar No-</span>
                      
                    @endif
                </div>
              </div>
        @endif


         @if($reportCardHeaders->header_name == 'Nursery(A)_to_KG-II(A)')
            <style type="text/css">
              table {
                margin: auto;
                width: 80% !important;
              }
            </style>
                <?php $alf = array(0=>'A',1=>'B',2=>'C',4=>'D',5=>'E',6=>'F',7=>'G',8=>'H'); ?>

                 <div class="container">
                    <div class="row mt-4">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                        @foreach($getClasses->assignsubject as $getClass)
                            @foreach($getClass->assign_subjectId  as $key => $getClassesss)
                              @if($getClassesss->subject->subject_name == 'ENGLISH')
                              <table border="1" id="table{{$key}}">
                                <tr>
                                  <td ></td>
                                  <td style="background-color: #005826;color: #fff;"><strong>{{$getClassesss->subject->subject_name =='EVS' ? $alf[$key].'.'.'Environmental Science ' : ($getClassesss->subject->subject_name =='ENGLISH' ? $alf[$key].'.'.'Language-I' :($getClassesss->subject->subject_name =='HINDI' ? $alf[$key].'.'.'Language-II' : $alf[$key].'.'.$getClassesss->subject->subject_name))}}</strong></td>
                                  @foreach($reportCardHeaders->report_card_headre as $reportCardHeader)
                                    <td style="background-color: #005826;color: #fff;">{{$reportCardHeader->header_title}}
                                    </td>
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
                                        <td class="sub_field{{$subsubjects->id}}"> {{$report_cards->marks_grade}} 
                                        </td>
                                        @endif
                                        @endforeach
                                        @foreach($subsubjects->subsubjects as $subsubject)
                                    <tr>
                                      <td></td>
                                      <td>{{$subsubject->subject_name}}</td>
                                      @foreach($reportCardMasts->report_card as $report_cards)
                                      @if($subsubject->id == $report_cards->subject_id)
                                        <td>{{$report_cards->marks_grade}}</td>  
                                        {{-- <input type="hidden" name="subject_id[]"  value="{{$subsubject->subject->id}}"></td> --}}
                                      @endif
                                      @endforeach
                                    </tr> 
                                      @endforeach
                                    </tr>
                                      @endforeach
                                    </tr>   
                                </table>
                              @endif
                            @endforeach
                          @endforeach
                        </div> 
                        <div class="col-md-6">
                          @foreach($getClasses->assignsubject as $getClass)
                            @foreach($getClass->assign_subjectId  as $key => $getClassesss)
                              @if($getClassesss->subject->subject_name == 'HINDI')
                              <table border="1" style="width: auto;" id="table{{$key}}">
                                <tr>
                                  <td ></td>
                                   <td style="background-color: #005826;color: #fff;"><strong>{{$getClassesss->subject->subject_name =='EVS' ? $alf[$key].'.'.'Environmental Science ' : ($getClassesss->subject->subject_name =='ENGLISH' ? $alf[$key].'.'.'Language-I' :($getClassesss->subject->subject_name =='HINDI' ? $alf[$key].'.'.'Language-II' : $alf[$key].'.'.$getClassesss->subject->subject_name))}}</strong></td>
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
                                          <td class="sub_field{{$subsubjects->id}}"> {{$report_cards->marks_grade}}</td>
                                          @endif
                                        @endforeach
                                        @foreach($subsubjects->subsubjects as $subsubject)
                                          <tr>
                                            <td></td>
                                            <td>{{$subsubject->subject_name}}</td>
                                            @foreach($reportCardMasts->report_card as $report_cards)
                                               @if($subsubject->id == $report_cards->subject_id)
                                                  <td>{{$report_cards->marks_grade}}</td> 
                                                @endif
                                             @endforeach
                                          </tr> 
                                        @endforeach
                                    </tr>
                                  @endforeach
                                  </tr>   
                                </table>
                              @endif
                            @endforeach
                          @endforeach
                        </div>
                      </div> 
                      <div class="row mt-4">
                        <div class="col-md-6">
                          @foreach($getClasses->assignsubject as $getClass)
                            @foreach($getClass->assign_subjectId  as $key => $getClassesss)
                              @if($getClassesss->subject->subject_name == 'MATHEMATICS')
                              <table border="1" style="width: auto;" id="table{{$key}}">
                                <tr>
                                  <td ></td>
                                 <td style="background-color: #005826;color: #fff;"><strong>{{$getClassesss->subject->subject_name =='EVS' ? $alf[$key].'.'.'Environmental Science ' : ($getClassesss->subject->subject_name =='ENGLISH' ? $alf[$key].'.'.'Language-I' :($getClassesss->subject->subject_name =='HINDI' ? $alf[$key].'.'.'Language-II' : $alf[$key].'.'.$getClassesss->subject->subject_name))}}</strong></td>
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
                                            <td class="sub_field{{$subsubjects->id}}"> {{$report_cards->marks_grade}}</td>
                                            @endif
                                          @endforeach
                                          @foreach($subsubjects->subsubjects as $subsubject)
                                            <tr>
                                              <td></td>
                                              @if($subsubjects->subject_name != 'Reading skill' && $subsubjects->subject_name != 'Writing Skills' && $subsubjects->subject_name != 'Speaking skill' && $subsubjects->subject_name != 'Understanding of Lessons')
                                              <td>{{$subsubject->subject_name}}</td>
                                              @foreach($reportCardMasts->report_card as $report_cards)
                                                @if($subsubject->id == $report_cards->subject_id)
                                                  <td>{{$report_cards->marks_grade}}</td>
                                                @endif
                                               @endforeach
                                              @endif
                                            </tr> 
                                          @endforeach
                                    </tr>
                                  @endforeach
                                  </tr>   
                                </table>
                              @endif
                            @endforeach
                          @endforeach
                        </div> 
                        <div class="col-md-6">
                          @foreach($getClasses->assignsubject as $getClass)
                            @foreach($getClass->assign_subjectId  as $key => $getClassesss)
                              @if($getClassesss->subject->subject_name == 'EVS')
                              <table border="1" style="width: auto;" id="table{{$key}}">
                                <tr>
                                  <td ></td>
                                  <td style="background-color: #005826;color: #fff;"><strong>{{$getClassesss->subject->subject_name}}</strong></span></td>
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
                                            <td class="sub_field{{$subsubjects->id}}">{{$report_cards->marks_grade}}</td>
                                            @endif
                                          @endforeach
                                          @foreach($subsubjects->subsubjects as $subsubject)
                                            <tr>
                                              <td></td>
                                              <td>{{$subsubject->subject_name}}</td>
                                              @foreach($reportCardMasts->report_card as $report_cards)
                                                 @if($subsubject->id == $report_cards->subject_id)
                                                    <td><{{$report_cards->marks_grade}}</td>
                                                  @endif
                                               @endforeach
                                            </tr> 
                                          @endforeach
                                    </tr>
                                  @endforeach
                                  </tr>   
                                </table>
                              @endif
                            @endforeach
                          @endforeach
                        </div>
                      </div> 
                      <div class="row mt-4">
                        <div class="col-md-6">
                        @foreach($getClasses->assignsubject as $getClass)
                            @foreach($getClass->assign_subjectId  as $key => $getClassesss)
                              @if($getClassesss->subject->subject_name == 'Co-Curricular Activities')
                              <table border="1" style="width: 77%;" id="table{{$key}}">
                                <tr>
                                  <td ></td>
                                <td style="background-color: #005826;color: #fff;"><strong>{{$getClassesss->subject->subject_name =='EVS' ? $alf[$key].'.'.'Environmental Science ' : ($getClassesss->subject->subject_name =='ENGLISH' ? $alf[$key].'.'.'Language-I' :($getClassesss->subject->subject_name =='HINDI' ? $alf[$key].'.'.'Language-II' : $alf[$key].'.'.$getClassesss->subject->subject_name))}}</strong></td>
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
                                            <td class="sub_field{{$subsubjects->id}}"> {{$report_cards->marks_grade}}</td>
                                            @endif
                                          @endforeach
                                          @foreach($subsubjects->subsubjects as $subsubject)
                                            <tr>
                                              <td></td>
                                              <td>{{$subsubject->subject_name}}</td>
                                              @foreach($reportCardMasts->report_card as $report_cards)
                                                 @if($subsubject->id == $report_cards->subject_id)
                                                    <td>{{$report_cards->marks_grade}}</td> 
                                                  @endif
                                               @endforeach
                                            </tr> 
                                          @endforeach
                                    </tr>
                                  @endforeach
                                  </tr>   
                                </table>
                              @endif
                            @endforeach
                          @endforeach
                          <div class="COMPUTER mt-2">
                            @foreach($getClasses->assignsubject as $getClass)
                            @foreach($getClass->assign_subjectId  as $key => $getClassesss)
                              @if($getClassesss->subject->subject_name == 'COMPUTER' )
                              <table border="1" style="width: 77%;" id="table{{$key}}">
                                <tr>
                                  <td ></td>
                                  <td style="background-color: #005826;color: #fff;"><strong>{{$getClassesss->subject->subject_name =='EVS' ? $alf[$key].'.'.'Environmental Science ' : ($getClassesss->subject->subject_name =='ENGLISH' ? $alf[$key].'.'.'Language-I' :($getClassesss->subject->subject_name =='HINDI' ? $alf[$key].'.'.'Language-II' : $alf[$key].'.'.$getClassesss->subject->subject_name))}}</strong></td>
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
                                            <td class="sub_field{{$subsubjects->id}}"> {{$report_cards->marks_grade}}</td>
                                            @endif
                                          @endforeach
                                          @foreach($subsubjects->subsubjects as $subsubject)
                                            <tr>
                                              <td></td>
                                              <td>{{$subsubject->subject_name}}</td>
                                              @foreach($reportCardMasts->report_card as $report_cards)
                                                 @if($subsubject->id == $report_cards->subject_id)
                                                    <td>{{$report_cards->marks_grade}}</td> 
                                                  @endif
                                               @endforeach
                                            </tr> 
                                          @endforeach
                                    </tr>
                                  @endforeach
                                  </tr>   
                                </table>
                              @endif
                            @endforeach
                          @endforeach
                        </div>
                        <div class="Helth mt-2">
                          @foreach($getClasses->assignsubject as $getClass)
                            @foreach($getClass->assign_subjectId  as $key => $getClassesss)
                              @if( $getClassesss->subject->subject_name == 'Health')
                              <table border="1" style="width: 77%;" id="table{{$key}}">
                                <tr>
                                  <td ></td>
                                  <td style="background-color: #005826;color: #fff;"><strong>{{$getClassesss->subject->subject_name =='EVS' ? $alf[$key].'.'.'Environmental Science ' : ($getClassesss->subject->subject_name =='ENGLISH' ? $alf[$key].'.'.'Language-I' :($getClassesss->subject->subject_name =='HINDI' ? $alf[$key].'.'.'Language-II' : $alf[$key].'.'.$getClassesss->subject->subject_name))}}</strong></td>
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
                                            <td class="sub_field{{$subsubjects->id}}"> {{$report_cards->marks_grade}}</td>
                                            @endif
                                          @endforeach
                                          @foreach($subsubjects->subsubjects as $subsubject)
                                            <tr>
                                              <td></td>
                                              <td>{{$subsubject->subject_name}}</td>
                                              @foreach($reportCardMasts->report_card as $report_cards)
                                                 @if($subsubject->id == $report_cards->subject_id)
                                                    <td>{{$report_cards->marks_grade}}</td> 
                                                  @endif
                                               @endforeach
                                            </tr> 
                                          @endforeach
                                    </tr>
                                  @endforeach
                                  </tr>   
                                </table>
                              @endif
                            @endforeach
                          @endforeach
                          </div>
                        </div> 
                        <div class="col-md-6">
                          @foreach($getClasses->assignsubject as $getClass)
                            @foreach($getClass->assign_subjectId  as $key => $getClassesss)
                              @if($getClassesss->subject->subject_name == 'Personal Development')
                              <table border="1" style="width: auto;" id="table{{$key}}">
                                <tr>
                                  <td ></td>
                                  <td style="background-color: #005826;color: #fff;"><strong>{{$getClassesss->subject->subject_name =='EVS' ? $alf[$key].'.'.'Environmental Science ' : ($getClassesss->subject->subject_name =='ENGLISH' ? $alf[$key].'.'.'Language-I' :($getClassesss->subject->subject_name =='HINDI' ? $alf[$key].'.'.'Language-II' : $alf[$key].'.'.$getClassesss->subject->subject_name))}}</strong></td>
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
                                            <td class="sub_field{{$subsubjects->id}}"> {{$report_cards->marks_grade}}</td>
                                            @endif
                                          @endforeach
                                          @foreach($subsubjects->subsubjects as $subsubject)
                                            <tr>
                                              <td></td>
                                              <td>{{$subsubject->subject_name}}</td>
                                              @foreach($reportCardMasts->report_card as $report_cards)
                                                 @if($subsubject->id == $report_cards->subject_id)
                                                    <td>{{$report_cards->marks_grade}}</td>
                                                  @endif
                                               @endforeach
                                            </tr> 
                                          @endforeach
                                    </tr>
                                  @endforeach
                                  </tr>   
                                </table>
                              @endif
                            @endforeach
                          @endforeach
                        </div>
                  

        @elseif($reportCardHeaders->header_name =='1st(A)_to_5th(A)' OR $reportCardHeaders->header_name == '6th(A)_to_8th(A)' )
            <div class="row mt-2">
              <div class="col-md-12">
                  <table {{-- s --}} border="1" width="100%;" {{-- style="table-layout: fixed; width: 1040px;" --}}  >
                      <tr>
                          <th style="width: 14%;">Scholastic Areas:</th>
                          <th colspan="6">Term-I (100 Marks)</th>
                          <th  colspan="6">Term-2 (100 Marks)</th>
                      </tr>
                      <tr>
                        <th style="width: 14%;">Subject Name</th>
                        {{-- {{$reportCardHeaders->report_card_headre}} --}}
                          @foreach($reportCardHeaders->report_card_headre as $reportCardHeader)
                            <td style="width: 0%;">{{$reportCardHeader->header_title}}</td>
                          @endforeach 
                          <?php $count = count($reportCardHeaders->report_card_headre); ?>  
                        @foreach($getClasses->assignsubject as $getClass)
                        @foreach($getClass->assign_subjectId as $getClassesss)
                        <tr>
                          <td style="height: 5%;">{{$getClassesss->subject->subject_name}}</td>
                            {{-- @for($i=1; $i <= $count ; $i++) --}}
                            @foreach($reportCardMasts->report_card as $report_cards)
                              @if($getClassesss->subject->id == $report_cards->subject_id)
                                <td>{{$report_cards->marks_grade}} </td>
                              @endif
                            @endforeach
                            {{-- @endfor --}}
                        </tr>
                        @endforeach
                        @endforeach
                      </tr>
                    </table>
                  <br>
                </div>
              </div>
              <div class="col-md-12">
                <div class="row" >
                  <table border="1"  width="100%;" style="font-size: 70%;" {{-- s --}}>
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
                      <th colspan="6">{{$reportCardMasts->work_education}} </th>
                      <th colspan="6">Work Education ( or Pre-vocational Education) </th>
                      <th colspan="6">{{$reportCardMasts->work_education2}} </th>
                    </tr>
                    <tr>
                      <th colspan="6">Art Education </th>
                      <th colspan="6">{{$reportCardMasts->art_education}} </th>

                      <th colspan="6">Art Education </th>
                      <th colspan="6">{{$reportCardMasts->art_education2}} </th>
                    </tr>
                    <tr>
                      <th colspan="6">Health and Physical Education </th>
                      <th colspan="6">{{$reportCardMasts->health_phsl}}</th>

                      <th colspan="6">Health and Physical Education </th>
                      <th colspan="6">{{$reportCardMasts->health_phsl2}}</th>
                    </tr>
                  </table><br>
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                 <span colspan="3">  Attendance :- &nbsp;&nbsp; {{$reportCardMasts->attendance}}  &nbsp;&nbsp; Total Working Days - &nbsp;&nbsp; {{$reportCardMasts->total_working_day}}  &nbsp;&nbsp;Total Present Days -  &nbsp;&nbsp;{{$reportCardMasts->total_presentd_days}}  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Attendance :- &nbsp;&nbsp; {{$reportCardMasts->attendance2}}  &nbsp;&nbsp;Total Working Days -  &nbsp;&nbsp;{{$reportCardMasts->total_working_day2}}  &nbsp;&nbsp;Total Present Days -  &nbsp;&nbsp;{{$reportCardMasts->total_presentd_ays2}}</span>
                  <table border="" {{-- s --}}  width="100%;" style="font-size: 70%;">
                    <tr>
                      <th colspan="8" align="right"> </th>
                      <th colspan="4"  align="right">Grade </th> 
                      <th colspan="8" align="right"> </th>
                      <th colspan="4"  align="right">Grade </th>
                    </tr>
                    <tr>
                      <th colspan="8">Discipline: Term –I ( on a 3 – point (A-C) grading scale </th>
                      <th colspan="4">{{$reportCardMasts->grading_scale}} </th>
                      <th colspan="8">Discipline: Term –I ( on a 3 – point (A-C) grading scale</th>
                      <th colspan="4">{{$reportCardMasts->grading_scale2}}</th>
                    </tr>
                  </table>
                </div>
                </div><br>
               <div class="row">
                  <div class="col-md-4">
                      <h5>Class Teacher’s remark : &nbsp;&nbsp; {{$reportCardMasts->remark}}<br></h5>
                      <h5>Promoted to class : &nbsp;&nbsp;{{$reportCardMasts->prd_to_class}}<br></h5>
                      <h5>Place : &nbsp;&nbsp;{{$reportCardMasts->Place}}<br></h5>
                  </div>
               </div>
               <div class="row">
                 <div class="col-md-4">
                     <h5>Date : &nbsp;&nbsp;{{date("d-m-Y",strtotime($reportCardMasts->date))}}<br></h5>  
                  </div> 
                  <div class="col-md-4">
                    <h5>Signature of Class Teacher</h5>
                  </div> 
                  <div class="col-md-4">
                    <h5>Signature of Principal</h5>
                  </div>
               </div>
                       
               @elseif($reportCardHeaders->header_name == '9th(A)_to_9th(A)')
                <div class="row">
                  <div class="col-md-12">
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
                                  <td>{{$report_cards->marks_grade}}</td>
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
                <div class="row">
                  <div class="col-md-6 form-group">
                    <table border="1">
                      <tr>
                        <th colspan="12">Grading of Internal Assessment  (Don’t show to Student )</th>
                      </tr>
                      <tr>
                        <th colspan="4">Subjct </th>
                        <th colspan="4">Grade </th>
                      </tr>
                      <tr>
                        <th colspan="4">Work Education (500) </th>
                        <th colspan="4"><input type="text" name="work_education"  class="form-control"> </th>
                      </tr>
                      <tr>
                        <th colspan="4">Health and Phy. Edu (502) </th>
                        <th colspan="4"><input type="text" name="health_phsl"  class="form-control"></th>
                      </tr>
                      <tr>
                        <th colspan="4">General Studies (503 </th>
                        <th colspan="4"><input type="text" name="art_education"  class="form-control"> </th>
                      </tr>
                    </table><br>
                  </div>
                  <div class="col-md-4" style="border: solid;">
                    <span><u>Attendance : -</u></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="attendance" maxlength="3" size="3" ><br><br>
                    <span>1. Total Working Days -</span> &nbsp;&nbsp; <input type="text" name="total_working_day" maxlength="3" size="3" ><br><br>
                    <span>2. Total Present   Days - –</span>&nbsp;&nbsp; <input type="text" name="total_presentd_days" maxlength="3" size="3" ><br><br>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 mt-2">
                    <table border="1">
                      <tr>
                        <th> Class Teacher’s remark:</th>
                        <th ><input type="text" name="remark" class="form-control"></th>
                      </tr>
                    </table><br>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Place</label>
                  <input type="text" name="Place" class="form-control">
                </div>
                <div class="col-md-4">
                  <label>Date</label>
                  <input type="text" name="date" class="form-control datepicker">
                </div>
            
          @elseif($reportCardHeaders->header_name == '10th(A)_to_10th(A)')
            <span align="center">SCHOLAR NO: ()</span><br>
            <div class="row">
              <div class="col-md-12">
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
                                  <td>{{$report_cards->marks_grade}} </td>
                                @endif
                            @endforeach
                        </tr>
                      @endforeach
                    @endforeach
                     <th colspan="0"></th>
                      <th  colspan="5" style="text-align: center;">Overall  Grade {{$reportCardMasts->grand_total}}
                      </th>
                      <th colspan="5"></th>
                  </tr>
                </table>
              </div><br><br>
            </div>
            <div class="row mt-4">
               <div class="col-md-10" style="border: solid; margin-left: 83px;">
                  <u>Attendance : -{{$reportCardMasts->attebdence}}</u>&nbsp;&nbsp;<br><br>
                  &nbsp;&nbsp;&nbsp;&nbsp;1.Total Working Days - &nbsp;&nbsp; {{$reportCardMasts->total_working_day}}<br><br>
                 &nbsp;&nbsp;&nbsp;&nbsp; 2.Total Present Days: &nbsp;&nbsp;{{$reportCardMasts->total_presentd_days}}<br><br>
               </div>
            </div>
            <div class="row  mt-4">
              <div class="col-md-6">
                <span>Class Teacher’s remark:</span>&nbsp;&nbsp; {{$reportCardMasts->remark}}<br><br>
                <span>Promoted to class:</span>&nbsp;&nbsp; {{$reportCardMasts->prd_to_class}}<br><br>
                <span>Place:</span>&nbsp;&nbsp; {{$reportCardMasts->place}}<br><br>
                <span>Date:</span>&nbsp;&nbsp; {{$reportCardMasts->date}}<br><br>
              </div>
            </div>

          @elseif($reportCardHeaders->header_name == '11th(Sci-Math + PE)_to_11th(Sci-Math + PE)' OR $reportCardHeaders->header_name == '11th(Sci-Bio + PE)_to_11th(Sci-Bio + PE)' OR $reportCardHeaders->header_name == '11th(Commerce + PE)_to_11th(Commerce + PE)'OR $reportCardHeaders->header_name == '11th(Maths-IP)_to_11th(Maths-IP)')

                   
           <span align="center">SCHOLAR NO()</span><br>
           
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
                                  <td>{{$report_cards->marks_grade}}</td>
                                  @endif
                                 @endforeach
                            </tr>
                          @endforeach
                        @endforeach
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
                <div class="row ">
                  <div class="col-md-2 overall" style="border: solid; margin-left: 15px; margin-bottom: 20px; margin-top: 20px;" >
                    <span>Overall  Grade {{$reportCardMasts->grand_total}}</span>
                       
                  </div><br>
                </div>
                <div class="row ">
                  <div class="col-md-12">
                    <table border="1" width="100%;">
                      <tr>
                        <th colspan="12">Grading of Internal Assessment</th>
                      </tr>
                      <tr>
                        <th colspan="12"> </th>
                        <th colspan="12">Grade </th>
                      </tr>
                      <tr>
                        <th colspan="12">500- Work Experience </th>
                        <th colspan="12">{{$reportCardMasts->work_education}} </th>
                      </tr>
                      <tr>
                        <th colspan="12">502-Health and Physical Education </th>
                        <th colspan="12">{{$reportCardMasts->health_phsl}} </th>
                      </tr>
                      <tr>
                        <th colspan="12">503- General Studies </th>
                        <th colspan="12">{{$reportCardMasts->art_education}}</th>
                      </tr>
                    </table><br>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6" >
                    <span><u>Attendance : -</u>&nbsp;&nbsp;
                    Total Working Days -</span> &nbsp;&nbsp; {{$reportCardMasts->total_working_day}}<br><br>
                    <span>Total Present Days:</span> &nbsp;&nbsp;{{$reportCardMasts->total_presentd_days}}<br><br>
                    <span>Class Teacher’s remark:</span>&nbsp;&nbsp; {{$reportCardMasts->remark}}<br><br>
                    <span>Promoted to class:</span>&nbsp;&nbsp; {{$reportCardMasts->prd_to_class}}<br><br>
                    <span>Place:</span>&nbsp;&nbsp; {{$reportCardMasts->place}}<br><br>
                    <span>Date:</span>&nbsp;&nbsp; {{$reportCardMasts->date}}<br><br>
                  </div> 
                </div> 

{{-- code for 12th class view report cart....................................... --}}
          @elseif($reportCardHeaders->std_class_from_id == 15 )
            <span align="center">SCHOLAR NO: ()</span><br>
            <div class="row">
              <div class="col-md-12">
                <table border="1" width="100%;">
                  <tr>
                    <th >Scholastic Areas:</th>
                    <th colspan="7" style="text-align: center;">Academic Year (100 Marks)</th>
                    {{-- <th  colspan="6">Term-2 (100 Marks)</th> --}}
                  </tr>
                  <tr>
                    <th>Sub Name and Code</th>
                    {{-- {{$reportCardHeaders->report_card_headre}} --}}
                    @foreach($reportCardHeaders->report_card_headre as $reportCardHeader)
                      <td >{{$reportCardHeader->header_title}}</td>
                    @endforeach 
                    <?php $count = count($reportCardHeaders->report_card_headre); ?>
                    @foreach($getClasses->assignsubject as $getClass)
                      @foreach($getClass->assign_subjectId as $getClassesss)
                        <tr>
                          <td style="width: 15%;">{{$getClassesss->subject->subject_name}}</td>
                            @foreach($reportCardMasts->report_card as $report_cards)
                               @if($getClassesss->subject->id == $report_cards->subject_id)
                                  <td>{{$report_cards->marks_grade}} </td>
                                @endif
                            @endforeach
                        </tr>
                      @endforeach
                    @endforeach
                  </tr>
                  <tr>
                    <th>Total</th>
                    <th colspan="6" style="margin-left: 50px;">{{$reportCardMasts->grand_total}}</th>
                  </tr>
                </table>
              </div><br><br>
            </div>
            <div class="row">
              <div class="col-md-8 mt-4">
                <table border="1" style="width: 100%; height: 100%;">
                  <tr>
                    <th colspan="12">Grading of Internal Assessment  (Don’t show to Student )</th>
                  </tr>
                  <tr>
                    <th colspan="4">Subjct </th>
                    <th colspan="4">Grade </th>
                  </tr>
                  <tr>
                    <th colspan="4">Work Education (500) </th>
                    <th colspan="4">{{$reportCardMasts->work_education}}</th>
                  </tr>
                  <tr>
                    <th colspan="4">Health and Phy. Edu (502) </th>
                    <th colspan="4">{{$reportCardMasts->health_phsl}}</th>
                  </tr>
                  <tr>
                    <th colspan="4">General Studies (503 </th>
                    <th colspan="4">{{$reportCardMasts->art_education}} </th>
                  </tr>
                </table><br>
              </div>
            
              <div class="col-md-4 mt-4" style="border: solid;">
              <span><u>Attendance : -</u></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$reportCardMasts->attendance}}<br><br>
              <span>1. Total Working Days -</span> &nbsp;&nbsp; {{$reportCardMasts->total_working_day}}<br><br>
              <span>2. Total Present   Days - –</span>&nbsp;&nbsp; {{$reportCardMasts->total_presentd_days}}<br><br>
              </div>
            </div>
            
           <div class="row  mt-4">
              <div class="col-md-6">
                <span>Class Teacher’s remark:</span>&nbsp;&nbsp; {{$reportCardMasts->remark}}<br><br>
                <span>Place:</span>&nbsp;&nbsp; {{$reportCardMasts->place}}<br><br>
                <span>Date:</span>&nbsp;&nbsp; {{$reportCardMasts->date}}<br><br>
              </div>
            </div> 
           {{--  <div class="row  mt-4">
              <div class="col-md-6">
                <span>Class Teacher’s remark:</span>&nbsp;&nbsp; {{$reportCardMasts->remark}}<br><br>
                <span>Promoted to class:</span>&nbsp;&nbsp; {{$reportCardMasts->prd_to_class}}<br><br>
                <span>Place:</span>&nbsp;&nbsp; {{$reportCardMasts->place}}<br><br>
                <span>Date:</span>&nbsp;&nbsp; {{$reportCardMasts->date}}<br><br>
              </div>
            </div> --}}

          @endif

          <hr >
          <div class="row">
            <div class="col-md-12">
              <span>Grading Scale for Scholastic Areas: Grades are awarded on  8 –point grading scale as follows-</span>
                <table border="1" align="center" width="60%;">
                  <tr>
                    <th>Marks Range</th>
                    <th>Grade</th>
                  </tr>
                  <tr>
                    <td>91-100</td>
                    <td>A1</td>
                  </tr>
                  <tr>
                    <td>81-90</td>
                    <td>A2</td>
                  </tr>
                  <tr>
                    <td>71-80</td>
                    <td>B1</td>
                  </tr>
                  <tr>
                    <td>61-70</td>
                    <td>B2</td>
                  </tr>
                  <tr>
                    <td>51-60</td>
                    <td>C1</td>
                  </tr>
                  <tr>
                    <td>41-50</td>
                    <td>C2</td>
                  </tr>
                  <tr>
                    <td>33-40</td>
                    <td>D</td>
                  </tr>
                  <tr>
                    <td>32 and below</td>
                    <td>E (Needs improvement )</td>
                  </tr>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div> 

 @endsection
