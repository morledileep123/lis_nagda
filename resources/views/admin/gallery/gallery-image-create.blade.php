@extends('layouts.main')
@section('content')

<div class="container">
	<div class="row mb-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">
						Upload Multiple Image
						<a href="{{route('gallery_image_video_add',$galleryFolder->id)}}" class="btn btn-sm btn-primary pull-right">Back</a>
					</h5>
				</div>
				<div class="card-body">
					<div class="row">
						<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('gallery_image_upload')}}">
						@csrf
							<div class="col-md-12 form-group">							   
			                    <input name="gallery_image_file[]" type="file" id="gallery_image_file" multiple>

			                    @error('gallery_image_file')
	                              <span class="text-danger">
	                                <strong>{{$message}}</strong>
	                              </span>
	                            @enderror
			                   
			                </div>
			                   
			                <div class="col-md-12 form-group">
			                	 <input type="hidden" name="folder_id" value="{{$galleryFolder->id}}">
			                    <input type="hidden" name="folder_name" value="{{$galleryFolder->folder_name}}">
			                	<input type="submit" value="Upload " id="upload" name="submit" class="btn btn-primary">
			                </div>		                     
		               	</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row mb-4">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Upload Image Zip File</h5>
				</div>
				<div class="card-body">
					<div class="row">
						<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('gallery_zip_upload')}}">
						@csrf
							<div class="col-md-12 form-group">							   
			                   <input name="gallery_image" type="file" id="gallery_image" >

			                    @error('gallery_image')
	                              <span class="text-danger">
	                                <strong>{{$message}}</strong>
	                              </span>
	                            @enderror
			                   
			                </div>
			                   
			                <div class="col-md-12 form-group">
			                	<input type="hidden" name="folder_id" value="{{$galleryFolder->id}}">
						        <input type="hidden" name="folder_name" value="{{$galleryFolder->folder_name}}">

			                    <input type="submit" value="Upload " id="upload" name="submit" class="btn btn-primary">
			                </div>		                     
		               	</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
