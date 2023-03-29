@extends('admin.admin_dashboard')
@section('title')
Edit Banner
@endsection
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Banner </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Banner</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">

					</div>
				</div>
				<!--end breadcrumb-->
		

<div class="col-lg-19">
	<div class="card bg-dark border-secondary">
		<div class="card-body ">

		<form method="post" action="{{ route('update.banner') }}" enctype="multipart/form-data" >
			@csrf
			<input type="hidden" name="id" value="{{ $banner->id }}">
			<input type="hidden" name="old_img" value="{{ $banner->banner_image }}">
   
			   <div class="row mb-3">
				   <div class="col-sm-3">
					   <h6 class="mb-0">Banner Title</h6>
				   </div>
				   <div class="form-group col-sm-9 text-secondary">
					   <input type="text" name="banner_title" class="form-control" value="{{ $banner->banner_title }}"   />
				   </div>
			   </div>
   
			   <div class="row mb-3">
				   <div class="col-sm-3">
					   <h6 class="mb-0">Banner Url</h6>
				   </div>
				   <div class="form-group col-sm-9 text-secondary">
					   <input type="text" name="banner_url" class="form-control" value="{{ $banner->banner_url }}"   />
				   </div>
			   </div>
   
   
			   <div class="row mb-3">
				   <div class="col-sm-3">
					   <h6 class="mb-0">Banner Image   </h6>
				   </div>
				   <div class="col-sm-9 text-secondary">
					   <input type="file" name="banner_image" class="form-control"  id="image"   />
				   </div>
			   </div>
   
   
   
			   <div class="row mb-3">
				   <div class="col-sm-3">
					   <h6 class="mb-0"> </h6>
				   </div>
				   <div class="col-sm-9 text-secondary">
						<img id="showImage" src="{{ asset($banner->banner_image) }}" alt="Admin" style="width:100px; height: 100px;"  >
				   </div>
			   </div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
                    <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
				</div>
			</div>
		 </div>

		</form>



	</div>




							</div>
						</div>
					</div>
				</div>
			</div>



<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

@endsection