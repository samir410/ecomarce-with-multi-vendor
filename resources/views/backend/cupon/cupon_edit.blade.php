@extends('admin.admin_dashboard')
@section('title')
Edit Cupon
@endsection
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Cupon </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
						
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

		<form method="post" action="{{ route('update.cupon') }}"  >
			@csrf
   
		  <input type="hidden" name="id" value="{{ $cupon->id }}">	

		  <div class="row mb-3">
		   <div class="col-sm-3">
			   <h6 class="mb-0">Coupon Name</h6>
		   </div>
		   <div class="form-group col-sm-9 text-secondary">
			<input type="text" name="cupon_name" class="form-control" value="{{ $cupon->cupon_name }}"  />
		   </div>
	   </div>

	  <div class="row mb-3">
		   <div class="col-sm-3">
			   <h6 class="mb-0">Coupon Discount(%)</h6>
		   </div>
		   <div class="form-group col-sm-9 text-secondary">
			   <input type="text" name="cupon_discount" class="form-control" value="{{ $cupon->cupon_discount }}"   />
		   </div>
	   </div>

	   <div class="row mb-3">
		<div class="col-sm-3">
			<h6 class="mb-0">Coupon Validity Date</h6>
		</div>
		<div class="form-group col-sm-9 text-secondary">
			<input type="date" name="cupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"  value="{{ $cupon->cupon_validity }}"  />
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