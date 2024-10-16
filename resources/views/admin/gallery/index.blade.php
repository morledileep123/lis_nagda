 @extends('layouts.main')
 @section('content')
<div class="container">
	<div class="row mb-4">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Gallery 
						{{-- <a href="{{route('gallery_test')}}" class="btn btn-sm btn-primary pull-right">TEST</a> --}}

						<a href="{{route('gallery_folder')}}" class="btn btn-sm btn-primary pull-right">Add Folder</a></h5>
				</div>
				<div class="card-body">
					<div class="row">
						@foreach($galleryFolder as $galleryFolders)			
							<div class="col-md-2 text-center">
								<a href="{{route('gallery_image_video_add',$galleryFolders->id)}}">
									<img src="{{asset('img/folder_default.png')}}" style="width:80%; height: 80px;">
									<p class="">{{$galleryFolders->folder_name}}</p>
								</a>										
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
