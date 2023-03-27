<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
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


Route::get('/user/register', [UserController::class,'UserRegister'])->name('user.register');
Route::get('/user/login', [UserController::class,'UserLogin'])->name('user.login');
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::get('/vendor/login', [VendorController::class, 'VendorLogin'])->name('vendor.login');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//////admin routes
Route::middleware('auth','role:admin')->controller(AdminController::class)->prefix('/admin')->group(function () {
    Route::get('/dashboard','admin_dashboard')->name('admin.dashboard');
    Route::get('/logout','AdminLogout')->name('admin.logout');
    Route::get('/change','ChangePassword')->name('admin.changepassword');
    Route::post('/update/password','AdminUpdatePassword')->name('update.password');
    Route::get('/profile','admin_profile')->name('admin.profile');
    Route::post('/store/profile','store_profile')->name('admin.store.profile');
});


//////////////////////////////////////////////vendor routes/////////////////////////////////////////////////////
Route::middleware('auth','role:vendor')->controller(VendorController::class)->prefix('/vendor')->group(function () {
    Route::get('/dashboard','vendor_dashboard')->name('vendor.dashboard');
    Route::get('/logout','VendorLogout')->name('vendor.logout');
    Route::get('/change','ChangePassword')->name('vendor.changepassword');
    Route::get('/profile','vendor_profile')->name('vendor.profile');
    Route::post('/store/profile','store_profile')->name('vendor.profile.store');
    Route::post('/update/password','VendorUpdatePassword')->name('vendor.update.password');
});




//////////////////////////////////////////////////////frontend routes//////////////////////////////////////
Route::controller(FrontendController::class)->group(function () {
    Route::get('/','index')->name('homepage');
   
});

//////////////////////////////////////////////////////User routes//////////////////////////////////////
Route::middleware('auth')->controller(UserController::class)->group(function () {
    Route::get('/user/reset-password', 'ResetPassword')->name('user.reset.password');
    Route::get('/user/profile', 'UserProfile')->name('user.profile');
    Route::post('/store/profile','store_profile')->name('user.store.profile');
    Route::get('/logout','UserLogout')->name('user.logout');
});


// \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\Brand////////////////////////////////////////////////////////////
Route::middleware('auth','role:admin')->controller(BrandController::class)->group(function () {
    Route::get('/all/brand','index')->name('all.brand');
    Route::get('/add/brand','add_brand_page')->name('add.brand');
    Route::post('/store/brand','create')->name('store.brand');
    Route::get('/edit/brand/{id}' , 'edit')->name('edit.brand');
    Route::post('/update/brand' , 'UpdateBrand')->name('update.brand');
    Route::get('/delete/brand/{id}','destroy')->name('delete.brand');
});

// /////////////////////////////Category///////////////////////////////////////////////////////////
Route::middleware('auth','role:admin')->controller(CategoryController::class)->group(function () {
    Route::get('/all/category','index')->name('all.category');
    Route::get('/add/category','create')->name('add.category');
    Route::post('/store/category','store')->name('store.category');
    Route::get('/edit/category/{id}' , 'edit')->name('edit.category');
    Route::post('/update/category' , 'update')->name('update.category');
    Route::get('/delete/category/{id}','destroy')->name('delete.category');
});

// /////////////////////////////Category///////////////////////////////////////////////////////////
Route::middleware('auth','role:admin')->controller(SubCategoryController::class)->group(function () {
    Route::get('/all/subcategory','index')->name('all.subcategory');
    Route::get('/add/subcategory','create')->name('add.subcategory');
    Route::post('/store/subcategory','store')->name('store.subcategory');
    Route::get('/edit/subcategory/{id}' , 'edit')->name('edit.subcategory');
    Route::post('/update/subcategory' , 'update')->name('update.subcategory');
    Route::get('/delete/subcategory/{id}','destroy')->name('delete.subcategory');
});





require __DIR__.'/auth.php';
