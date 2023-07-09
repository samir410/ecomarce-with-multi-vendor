@extends('admin.admin_dashboard')
@section('title')
Edit distirct
@endsection
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Edit district </li>
                    </ol> </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit district </li>
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

           <form id="myForm" method="post" action="{{ route('update.district') }}"   >
			@csrf

			<input type="hidden" name="id" value="{{ $district->id }}">

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Division Name</h6>
				</div>
				<div class="form-group col-sm-9 text-secondary">
	 	<select name="division_id" class="form-select mb-3" aria-label="Default select example">
			 <option selected="">Open this select menu</option>

			 @foreach($division as $item)
		 	<option value="{{ $item->id }}" {{ $item->id == $district->division_id ? 'selected' : ''  }} >{{ $item->division_name }}</option>
		 	@endforeach

								</select>
				</div>
			</div>


           <div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">District Name</h6>
				</div>
				<div class="form-group col-sm-9 text-secondary">
					<input type="text" name="district_name" class="form-control"  value="{{ $district->district_name }}"  />
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