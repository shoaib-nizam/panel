<?php

use App\Http\Controllers\BanquatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TestUser;
use App\Http\Middleware\ValidUser;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['IsUserValid','IsTestUser'])->group(function(){
   Route::view('/sys','admin.index')->name('admin-panel'); 
});

// Route::view('/sys','admin.index')->name('admin-panel')
// ->middleware(['IsUserValid','IsTestUser']);


Route::view('/register','register')->name('register');
Route::view('/','login')->name('login_form');
Route::post('/addregister',[UserController::class,'register'])->name('addregister');

Route::post('/dashboardRegister',[UserController::class,'dashboardRegister'])->name('dashboardRegister');

Route::post('/login',[UserController::class,'login'])->name('login');
Route::get('/dashboard',[UserController::class,'dashboardPage'])->name('dashboard');
Route::get('logout',[UserController::class,'logout'])->name('logout');
Route::get('/show',[UserController::class,'show'])->name('show');
Route::post('/user/delete', [UserController::class, 'delete'])->name('delete');
// banquat routes 
Route::post('/banquetAdd',[BanquatController::class,'addBanquat'])->name('addBanquat');
Route::get('/displayBanquet', [BanquatController::class, 'displayBanquet'])->name('displayBanquet');






