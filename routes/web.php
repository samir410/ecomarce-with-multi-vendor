<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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



Route::get('/user/register', [UserController::class,'UserRegister'])->name('user.register');
Route::get('/user/login', [UserController::class,'UserLogin'])->name('user.login');
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::get('/vendor/login', [VendorController::class, 'VendorLogin'])->name('vendor.login');


require __DIR__.'/auth.php';
