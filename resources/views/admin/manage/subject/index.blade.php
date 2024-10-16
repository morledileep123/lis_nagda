@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('admin.manage.header')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Subject List
                        <a href="{{route('subject_assign')}}" class="btn btn-sm btn-success pull-right">Assign Subject</a>
                        <button type="button" class="btn btn-primary btn-sm pull-right addSubject">Add Subject</button>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered mytable" >
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Subject Name</th>
                                <th>Subject Code</th>
                                <th>Subject Sequence</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach($subject as $data)
                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $data->subject_name}}</td>
                                <td>{{ $data->subject_code}}</td>
                                <td>{{ $data->subject_sequence}}</td>

                                <td>
                                   {{--  <form method="post" action="{{ route('subject.destroy',$data->id) }}">
                                        @csrf
                                        @method('DELETE') --}}
                                    <a class="editSubject" id="{{$data->id}}" data-id="{{$data->subject_name}}"  data-class="{{$data->subject_code}}" data-subject="{{$data->subject_sequence}}" > <i class="fa fa-edit text-success "></i></a>     
                                          {{--   <button class="bg-success mr-2 editSubject" id="{{$data->id}}" data-id="{{$data->subject_name}}"  data-class="{{$data->subject_code}}" data-subject="{{$data->subject_sequence}}" ><i class="fa fa-edit text-white" ></i>
                                            </button> --}}
                                            {{-- <button class="bg-danger" onclick="return confirm('Are you sure you want to delete?');">
                                            <i class="fa fa-trash text-white"> </i>    
                                            </button> --}}
                                    {{-- </form> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="subjectModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Subject</h4>
                    <button type="button" class="close modalClose" >&times;</button>
                </div>
                <div class="modal-body">
                    <form  action="{{route('subject.store')}}" method="post">
                    @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                                <label for="subject_name"> Subject Name</label>
                                <input type="text" name="subject_name" id="subject_name" class="form-control" >
                                @error('subject_name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                                <label for="subject_code"> Subject Code </label>
                                <input type="text" name="subject_code" id="subject_code" class="form-control" >
                                @error('subject_code')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                                <label for="subject_sequence">  Subject Sequence  </label>
                                <input type="text" name="subject_sequence" id="subject_sequence" class="form-control" >
                                @error('subject_sequence')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>    
                             <div class="from-group col-md-6">
                                <label>Parent Subject</label>
                                <select class="form-control" name="parent_id">
                                    <option value="">{{__('Root')}}</option>
                                    @foreach($subject as $subjects)
                                        <option class="root" value="{{$subjects->id}}" {{old('parent_id') == $subjects->id ? 'selected' : ''}} >{{$subjects->subject_name}}</option>
                                        @if(count($subjects->subsubjects))
                                          @include('admin.manage.subject.subSubjectList',['subsubjects' => $subjects->subsubjects, 'dataSpace' => 2])
                                        @endif
                                    @endforeach
                                </select>
                                @error('parent_id')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>  
                            <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                <input type="hidden" name="flag" value="{{old('flag') ?? 'add'}}"  >
                                <input type="hidden" name="subject_id" value="" value="{{old('subject_id')}}">
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
<script >
$(document).ready(function(){

    $('.addSubject').on('click',function(e){
        e.preventDefault();
        $('.modal-title').html('Add Subject');

        $('input[name="flag"]').val('add');
        $('input[name="subject_id"]').val('');
        $('#subject_name').val('');
        $('#subject_code').val('');
        $('#subject_sequence').val('');
        $
        $('#subjectModal').modal('show');

    });
    $('.modalClose').on('click',function(e){
        e.preventDefault();
        $('#subjectModal').modal('hide');
    });
    $('.editSubject').on('click',function(e){
        e.preventDefault();
        $('.modal-title').html('Edit Subject');

        $('input[name="flag"]').val('edit');
        $('input[name="subject_id"]').val($(this).attr('id'));
        $('#subject_name').val($(this).data('id'));
        $('#subject_code').val($(this).data('class'));
        $('#subject_sequence').val($(this).data('subject'));
        
        $('#subjectModal').modal('show');
    });

    @if($message = Session::get('success'))
        alert("{{$message}}")
    @endif


    @if($errors->any())
         $('#subjectModal').modal('show');     
    @endif

})
</script>
@endsection

