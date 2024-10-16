 @extends('layouts.main')
 @section('content')

<div class="container">
   <div class="col-lg-12">
    @include('admin.master.header')
      <div class="container">
        <div class="row mt-2">
          <div class="col-lg-12">
            
           <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"> Student Sections </h6>
                <a href="{{ URL::previous() }}" class="btn btn-sm btn-success pull-right" >Back</a>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="row">
                  <div class="container">
                    <div class="card-body">
                      <div class="col-md-12">
                          <div class="panel panel-default">
                            <div class="panel-body">        
                              <div class="row">
                                <div class="col-md-3 col-xs-6 col-sm-6 error-div">
                                  <label>Class</label><span class="text-danger">*</span>
                                  <select class="form-control" name="std_class_id" id="std_class_id"> 
                                    <option value="">Select Class</option>

                                    @foreach($classes as $key=>$class)
                                      <option value="{{$class->id}}">{{$class->class_name}}</option>
                                    @endforeach
                                  </select>
                                  @error('std_class_id')
                                      <span class="text-danger">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>                
                                <div class="col-md-3">
                                  <label>Batch</label>
                                  <span class="text-danger">*</span>
                                  <select class="form-control" name="batch_id" id="batch_id">
                                    <option value="">Select Batch</option>
                                    @foreach($batches as $key=>$batch)
                                      <option value="{{$batch->id}}">{{$batch->batch_name}}</option>
                                    @endforeach
                                     
                                  </select>
                                  @error('batch_id')
                                      <span class="text-danger">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                                
                                <div class="col-md-3">
                                  <label>Section</label>
                                  <span class="text-danger">*</span>
                                  <select name="section_id[]" class="form-control select2" id="section_id">
                                    <span class="text-danger">*</span>
                                    <option value="">Select section</option> 
                                    @foreach($sections as $key=>$section)
                                      <option value="{{$section->id}}">{{$section->section_name}}</option>
                                    @endforeach
                                  </select>
                                  @error('section_id')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-md-2 show_result" >
                                  <button class="btn btn-sm btn-primary" id="insertData" style="margin-top: 33px;">Save</button>
                                </div>

                                 <div class="col-md-6 ass_deassign" style="display: none;">
                                  <label> Un-Assigned Students </label>
                                  <span class="text-danger">*</span>
                                  <select name="un_assign_std_id[]" class="form-control select2" id="un_assign_std_id" multiple>
                                    <span class="text-danger">*</span>
                                    
                                  </select>
                                </div> 
                                <div class="col-md-6 ass_deassign" style="display: none;">
                                  <label> Assigned Students </label>
                                  <span class="text-danger">*</span>
                                  <select name="assign_std_id[]" class="form-control select2" id="assign_std_id" multiple>
                                </div>
                              </div>
                          </div>
                          <br>
                        </div>

                    </div>
                  </div>
              </div>
            </div>
        </div>
      
    </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $('.mytable').DataTable();

  $(document).ready(function(){

      var sectionArr = new Array();
      var sectionNameArr = new Array();
      $('#batch_id').on('change', function(){
        $('.ass_deassign').show();
      })

    $('#section_id').on('change', function(){   
      var course = $("#std_class_id").val();
      var batch = $("#batch_id").val();
      var section_id = $("#section_id").val();
      
      var section = sectionArr;
      var sectionName = sectionNameArr;
      
      $.ajax({
              type: "POST",
              url: "{{route('get_students_list')}}",
              data: {
                  course_id: course,
                  batch_id : batch,
                  section_id :section_id,
                  section_name:sectionName,
                  "_token": "{{ csrf_token() }}"
              },
              success: function(res){
                $('#assign_std_id option').remove();
                $.each(res,function(key,value){
                if(value){  
                $("#assign_std_id").append('<option value="'+value.id+'">'+value.f_name+value.l_name+'</option>');
              }else{
                $("#assign_std_id").append('<option value=""></option>');
              }
            });
              }
          })
            
  });

  $("#insertData").on('click',function(){

      section_id  = $("#section_id").val();
      batch_id    = $("#batch_id").val();
      course_id   = $("#std_class_id").val();
      assign_student = $("#assign_std_id").val();
      un_assign_student = $("#un_assign_std_id").val();
      if(section_id !=''  && batch_id !='' && course_id != ''&& assign_student != null){
          $.ajax({
          type:'POST',
          url: "{{route('assign_student_to_section')}}",
          data: {
              course_id: course_id,
              batch_id : batch_id,
              section_id :section_id,
              assign_student:assign_student,
              un_assign_student:un_assign_student,
              "_token": "{{ csrf_token() }}"},
             success:function(res){
              alert(res);
              location.reload();

          }
        });
      }else{
        alert('please select all fields')
      }
    });
    $('body').on('click','.selectAll' ,function(){  
      // console.log('select');
       if ($(this).is( ":checked" )) {
        $('body .check').prop('checked',true);

       }else{
        $('body .check').prop('checked',false);
       }
    });
    
  });
</script>
 @endsection('content')


