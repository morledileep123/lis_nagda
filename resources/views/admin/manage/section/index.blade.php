@extends('layouts.main')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('admin.manage.header')
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Section
                    <button type="button" class="btn btn-primary btn-sm pull-right addSection">Add Section</button>
                    <a href="{{route('section_assign')}}" class="btn btn-success btn-sm pull-right" >Assign Section</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered mytable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Section Name</th>
                                <th>Section Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach($studentSection as $section)
                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $section->section_name}}</td>
                                <td>{{ $section->section_details}}</td>
                                <td> <a type="button"  class="editSection" data-id="{{$section->section_name}}" data-class="{{$section->section_details}}" id="{{$section->id}}">
                                    <i class="fa fa-pencil-square-o text-success"></i>
                                </a></td>                          
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>    
            </div>
        </div>
        <div class="modal" id="sectionModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Section</h4>
                        <button type="button" class="close modalClose" >&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('section_add')}}" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                                    <label for="section_name"> Section Name</label>
                                    <input type="text" name="section_name" id="section_name" class="form-control" >
                                    @error('section_name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                                    <label for="section_details"> Section Details</label>
                                    <input type="text" name="section_details" id="section_details" class="form-control" >
                                        @error('section_details')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>    
                                <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                    <input type="hidden" name="flag" value="{{old('flag') ?? 'add'}}"  >
                                    <input type="hidden" name="section_id" value="" value="{{old('section_id')}}">
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

    $('.addSection').on('click',function(e){
        e.preventDefault();
        $('.modal-title').html('Add Section');

        $('input[name="flag"]').val('add');
        $('input[name="section_id"]').val('');
        $('#section_name').val('');
        $('#section_details').val('');
        $
        $('#sectionModal').modal('show');

    });
    $('.modalClose').on('click',function(e){
        e.preventDefault();
        $('#sectionModal').modal('hide');
    });
    $('.editSection').on('click',function(e){
        e.preventDefault();
        $('.modal-title').html('Edit Section');

        $('input[name="flag"]').val('edit');
        $('input[name="section_id"]').val($(this).attr('id'));
        $('#section_name').val($(this).data('id'));
        $('#section_details').val($(this).data('class'));
        
        $('#sectionModal').modal('show');
    });

    @if($message = Session::get('success'))
        alert("{{$message}}")
    @endif


    @if($errors->any())
         $('#sectionModal').modal('show');     
    @endif

})
</script>
@endsection


