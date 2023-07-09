<ul class="metismenu" id="menu">
    <li>
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-home-circle'></i>
            </div>
            <div class="menu-title">Brand</div>
        </a>
        <ul>
            <li>
                 <a href="{{ route('all.brand') }}"><i class="bx bx-right-arrow-alt"></i>All Brand</a>
            </li>
            <li> 
                <a href="{{ route('add.brand') }}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a>
            </li>
        
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-category"></i>
            </div>
            <div class="menu-title">Category</div>
        </a>
        <ul>
            <li>
                <a href="{{ route('all.category') }}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
           </li>
           <li> 
               <a href="{{ route('add.category') }}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
           </li>
       
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-category"></i>
            </div>
            <div class="menu-title">SubCategory</div>
        </a>
        <ul>
            <li>
                <a href="{{ route('all.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>All SubCategory</a>
           </li>
           <li> 
               <a href="{{ route('add.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>Add SubCategory</a>
           </li>
       
        </ul>
    </li>

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-category"></i>
            </div>
            <div class="menu-title">Slider</div>
        </a>
        <ul>
            <li>
                <a href="{{ route('all.slider') }}"><i class="bx bx-right-arrow-alt"></i>All Slider</a>
           </li>
           <li> 
               <a href="{{ route('add.slider') }}"><i class="bx bx-right-arrow-alt"></i>Add Slider</a>
           </li>
       
        </ul>
    </li>

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-category"></i>
            </div>
            <div class="menu-title">Banner</div>
        </a>
        <ul>
            <li>
                <a href="{{ route('all.banner') }}"><i class="bx bx-right-arrow-alt"></i>All banner</a>
           </li>
           <li> 
               <a href="{{ route('add.banner') }}"><i class="bx bx-right-arrow-alt"></i>Add banner</a>
           </li>
       
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-category"></i>
            </div>
            <div class="menu-title">Manage Product</div>
        </a>
        <ul>
            <li>
                <a href="{{ route('all.product') }}"><i class="bx bx-right-arrow-alt"></i>All product</a>
           </li>
           <li> 
               <a href="{{ route('add.product') }}"><i class="bx bx-right-arrow-alt"></i>Add product</a>
           </li>
        
         
       
        </ul>
    </li>
    
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-category"></i>
            </div>
            <div class="menu-title">Coupon System</div>
        </a>
        <ul>
            <li> <a href="{{ route('all.cupon') }}"><i class="bx bx-right-arrow-alt"></i>All Coupon</a>
            </li>
            <li> <a href="{{ route('add.cupon') }}"><i class="bx bx-right-arrow-alt"></i>Add Coupon</a>
            </li>

        </ul>
    </li>

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-category"></i>
            </div>
            <div class="menu-title">Shipping System</div>
        </a>
        <ul>
            <li> <a href="{{ route('all.division') }}"><i class="bx bx-right-arrow-alt"></i>All Division</a>
            </li>
            <li> <a href="{{ route('add.division') }}"><i class="bx bx-right-arrow-alt"></i>Add Division</a>
            </li>
            <li> <a href="{{ route('all.district') }}"><i class="bx bx-right-arrow-alt"></i>All District</a></li>
            <li> <a href="{{ route('add.district') }}"><i class="bx bx-right-arrow-alt"></i>Add District</a></li>

            <li> <a href="{{ route('all.state') }}"><i class="bx bx-right-arrow-alt"></i>All State</a></li>
            <li> <a href="{{ route('add.state') }}"><i class="bx bx-right-arrow-alt"></i>Add State</a></li>


        </ul>
    </li>


    <li class="menu-label">UI Elements</li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-cart'></i>
            </div>
            <div class="menu-title">Vendor</div>
        </a>
        <ul>
            <li> <a href="{{ route('inactive.vendor') }}"><i class="bx bx-right-arrow-alt"></i>Inactive Vendor</a>
            </li>
            <li> <a href="{{ route('active.vendor') }}"><i class="bx bx-right-arrow-alt"></i>Active Vendor</a>
            </li>
            <li> <a href="{{ route('all.vendor') }}"><i class="bx bx-right-arrow-alt"></i>All vendor</a>
            </li>
            <li> <a href="ecommerce-orders.html"><i class="bx bx-right-arrow-alt"></i>Orders</a>
            </li>
        </ul>
    </li>


    

    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-repeat"></i>
            </div>
            <div class="menu-title">Content</div>
        </a>
        <ul>
            <li> <a href="content-grid-system.html"><i class="bx bx-right-arrow-alt"></i>Grid System</a>
            </li>
            <li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Typography</a>
            </li>
            <li> <a href="content-text-utilities.html"><i class="bx bx-right-arrow-alt"></i>Text Utilities</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
            </div>
            <div class="menu-title">Icons</div>
        </a>
        <ul>
            <li> <a href="icons-line-icons.html"><i class="bx bx-right-arrow-alt"></i>Line Icons</a>
            </li>
            <li> <a href="icons-boxicons.html"><i class="bx bx-right-arrow-alt"></i>Boxicons</a>
            </li>
            <li> <a href="icons-feather-icons.html"><i class="bx bx-right-arrow-alt"></i>Feather Icons</a>
            </li>
        </ul>
    </li>
   
    <li class="menu-label">Charts & Maps</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-line-chart"></i>
            </div>
            <div class="menu-title">Charts</div>
        </a>
        <ul>
            <li> <a href="charts-apex-chart.html"><i class="bx bx-right-arrow-alt"></i>Apex</a>
            </li>
            <li> <a href="charts-chartjs.html"><i class="bx bx-right-arrow-alt"></i>Chartjs</a>
            </li>
            <li> <a href="charts-highcharts.html"><i class="bx bx-right-arrow-alt"></i>Highcharts</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-map-alt"></i>
            </div>
            <div class="menu-title">Maps</div>
        </a>
        <ul>
            <li> <a href="map-google-maps.html"><i class="bx bx-right-arrow-alt"></i>Google Maps</a>
            </li>
            <li> <a href="map-vector-maps.html"><i class="bx bx-right-arrow-alt"></i>Vector Maps</a>
            </li>
        </ul>
    </li>
    <li class="menu-label">Others</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-menu"></i>
            </div>
            <div class="menu-title">Menu Levels</div>
        </a>
        <ul>
            <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level One</a>
                <ul>
                    <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level Two</a>
                        <ul>
                            <li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level Three</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="https://codervent.com/rukada/documentation/index.html" target="_blank">
            <div class="parent-icon"><i class="bx bx-folder"></i>
            </div>
            <div class="menu-title">Documentation</div>
        </a>
    </li>
    <li>
        <a href="https://themeforest.net/user/codervent" target="_blank">
            <div class="parent-icon"><i class="bx bx-support"></i>
            </div>
            <div class="menu-title">Support</div>
        </a>
    </li>
</ul>