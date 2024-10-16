 @extends('layouts.main')
 @section('content')
<div class="container">
  <div class="card mb-4">
    <div class="card-header">
        <div class="panel-heading">
          <h4 class="panel-title">Notice & Circular <a href="{{ URL::previous() }}" class="btn btn-sm btn-primary pull-right "> Back</a></h4>
        </div>
        </div>
          <div class="card-body">
            <div class="panel panel-default">
              <div class="row">
                <div class="col-md-4">
                   <label class="red">*</label>   <label for="circulartitle">Title</label>
                    <input class="form-control" type="text" value="{{$getAllSendData->circular_title}}" readonly="">
                </div>
                <div class="col-md-4">
                    <label for="diaplaydate">Date to be From displayed</label>
                    <div class="input-icon datetime-pick date-only">
                      <div class="">
                        <input class="form-control" type="text" value="{{$getAllSendData->date_from_display}}" readonly="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="diaplaydate">Date to be To displayed</label>
                    <div class="input-icon datetime-pick date-only">
                        <div class="">
                          <input class="form-control" type="text" value="{{$getAllSendData->date_to_display}}" readonly="">
                      </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="circulardescription">Description</label>
                     <input class="form-control" type="text" value="{{$getAllSendData->circular_description}}" readonly="">
                </div>  
            </div>
            <div class="row mt-3">
             <div class="col-md-12" id="all_data" >
                  <table class="table table-striped table-bordered mytable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th> Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $count = 1; @endphp
                      @foreach($getAllstudents as $student)
                      <tr>
                        <td>{{$count++}}</td>
                        <td>{{ $student->facultyInfo->username}}</td>
                        <td>{{ $student->facultyInfo->name }}</td>
                        <td> {{ $student->facultyInfo->email }}</td>
                        <td>{{ $student->facultyInfo->s_mobile }} </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table> 
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
</div>
<style >
    .mr{
      margin-right: 10px;
    }
  </style>
  <script >
    $('.mytable').DataTable({
      lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
      searching:true,
      scrolling:true,
    });
  </script>
 @endsection('content')
