@extends('admin.admin_dashboard')
@section('title')
Add state
@endsection
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add state </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add state </li>
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

                <form method="post" action="{{ route('store.state') }}" >
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Division Name</h6>
                        </div>
                        <div class="form-group col-sm-9 text-secondary">
                            <select name="division_id" class="form-select mb-3" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                    
                                @foreach($division as $item)
                                <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                                @endforeach
            
                            </select>
                        </div>
                    </div>

					<div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">District Name</h6>
                        </div>
                        <div class="form-group col-sm-9 text-secondary">
                            <select name="district_id" class="form-select mb-3" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                    
                                @foreach($district as $item)
                                <option value="{{ $item->id }}">{{ $item->district_name }}</option>
                                @endforeach
            
                            </select>
                        </div>
                    </div>
        
        

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-4 text-secondary ">State Name</h6>
                        </div>
                        <div class="col-sm-9 text-light bg-dark">
                            <input type="text" name="states_name" class="form-control"   />
                        </div>
                    </div>

					<div class="row">
						<div class="col-sm-3"></div>
						<div class="col-sm-9 text-secondary">
							<input type="submit" class="btn btn-primary px-4" value="Save" />
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
		$('select[name="division_id"]').on('change', function(){
			var division_id = $(this).val();
			if (division_id) {
				$.ajax({
					url: "{{ url('/district/ajax') }}/"+division_id,
					type: "GET",
					dataType:"json",
					success:function(data){
						$('select[name="district_id"]').html('');
						var d =$('select[name="district_id"]').empty();
						$.each(data, function(key, value){
							$('select[name="district_id"]').append('<option value="'+ value.id + '">' + value.district_name + '</option>');
						});
					},
				});
			} else {
				alert('danger');
			}
		});
	});
</script>


@endsection