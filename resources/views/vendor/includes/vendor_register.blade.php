
@extends('frontend.master_dashboard')
@section('title')
Vendor register page
@endsection
@section('main')

<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span>  Become Vendor
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                     @endforeach
                  </ul>
                 </div>
                @endif
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h1 class="mb-5">Become Vendor</h1>
     <p class="mb-30">Already have an Vendor account? <a href="{{ route('vendor.login') }}">Vendor Login</a></p>
                                    </div>


<form method="POST" action="{{ route('vendor.register') }}">
        @csrf


<div class="form-group">
    <input type="text" id="name" required="" name="name" placeholder="Shop Name" />
</div>

<div class="form-group">
    <input type="text" id="username" required="" name="username" placeholder="User Name" />
</div>


<div class="form-group">
    <input type="email"  id="email" required="" name="email" placeholder="Email" />
</div>

<div class="form-group">
    <input type="text" id="phone" required="" name="phone" placeholder="Phone" />
</div>


 <div class="form-group">
     <select name="vendor_join" class="form-select mb-3" aria-label="Default select example">
        <option selected="">Open this select Join Date</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
        <option value="2025">2026</option>
    
    </select>
</div>


<div class="form-group">
    <input required=""  id="password"  type="password" name="password" placeholder="Password" />
</div>
<div class="form-group">
    <input required="" id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm password" />
</div>


<div class="login_footer form-group mb-50">
    <div class="chek-form">
        <div class="custome-checkbox">
            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="" />
            <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
        </div>
    </div>
    <a href="page-privacy-policy.html"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
</div>
<div class="form-group mb-30">
    <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Submit &amp; Register</button>
</div>
<p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
</form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 pr-30 d-none d-lg-block">
                            <div class="card-login mt-115">
                                <a href="#" class="social-login facebook-login">
                                    <img src="assets/imgs/theme/icons/logo-facebook.svg" alt="" />
                                    <span>Continue with Facebook</span>
                                </a>
                                <a href="#" class="social-login google-login">
                                    <img src="assets/imgs/theme/icons/logo-google.svg" alt="" />
                                    <span>Continue with Google</span>
                                </a>
                                <a href="#" class="social-login apple-login">
                                    <img src="assets/imgs/theme/icons/logo-apple.svg" alt="" />
                                    <span>Continue with Apple</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection