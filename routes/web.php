<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('service',[ServiceController::class,'index'])->name('service-index');
Route::get('services/{id}/show',[ServiceController::class,'show'])->name('service-show');
Route::get('service/create',[ServiceController::class,'create'])->name('service-create');
Route::post('service/store',[ServiceController::class,'store'])->name('service-store');
Route::get('service/edit/{id}',[ServiceController::class,'edit'])->name('service-edit');
Route::post('service/update/{id}',[ServiceController::class,'update'])->name('service-update');
Route::get('service/delete/{id}',[ServiceController::class,'delete'])->name('service-delete');

Route::get('category',[CategoryController::class,'index'])->name('category-index');
Route::get('category/show/{id}',[CategoryController::class,'show'])->name('category-show');
Route::get('category/create',[CategoryController::class,'create'])->name('category-create');
Route::post('category/store',[CategoryController::class,'store'])->name('category-store');

Route::get('product',[ProductController::class,'index'])->name('product-index');
Route::get('product/create',[ProductController::class,'create'])->name('product-create');
Route::post('product/create',[ProductController::class,'store'])->name('product-store');
Route::get('product/show/{id}',[ProductController::class,'show'])->name('product-show');