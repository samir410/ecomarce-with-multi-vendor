@php
	$id = Auth::user()->id;
	$verdorId = App\Models\User::find($id);
	$status = $verdorId->status; 
@endphp

<ul class="metismenu" id="menu">
    <li>
        <li>
            <a href="{{ route('vendor.dashboard') }}">
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
            <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Default</a>
            </li>
            <li> <a href="dashboard-eCommerce.html"><i class="bx bx-right-arrow-alt"></i>eCommerce</a>
            </li>
            <li> <a href="dashboard-analytics.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
            </li>
            <li> <a href="dashboard-digital-marketing.html"><i class="bx bx-right-arrow-alt"></i>Digital Marketing</a>
            </li>
            <li> <a href="dashboard-human-resources.html"><i class="bx bx-right-arrow-alt"></i>Human Resources</a>
            </li>
        </ul>
    </li>
    @if($status === 'active')
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Product management</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('vendor.all.product') }}"><i class="bx bx-right-arrow-alt"></i>All product</a>
               </li>
               <li> 
                   <a href="{{ route('vendor.add.product') }}"><i class="bx bx-right-arrow-alt"></i>Add product</a>
               </li>
            </ul>
        </li>
    
    @else
 
    @endif

  
  

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