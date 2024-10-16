@extends('layouts.main')
 @section('content')

   <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Class Wise Time Table<h4 class="panel-title">  <a href="{{route('class-wise-time-table.create')}}" class="btn btn-success pull-right btn-sm">Add Class Time Table</a><a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm">Back</a></h4></h6>
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
                <th>Class Name</th>
                <th>Class Teachers</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $count = 1; ?>
              @foreach($classWiseTimeTables as $classWiseTimeTable)
             <tr>
               <td>{{$count++}}</td>
               <td>{{$classWiseTimeTable->get_class->class_name}}</td>
               <td>{{$classWiseTimeTable->get_class_teacher ? $classWiseTimeTable->get_class_teacher->username : ''}}</td>
               <td> 

                <a href="{{route('class-wise-time-table.edit',$classWiseTimeTable->class_tt_mast_id)}}" class="mr-2"><i class=" fa fa-pencil text-success" style="font-size: 16px;"></i></a>

                <a href="{{route('class-wise-time-table.show',$classWiseTimeTable->class_tt_mast_id)}}"  ><i class=" fa fa-eye text-primary" style="font-size: 16px;"></i></a>
                <a href=""  ><i class=" fa fa-print text-primary" style="font-size: 16px;"></i></a>
                </td>

             </tr>
               @endforeach
            </tbody>
        </table> 
    </div>
  </div>
  </div>


 @endsection