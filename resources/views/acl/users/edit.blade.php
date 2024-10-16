@extends('layouts.main')
@section('title','Welcom: To Admin Panel')

@section('content')

 <main class="app-content">
	  <div class="app-title">
	    <ul class="app-breadcrumb breadcrumb">
	      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	      <li class="breadcrumb-item"><a href="{{ URL::previous() }}"><i class="fa fa-arrow-left fa-lg "></i></a>&nbsp;&nbsp;<a href="#">ACL</a></li>
	    </ul>
	  </div>
	  <div class="container">
	  	<div class="row">
		<div class="col-md-12 m-auto">
			<div class="card">
				<div style="padding-top: 30px;padding-bottom: 30px;">
					<form action="{{ route('users.update',$data->id) }}"  method="Post">
                        {{csrf_field()}}
                        @method('PUT')
                           <div class="form-group row">
	                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

	                            <div class="col-md-6">
	                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data->name ?? old('name') }}" required autocomplete="name" autofocus>

	                                @error('name')
	                                    <span class="text-danger" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

	                            <div class="col-md-6">
	                                <input id="email" readonly="true" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{
                                    $data->email ?? old('email') }}" required autocomplete="email">

	                                @error('email')
	                                    <span class="text-danger" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>
	                    
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
	  </div>
</main>			

@endsection