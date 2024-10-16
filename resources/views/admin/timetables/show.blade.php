@extends('layouts.main')
 @section('content')
<div id="content">

<div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Show Time Table<h4 class="panel-title">  <a href="{{route('time-table.create')}}" class="btn btn-success pull-right btn-sm">Add Time Table</a><a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm">Back</a></h4></h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                  <img src="{{ asset('frontend-logos/LIS_Logo-1.png')}}" width="150px;" height="100px;">
              </div>
              <div class="col-md-8">
                
                  <strong>LAKSHYA INTERNATION SCHOOL,NAGDA <br> ANNUALEXAMINATION,2020-21 <br>
                  <span align="center">TIME TABLE</span><br>CLASS:- <u>{{$timeTabale->get_from_class->class_name}}&nbsp;  To &nbsp; {{$timeTabale->get_to_class->class_name}}</u></strong>

              </div>
              <hr>
            </div>
             <div class="row mt-5">
                    <div class="col-md-6 mt-2" >
                        <b>Name : </b>{{$timeTabale->name}}
                    </div>
                    <div class="col-md-6 mt-2">
                        <b>Class :</b> <u>{{$timeTabale->get_from_class->class_name}}&nbsp;  --To-- &nbsp; {{$timeTabale->get_to_class->class_name}}</u>
                    </div>
                    
                    <div class="col-md-6 mt-2">
                          <b>Reporting Time :</b> {{$timeTabale->reporting_time}}
                    </div>
                    <div class="col-md-6 mt-2">
                         <b>Examination Time :</b> {{$timeTabale->exam_from_time}}
                        
                    </div> 
                    <div class="col-md-6 mt-2">
                          <b>Departure Time :</b> {{$timeTabale->deprature_time}}
                    </div>
                    <div class="col-md-6 mt-2">
                         <b>Lunch Time :</b> {{$timeTabale->lunch_from_time}} - To - {{$timeTabale->lunch_to_time}}
                        
                    </div>
                    
                    <div class="col-md-6 mt-2">
                        <b>Start Date : </b>{{$timeTabale->start_dt}}
                    </div>
                    <div class="col-md-6 mt-2">
                        <b>End Date : {{$timeTabale->end_dt}}</b>
                          
                    </div>
                    <div class="col-md-6 mt-2">
                     
                      <b>Remark : </b>{{$timeTabale->remark}}
                       
                    </div>
                  </div>
                  <div class="timeTabaleShow mt-3">
                      <table class="table table-striped table-bordered mytable1">
                         <thead>
                            <tr>
                              <th>Class Name</th>
                              <?php $date = []; ?>
                               @foreach($examTimeTableMast as $class)

                                @foreach($class->get_time_table as $dates)
                                  <?php 
                                     if(!in_array($dates->date, $date)){
                                      $date[] = $dates->date

                                  ?>
                                    <th>{{$dates->date}}</th> 
                                  <?php } ?>
                                
                                @endforeach
                              @endforeach
                              
                            </tr>
                          </thead>
                          <tbody>
                            <?php $classData = []; ?>
                            @foreach($examTimeTableMast as $class)
                              @foreach ($class->get_time_table as $subjectsClass) 
                                <?php 
                                    $classData[$subjectsClass->get_class->class_name][] = $subjectsClass->get_subject?$subjectsClass->get_subject->subject_name:'';                       
                                ?>
                              @endforeach
                            @endforeach         
                            @foreach($classData as $key => $value)
                            <tr>
                              <td>{{$key}}</td>
                              @foreach($value as $key => $sub)                  
                                <td>{{$sub ? $sub : ''}}</td>                    
                              @endforeach
                            </tr>
                            @endforeach    

                          </tbody>
                      </table> 
                </div>
        
        </div>
      </div>
    </div>
</div>



 @endsection