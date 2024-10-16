@extends('layouts.main')
 @section('content')
<div id="content">
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Footer<h4 class="panel-title"> 
         <a href="{{ url('settings-footer') }}" class="btn btn-primary btn-sm pull-right ">Back</a>
       </h4></h6>
      </div>
      <div class="app-title full-right ">
         @if($message = Session::get('success'))   
            <div class="alert alert-success col-md-6">{{ $message }}</div>
         @endif
             <div class="card-body">
                <form action="{{route('settings-footer.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="row">
                      <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                          <label for="heading"> Heading</label>
                          <input type="text" name="heading" id="heading" class="form-control " value="{{old('heading')}}" required="">
                          @error('heading')
                              <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div> 
                      <div class="col-md-12 col-xl-12 col-sm-12" style="border:1px solid #eee9e9; " id="footer_setting" ></div>

                       <div class="col-md-12 col-sm-6 col-lg-12 form-group">
                          <label for="description"> Description</label>
                         <textarea id="footer_des" name="footer_des" class="form-control ckeditor" placeholder="Write your message..">{{old('footer_des')}}</textarea>
                          @error('footer_des')
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
  var footer_setting  = 0;
  @if(old('relation') !=null)
    @if(count(old('relation')) !=0)
      var footer_setting = {{count(old('relation')) }};
      
    
    @endif
  @endif
  
  var k =0;

  var html_div ='<div class="form-group row relation"><div class="col-sm-6 form-group col-md-6 col-xs-6 "><label class="">Footr Image <strong class="text-danger">*</strong></label><input  type="file" class="form-control" name="footer_image[]" /></div><div class="col-md-6 col-sm-6 form-group col-xs-6 "><label class="">Footer Title <strong class="text-danger">*</strong></label><input  type="text" class="form-control" placeholder="Entertitle" name="image_title[]" accept="image/*"/></div><input type="hidden" name="g_check[]" class="g_photo" value=""><input type="hidden" name="g_id[]" value=""></div><hr></div>';

  // for(var z = 0; z < footer_setting; z++){
    $('#footer_setting').append('<div id="row'+k+'"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-success " style="margin:10px 10px 0px 0px" id="add_footer"><i class="fa fa-plus"></i> Add More</a></div></div>'+html_div+'</div>');

  // }
    
  k++;
  function footer_setting_fn(){
    $('#footer_setting').append('<div id="row'+k+'"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-danger btn_remove" style="margin:10px 10px 0px 0px" id="'+k+'"><i class="fa fa-minus"></i></a></div></div>'+html_div+'</div>');
    k++;
  }


    $('#add_footer').click(function(e){
      e.preventDefault();
      footer_setting_fn();
      
    });

    if(footer_setting !=0){

      for(var z=1; z<footer_setting ; z++){
      footer_setting_fn();
      }
  } 

    $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id");
    //alert(button_id); 
    $('#row'+button_id+'').remove();
  });
});
</script>
@endsection