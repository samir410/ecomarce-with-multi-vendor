@php
$banner = App\Models\Banner::latest()->get();
@endphp

<section class="banners mb-25">
    <div class="container">
        <div class="row">
            @foreach ($banner as $data )
            <div class="col-lg-4 col-md-6">
                <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    <img src="{{ asset($data->banner_image)}}" alt="" />
                    <div class="banner-text">
                        <h4>
                            {{$data->banner_title}}
                        </h4>
                        <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
                
            @endforeach
        
         
        </div>
    </div>
</section>