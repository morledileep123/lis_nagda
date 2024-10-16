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
                    <h5 class="card-title">Add ReportCard Header
                        <a href="{{route('student-report-card-header.create')}}" class="btn btn-sm btn-success pull-right fa fa-plus btn-sm">Add</a>
                    </h5>
                </div>
                <div class="card-body">

                    <table class="table table-hover table-bordered mytable" id="sampleTable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Header Name</th>
                                <th>Class form</th>
                                <th>Class To</th>
                                <th>Batch</th>
                                <th>Medium</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach($reportCardHeaders as $reportCardHeader)
                            {{-- {{dd($datas->discount_name)}} --}}
                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $reportCardHeader->header_name}}</td>
                                <td>{{ $reportCardHeader->std_class_from_id}}</td>
                                <td>{{ $reportCardHeader->std_class_to_id}}</td>
                                <td>{{ $reportCardHeader->batch_id}}</td>
                                <td>{{ $reportCardHeader->medium }}</td>
                               
                                <td>
                                <a class="bg-primary btn-sm" href="{{route('student-report-card-header.edit',$reportCardHeader->id)}}">
                                <i class="fa fa-pencil text-white"> </i>    
                                </a>
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

