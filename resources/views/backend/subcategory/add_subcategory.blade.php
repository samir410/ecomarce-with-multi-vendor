@extends('admin.admin_dashboard')
@section('title')
Add Subcategory
@endsection
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add SubCategory </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add SubCategory </li>
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
	

		   @if ($errors->any())
		   <div class="alert alert-danger">
			 <ul>
				@foreach ($errors->all() as $error)
				  <li>{{ $error }}</li>
				@endforeach
			 </ul>
			</div>
		   @endif

		<form method="post" action="{{ route('store.subcategory') }}" >
			@csrf
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0 text-secondary">Category Name</h6>
				</div>
				<div class="form-group col-sm-9 text-secondary">
	 	          <select name="category_id" class="form-select mb-3" aria-label="Default select example">
			            <option selected="">Open this select menu</option>

			                   @foreach($categories as $category)
		 	                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
		 	                   @endforeach

				    </select>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-4 text-secondary ">SubCategory Name</h6>
				</div>
				<div class="col-sm-9 text-light bg-dark">
					<input type="text" name="subcategory_name" class="form-control"   />
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