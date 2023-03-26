<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--favicon-->
		<link rel="icon" href="{{asset('backend/assets/images/favicon-32x32.png')}}" type="image/png" />
		<!--plugins-->
		<link href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
		<link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
		<link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
		<link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
		<!-- loader-->
		<link href="{{ asset('backend/assets/css/pace.min.css')}}" rel="stylesheet" />
		<script src="{{ asset('backend/assets/js/pace.min.js')}}"></script>
		<!-- Bootstrap CSS -->
		<link href="{{ asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{ asset('backend/assets/css/app.css')}}" rel="stylesheet">
		<link href="{{ asset('backend/assets/css/icons.css')}}" rel="stylesheet">
		<!-- Theme Style CSS -->
		<link rel="stylesheet" href="{{ asset('backend/assets/css/dark-theme.css')}}" />
		<link rel="stylesheet" href="{{ asset('backend/assets/css/semi-dark.css')}}" />
		<link rel="stylesheet" href="{{ asset('backend/assets/css/header-colors.css')}}" />
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
		<title>@yield('title')</title>
	</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('backend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Rukada</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			@include('vendor.includes.navigation')
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
	     @include('vendor.includes.header')
		<!--end header -->
		<!--start page wrapper -->

		<div class="page-wrapper"> 
            
            @yield('content') 
           
		</div>

		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include('vendor.includes.footer')
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	@include('vendor.includes.theme')
	<!--end switcher-->
	<!-- Bootstrap JS -->
    @include('vendor.includes.js')
</body>

</html>
