 @extends('layouts.main')
 @section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">
      @include('admin.teachers.header')
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-lg-12">

      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
        <h4 class="header-title">Assign Subejct</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">                
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                        <select autocomplete="off" class="form-control" name="std_class_id" id="std_class_id"> 
                          <option value="">Select Class</option>
                            @foreach($classes as $key=>$class)
                              <option value="{{$class->id}}">{{$class->class_name}}</option>
                            @endforeach
                          </select>
                         
                        </div>                
                        <div class="col-md-3">
                          <select autocomplete="off" class="form-control" name="batch_id" id="batch_id">
                           
                            </select>
                    
                        </div>
                        
                        <div class="col-md-3">
                          <select autocomplete="off" class="form-control" name="section_id" id="section_id"> 
                          </select>
                        
                        </div> 
                        <div class="col-md-3 col-xs-6 col-sm-6 form-group">
                            <select class="form-control required" name="medium" id="medium_id" required="medium" autocomplete="off">
                              
                            </select>                            
                        </div>
                         
                        <div class="col-md-3">
                          <select autocomplete="off" class="form-control" name="teacher_id" id="teacher_id"> 
                            <option value="">Select Teacher</option>
                            @foreach($teachers as $teacher)
                              <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @endforeach
                          </select>
                          
                        </div>
                         </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="row subjects_show mt-4" style="display: none">
                    <div class="col-md-6">
                        <label>All Subjects </label>
                        <span class="text-danger">*</span>
                          <select name="all_subject_id[]" class="form-control select2" multiple="multiple" id="all_subject_id">
                          @foreach($subject as $subjects)
                            <option value="{{$subjects->id}}">{{$subjects->subject_name}}</option>
                          @endforeach
                        </select>                      
                      </div>
                      <div class="col-md-6">
                        <label> Assigned Subjects  </label>
                          <select name="assigned_subject_id[]" class="form-control select2" multiple="multiple" id="assigned_subject_id" readonly>
                         
                        </select>                    
                      </div>
                      <div class="col-md-12">
                          <button class="btn btn-sm btn-success pull-right" id="btnSubmit">Submit</button>
                      </div>
                </div>                        
                    
            </div>              
          </div>
        </div>
      </div>
</div>

@include('layouts.common')
<script>
  $(document).ready(function(){
  
   $(document).on('change','#teacher_id' ,function(){ 
       var teacher_id = $(this).val();
       var class_id = $('#std_class_id').val();
       var batch_id = $('#batch_id').val();
       var section_id = $('#section_id').val();
       var medium = $('#medium_id').val();

          if(teacher_id !=''&& class_id !=''&& batch_id !=''&& section_id !='' && medium !=''){
            $.ajax({
              type:'POST',

              url: "{{route('get_subject_assign_to_teacher')}}",
              data: {teacher_id:teacher_id,class_id:class_id,section_id:section_id,batch_id:batch_id,medium:medium, "_token": "{{ csrf_token() }}",},
              success:function(res){

                $("#assigned_subject_id").empty();
                // $("#assigned_subject_id").append('<option>Select</option>');
                $.each(res,function(key,value){
                  $("#assigned_subject_id").append('<option value="'+value.id+'">'+value.subject_name+'</option>');
                });
              }
            });
          }else{
            $.notify("Please select all option field");

          }
        $('.subjects_show').show();
    });

    $('#btnSubmit').on('click',function(e){
        e.preventDefault();

       var all_subject_id = $('#all_subject_id').val();

       var class_id = $('#std_class_id').val();
       var batch_id = $('#batch_id').val();
       var section_id = $('#section_id').val();
       var teacher_id = $('#teacher_id').val();
        var medium = $('#medium_id').val();
      if(teacher_id !=''&& class_id !=''&& batch_id !=''&& section_id !=''&& all_subject_id !='' && medium !=''){
        $.ajax({
          type:'POST',

          url: "{{route('assign_subject_to_teacher')}}",
          data: {teacher_id:teacher_id,all_subject_id: all_subject_id,batch_id: batch_id,class_id: class_id,section_id: section_id,medium:medium, "_token": "{{ csrf_token() }}",},
          success:function(res){
            $.notify("Subject Assigned Successfully",'success');
             location.reload();
          }
        });
      }else{
        $.notify("Please select all options field");

      }

    });
  });
</script>
 @endsection
