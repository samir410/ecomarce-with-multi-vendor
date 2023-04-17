@php
$hotdeals = App\Models\Product::where('hot_deals',1)->orderBy('id','DESC')->limit(6)->get();
@endphp

<section class="section-padding mb-30">
    <div class="container">
        <div class="row">
            @foreach ($hotdeals as $data )
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    <h4 class="section-title style-1 mb-30 animated animated"> Hot Deals </h4>
                    <div class="product-list-small animated animated">
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{ url('product/details/'.$data->id.'/'.$data->product_slug) }}">
                                    <img class="default-img" src="{{ asset( $data->product_thambnail ) }}" alt="" />
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="shop-product-right.html">{{ $data->product_name }}</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                    @php
                                    $amount = $data->selling_price - $data->discount_price;
                                    $discount = ($amount/$data->selling_price) * 100;
                                    @endphp
                                <div class="product-price">
                                    <span>${{ $data->discount_price }} </span>
                                    <span class="old-price">${{ $data->selling_price }}</span>
                                </div>
                            </div>
                        </article>
                    
                        
                    </div>
                </div>
                
            @endforeach
       
       
        </div>
    </div>
</section>