<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\ProductController;
use App\Http\Controllers\datakambingController;
use App\Http\Controllers\DatapeternakController;
Route::get('/', function () {
    return view('welcome');
});
  
Route::resource('products', ProductController::class);
Route::resource('datakambings', datakambingController::class);
Route::resource('datapeternaks', datapeternakController::class);