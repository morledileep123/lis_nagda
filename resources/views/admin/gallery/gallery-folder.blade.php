 @extends('layouts.main')
 @section('content')


	<div class="row mt-2">
    <div class="col-lg-12">

      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          <div class="panel-heading">
				<h4 class="panel-title">Gallery Folder <a href="{{route('gallery_folder')}}" class="btn btn-success pull-right">Add Folder</a><a href="{{ URL::previous() }}" class="btn btn-info pull-right">Back</a></h4>
			</div>
        </div>
        <div class="card-body">
         	<div class="col-md-12">
		<div class="panel panel-default">
			
			<div class="panel-body">
			 <div class="">
			     @if($message = Session::get('success'))   
			      	<div class="alert alert-success">{{ $message }}</div>
			     @endif
			  </div>				
				<div class="row">								
					<div>
				        <br>
				        {{-- <div class="table-responsive"> --}}
					        
					        <form method="post" action="{{route('create_gallery_folder')}}" id="addFolder" novalidate="novalidate">
					        	@csrf
					          <fieldset>
					            <div class="row">
					              <div class="col-md-10">
					                <div class="">
					                  <input class="form-control valid" id="folder_name" name="folder_name" type="text" placeholder="Folder Name">
					                  @error('folder_name')
											<span class="text-danger">
												<strong>{{$message}}</strong>
											</span>
										@enderror
					                </div>
						
					              </div>
					              <div class="col-md-2">
					                <div class="">
					                  <input type="submit" class="btn btn-primary" name="submit" value="Add Folder">
					                 {{--  <input class="btn btn-back" onclick="javascript: window.location.replace();" type="button" value="Cancel"> --}}
					                </div>
					              </div>
					            </div>
				              </fieldset>
					        </form>

				        </div>
				    {{-- </div> --}}
					
				</div>
				<br>
				<div class="row">
					<div class="col-md-12 table-responsive" id="tableFilter">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
							<div class="card-body">
					         	<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-body">
											
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
    </div>
 </div>

 @endsection
