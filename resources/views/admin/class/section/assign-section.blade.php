@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('admin.master.header')
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Assign Section
                        <a href="{{route('subject_assign')}}" class="btn btn-sm btn-primary pull-right">Back</a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                            <label>Class <span class="text-danger">*</span></label>
                            <select class="form-control" name="std_class_id[] " id="std_class_id" multiple="" autocomplete="off"> 
                                {{-- <option value="">Select Class</option> --}}
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
                        <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                            <label>Batch <span class="text-danger">*</span></label>
                            
                            <select class="form-control" name="batch_id[]" id="batch_id" multiple="" autocomplete="off">
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
                        <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                            <label>Section <span class="text-danger">*</span> </label>
                            <select name="section_id[]" class="form-control select2" multiple="multiple" id="section_id" autocomplete="off">                              
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
                        <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                            <button class="btn btn-sm btn-primary mt-2" id="btnFilter">Show Selected List</button>
                        </div>
                    </div>
                    <div class="row" style="display: none" id="sectionDiv">
                        <div class="col-md-12" >
                            <h5 class="mb-4">Show Selected Class-Batch-Section</h5>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Class Name</th>
                                        <th>Batch Name</th>
                                        <th>Section Name</th>                                        
                                    </tr>
                                </thead>
                                <tbody class="sectionTBody">
                                
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-sm btn-success pull-right" id="insertSaveSection" >Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Assign Section List</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered mytable">
                        <thead>
                          <tr>
                            <th>Section ID</th>
                            <th>Class Name</th>
                            <th>Batch Name</th>
                            <th>Section Name</th>
                            {{-- <th>Action</th> --}}
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($sectionList as $sectionLists) 
                          <tr>
                            <td>{{$sectionLists->id}}</td>
                            <td>{{$sectionLists->class_name->class_name}}</td>
                            <td>{{$sectionLists->batch_name->batch_name}}</td>
                            <td>{{$sectionLists->section_names->section_name}}</td>
                         {{--    <td>
                              <form action="{{route('delete_section_list',$sectionLists->id)}}" method="post">
                               @csrf
                                @method('DELETE')
                                 <button class="fa fa-trash" onclick="return confirm(' you want to delete?');">
                                  </button>
                              </form>
                            </td> --}}
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#btnFilter').on('click',function(e){
        e.preventDefault();
        var  std_class_name = [];
        var  batch_name = [];
        var  section_name = [];

        $("#std_class_id option:selected").each(function () {
             std_class_name.push($(this));
        });

        $("#batch_id option:selected").each(function () {
             batch_name.push($(this));
        }); 

        $("#section_id option:selected").each(function () {
             section_name.push($(this));
        });

        if(std_class_name.length !='0' && batch_name.length !='0' && section_name.length !='0'){
            var html ='';
            for(var i = 0; i < std_class_name.length; i++){
                for(var j = 0; j < batch_name.length; j++){
                    for(var k = 0; k < section_name.length; k++){
                        html += '<tr id="row"><td>'+std_class_name[i].text()+ '<input type="hidden" name="t_class_id" value="'+std_class_name[i].val()+'" /></td><td>'+batch_name[j].text()+'<input type="hidden" name="t_batch_id" value="'+batch_name[j].val()+'" /></td><td>'+section_name[k].text()+'<input type="hidden" name="t_section_id" value="'+section_name[k].val()+'" /></td></tr>';
                    }
                }  
            }
            $('#sectionDiv').show();
            $('.sectionTBody').empty().html(html);
        }else{
            alert('all field are mendatory');
        }

    });


    $('#insertSaveSection').on('click', function(){   
        var course = [];
        var batch = [];
        var section_id = [];

        $("input[name='t_class_id']").each(function () {
             course.push($(this).val());
        });

        $("input[name='t_batch_id']").each(function () {
             batch.push($(this).val());
        }); 

        $("input[name='t_section_id']").each(function () {
             section_id.push($(this).val());
        });

        swal({
            title: "Are you sure?",
            text: "Make Sure you add section. If you are not sure then close this pop up window",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((isConfirm) => {
            if (isConfirm) {

            $.ajax({
                  type: "POST",
                  url: "{{route('add_section_list')}}",
                  data: {
                      course_id: course,
                      batch_id : batch,
                      section_id :section_id,
                      "_token": "{{ csrf_token() }}"
                  },
                  success: function(data){
                    console.log(data)
                    swal({
                      icon:'success',
                      title: data,
                      button: true,
                    }).then((ok)=> {
                      if(ok){
                        location.reload();
                      }
                    });
                         
                      
                  }
                })
            }
        })
           
        });



});
</script>
@endsection