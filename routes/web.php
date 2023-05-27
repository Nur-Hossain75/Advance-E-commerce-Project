<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyCommerceController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;



Route::get('/', [MyCommerceController::class,'index'])->name('home.page');
Route::get('/product-category', [MyCommerceController::class,'category'])->name('category.page');
Route::get('/product-detail', [MyCommerceController::class,'detail'])->name('category.detail');
Route::get('/cart-page', [CartController::class,'cart'])->name('cart.page');
Route::get('/checkout-page', [CheckoutController::class,'checkout'])->name('checkout.page');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/category/add',[CategoryController::class,'index'])->name('category.add');
    Route::post('/category/new',[CategoryController::class,'create'])->name('category.new');
    Route::get('/category/manage',[CategoryController::class,'manage'])->name('category.manage');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

    Route::get('/sub-category/add',[SubCategoryController::class,'index'])->name('subCategory.add');
    Route::post('/sub-category/new',[SubCategoryController::class,'create'])->name('subCategory.new');
    Route::get('/sub-category/manage',[SubCategoryController::class,'manage'])->name('subCategory.manage');
    Route::get('/sub-category/edit/{id}',[SubCategoryController::class,'edit'])->name('subCategory.edit');
    Route::post('/sub-category/update/{id}',[SubCategoryController::class,'update'])->name('subCategory.update');
    Route::get('/sub-category/delete/{id}',[SubCategoryController::class,'delete'])->name('subCategory.delete');
});
