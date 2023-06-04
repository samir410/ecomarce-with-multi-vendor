
@extends('frontend.master_dashboard')
@section('title')
Samir Ecomarce
@endsection
@section('main')

<main class="main">
    {{-- hero slide --}}
   
    @include('frontend.section.hero_slide')
    <!--End hero slider-->

    <!--Category-->
    @include('frontend.section.category')
    <!--End category slider-->
    {{-- banner --}}
   
    @include('frontend.section.banner')
    <!--End banners-->



    {{-- products --}}
  
    @include('frontend.section.products')
    <!--Products Tabs-->




   @include('frontend.section.feature_product')
    <!--End Best Sales-->









    <!-- TV Category -->

<section class="product-tabs section-padding position-relative">
        <div class="container">
            <div class="section-title style-2 wow animate__animated animate__fadeIn">
                <h3>{{ $skip_category_0->category_name }}</h3>
               
            </div>
            <!--End nav-tabs-->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">



                        @foreach ($skip_product_0 as $key=>$product) 
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="shop-product-right.html">
                                            <img class="default-img" src="{{ asset($product->product_thambnail)}}" alt="" />
                                            <img class="hover-img" src="{{ asset($product->product_thambnail)}}" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                    </div>
                                    @php
                                     $amount = $product->selling_price - $product->discount_price;
                                      $discount = ($amount/$product->selling_price) * 100;
                                    @endphp
                                 
                                        <div class="product-badges product-badges-position product-badges-mrg">
    
                                            @if($product->discount_price == NULL)
                                            <span class="new">New</span>
                                            @else
                                            <span class="hot"> {{ round($discount) }} %</span>
                                            @endif
    
    
                                        </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop-grid-right.html">{{ $product['category']['category_name'] }}</a>
                                    </div>
                                    <h2><a href="shop-product-right.html">{{ $product->product_name }}</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    {{-- <div>
                                        @if($product->vendor_id == NULL)
                                          <span class="font-small text-muted">By <a href="vendor-details-1.html">Owner</a></span>
                                        @else
                                          <span class="font-small text-muted">By <a href="vendor-details-1.html">{{ $product['vendor']['name'] }}</a></span>
                                        
                                        @endif
                                    </div> --}}
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            @if($product->discount_price == Null)
                                             <span>${{ $product->selling_price }}</span>
                                            @else
                                              <span>${{ $amount = $product->selling_price - $product->discount_price }}</span>
                                            @endif
                                           
                                            <span class="old-price">${{ $product->selling_price }}</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        @endforeach
                        
                        <!--end product card-->

                       
                    </div>
                    <!--End product-grid-4-->
                </div>
               
               
            </div>
            <!--End tab-content-->
        </div>


</section>
    <!--End TV Category -->





    <!--End Computer Category -->





















    @include('frontend.section.hot_deals')
    <!--End 4 columns-->









<!--Vendor List -->

   @include('frontend.section.vendor_list')

<!--End Vendor List -->





</main>


@endsection