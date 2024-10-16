@extends('layouts.main')
 @section('content')
<div id="content">
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">HeaderBar<h4 class="panel-title"> 
         <a href="{{ url('settings-dasboard') }}" class="btn btn-primary btn-sm pull-right ">Back</a>
         <button type="button" class="btn btn-success btn-sm pull-right  fa fa-plus addHeaderBar" >Add Header</button> </h4></h6>
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
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php $i=1; @endphp
              @foreach($headerbarDatas as $headerbarData)
                <tr>
                  <td> {{ $i++}}</td>
                  <td> {{$headerbarData->header_bar_email}}</td> 
                  <td> {{$headerbarData->header_bar_mobile}}</td> 
                  <td><a class="editSlidebar" id="{{$headerbarData->header_bar_id}}" header_email="{{$headerbarData->header_bar_email}}" header_mobile="{{$headerbarData->header_bar_mobile}}" ><i class="fa fa-pencil-square-o text-success"></i></a>
                     {{--  <form method="post" action="{{ route('settings-slidebar.destroy',$headerbarData->header_bar_id) }}">
                        @csrf
                        @method('DELETE')
                        <button  onclick="return confirm(' you want to delete?');"><i><i class="fa fa-trash text-danger"></i></i>
                         </button>
                      </form> --}}
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table> 
      </div>
    </div>
  </div>
  <div class="modal" id="slidebarModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Header Bar</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('settings-header-bar.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="row">
                      <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                          <label for="header_bar_email"> Email</label>
                          <input type="text" name="header_bar_email" id="header_bar_email" class="form-control "  value="{{old('header_bar_email')}}">
                          @error('header_bar_email')
                              <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div> 
                      <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                          <label for="header_bar_mobile"> Moble</label>
                          <input type="text" name="header_bar_mobile" id="header_bar_mobile" class="form-control "   value="{{old('header_bar_mobile')}}">
                          @error('header_bar_mobile')
                              <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                          <input type="hidden" name="flag" value="{{old('flag') ?? 'add'}}"  >
                          <input type="hidden" name="header_bar_id" value="" value="{{old('header_bar_id')}}">
                      </div>
                  </div>
            </div>
            <div class="modal-footer">
                <button  class="btn btn-primary btn-sm" type="submit" id="btnSubmit">Submit</button>
                <button type="button" class="btn btn-danger btn-sm modalClose" >Close</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<script >
$(document).ready(function(){

    $('.addHeaderBar').on('click',function(e){
        e.preventDefault();
        $('input[name="flag"]').val('add');
        $('input[name="header_bar_id"]').val('');
        $('.modal-title').html('Add Header Bar');
        $('#header_bar_email').val('');
        $('#header_bar_mobile').val('');
        $('#slidebarModal').modal('show');

    });
    $('.modalClose').on('click',function(e){
        e.preventDefault();
        $('#slidebarModal').modal('hide');
    });
    $('.editSlidebar').on('click',function(e){
        e.preventDefault();
        $('.modal-title').html('Edit Header Bar');
        $('input[name="flag"]').val('edit');
        $('input[name="header_bar_id"]').val($(this).attr('id'));
        $('input[name="header_bar_email"]').val($(this).attr('header_email'));
        $('input[name="header_bar_mobile"]').val($(this).attr('header_mobile'));
        // alert($(this).attr('data-header_email'))
        // $('#header_bar_email').val($(this).val('header_bar_email'));
        // $('#header_bar_mobile').val($(this).val('header_bar_mobile'));

        $('#slidebarModal').modal('show');
    });

    @if($message = Session::get('success'))
        alert("{{$message}}")
    @endif


    @if($errors->any())
         $('#slidebarModal').modal('show');     
    @endif

})
</script>

@endsection