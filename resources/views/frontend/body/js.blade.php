    <!-- Vendor JS-->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/script.js')}}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend/assets/js/main.js?v=5.3')}}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js?v=5.3')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
		@if(Session::has('message'))
		var type = "{{ Session::get('alert-type','info') }}"
		switch(type){
		   case 'info':
		   toastr.info(" {{ Session::get('message') }} ");
		   break;
		   case 'success':
		   toastr.success(" {{ Session::get('message') }} ");
		   break;
		   case 'warning':
		   toastr.warning(" {{ Session::get('message') }} ");
		   break;
		   case 'error':
		   toastr.error(" {{ Session::get('message') }} ");
		   break; 
		}
		@endif 
	</script>
   <script>
      function redirectToLoginPage() {
        location.href = "{{ route('user.login') }}";
      }
   </script>
   {{-- product model view start --}}
    <script type="text/javascript">
    
      $.ajaxSetup({
          headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('centent')
          }
      })
      /// Start product view with Modal 

      function productView(id){
        // alert(id)
        $.ajax({
            type: 'GET',
            url: '/product/view/modal/'+id,
            dataType: 'json',
            success:function(data){
               //  console.log(data)
               $('#pname').text(data.product.product_name);
               $('#pprice').text(data.product.selling_price);
               $('#pcode').text(data.product.product_code);
               $('#pcategory').text(data.product.category.category_name);
               $('#pbrand').text(data.product.brand.brand_name);
               $('#pimage').attr('src','/'+data.product.product_thambnail );
            
            // Product Price 
            if (data.product.discount_price == null) {
                $('#pprice').text('');
                $('#oldprice').text('');
                $('#pprice').text(data.product.selling_price);
            }else{
                $('#pprice').text(data.product.discount_price);
                $('#oldprice').text(data.product.selling_price); 
            } // end else

            if (data.product.product_qty > 0) {
                $('#aviable').text('');
                $('#stockout').text('');
                $('#aviable').text('aviable');
            }else{
                $('#aviable').text('');
                $('#stockout').text('');
                $('#stockout').text('stockout');
            } 
            ///End Start Stock Option
             ///Size 
             $('select[name="size"]').empty();
             $.each(data.size,function(key,value){
                $('select[name="size"]').append('<option value="'+value+' ">'+value+'  </option')
                if (data.size == "") {
                    $('#sizeArea').hide();
                }else{
                     $('#sizeArea').show();
                }
             }) // end size
                     ///Color 
               $('select[name="color"]').empty();
             $.each(data.color,function(key,value){
                $('select[name="color"]').append('<option value="'+value+' ">'+value+'  </option')
                if (data.color == "") {
                    $('#colorArea').hide();
                }else{
                     $('#colorArea').show();
                }
              }) // end size

            }
        })
      }
   </script>
  {{-- product model view end --}}
  {{-- wishlist start  --}}
  <script type="text/javascript">
    $.ajaxSetup({
          headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('centent')
          }
      })
      ///
    function addToWishList(product_id){
        
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/add-to-wishlist/"+product_id,
            success:function(data){
                 // Start Message 
        const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
         
              showConfirmButton: false,
              timer: 3000 
        })
        if ($.isEmptyObject(data.error)) {
                
                Toast.fire({
                type: 'success',
                icon: 'success', 
                title: data.success, 
                })
        }else{
           
       Toast.fire({
                type: 'error',
                icon: 'error',
                title: data.error, 
                })
            }
          // End Message  
            }
        })
    }
</script>
{{-- wish list end --}}

<!--  /// Start Load Wishlist Data -->
<script type="text/javascript">
        
        function wishlist(){
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/get-wishlist-product/",
                success:function(response){
                     
                   var rows = ""
                   $.each(response.wishlist, function(key,value){
                      rows += `<tr class="pt-30">
                        <td class="custome-checkbox pl-30">
                            
                        </td>
                        <td class="image product-thumbnail pt-40"><img src="/${value.product.product_thambnail}" alt="#" /></td>
                        <td class="product-des product-name">
                            <h6><a class="product-name mb-10" href="shop-product-right.html">${value.product.product_name} </a></h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                        </td>
                        <td class="price" data-title="Price">
                        ${value.product.discount_price == null
                        ? `<h3 class="text-brand">$${value.product.selling_price}</h3>`
                        :`<h3 class="text-brand">$${value.product.discount_price}</h3>`
                        }
                            
                        </td>
                        <td class="text-center detail-info" data-title="Stock">
                            ${value.product.product_qty > 0 
                                ? `<span class="stock-status in-stock mb-0"> In Stock </span>`
                                :`<span class="stock-status out-stock mb-0">Stock Out </span>`
                            } 
                           
                        </td>
                       
                        <td class="action text-center" data-title="Remove">
                            <a href="#" class="text-body"><i class="fi-rs-trash"></i></a>
                        </td>
                    </tr> ` 
       });
       $('#wishlist').html(rows); 
                }
            })
        }
    wishlist();
</script>


<!--  /// End Load Wishlist Data -->


<!--  /// Start Wishlist Add -->

<script type="text/javascript">
        
    function wishlist(){
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "/get-wishlist-product/",
            success:function(response){
                $('#wishQty').text(response.wishQty);
                 
               var rows = ""
               $.each(response.wishlist, function(key,value){
                  rows += `<tr class="pt-30">
                    <td class="custome-checkbox pl-30">
                        
                    </td>
                    <td class="image product-thumbnail pt-40"><img src="/${value.product.product_thambnail}" alt="#" /></td>
                    <td class="product-des product-name">
                        <h6><a class="product-name mb-10" href="shop-product-right.html">${value.product.product_name} </a></h6>
                        <div class="product-rate-cover">
                            <div class="product-rate d-inline-block">
                                <div class="product-rating" style="width: 90%"></div>
                            </div>
                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                        </div>
                    </td>
                    <td class="price" data-title="Price">
                    ${value.product.discount_price == null
                    ? `<h3 class="text-brand">$${value.product.selling_price}</h3>`
                    :`<h3 class="text-brand">$${value.product.discount_price}</h3>`
                    }
                        
                    </td>
                    <td class="text-center detail-info" data-title="Stock">
                        ${value.product.product_qty > 0 
                            ? `<span class="stock-status in-stock mb-0"> In Stock </span>`
                            :`<span class="stock-status out-stock mb-0">Stock Out </span>`
                        } 
                       
                    </td>
                   
                    <td class="action text-center" data-title="Remove">
                        <a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)" ><i class="fi-rs-trash"></i></a>
                    </td>
                </tr> ` 
   });
   $('#wishlist').html(rows); 
            }
        })
    }
wishlist();

function wishlistRemove(id){
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/wishlist-remove/"+id,
                success:function(data){
                wishlist();
                     // Start Message 
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  
                  showConfirmButton: false,
                  timer: 3000 
            })
            if ($.isEmptyObject(data.error)) {
                    
                    Toast.fire({
                    type: 'success',
                    icon: 'success', 
                    title: data.success, 
                    })
            }else{
               
           Toast.fire({
                    type: 'error',
                    icon: 'error', 
                    title: data.error, 
                    })
                }
              // End Message  
                }
            })
        }

</script>


