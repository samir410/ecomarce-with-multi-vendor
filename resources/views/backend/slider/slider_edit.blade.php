@extends('admin.admin_dashboard')
@section('title')
Edit brand
@endsection
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Edit brand </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit brand </li>
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

		<form method="post" action="{{ route('update.slider') }}" enctype="multipart/form-data" >
			@csrf
          <input type="hidden" name="id" value="{{ $slider->id }}">
		  <input type="hidden" name="old_image" value="{{ $slider->slider_image }}">


			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-4 text-secondary ">Slider Title</h6>
				</div>
				<div class="col-sm-9 text-light bg-dark">
					<input type="text" name="slider_title" id="slider_title" value="{{ $slider->slider_title }}" class="form-control"   />
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-4 text-secondary">Short Title</h6>
				</div>
				<div class="form-group col-sm-9 text-secondary">
					<input type="text" name="short_title" value="{{ $slider->short_title }}" class="form-control"  required />
				</div>
			</div>



			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-4 text-secondary">Slider Image </h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="file" name="slider_image" class="form-control"  id="image"   />
				</div>
			</div>



			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0"> </h6>
				</div>
				<div class="col-sm-9 text-secondary">
                    <img id="showImage" src="{{ asset($slider->slider_image)   }}" alt="Admin" style="width:100px; height: 100px;"  >
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