@extends('layouts.main')
@section('content')
<div class="container">
  <div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <h5 class="card-title">Admission Inquiry</h5>
          </div>
          <div class="card-body table-responsive">
              <table class="table table-hover table-bordered mytable" id="sampleTable">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @php $i=1; @endphp
        @foreach($datas as $data)
      
          <tr>
            <td>{{ $i++}}</td>
            <td>{{ $data->your_name}}</td>
            <td>{{ $data->your_email}}</td>
            <td>{{ $data->mobile_no}}</td>
            <td>{{ $data->created_at}}</td>
            <td> <button type="button" data-toggle="modal" data-target="#editGrad{{ $data->id }}" class=" fa fa-eye text-primary show-inquery" data-name="{{ $data->your_name }} "data-email="{{ $data->your_email }} "data-child_name="{{ $data->child_name }}" data-age="{{ $data->child_age }}" data-child_class="{{ $data->child_class }}" data-mobile="{{ $data->mobile_no }}" >
            </button></td>
          </tr>
            @endforeach
          </tbody>
      </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" id="inqueyModal">
      <div class="modal-dialog">
        <!-- Modal content-->
          <div style="width: 131%;" class="modal-content">
            <div class="modal-header">
            <h3 class="tile-title">All Detail</h3>
              <button class="close" data-dismiss="modal">&times;</button>
            </div>
             <div class="modal-body">
              <div class="tile-body">
                 <div class="row">
                    <div class="form-group col-md-6" >
                      <label for="your_name"> Name</label>
                        <input type="text" name="your_name" value="{{ old('your_name') }}" class="form-control" readonly="true" id="name">
                       </div> 
                       <div class="form-group col-md-6" >
                          <label for="your_email">Email</label>
                            <input type="text" name="your_email"  class="form-control" readonly="true" value="{{ old('your_email') }}" id="email">
                       </div>
                       <div class="form-group col-md-6" >
                          <label for="child_name"> Child Name</label>
                            <input type="text" name="child_name"class="form-control" readonly="true" value="{{ old('child_name') }}" id="child_name">
                       </div>
                       <div class="form-group col-md-6" >
                          <label for="child_age"> Child Age</label>
                            <input type="text" name="child_age"class="form-control" readonly="true" value="{{ old('child_age') }}" id="age">
                       </div>
                        <div class="form-group col-md-6" >
                          <label for="child_class"> Calss</label>
                            <input type="text" name="child_class" value="{{ old('child_class') }}" class="form-control" readonly="true" id="child_class">
                       </div> 
                       <div class="form-group col-md-6" >
                          <label for="mobile_no"> Mobile No</label>
                            <input type="text" name="mobile_no" id="mobile_no" class="form-control" readonly="true"value="{{ old('mobile_no') }}" id="mobile_no">
                       </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
  <script>
    $(document).ready(function(){
      $('.show-inquery').on('click',function(){
        $('#name').val($(this).data('name'));   
        $('#email').val($(this).data('email'));   
        $('#child_name').val($(this).data('child_name'));   
        $('#age').val($(this).data('age'));   
        $('#child_class').val($(this).data('child_class'));   
        $('#mobile_no').val($(this).data('mobile'));   
        $('#inqueyModal').modal('show');
      })
    });
  </script>
 @endsection('content')


