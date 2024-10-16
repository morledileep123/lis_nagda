@extends('layouts.main')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <h5 class="card-title">Guardian Designations
                 <button type="button" class="btn btn-primary btn-sm pull-right addProfession"> Add Guardian Designation</button>
                  
               </h5>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-12 col-sm-12 table-responsive">
                     <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $count = 1; @endphp
                          @foreach($gaurdianDesignations as $gaurdianDesignation)
                            <tr>
                              <td>{{$count++}}</td>
                              <td>{{$gaurdianDesignation->name}}</td>
                              <td>
                                  <a href="javascript:void(0)" class="editClass" id="{{$gaurdianDesignation->id}}" data-id="{{$gaurdianDesignation->name}}"><i class="fa fa-edit text-success" ></i></a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="modal" id="professionModal">
          <div class="modal-dialog">
              <div class="modal-content">
              <!-- Modal Header -->
                  <div class="modal-header">
                      <h4 class="modal-title">Add Guardian Name</h4>
                      <button type="button" class="close modalClose" >&times;</button>
                  </div>
                  <div class="modal-body">
                      <form class="row" action="{{route('gaurdian_designation_add')}}" method="post">
                        @csrf
                          <div class="form-group col-md-12" >
                            <label for="name"> Guardian designation Name</label>
                              <input type="text" name="name" id="name" class="form-control" >
                              @error('name')
                                <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                          <div class="form-group col-md-12 align-self-end">
                            <input type="hidden" name="flag" value="add">
                            <input type="hidden" name="guardian_desg_id" value="">
                            <button class="btn btn-sm btn-primary" type="submit">
                              <i class="fa fa-fw fa-lg fa-check-circle"></i>ADD
                            </button>
                          </div>
                      </form>
                  </div>
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
        $('.addProfession').on('click',function(e){
            e.preventDefault();
            $('input[name="flag"]').val('add');
            $('input[name="profession_id"]').val('');
            $('#name').val('');            
            $('#professionModal').modal('show');
        });
        $('.modalClose').on('click',function(e){
            e.preventDefault();
            $('#professionModal').modal('hide');
        });
        $('.editClass').on('click',function(e){
            e.preventDefault();
       
            $('input[name="flag"]').val('edit');
            $('input[name="profession_id"]').val($(this).attr('id'));
            $('#name').val($(this).data('id'));
            $('#professionModal').modal('show');
        });

        @if($message = Session::get('success'))
            alert("{{$message}}")
        @endif


    })
</script>

@endsection
