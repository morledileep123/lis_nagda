@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">          
            @include('admin.manage.header')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Classes ({{count($studentclassdata)}}) 
                       <button type="button" class="btn btn-primary btn-sm pull-right addClass">Add Class</button>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover mytable">
                        <thead>
                          <tr>
                            <th>S.No</th>
                            <th>Class Name</th>
                            <th>Class Details </th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach($studentclassdata as $studentClasse)
                               <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $studentClasse->class_name}}</td>
                                <td>{{ $studentClasse->class_description}}</td>
                                <td> <button class="fa fa-pencil-square-o btn btn-sm btn-primary editClass" id="{{$studentClasse->id}}" data-id="{{$studentClasse->class_name}}" data-class="{{$studentClasse->class_description}}">
                                         </button></td>
                                {{-- <td>
                                  <form method="post" action="{{ route('add-branch.destroy',$datas1->id) }}">
                                    @csrf
                                    @method('DELETE')
                                         <button type="button" data-toggle="modal" data-target="#editGrad{{ $datas1->id }}" class="fa fa-pencil-square-o btn btn-primary">
                                         </button>
                                         <button class="fa fa-trash btn btn-danger" onclick="return confirm(' you want to delete?');">
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
        <div class="modal" id="classModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Class</h4>
                        <button type="button" class="close modalClose" >&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{route('classes-add')}}" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                    <label for="class_name"> Class Name</label>
                                    <input type="text" name="class_name" id="class_name" class="form-control">
                                    @error('class_name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                  @enderror   
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                    <label for="class_description">Class Details </label>
                                    <textarea name="class_description" id="class_desceiption" class="form-control"></textarea>
                                    @error('class_description')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                 <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                    <input type="hidden" name="flag" value="add">
                                    <input type="hidden" name="class_id" value="">
                                    <button  class="btn btn-primary btn-sm" type="submit" id="btnSubmit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm modalClose" >Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script >
    $(document).ready(function(){
        $('.addClass').on('click',function(e){
            e.preventDefault();
            $('input[name="flag"]').val('add');
            $('input[name="class_id"]').val('');
            $('#class_name').val('');
            $('#class_desceiption').val('');
            $('#classModal').modal('show');

        });
        $('.modalClose').on('click',function(e){
            e.preventDefault();
            $('#classModal').modal('hide');
        });
        $('.editClass').on('click',function(e){
            e.preventDefault();
       
            $('input[name="flag"]').val('edit');
            $('input[name="class_id"]').val($(this).attr('id'));
            $('#class_name').val($(this).data('id'));
            $('#class_desceiption').val($(this).data('class'));

            $('#classModal').modal('show');
        });

        @if($message = Session::get('success'))
            alert("{{$message}}")
        @endif


    })
</script>

@endsection