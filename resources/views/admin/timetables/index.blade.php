@extends('layouts.main')
 @section('content')
<div id="content">

<div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Time Table<h4 class="panel-title">  <a href="{{route('time-table.create')}}" class="btn btn-success pull-right btn-sm">Add Time Table</a><a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm">Back</a></h4></h6>
          </div>
          <div class="app-title full-right">
           @if($message = Session::get('success'))   
              <div class="alert alert-success">{{ $message }}</div>
           @endif
          <!-- Card Body -->
          <div class="card-body">
            {{-- {{dd($examTimeTableMast)}} --}}
            <table class="table table-striped table-bordered mytable">
               <thead>
                  <tr>
                    <th>#</th>
                    <th>Exam Name</th>
                    <th>Class From</th>
                    <th>Class to</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Reporting Time</th>
                    <th>Examination From Time</th>
                    <th>Examination To Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $count = 1; ?>
                  @foreach($examTimeTableMast as $examTimeTableMasts)
                 <tr>
                   <td>{{$count++}}</td>
                   <td>{{$examTimeTableMasts->name}}</td>
                   <td>{{$examTimeTableMasts->get_from_class['class_name']}}</td>
                   <td>{{$examTimeTableMasts->get_to_class['class_name']}}</td>
                   <td>{{$examTimeTableMasts->start_dt}}</td>
                   <td>{{$examTimeTableMasts->end_dt}}</td>
                   <td>{{$examTimeTableMasts->reporting_time}}</td>
                   <td>{{$examTimeTableMasts->exam_from_time}}</td>
                   <td>{{$examTimeTableMasts->exam_to_time}}</td>
                   <td>

                    <a href="{{route('time-table.edit',$examTimeTableMasts->time_id)}}" class="mr-2"><i class=" fa fa-pencil text-success" style="font-size: 16px;"></i></a>

                    <a href="{{route('time-table.show',$examTimeTableMasts->time_id)}}"  ><i class=" fa fa-eye text-primary" style="font-size: 16px;"></i></a>
                    </td>

                 </tr>
                   @endforeach
                </tbody>
            </table> 
        </div>
      </div>
    </div>
</div>



 @endsection