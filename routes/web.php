<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('redirect',[HomeController::class,'redirect']);
Route::get('/view_catagory',[AdminController::class,'view_catagory']);
Route::post('/add_category',[AdminController::class,'add_category']);
Route::get('redirect/admin/profile',[AdminController::class,'profile']);
Route::post('redirect/admin/profile/update',[AdminController::class,'updateProfile']);
