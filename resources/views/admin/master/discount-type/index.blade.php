@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            {{-- @include('admin.class.header') --}}
    {{-- @include('admin.master.header') --}}

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Discount Type List
                        <a href="{{route('discount_type_create')}}" class="btn btn-sm btn-success pull-right fa fa-plus btn-sm">Add discount Type</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered mytable" id="sampleTable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Discount Type</th>
                                <th> Desciption</th>
                                <th>Short Desciption</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach($descountType as $descountTypes)
                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $descountTypes->discount_type_name}}</td>
                                <td>{{ $descountTypes->discount_type_desc}}</td>
                                <td>{{ $descountTypes->shrt_desc}}</td>
                                <td> <a href="{{route('discount_type_edit',$descountTypes->discount_type_id)}}" class="bg-primary btn-sm"><i class="fa fa-edit text-white" ></i></a>
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

@endsection

