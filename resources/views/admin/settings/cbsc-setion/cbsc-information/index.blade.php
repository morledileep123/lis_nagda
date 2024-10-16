@extends('layouts.main')
 @section('content')
<div id="content">
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Add CBSC Section-information<h4 class="panel-title"> 
         <a href="{{ route('settings_cbscsection_dashboard') }}" class="btn btn-primary btn-sm pull-right ">Back</a>
         <a href="{{ route('settings-cbscsection-information.create') }}" class="btn btn-success fa fa-plus btn-sm pull-right ">Add Section-information</a>
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
                <th>Title</th>
                <th>File</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php $i=1; @endphp
              @foreach($cbscInfoDatas as $cbscInfoData)
                <tr>
                  <td>{{ $i++}}</td>
                  <td>{{ $cbscInfoData->cbsc_info_title}}</td>
                  <td>
                    @if($cbscInfoData->cbsc_info_file !=null)
                        <a href="{{asset('storage/'.$cbscInfoData->cbsc_info_file)}}" target="_blank">{{file_name($cbscInfoData->cbsc_info_file)}}</a>
                    @else <p>Not Uploaded</p>
                    @endif</td>
                  <td> 
                    <a  href="{{ route('settings-cbscsection-information.edit',$cbscInfoData->cbsc_info_id) }}"  ><i class="fa fa-pencil-square-o text-success"></i></a>
                    <a  href="{{ route('settings-cbscsection-information.show',$cbscInfoData->cbsc_info_id) }}"  ><i class="fa fa-eye text-primary"></i></a>
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