 @extends('layouts.main')
 @section('content')
<div class="container">
  <div class="app-title">
    @if($message = Session::get('success'))
      <div class="alert alert-success">
        {{ $message }}
      </div>
    @endif
  </div>
  <div class="row mt-2">
    <div class="col-lg-12">
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
                  <form action="{{route('sent-to-all-update',$getAllSendData->id)}}" method="post" role="form" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                   <label class="red">*</label>   
                   <label for="circulartitle">Title</label>
                    <input class="form-control" type="text" value="{{$getAllSendData->circular_title}}" name="circular_title">
                    <input class="form-control" type="hidden" id="circular_id" name="circular_id" value="{{$getAllSendData->id}}" readonly="" >
                   <input class="form-control" type="hidden" id="role" name="role" value="Admin" readonly="">
                </div>
                 <div class="col-md-4">
                    <label class="red">*</label>
                    <label for="diaplaydate">Date to be From displayed</label>
                    <div class="input-icon datetime-pick date-only">
                      <div class="">
                            <input class="form-control" type="text" value="{{$getAllSendData->date_from_display}}" name="date_from_display">
                           
                        </div>
                      
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="red">*</label>
                    <label for="diaplaydate">Date to be To displayed</label>
                    <div class="input-icon datetime-pick date-only">                    
                      <div class="">
                          <input class="form-control" type="text" value="{{$getAllSendData->date_to_display}}" name="date_to_display">
                      </div>
                    </div>
                </div>
                  <div class="col-md-12">
                    <label for="circulardescription">Description</label>
                     <input class="form-control" type="text" value="{{$getAllSendData->circular_description}}" name="circular_description">
                  </div>
                <div class="col-md-4 mt-2">
                     <input class="btn btn-primary" type="submit" value="Update">
                </div>
              </form>
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
