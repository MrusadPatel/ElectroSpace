<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index']);



Route::get('/about', function(){
    return view('user.pages.about');
});
Route::get('/contact',function(){
    return view('user.pages.contact');
});


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/redirect/user/dashboard', [UserDashboardController::class,'index'])->name('dashboard');
    
    
});

// user profile routes
Route::get('/redirect/user/profile', [UserProfileController::class,'index'])->name('profile');
Route::put('/redirect/user/profile', [UserProfileController::class,'updateProfile'])->name('user.profile.update');
Route::post('/redirect/user/profile', [UserProfileController::class,'updatePassword'])->name('user.profile.update.password');

Route::get('redirect',[HomeController::class,'redirect']);

// admin dashboard routes
Route::get('/redirect/admin/dashboard', [AdminDashboardController::class,'index'])->name('admin.dashboard');

// admin category routes
Route::resource('redirect/admin/category',CategoryController::class);

// admin Sub category routes
Route::resource('redirect/admin/sub-category',SubCategoryController::class);

// admin Sub category routes
Route::get('redirect/admin/get-subcategories', [ChildCategoryController::class, 'getSubCategories'])->name('get-subcategories');

Route::resource('redirect/admin/child-category',ChildCategoryController::class);

// admin profile routes
Route::get('redirect/admin/profile',[AdminController::class,'profile']);
Route::post('redirect/admin/profile/update',[AdminController::class,'updateProfile']);
Route::post('redirect/admin/profile/update/password',[AdminController::class,'updatePassword'])->name('update.password');

// admin slider routes
Route::resource('redirect/admin/slider',SliderController::class);