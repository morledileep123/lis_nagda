@extends('layouts.main')
 @section('content')
<div id="content">
  <div class="container">
   <div class="card shadow mb-4">
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Settings<h4 class="panel-title"> 
       </h4></h6>
      </div>
      <div class="app-title full-right">
       @if($message = Session::get('success'))   
          <div class="alert alert-success">{{ $message }}</div>
       @endif
      <div class="card-body">
        <table class="table table-striped table-bordered">
           <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Logo</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php $count = 1; ?>
                @if($getData)
                @foreach($getData as $getDatas)
                <td>{{$count++}}</td>
                <td>{{$getDatas->title}}</td>
                <td><img src="{{asset($getDatas->logo !=null ? 'storage/'.$getDatas->logo : 'storage/admin/student_demo.png')}}" style="width: 50px; height: 50px;" ></td>
                <td>{{$getDatas->email}}</td>
                <td>
                  <a href="{{route('settings.show',$getDatas->setting_id)}}"><i class="fa fa-eye"></i></a>
                  <a href="{{route('settings.edit',$getDatas->setting_id)}}"><i class="fa fa-edit"></i></a>
                   {{--  <form method="post" action="{{route('settings.destroy',$getDatas->setting_id)}}">
                      @csrf
                      @method('DELETE')
                      <button onclick="return confirm(' you want to delete?');"><i class="fa fa-trash dengar"></i></button> 
                    </form> --}}

                  </td>
                @endforeach
                @else
                @endif
              </tr>
            </tbody>
        </table> 
    </div>
  </div>
</div>

@endsection