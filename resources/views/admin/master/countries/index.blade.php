 @extends('layouts.main')
 @section('content')

<div class="container">
   <div class="col-lg-12">
    @include('admin.master.header')
      <div class="container">
        <div class="row mt-2">
          <div class="col-lg-12">
 
<div class="container">
    <div class="app-title">
     @if($message = Session::get('success'))
            
      <div class="alert alert-success">
       {{ $message }}
      </div>
          @endif
    </div>
</div>
{{-- =================================== --}}
  {{-- START INSERT MODEL BOX --}}
      
      <div class="container">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addGrade">Add Countries</button>
        <!-- Modal -->
        <div class="modal fade" id="addGrade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="row">
              <div style="width: 131%;" class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                  <div class="clearix"></div>
                  <div class="col-md-12">
                    <div class="tile">
                      <h3 class="tile-title">Add Country</h3>
                      <div class="tile-body">
                      {{-- INSERT FORM --}}
                        <form class="row" action="{{route('countries_add')}}" method="post">
                       @csrf
                          <div class="form-group col-md-6" >
                              <label for="country_name"> Country Name</label>
                                <input type="text" name="country_name" id="country_name" class="form-control" >
                                @error('country_name')
                                  <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                           </div>
                           <div class="form-group col-md-6" >
                              <label for="country_code"> Country Code</label>
                                <input type="text" name="country_code" id="country_code" class="form-control" >
                                @error('country_code')
                                  <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                           </div>
                            
                            <div class="form-group col-md-4 align-self-end">
                              <button id="addGrade" class="btn btn-primary" type="submit">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>ADD
                              </button>
                            </div>
                          </form>
                            {{-- END INSERT FORM --}}
                      
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      {{-- END INSERT MODEL BOX --}}

    {{-- ================================ --}}
        <br>
        <div class="container">
            <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Country Name</th>
                          <th>Country Code</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php $i=1; @endphp
                      {{-- Foreach Loop start --}}
                      @foreach($county as $data)
                    
                        <tr>
                          <td>{{ $i++}}</td>
                          <td>{{ $data->country_name}}</td>
                          <td>{{ $data->country_code}}</td>
                          <td> <button type="button" data-toggle="modal" data-target="#editGrad{{ $data->id }}" class="fa fa-pencil-square-o btn btn-primary">
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
                    {{-- Edit Model Box start ,this model box popup on edit button click --}}
                        <div class="container">
                          <div class="modal fade" id="editGrad{{ $data->id }}" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="row">
                                <div style="width: 131%;" class="modal-content">
                                  <div class="modal-header">
                                    <button class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="clearix"></div>
                                    <div class="col-md-12">
                                      <div class="tile">
                                        <h3 class="tile-title">Update County</h3>
                                        <div class="tile-body">
                                        {{-- Update FORM --}}
                               
                                          <form class="row" action="{{route('countries_update',$data->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                 
                                          
                                            <div class="form-group col-md-6" >
                                              <label for="country_name">Country Name</label>
                                                <input type="text" name="country_name" id="country_name" class="form-control" value="{{$data->country_name}}">
                                                @error('country_name')
                                                  <span class="text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                             <div class="form-group col-md-6" >
                                              <label for="country_code">County Code</label>
                                                <input type="text" name="country_code" id="country_code" class="form-control" value="{{$data->country_code}}">
                                                @error('country_code')
                                                  <span class="text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>  
                                             
                                               <input type="hidden" name="id" id="id" class="form-control" value="{{$data->id}}">
                                              <div class="form-group col-md-4 align-self-end">
                                                <button type="submit" class="btn btn-primary">
                                                  <i class="fa fa-fw fa-lg fa-check-circle"></i>Update
                                                </button>
                                              </div>
                                            </form>
                                              {{-- END Update FORM --}}
                             
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" id="closeEdit" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    {{-- Edit Model/Update Box End --}}
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>
</div>
 @endsection('content')


