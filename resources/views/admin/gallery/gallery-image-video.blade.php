@extends('layouts.main')
@section('content')
<div class="container">
	<div class="row mb-4">
		<div class="col-lg-12 col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">
						Image Gallery
						<a href="{{route('gallery')}}" class="btn btn-sm btn-primary pull-right">Back</a>

						<a href="{{route('gallery_image_add',$folderId)}}" class="btn btn-sm btn-success pull-right">Add Image</a>
					</h5>
				</div>
				<div class="card-body" style="height: 800px; overflow-y: scroll; ">
					<div class="row form-group">
						@foreach($galleryFolder->gallery_image as $galleryImage)
							<div class="col-md-4 p-2 shadow">
								<img src="{{asset($galleryImage->gallery_image !=null ? $galleryImage->gallery_image : 'storage/admin/student_demo.png')}}" style="width: 100%; height: 200px" >
								<h5 class="mt-2 p-2" style="background-color: #eee; display: relative">
									<a href="javascript:void(0)" class="zoomImg" data-id="{{asset($galleryImage->gallery_image !=null ? $galleryImage->gallery_image : 'storage/admin/student_demo.png')}}"><i class="fa fa-search text-primary" ></i></a>
								 	<a href="{{route('gallery_image_delete',$galleryImage->id)}}" onclick="return confirm('Are you sure !!')" class="pull-right"><i class="fa fa-trash text-danger" ></i></a>
								</h5>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="fullImgModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body p-0" >
					<img  style="width : 100%; height: 400px;position: initial;" class="fullImg">
					<button type="button" class="close" data-dismiss="modal" style="position: absolute; top:3px;left: 5px">&times;</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script >
	$(document).ready(function(){
		$('.zoomImg').on('click',function(e){
			e.preventDefault();
			var img = $(this).data('id');
			
			$('.fullImg').attr('src',img); 	
			$('#fullImgModal').modal('show');
		})
	})

</script>
@endsection
