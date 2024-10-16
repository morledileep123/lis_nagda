@extends('layouts.main')
 @section('content')
<div id="content">
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Page<h4 class="panel-title"> 
         <a href="{{ url('settings-pages') }}" class="btn btn-primary btn-sm pull-right ">Back</a>
       </h4></h6>
      </div>
      <div class="app-title full-right ">
         @if($message = Session::get('success'))   
            <div class="alert alert-success col-md-6">{{ $message }}</div>
         @endif
             <div class="card-body">
                <form action="{{route('settings-pages.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="row">
                      <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                          <label for="page_title"> Page Name</label>
                          <input type="text" name="page_title" id="page_title" class="form-control " value="{{old('page_title')}}" required="">
                          @error('heading')
                              <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div> 
                      <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                          <label for="page_url"> Page URL</label>
                          <input type="text" name="page_url" id="page_url" class="form-control " value="{{old('page_url')}}" required="">
                          @error('page_url')
                              <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>  
                      
                      <div class="col-md-12 col-xl-12 col-sm-12" style="border:1px solid #eee9e9; " id="add_page_image" ></div>
                      <div class="col-md-12 col-xl-12 col-sm-12" style="border:1px solid #eee9e9; " id="add_sub_page" ></div>

                       <div class="col-md-12 col-sm-6 col-lg-12 form-group">
                          <label for="description"> Description</label>
                         <textarea id="page_des" name="page_des" class="form-control ckeditor" placeholder="Write your message..">{{old('page_des')}}</textarea>
                          @error('page_des')
                              <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button  class="btn btn-primary btn-sm" type="submit" id="btnSubmit">Submit</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   </div>
  <script type="text/javascript" src="http://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
  $(document).ready(function() {
  var add_page_image  = 0;
  @if(old('page_images1') !=null)
    @if(count(old('page_images1')) !=0)
      var add_page_image = {{count(old('page_images1')) }};
      
    
    @endif
  @endif
  
  var k =0;

  var html_div ='<div class="form-group row page_images1"><div class="col-md-6 col-sm-6 form-group col-xs-6 "><label class="">Page Images <strong class="text-danger">*</strong></label><input  type="file" class="form-control" placeholder="Image title" name="page_images[]"/></div><div class="col-md-6 col-sm-6 form-group col-xs-6 "><label class="">Image Title <strong class="text-danger">*</strong></label><input  type="text" class="form-control" placeholder="Image title" name="image_title[]"/></div><input type="hidden" name="page_id[]" value=""></div><hr></div>';

  // for(var z = 0; z < add_page_image; z++){
    $('#add_page_image').append('<div id="row'+k+'"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-success " style="margin:10px 10px 0px 0px" id="add_image"><i class="fa fa-plus"></i> Add More</a></div></div>'+html_div+'</div>');

  // }
    
  k++;
  function add_page_image_fn(){
    $('#add_page_image').append('<div id="row'+k+'"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-danger btn_remove" style="margin:10px 10px 0px 0px" id="'+k+'"><i class="fa fa-minus"></i></a></div></div>'+html_div+'</div>');
    k++;
  }


    $('#add_image').click(function(e){
      e.preventDefault();
      add_page_image_fn();
      
    });

    if(add_page_image !=0){
      for(var z=1; z<add_page_image ; z++){
      add_page_image_fn();
      }
  } 

    $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id");
    $('#row'+button_id+'').remove();
  }); 

var add_sub_page  = 0;
  @if(old('sub_page_name') !=null)
    @if(count(old('sub_page_name')) !=0)
      var add_sub_page = {{count(old('sub_page_name')) }};
      
    
    @endif
  @endif
  
  var j =0;

  var html_div_two ='<div class="form-group row sub_page_name"><div class="col-sm-6 form-group col-md-6 col-xs-6 "><label class="">Sub-Page Name <strong class="text-danger">*</strong></label><input  type="text" class="form-control"placeholder="Sub page name" name="sub_page_name[]" /></div><div class="col-md-6 col-sm-6 form-group col-xs-6 "><label class="">Sub Page URL <strong class="text-danger">*</strong></label><input  type="text" class="form-control" placeholder="Enter sub page url" name="sub_page_url[]" required/></div><input type="hidden" name="sub_page_id[]" class="sub_page_id" value=""></div><hr></div>';

  // for(var z = 0; z < add_sub_page; z++){
    $('#add_sub_page').append('<div id="row'+j+'"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-success " style="margin:10px 10px 0px 0px" id="add_page"><i class="fa fa-plus"></i> Add More</a></div></div>'+html_div_two+'</div>');

  // }
    
  j++;
  function add_sub_page_fn(){
    $('#add_sub_page').append('<div id="row'+j+'"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-danger page_remove_two" style="margin:10px 10px 0px 0px" id="'+j+'"><i class="fa fa-minus"></i></a></div></div>'+html_div_two+'</div>');
    j++;
  }


    $('#add_page').click(function(e){
      e.preventDefault();
      add_sub_page_fn();
      
    });

    if(add_sub_page !=0){
      for(var x=1; x<add_sub_page ; x++){
      add_sub_page_image_fn();
      }
  } 

    $(document).on('click', '.page_remove_two', function(){
    var button_id_two = $(this).attr("id");
    $('#row'+button_id_two+'').remove();
  });

});
</script>
@endsection