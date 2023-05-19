<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CuponController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderBannerController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WishlistController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user/register', [UserController::class, 'UserRegister'])->name('user.register');
Route::get('/user/login', [UserController::class, 'UserLogin'])->name('user.login');
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);
Route::get('/vendor/login', [VendorController::class, 'VendorLogin'])->name('vendor.login')->middleware(RedirectIfAuthenticated::class);
Route::get('/become/vendor', [VendorController::class, 'BecomeVendor'])->name('become.vendor');
Route::post('/vendor/register', [VendorController::class, 'VendorRegister'])->name('vendor.register');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//////admin routes
Route::middleware('auth', 'role:admin')->controller(AdminController::class)->prefix('/admin')->group(function () {
    Route::get('/dashboard', 'admin_dashboard')->name('admin.dashboard');
    Route::get('/logout', 'AdminLogout')->name('admin.logout');
    Route::get('/change', 'ChangePassword')->name('admin.changepassword');
    Route::post('/update/password', 'AdminUpdatePassword')->name('update.password');
    Route::get('/profile', 'admin_profile')->name('admin.profile');
    Route::post('/store/profile', 'store_profile')->name('admin.store.profile');
});
Route::controller(AdminController::class)->group(function () {
    Route::get('/inactive/vendor', 'InactiveVendor')->name('inactive.vendor');
    Route::get('/active/vendor', 'ActiveVendor')->name('active.vendor');
    Route::get('/all/vendor', 'AllVendor')->name('all.vendor');
    Route::get('/vendor/details/{id}', 'VendorDetails')->name('vendor.details');
    Route::post('/active/vendor/approve', 'ActiveVendorApprove')->name('active.vendor.approve');
    Route::post('/inactive/vendor/approve', 'InActiveVendorApprove')->name('inactive.vendor.approve');
});

//////////////////////////////////////////////vendor routes/////////////////////////////////////////////////////
Route::middleware('auth', 'role:vendor')->controller(VendorController::class)->prefix('/vendor')->group(function () {
    Route::get('/dashboard', 'vendor_dashboard')->name('vendor.dashboard');
    Route::get('/logout', 'VendorLogout')->name('vendor.logout');
    Route::get('/change', 'ChangePassword')->name('vendor.changepassword');
    Route::get('/profile', 'vendor_profile')->name('vendor.profile');
    Route::post('/store/profile', 'store_profile')->name('vendor.profile.store');
    Route::post('/update/password', 'VendorUpdatePassword')->name('vendor.update.password');
});

//////////////////////////////////////////////////////frontend routes//////////////////////////////////////
Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('homepage');
    Route::get('/all/vendorlist', 'All_Vendor')->name('all.vendorlist');
    Route::get('/vendor/details/{id}', 'VendorDetails')->name('vendor.details');
    Route::post('/product/search', 'ProductSearch')->name('product.search');
    Route::post('/search-product', 'SearchProduct');
    Route::get('product/details/{id}/{slug}', 'ProductDetails');
    Route::get('/product/category/{id}/{slug}', 'CatWiseProduct');
    Route::get('/product/subcategory/{id}/{slug}', 'SubCatWiseProduct');
    Route::get('/product/view/modal/{id}', 'ProductViewAjax');
});

//////////////////////////////////////////////////////User routes//////////////////////////////////////
Route::middleware('auth')->controller(UserController::class)->group(function () {
    Route::get('/user/reset-password', 'ResetPassword')->name('user.reset.password');
    Route::get('/user/profile', 'UserProfile')->name('user.profile');
    Route::post('/store/profile', 'store_profile')->name('user.store.profile');
    Route::get('/logout', 'UserLogout')->name('user.logout');
});

// \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\Brand////////////////////////////////////////////////////////////
Route::middleware('auth', 'role:admin')->controller(BrandController::class)->group(function () {
    Route::get('/all/brand', 'index')->name('all.brand');
    Route::get('/add/brand', 'add_brand_page')->name('add.brand');
    Route::post('/store/brand', 'create')->name('store.brand');
    Route::get('/edit/brand/{id}', 'edit')->name('edit.brand');
    Route::post('/update/brand', 'UpdateBrand')->name('update.brand');
    Route::get('/delete/brand/{id}', 'destroy')->name('delete.brand');
});

// /////////////////////////////Category///////////////////////////////////////////////////////////
Route::middleware('auth', 'role:admin')->controller(CategoryController::class)->group(function () {
    Route::get('/all/category', 'index')->name('all.category');
    Route::get('/add/category', 'create')->name('add.category');
    Route::post('/store/category', 'store')->name('store.category');
    Route::get('/edit/category/{id}', 'edit')->name('edit.category');
    Route::post('/update/category', 'update')->name('update.category');
    Route::get('/delete/category/{id}', 'destroy')->name('delete.category');
});

// /////////////////////////////Category///////////////////////////////////////////////////////////
Route::middleware('auth', 'role:admin')->controller(SubCategoryController::class)->group(function () {
    Route::get('/all/subcategory', 'index')->name('all.subcategory');
    Route::get('/add/subcategory', 'create')->name('add.subcategory');
    Route::post('/store/subcategory', 'store')->name('store.subcategory');
    Route::get('/edit/subcategory/{id}', 'edit')->name('edit.subcategory');
    Route::post('/update/subcategory', 'update')->name('update.subcategory');
    Route::get('/delete/subcategory/{id}', 'destroy')->name('delete.subcategory');
    Route::get('/subcategory/ajax/{category_id}', 'GetSubCategory');
});
// /////////////////////////////Slider---Banner///////////////////////////////////////////////////////////
Route::middleware('auth', 'role:admin')->controller(SliderBannerController::class)->group(function () {
    Route::get('/all/slider', 'slider_index')->name('all.slider');
    Route::get('/add/slider', 'slider_create')->name('add.slider');
    Route::post('/store/slider', 'slider_store')->name('store.slider');
    Route::get('/edit/slider/{id}', 'slider_edit')->name('edit.slider');
    Route::post('/update/slider', 'slider_update')->name('update.slider');
    Route::get('/delete/slider/{id}', 'slider_destroy')->name('delete.slider');

    // banner section///
    Route::get('/all/banner', 'banner_index')->name('all.banner');
    Route::get('/add/banner', 'banner_create')->name('add.banner');
    Route::post('/store/banner', 'banner_store')->name('store.banner');
    Route::get('/edit/banner/{id}', 'banner_edit')->name('edit.banner');
    Route::post('/update/banner', 'banner_update')->name('update.banner');
    Route::get('/delete/banner/{id}', 'banner_destroy')->name('delete.banner');
});

/////////////////////////////////////////product //////////////////////////////
Route::middleware('auth', 'role:admin')->controller(ProductController::class)->group(function () {
    Route::get('/all/product', 'AllProduct')->name('all.product');
    Route::get('/add/product', 'AddProduct')->name('add.product');
    Route::post('/store/product', 'StoreProduct')->name('store.product');
    Route::get('/product/inactive/{id}', 'ProductInactive')->name('product.inactive');
    Route::get('/product/active/{id}', 'ProductActive')->name('product.active');
    Route::get('/delete/product/{id}', 'ProductDelete')->name('delete.product');
    Route::get('/edit/product/{id}', 'EditProduct')->name('edit.product');
    Route::post('/update/product', 'UpdateProduct')->name('update.product');
    Route::post('/update/product/thambnail', 'UpdateProductThambnail')->name('update.product.thambnail');
    Route::post('/update/product/multiimage', 'UpdateProductMultiimage')->name('update.product.multiimage');
    Route::get('/product/multiimg/delete/{id}', 'MulitImageDelelte')->name('product.multiimg.delete');
});
Route::middleware('auth', 'role:vendor')->controller(VendorProductController::class)->prefix('/vendor')->group(function () {
    Route::get('/all/product', 'AllProduct')->name('vendor.all.product');
    Route::get('/add/product', 'AddProduct')->name('vendor.add.product');
    Route::get('/subcategory/ajax/{category_id}', 'VendorGetSubCategory');
    Route::post('/store/product', 'StoreProduct')->name('vendor.store.product');
    Route::get('/product/inactive/{id}', 'ProductInactive')->name('vendor.product.inactive');
    Route::get('/product/active/{id}', 'ProductActive')->name('vendor.product.active');
    Route::get('/delete/product/{id}', 'ProductDelete')->name('vendor.delete.product');

    Route::get('/edit/product/{id}', 'EditProduct')->name('vendor.edit.product');
    Route::post('/update/product', 'UpdateProduct')->name('vendor.update.product');
    Route::post('/update/product/thambnail', 'UpdateProductThambnail')->name('vendor.update.product.thambnail');
    Route::post('/update/product/multiimage', 'UpdateProductMultiimage')->name('vendor.update.product.multiimage');
    Route::get('/product/multiimg/delete/{id}', 'MulitImageDelelte')->name('vendor.product.multiimg.delete');
});

Route::middleware('auth', 'role:admin')->controller(CuponController::class)->group(function () {
    Route::get('/all/cupon', 'index')->name('all.cupon');
    Route::get('/add/cupon', 'create')->name('add.cupon');
    Route::post('/store/cupon', 'store')->name('store.cupon');
    Route::get('/edit/cupon/{id}', 'edit')->name('edit.cupon');
    Route::post('/update/cupon', 'update')->name('update.cupon');
    Route::get('/delete/cupon/{id}', 'destroy')->name('delete.cupon');
});
Route::post('/add-to-wishlist/{product_id}', [WishlistController::class, 'AddToWishList']);


Route::controller(WishlistController::class)->group(function () {
    Route::get('/wishlist' , 'AllWishlist')->name('wishlist');
    Route::get('/get-wishlist-product' , 'GetWishlistProduct');
    Route::get('/wishlist-remove/{id}' , 'WishlistRemove');
  
});

require __DIR__.'/auth.php';
