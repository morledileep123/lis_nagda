@include('frontend-layouts.main')
 


	<div class="row mt-2">
    <div class="col-lg-12">

      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          <div class="panel-heading">
				<h4 class="panel-title">Image Gallery  </h4>
			</div>
        </div>
        <div class="card-body">
         	<div class="col-md-12">
		<div class="panel panel-default entry-content">
				<ul class="ngg-breadcrumbs">
            <li class="ngg-breadcrumb">
                <a href="{{url('school-gallery')}}">Gallery</a>
                <span class="ngg-breadcrumb-divisor"> » </span><span class="ngg-breadcrumb">{{$galleryFolder->folder_name}}</span>
   			
            </li>
    </ul>
			<div class="panel-body">
				<br>
				<div class="row">
					<div class="col-md-12 table-responsive" id="tableFilter">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
							<div class="card-body">
					         	<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-body">
											<div class="row">	
									@foreach($galleryFolder->gallery_image as $galleryImage)
											{{-- {{dd($galleryImage)}} --}}
										<div class="col-md-3">
											<div class="row">
												
												<div>
												<img src="{{asset($galleryImage->gallery_image !=null ? $galleryImage->gallery_image : 'storage/admin/student_demo.png')}}" style="width: 300px; height: 200px; border: solid;" data-rel="shadowbox[album]"  data-toggle="modal" data-target="#exampleModalLong{{$galleryImage->id}}">
												</div>
											<div class="actions">
												<a href="" data-rel="shadowbox[album]"  data-toggle="modal" data-target="#exampleModalLong{{$galleryImage->id}}">
			                               			<label class="btn btn-xs btn-info"><i class="fa fa-search-plus"></i></label>
			                                   </a>
			                                   {{-- <a data-original-title="Delete" data-toggle="tooltip" title="" class="btn btn-xs btn-danger" href="{{route('gallery_image_delete',$galleryImage->id)}}" onclick="return confirm('Are you sure !!')">
			                                        <i class="fa fa-times"></i>
			                                    </a> --}}
			                                </div>
												</a>
											</div>
											<!-- Modal -->
											<div class="modal fade" id="exampleModalLong{{$galleryImage->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
											  <div class="modal-dialog" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        {{-- <h5 class="modal-title" id="exampleModalLongTitle">Image View</h5> --}}
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											       <img src="{{asset($galleryImage->gallery_image !=null ? $galleryImage->gallery_image : 'storage/admin/student_demo.png')}}" style="width: 550px; height: 300px; border: solid;" >
											      </div>
											      {{-- <div class="modal-footer">
											        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											      </div> --}}
											    </div>
											  </div>
											</div>
										</div>
									@endforeach
											</div>
										</div>
									</div>
								</div>
							</div>
<!-- Button trigger modal -->


					</div>
				</div> 
			
				</div>
				</div>
			</div>
		</div>

	</div>
</div>

    </div>
 </div>

@include('frontend-layouts.footer')

