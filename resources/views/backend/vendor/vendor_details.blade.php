@extends('admin.admin_dashboard')
@section('title')
Profile Detail
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Inactive Vendor Details</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Inactive Vendor Details</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">

        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">

<div class="col-lg-12">
<div class="card">
<div class="card-body">
@if($VendorDetails->status == 'inactive')
<form method="post" action="{{ route('active.vendor.approve') }}" enctype="multipart/form-data" >
@elseif ($VendorDetails->status == 'active')
<form method="post" action="{{ route('inactive.vendor.approve') }}" enctype="multipart/form-data" >
@endif

@csrf
<input type="hidden" name="id" value="{{ $VendorDetails->id }}">

<div class="row mb-3">
    <div class="col-sm-3">
        <h6 class="mb-0">User Name</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="text" class="form-control" value="{{ $VendorDetails->username }}" disabled />
     
    </div>
</div>
<div class="row mb-3">
    <div class="col-sm-3">
        <h6 class="mb-0"> Shop Name</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="text" name="name" class="form-control" value="{{ $VendorDetails->name }}" />
    </div>
</div>
<div class="row mb-3">
    <div class="col-sm-3">
        <h6 class="mb-0">Vendor Email</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="email" name="email" class="form-control" value="{{ $VendorDetails->email }}" />
    </div>
</div>
<div class="row mb-3">
    <div class="col-sm-3">
        <h6 class="mb-0">Vendor Phone </h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="text" name="phone" class="form-control" value="{{ $VendorDetails->phone }}" />
    </div>
</div>


<div class="row mb-3">
    <div class="col-sm-3">
        <h6 class="mb-0">Vendor Address</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="text" name="address" class="form-control" value="{{ $VendorDetails->address }}" />
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-3">
        <h6 class="mb-0">Vendor Join</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="text" name="vendor_join" class="form-control" value="{{ $VendorDetails->vendor_join }}" />
    </div>
</div>




<div class="row mb-3">
    <div class="col-sm-3">
        <h6 class="mb-0">Vendor Info</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <textarea name="vendor_short_info" class="form-control" id="inputAddress2" placeholder="Vendor Info " rows="3">
        {{ $VendorDetails->vendor_short_info }}
    </textarea>
    </div>
</div>



<div class="row mb-3">
    <div class="col-sm-3">
        <h6 class="mb-0">Vendor Photo</h6>
    </div>
    <div class="col-sm-9 text-secondary">
         <img id="showImage" src="{{ (!empty($VendorDetails->photo)) ? url('upload/vendor_images/'.$VendorDetails->photo):url('upload/no_image.jpg') }}" alt="Vendor" style="width:100px; height: 100px;"  >
    </div>
</div>




<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-9 text-secondary">
        @if($VendorDetails->status == 'inactive')
           <input type="submit" class="btn btn-danger px-4" value="Active Vendor" />
        @elseif($VendorDetails->status == 'active')
           <input type="submit" class="btn btn-success px-4" value="InActive Vendor" />
        @endif
      
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