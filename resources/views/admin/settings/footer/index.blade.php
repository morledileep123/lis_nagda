@extends('layouts.main')
 @section('content')
<div id="content">
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Footer<h4 class="panel-title"> 
         <a href="{{ url('settings-dasboard') }}" class="btn btn-primary btn-sm pull-right ">Back</a>
         <a href="{{ route('settings-footer.create') }}" class="btn btn-primary btn-sm pull-right ">Add Footer</a>
       </h4></h6>
      </div>
      <div class="app-title full-right ">
         @if($message = Session::get('success'))   
            <div class="alert alert-success col-md-6">{{ $message }}</div>
         @endif
      <div class="card-body">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Heading</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              @php $i=1; @endphp
              @foreach($footerDatas as $footerData)
                <tr>
                  <td>{{ $i++}}</td>
                  <td>{{ $footerData->heading}}</td>

                  <td> 
                    <a  href="{{ route('settings-footer.edit',$footerData->footer_id) }}"  ><i class="fa fa-pencil-square-o text-success"></i></a>&nbsp;
                    <a  href="{{ route('settings-footer.show',$footerData->footer_id) }}"  ><i class="fa fa-eye text-success"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table> 
      </div>
    </div>
  </div>
  <script type="text/javascript" src="http://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

@endsection