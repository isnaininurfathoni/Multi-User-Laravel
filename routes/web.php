<?php

use App\Http\Controllers\FeatursControllers;
use App\Http\Controllers\RoleControllers;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;



//yang bisa akses menu login hanya untuk user yang belum login
Route::middleware(['guest'])->group(function(){
    Route::get('/',[SessionController::class,'index'])->name('login');
    Route::post('/',[SessionController::class,'login']);
    Route::get('/register',[SessionController::class,'register']);
    Route::post('/register/create',[SessionController::class,'create']);
});

Route::get('/home',function(){
    return redirect('/featurs');
});


//route yang dapt di akses oleh user yang sudah login dan sesuai role
Route::middleware(['auth'])->group(function(){
    Route::get('/featurs',[FeatursControllers::class,'index']);
    Route::get('/featurs/administrator',[FeatursControllers::class,'administrator'])->middleware('userAccess:administrator');
    Route::get('/featurs/teknisi',[FeatursControllers::class,'teknisi'])->middleware('userAccess:teknisi');
    Route::get('/featurs/superuser',[FeatursControllers::class,'superuser'])->middleware('userAccess:superuser');
    Route::get('/logout',[SessionController::class,'logout']);
    Route::resource('/role-management',RoleControllers::class);
   
});


