@extends('layouts.main')
 @section('content')
<div id="content">
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">SlideBar<h4 class="panel-title"> 
         <a href="{{ url('settings-dasboard') }}" class="btn btn-primary btn-sm pull-right ">Back</a>
         <button type="button" class="btn btn-success btn-sm pull-right  fa fa-plus addSlidebar" >Add Header</button> </h4></h6>
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
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php $i=1; @endphp
              @foreach($slidebarImages as $slidebarImage)
                <tr>
                  <td>{{ $i++}}</td>
                  <td><img src="{{asset($slidebarImage->slidebar_image !=null ? 'storage/'.$slidebarImage->slidebar_image : 'img/student_demo.png')}}" style="width: 100px; height: 100px;"></td>
                  <td> 
                      <form method="post" action="{{ route('settings-slidebar.destroy',$slidebarImage->slider_bar_id) }}">
                        @csrf
                        @method('DELETE')
                             
                        <a class="editSlidebar" id="{{$slidebarImage->slider_bar_id}}" data-slidebar_image="{{$slidebarImage->slidebar_image}}" ><i class="fa fa-pencil-square-o text-success"></i></a>
                        <button  onclick="return confirm(' you want to delete?');"><i><i class="fa fa-trash text-danger"></i></i>
                         </button>
                      </form>
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
                <h4 class="modal-title">Add SlideBar</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('settings-slidebar.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="row">
                      <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                          <label for="slidebar_image"> Image</label>
                          <input type="file" name="slidebar_image" id="slidebar_image" class="form-control "  readonly="readonly" value="">
                          @error('slidebar_image')
                              <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                          <input type="hidden" name="flag" value="{{old('flag') ?? 'add'}}"  >
                          <input type="hidden" name="slider_bar_id" value="" value="{{old('slider_bar_id')}}">
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

    $('.addSlidebar').on('click',function(e){
        e.preventDefault();
        $('input[name="flag"]').val('add');
        $('input[name="slider_bar_id"]').val('');
        $('.modal-title').html('Add Batch');
        $('#slidebar_image').val('');
        $('#slidebarModal').modal('show');

    });
    $('.modalClose').on('click',function(e){
        e.preventDefault();
        $('#slidebarModal').modal('hide');
    });
    $('.editSlidebar').on('click',function(e){
        e.preventDefault();
        $('.modal-title').html('Edit Batch');
        $('input[name="flag"]').val('edit');
        $('input[name="slider_bar_id"]').val($(this).attr('id'));
        // $('#slidebar_image').val($(this).val('slidebar_image'));

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