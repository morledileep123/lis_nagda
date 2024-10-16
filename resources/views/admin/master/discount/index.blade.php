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
                    <h5 class="card-title">Discount List
                        <a href="{{route('discount.create')}}" class="btn btn-sm btn-success pull-right fa fa-plus btn-sm">Add discount</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered mytable" id="sampleTable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Discount Name</th>
                                <th>Discount Amount</th>
                                <th>Discount Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach($data as $datas)
                            {{-- {{dd($datas->discount_name)}} --}}
                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $datas->discount_name}}</td>
                                <td>
                                <?php echo $datas->discount_amnt;
                                    if($datas->discount_mode =='P'){ echo '(%)'; }elseif($datas->discount_mode =='R'){ echo '(Rupee)'; } ?>
                                </td>
                                <td>{{ $datas->disc_type ? $datas->disc_type->discount_type_name : ''}}</td>
                                <td>
                                <a class="bg-primary btn-sm" href="{{route('discount.edit',$datas->discount_code)}}">
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

