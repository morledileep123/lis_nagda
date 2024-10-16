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
                        Batches ({{count($studentBatch)}}) 
                       <button type="button" class="btn btn-primary btn-sm pull-right addBatch">Add Batch</button>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover mytable">
                        <thead>
                            <tr>
                              <th>S.No</th>
                              <th>Batch Name</th>
                              <th>start Date</th>
                              <th>End Date</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            {{-- Foreach Loop start --}}
                            @foreach($studentBatch as $data)

                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $data->batch_name}}</td>
                                <td>{{ $data->batch_from}}</td>
                                <td>{{ $data->batch_to}}</td>
                                <td> <a class="editBatch" id="{{$data->id}}" data-id="{{$data->batch_name}}" data-class="{{$data->batch_from}}" data-batch="{{$data->batch_to}}"><i class="fa fa-pencil-square-o text-success"></i>
                                         </a></td>
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

        <div class="modal" id="batchModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Batch</h4>
                        <button type="button" class="close modalClose" >&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{route('batches_add')}}" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                                    <label for="batch_from"> Start Date</label>
                                    <input type="text" name="batch_from" id="batch_from" class="form-control datepicker" placeholder="YYYY-mm-dd" data-date-format="yyyy-mm-dd" readonly="readonly" value="{{old('batch_from')}}">
                                    @error('batch_from')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                                    <label for="batch_to"> End Date</label>
                                    <input type="text" name="batch_to" id="batch_to" class="form-control datepicker" placeholder="YYYY-mm-dd" readonly="readonly" data-date-format="yyyy-mm-dd" value="{{old('batch_to')}}">
                                    @error('batch_to')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                    <label for="batch_name"> Batch Name</label>
                                    <input type="text" name="batch_name" id="batch_name" class="form-control" readonly="true" placeholder="Batch name" value="{{old('batch_name')}}">
                                    @error('batch_name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                    <input type="hidden" name="flag" value="{{old('flag') ?? 'add'}}"  >
                                    <input type="hidden" name="batch_id" value="" value="{{old('batch_id')}}">
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

     $(document).on('blur', '#batch_to', function(){
        // var batch_from = $('#batch_from').val();
        var batch_from = new Date($('#batch_from').val());
        var batch_to = new Date($('#batch_to').val());

        var batch_name = $('#batch_name').val(batch_from.getFullYear()+'-'+batch_to.getFullYear());
      }); 


    $('.addBatch').on('click',function(e){
        e.preventDefault();
        $('input[name="flag"]').val('add');
        $('input[name="batch_id"]').val('');
        $('.modal-title').html('Add Batch');
        $('#batch_from').val('');
        $('#batch_to').val('');
        $('#batch_name').val('');

        $('#batchModal').modal('show');

    });
    $('.modalClose').on('click',function(e){
        e.preventDefault();
        $('#batchModal').modal('hide');
    });
    $('.editBatch').on('click',function(e){
        e.preventDefault();
        $('.modal-title').html('Edit Batch');
        $('input[name="flag"]').val('edit');
        $('input[name="batch_id"]').val($(this).attr('id'));
        $('#batch_name').val($(this).data('id'));
        $('#batch_from').val($(this).data('class'));
        $('#batch_to').val($(this).data('batch'));

        $('#batchModal').modal('show');
    });

    @if($message = Session::get('success'))
        alert("{{$message}}")
    @endif


    @if($errors->any())
         $('#batchModal').modal('show');     
    @endif

})
</script>

@endsection